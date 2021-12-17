<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\typeProductController;
use App\Http\Controllers\admin\productController;

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
    return view('admin.layout.home');
});


//============ ADMIN  ====================//
Route::prefix('admin')->group(function () {
    //=======USER=========//
    //show user
    Route::get('showList/user',[UserController::class,'showList'])->name('showUser');
    // edit user
    Route::get('editList/user/{id}',[UserController::class,'editList'])->name('editUser');
    Route::post('update/show/{id}',[userController::class,'updatesuser'])->name('updatesuser');
    // add user
    Route::get('addList/user',[UserController::class,'addList'])->name('addUser');
    Route::post('postList/user',[UserController::class,'postList'])->name('postList');
    // delete user
    Route::get('/deleteUser/{id}',[userController::class,'delete'])->name('deleteUser');
    // show trackuser
    Route::get('trackuser', [userController::class,'trackuser'])->name('trackuser');
    //show activeruser
    Route::get('activeruser', [userController::class,'activeruser'])->name('activeruser');
    // khoi phuc thung rac
    Route::get('/restoreUser/{id}',[userController::class,'restoreUser'])->name('restoreUser');
    // action tổng hợp trong uer
    Route::get('action',[userController::class,'action'])->name('action');


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
