<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //

    public function showList(Request $request){
        $keyword = $request->keyword;
        $shows=  User::where('name', 'like', "%{$keyword}%")->withTrashed()->paginate(10);
        if($shows->total()>0){
            $total= $shows->total();
            $count= User::withTrashed()->count();
            $trackuser= User::onlyTrashed()->count();
            $activeruser = User::where('deleted_at',null)->count();
            return view('admin.users.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser])->with('success',"tim thay '.$total.' ban ghi");
        }else{
            return redirect()->route('showUser')->with('erros','khong tim thay ban ghi');
        }
        }


    public function addList(Request $request){
        return view('admin.users.add');
    }
    public function postList(Request $request){
        User::create($request->only('name','email','password','role'));
        return redirect()->route('showUser')->with('success','bạn da them danh muc thanh cong');
    }
      public function editList($id){
        $shows=  User::find($id);
         return view('admin.users.edit',['shows'=>$shows]);
    }
    public function updatesuser(Request $request, $id){

        $data=[
            'name'=> $request->name,
            'email'=> $request->email,
            'role'=> $request->role,
            'password'=> bcrypt($request->password),

        ];
       User::where('id',$id)->update($data);
       return redirect()->route('showUser')->with('success','bạn da them danh muc thanh cong');
    }

    public function delete($id){
        if(User::find($id) != null){
            User::find($id)->delete();
            return redirect()->route('showUser')->with('success','ban da xoa thanh cong');
        }
        return redirect()->route('showUser')->with('erros','user đã xóa');
    }
    public function trackuser(){
        $shows = User::onlyTrashed()->paginate(5);
        $count= User::withTrashed()->count();
        $trackuser= User::onlyTrashed()->count();
        $activeruser = User::where('deleted_at',null)->count();
        return view('admin.users.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
    }
    public function activeruser(){
        $shows = User::where('deleted_at',null)->get();
        $count= User::withTrashed()->count();
        $trackuser= User::onlyTrashed()->count();
        $activeruser = User::where('deleted_at',null)->count();
        return view('admin.users.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);

    }
    public function restoreUser($id){
        User::withTrashed()->find($id)->restore();
        return redirect()->route('showUser')->with('success','ban da khoi phuc thanh cong');
    }
    public function action(Request $request){
        $checklis= $request->checkbox;
        $action= $request->action;
        if($checklis){
            foreach($checklis as $id){
                if($id==1){
                    return redirect()->route('showUser')->with('erros','ban khong the xoa chinh minh');
                }
            }
            if($action){
                if($action=='disabled'){
                    User::destroy($checklis);
                    return redirect()->route('showUser')->with('success','ban da xoa thanh cong');
                }
                elseif($action=='restore'){
                    User::withTrashed()->whereIn('id',$checklis)->restore();
                    return redirect()->route('showUser')->with('success','ban da khoi phuc thanh cong');
                }elseif($action=='delete'){
                    User::withTrashed()->whereIn('id',$checklis)->forceDelete();
                    return redirect()->route('showUser')->with('success','ban da xoa vinh vien');
                }else{
                    return redirect()->route('showUser')->with('erros','ban chua chon tac vu ');
                }

            }
        }

        }
}
