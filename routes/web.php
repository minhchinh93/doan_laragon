<?php

use Illuminate\Support\Facades\Route;
//admin
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\typeProductController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\dasboaController;
//clients
use App\Http\Controllers\client\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.dasboa.index');
});

//============ ADMIN  ====================//
Route::prefix('admin')->group(function () {




    //=======dasboa=========//
    //show dasboa
    Route::get('showList/dasboa',[dasboaController::class,'showdasboa'])->name('showdasboa');
    // edit user
    Route::get('editList/user/{id}',[dasboaController::class,'editList'])->name('editUser');
    Route::post('update/show/{id}',[dasboaController::class,'updatesuser'])->name('updatesuser');
    // add user
    Route::get('addList/user',[dasboaController::class,'addList'])->name('addUser');
    Route::post('postList/user',[dasboaController::class,'postList'])->name('postList');
    // delete user
    Route::get('/deleteUser/{id}',[userdasboaControllerController::class,'delete'])->name('deleteUser');
    // show trackuser
    Route::get('trackuser', [dasboaController::class,'trackuser'])->name('trackuser');
    //show activeruser
    Route::get('activeruser', [dasboaController::class,'activeruser'])->name('activeruser');
    // khoi phuc thung rac
    Route::get('/restoreUser/{id}',[dasboaController::class,'restoreUser'])->name('restoreUser');
    // action tổng hợp trong uer
    Route::get('action',[dasboaController::class,'action'])->name('action');


    //=========khoi categoru============//
    //show list ctegori
    Route::get('categoriesList',[typeProductController::class,'categoriesList'])->name('categoriesList');
    //show index add
    Route::get('addCategory',[typeProductController::class,'addCategory'])->name('addCategory');
    // show add post
    Route::post('postCategory',[typeProductController::class,'postCategory'])->name('postCategory');
    // show index update
    Route::get('updatetemplateCategory/{id}',[typeProductController::class,'updatetemplateCategory'])->name('updatetemplateCategory');
    Route::post('updateCategory/{id}',[typeProductController::class,'updateCategory'])->name('updateCategory');
    // delete categori
    Route::get('deleteCategory/{id}',[typeProductController::class,'deleteCategory'])->name('deleteCategory');
        // show trackuser
        Route::get('trackCategory', [typeProductController::class,'trackCategory'])->name('trackCategory');
        //show activeruser
        Route::get('activerCategory', [typeProductController::class,'activerCategory'])->name('activerCategory');
        // khoi phuc thung rac
        Route::get('restoreCategory/{id}',[typeProductController::class,'restoreCategory'])->name('restoreCategory');
        // thực hiện tác vụ
        Route::get('categoryaction',[typeProductController::class,'action'])->name('categoryaction');


        //=====khoi product===========//
        Route::get('ProductList',[productController::class,'ProductList'])->name('ProductList');
        //show index add
        Route::get('addProduct',[productController::class,'addProduct'])->name('addProduct');
        // show add post
        Route::post('postProduct',[productController::class,'postProduct'])->name('postProduct');
        // show index update
        Route::get('updatetemplateProduct/{id}',[productController::class,'updatetemplateProduct'])->name('updatetemplateProduct');
        Route::post('updateProduct/{id}',[productController::class,'updateProduct'])->name('updateProduct');
        // delete categori
        Route::get('deleteProduct/{id}',[productController::class,'deleteProduct'])->name('deleteProduct');
            // show trackuser
            Route::get('trackProduct', [productController::class,'trackProduct'])->name('trackProduct');
            //show activeruser
            Route::get('activerProduct', [productController::class,'activerProduct'])->name('activerProduct');
            // khoi phuc thung rac
            Route::get('restoreProduct/{id}',[productController::class,'restoreProduct'])->name('restoreProduct');
            // thực hiện tac vụ
            Route::get('productaction',[productController::class,'action'])->name('productaction');
});


//=========khôi client===========//
//===========Home=================//
Route::prefix('client')->group(function () {


    //show home
    Route::get('home',[HomeController::class,'home'])->name('home');
    //show product_type
    Route::get('product_type/{id_type}',[HomeController::class,'product_type'])->name('product_type');
    //show product
    Route::get('product/{id}',[HomeController::class,'product'])->name('product');
    //show contact
    Route::get('contact',[HomeController::class,'contact'])->name('contact');
    //show about
    Route::get('about',[HomeController::class,'about'])->name('about');
    //show shopping
    Route::get('shopping/{id}',[HomeController::class,'shopping'])->name('shopping');
    //show addcart
    Route::get('deletecart/{rowID}',[HomeController::class,'deletecart'])->name('deletecart');
    //show checkout
    Route::get('checkout',[HomeController::class,'checkout'])->name('checkout');
    //show checkout
    Route::post('postcheckout',[HomeController::class,'postcheckout'])->name('postcheckout');

});
