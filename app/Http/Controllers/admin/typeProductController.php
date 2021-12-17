<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\type_product;
use Illuminate\Support\Facades\Storage;

class typeProductController extends Controller
{
    //

    public function categoriesList(Request $request){
        $count= type_product::withTrashed()->count();
        $keyword = $request->keyword;
        if($count== 0){
            $shows=  type_product::where('name','like', "%{$keyword}%")->withTrashed()->paginate(10);
            return view('admin.categories.index',['shows'=>$shows]);
        }else{
             $shows=  type_product::where('name','like', "%{$keyword}%")->withTrashed()->paginate(10);
             if($shows->total()>0){
             $trackuser= type_product::onlyTrashed()->count();
             $activeruser = type_product::where('deleted_at',null)->count();
        return view('admin.categories.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
        }else{
             return redirect()->route('categoriesList')->with('erros','khong tim thay ban ghi');
             }
    }
}
    public function addCategory(){
         return view('admin.categories.add');
     }
    public function postCategory(Request $request){
        $image= $request->file('image')->store('images');
        type_product::create(array_merge($request->only('name','description'),['image'=>$image]));
        return redirect()->route('categoriesList')->with('success', 'bạn da them danh muc thanh cong');
    }
    public function updateCategory(Request $request, $id){
        $image= $request->file('image')->store('images');
        type_product::where('id',$id)->update(array_merge($request->only('name','description'),['image'=>$image]));
        return redirect()->route('categoriesList')->with('success', 'bạn update  danh mục thanh cong');
    }
    public function updatetemplateCategory( $id){
        $shows = type_product::find($id);
        return view('admin.categories.edit',['shows'=>$shows]);
    }
    public function deleteCategory($id){
        type_product::find($id)->delete();
        return redirect()->route('categoriesList')->with('success', 'bạn xóa danh mục thanh cong');
    }
    public function trackCategory(){
        $shows = type_product::onlyTrashed()->paginate(4);
        $count= type_product::withTrashed()->count();
        $trackuser= type_product::onlyTrashed()->count();
        $activeruser = type_product::where('deleted_at',null)->count();
        return view('admin.categories.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
     }
    public function activerCategory(){
        $shows = type_product::where('deleted_at',null)->paginate(4);
        $count= type_product::withTrashed()->count();
        $trackuser= type_product::onlyTrashed()->count();
        $activeruser = type_product::where('deleted_at',null)->count();
        return view('admin.categories.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
    }
    public function restoreCategory($id){
        type_product::withTrashed()->find($id)->restore();
        return redirect()->route('categoriesList')->with('success','ban da khoi phuc thanh cong');
    }
    public function action(Request $request){
        $checklis= $request->checkbox;
        $action= $request->action;
        if($checklis){
            if($action){
                if($action=='disabled'){
                    type_product::destroy($checklis);
                    return redirect()->route('categoriesList')->with('success','ban da xoa thanh cong');
                }
                elseif($action=='restore'){
                    type_product::withTrashed()->whereIn('id',$checklis)->restore();
                    return redirect()->route('categoriesList')->with('success','ban da khoi phuc thanh cong');
                }elseif($action=='delete'){
                    type_product::withTrashed()->whereIn('id',$checklis)->forceDelete();
                    return redirect()->route('categoriesList')->with('success','ban da xoa vinh vien');
                }else{
                    return redirect()->route('categoriesList')->with('erros','ban chua chon tac vu ');
                }

            }
        }

        }

}
