<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\commentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[BlogController::class,'index'])->name('/');
Route::get('/blog.details/{slug}',[BlogController::class,'blogDetails'])->name('blog.details');
Route::get('/customer-register',[customerController::class,'index'])->name('customer.register');
Route::post('/customer-register',[customerController::class,'saveCustomer'])->name('customer.register');


Route::post('/new-user',[customerController::class,'saveUser'])->name('new-user');
Route::get('/customer-logout',[customerController::class,'customerLogout'])->name('customer.logout');
Route::get('/customer-login',[customerController::class,'customerLogIn'])->name('customer.login');
Route::post('/customer-login',[customerController::class,'customerLogInCheck'])->name('customer.login');
Route::post('/new-comment',[commentController::class,'saveComment'])->name('new.comment');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');

    Route::get('/dashboard',[DashboradController::class,'index'])->name('dashboard');


    Route::get('/add-category',[CategoryController::class,'addCategory'])->name('add.category');
    Route::get('/manage-category',[CategoryController::class,'manageCategory'])->name('manage.category');
    Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new.category');


    Route::get('/category-edit/{id}',[CategoryController::class,'editCategory'])->name('category.edit');
    Route::get('/category-status/{id}',[CategoryController::class,'categoryStatus'])->name('category.status');
    Route::post('/category-delete',[CategoryController::class,'categoryDelete'])->name('category.delete');
    Route::post('/update.category',[CategoryController::class,'updateCategory'])->name('update.category');



    Route::get('/add-author',[AuthorController::class,'addAuthor'])->name('add.author');
    Route::get('/manage-author',[AuthorController::class,'manageAuthor'])->name('manage.author');
    Route::post('/new-author',[AuthorController::class,'saveAuthor'])->name('new.author');
    Route::get('/author-status/{id}',[AuthorController::class,'statusAuthor'])->name('status.author');
    Route::get('/edit-status/{id}',[AuthorController::class,'editAuthor'])->name('edit.author');
    Route::post('/delete-status',[AuthorController::class,'deleteAuthor'])->name('delete.author');
    Route::post('/update-author/',[AuthorController::class,'updateAuthor'])->name('update.author');




    Route::get('/add-blog',[BlogController::class,'addBlog'])->name('add.blog');
    Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new.blog');

    Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit.blog');
    Route::post('/delete-blog/',[BlogController::class,'deleteBlog'])->name('delete.blog');
    Route::post('/update-blog/',[BlogController::class,'updateBlog'])->name('update.blog');




});
