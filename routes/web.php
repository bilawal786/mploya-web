<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(['register' => false]);



Route::get('/home', 'HomeController@index')->name('home');



// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
    Route::get('/all/employers', 'Users\Admin\AdminController@AllEmployer')->name('admin.all.employers');
    Route::get('/all/job-seeker', 'Users\Admin\AdminController@JobSeekers')->name('admin.all.jobseeker');
    Route::get('/create/category', 'Users\Admin\AdminController@CreateCategory')->name('admin.create.category');
    Route::post('/category/store', 'Users\Admin\AdminController@CategoryStore')->name('admin.category.store');
    Route::post('/category/update', 'Users\Admin\AdminController@CategoryUpdate')->name('admin.category.update');
    Route::get('/all/category', 'Users\Admin\AdminController@AllCategory')->name('admin.category.all');
    Route::get('/delete/category/{id}', 'Users\Admin\AdminController@DeleteCategory')->name('admin.category.delete');
    Route::get('/edit/category/{id}', 'Users\Admin\AdminController@UpdateCategory')->name('admin.category.edit');

    Route::get('/create/subscription', 'Users\Admin\AdminController@CreateSubscription')->name('admin.create.subscription');
    Route::post('/subscription/store', 'Users\Admin\AdminController@SubscriptionStore')->name('admin.subscription.store');
    Route::get('/all/subscription', 'Users\Admin\AdminController@AllSubscription')->name('admin.subscription.all');
    Route::get('/delete/subscription/{id}', 'Users\Admin\AdminController@DeleteSubscription')->name('admin.subscription.delete');
    Route::get('/edit/subscription/{id}', 'Users\Admin\AdminController@EditSubscription')->name('admin.subscription.edit');
    Route::post('/subscription/update', 'Users\Admin\AdminController@SubscriptionUpdate')->name('admin.subscription.update');
});
