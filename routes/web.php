<?php

use Illuminate\Support\Facades\Route;
//admin
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\typeProductController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\dasboaController;
use App\Http\Controllers\auth\logincontroller;
use App\Http\Controllers\auth\regiterController;
use App\Http\Controllers\auth\cfController;
use App\Http\Controllers\auth\resetpassController;
//clients
use App\Http\Controllers\client\HomeController;
use App\Http\Middleware\checkAdmin;

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
    return view('clients.auth.login');
});


//============Auth==========//

Route::prefix('auth')->group(function () {
    //login
    Route::get('login',[logincontroller::class,'index'])->name('login');

    Route::post('login',[logincontroller::class,'login'])->name('auth.login');

    Route::get('logout',[logincontroller::class,'logout'])->name('logout');

    //register

    Route::get('regiter',[regiterController::class,'index'])->name('regiter');

    Route::post('postList',[regiterController::class,'postList'])->name('postregiter');
    //mail
    Route::get('/senmail/{remember_token}',[cfController::class,'update'])->name('senmail');

    Route::get('/email',[resetpassController::class,'forgotpass'])->name('forgotpass');

    Route::post('/chekcmail',[resetpassController::class,'checkmail'])->name('checkmail');

    Route::get('/sendMailChangepass/{email}',[resetpassController::class,'sendMailChangepass'])->name('sendMailChangepass');

    Route::post('/changePasss/{email}',[resetpassController::class,'changePass'])->name('changePass');


});

//============ ADMIN  ====================//
Route::middleware('checkAdmin')->prefix('admin')->group(function () {
    //=======dasboa=========//
    //show dasboa
    Route::get('showList/dasboa',[dasboaController::class,'showdasboa'])->name('showdasboa');
    // chi tiêt hóa dơn user
    Route::get('showList/chitiet/{id}',[dasboaController::class,'chitiet'])->name('chitiet');



     //show user
     Route::get('showList/User',[UserController::class,'showList'])->name('showUser');
    // edit user
    Route::get('editList/user/{id}',[UserController::class,'editList'])->name('editUser');
    Route::post('update/show/{id}',[UserController::class,'updatesuser'])->name('updatesuser');
    // add user
    Route::get('addList/user',[UserController::class,'addList'])->name('addUser');
    Route::post('postList/user',[UserController::class,'postList'])->name('postList');
    // delete user
    Route::get('/deleteUser/{id}',[UserController::class,'delete'])->name('deleteUser');
    // show trackuser
    Route::get('trackuser', [UserController::class,'trackuser'])->name('trackuser');
    //show activeruser
    Route::get('activeruser', [UserController::class,'activeruser'])->name('activeruser');
    // khoi phuc thung rac
    Route::get('/restoreUser/{id}',[UserController::class,'restoreUser'])->name('restoreUser');
    // action tổng hợp trong uer
    Route::get('action',[UserController::class,'action'])->name('action');


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
    Route::get('shopping/{id}',[HomeController::class,'shopping'])->middleware('auth')->name('shopping');
    //show addcart
    Route::get('deletecart/{rowID}',[HomeController::class,'deletecart'])->name('deletecart');
    //show checkout
    Route::get('checkout',[HomeController::class,'checkout'])->name('checkout');
    //show checkout
    Route::post('postcheckout',[HomeController::class,'postcheckout'])->name('postcheckout');

});
