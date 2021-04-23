<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

Route::fallback(function () {

    return Redirect::back();
});


//
// Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
// Route::post('/register', 'Auth\ApiAuthController@register')->name('register.api');
// Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
// //
Route::get('/', [FrontController::class, 'index']);
Route::get('/subscribe', [FrontController::class, 'subscribe']);
Route::get('/contribute', [FrontController::class, 'contribute']);
Route::get('/category/{slug}', [FrontController::class, 'category']);
Route::get('/article/{slug}', [FrontController::class, 'post']);
Route::get('/archives',[FrontController::class, 'archive']);

/* backend views */
Auth::routes();
//categories
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');;
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');;
Route::get('/admin/category', [AdminController::class, 'categories'])->middleware('auth');;
Route::post('/admin/addcategory', [CrudController::class, 'insertData'])->middleware('auth');;
Route::get('/admin/category/edit/{id}', [AdminController::class, 'editCategory'])->middleware('auth');;
Route::post('/admin/update_category/{id}', [CrudController::class, 'updateData'])->middleware('auth');;
Route::post('/admin/multiple_delete', [AdminController::class, 'deleteData'])->middleware('auth');;


///settings
Route::get('/admin/settings', [AdminController::class, 'settings'])->middleware('auth');;
Route::post('admin/settings/add', [CrudController::class, 'addSettings'])->middleware('auth');;
Route::post('admin/settings/update', [CrudController::class, 'updateSettings'])->middleware('auth');;
//post
Route::get('/admin/posts', [AdminController::class, 'ViewAllPost'])->middleware('auth');;
Route::get('/admin/posts/add', [AdminController::class, 'addPost'])->middleware('auth');;
Route::post('/admin/posts/add', [CrudController::class, 'addPost'])->middleware('auth');;
Route::get('/admin/posts/edit/{id}', [AdminController::class, 'editPost'])->middleware('auth');;
Route::post('/admin/posts/edit/{id}', [CrudController::class, 'updatePost'])->middleware('auth');;

Route::get('/download', function(){
    $file = public_path()."/files/Azeem_English_Magazine-February_2021-Vol.21-Isuue.02.pdf";
    $header = array(
        'Content-Type: application/pdf'
    );
    return Response::download($file, "Azeem_English_Magazine-February_2021-Vol.21-Isuue.02.pdf",$header);
});