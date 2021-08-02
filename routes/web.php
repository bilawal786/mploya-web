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

    Route::get('/employer/{id}', 'Users\Admin\AdminController@EmployerView')->name('admin.employer');

    Route::get('/all/job-seeker', 'Users\Admin\AdminController@JobSeekers')->name('admin.all.jobseeker');

    Route::get('/job-seeker/{id}', 'Users\Admin\AdminController@JobSeekerView')->name('admin.jobseeker');

    Route::get('/create/category', 'Users\Admin\AdminController@CreateCategory')->name('admin.create.category');

    Route::post('/store/category', 'Users\Admin\AdminController@CategoryStore')->name('admin.category.store');

    Route::post('/update/category', 'Users\Admin\AdminController@CategoryUpdate')->name('admin.category.update');

    Route::get('/all/category', 'Users\Admin\AdminController@AllCategory')->name('admin.category.all');

    // sub category create 

    Route::get('/create/subcategory', 'Users\Admin\AdminController@CreateSubCategory')->name('admin.create.subcategory');

    // all subcategory 

    Route::get('/all/subcategory', 'Users\Admin\AdminController@AllSubCategory')->name('admin.subcategory.all');

    // sub category stor

    Route::post('/store/subcategory', 'Users\Admin\AdminController@SubCategoryStore')->name('admin.subcategory.store');

    //  delete update edit sub category

    Route::get('/delete/subcategory/{id}', 'Users\Admin\AdminController@DeleteSubCategory')->name('admin.subcategory.delete');

    Route::get('/edit/subcategory/{id}', 'Users\Admin\AdminController@UpdateSubCategory')->name('admin.subcategory.edit');

    // sub category update 

    Route::post('/update/subcategory', 'Users\Admin\AdminController@SubCategoryUpdate')->name('admin.subcategory.update');

    //

    Route::get('/delete/category/{id}', 'Users\Admin\AdminController@DeleteCategory')->name('admin.category.delete');

    Route::get('/edit/category/{id}', 'Users\Admin\AdminController@UpdateCategory')->name('admin.category.edit');

    Route::get('/create/subscription', 'Users\Admin\AdminController@CreateSubscription')->name('admin.create.subscription');

    Route::post('/store/subscription', 'Users\Admin\AdminController@SubscriptionStore')->name('admin.subscription.store');

    Route::get('/all/subscription', 'Users\Admin\AdminController@AllSubscription')->name('admin.subscription.all');

    Route::get('/purchased/subscription', 'Users\Admin\AdminController@PurchasedSubscription')->name('admin.purchased.subscription');

    Route::get('/delete/subscription/{id}', 'Users\Admin\AdminController@DeleteSubscription')->name('admin.subscription.delete');

    Route::get('/edit/subscription/{id}', 'Users\Admin\AdminController@EditSubscription')->name('admin.subscription.edit');

    Route::post('/update/subscription', 'Users\Admin\AdminController@SubscriptionUpdate')->name('admin.subscription.update');


    ///  employer

    //  make popular

    Route::get('/employer/popular/{id}', 'Users\Admin\AdminController@EmployerMakePopular')->name('admin.employer.popular');



    // block employer

    Route::get('/employer/block/{id}', 'Users\Admin\AdminController@EmployerBlock')->name('admin.employer.block');




    //  jobseeker

    //  make popular or unpopular

    Route::get('/jobseeker/popular/{id}', 'Users\Admin\AdminController@JobseekerMakePopular')->name('admin.jobseeker.popular');



    // block jobseeker or unblock

    Route::get('/jobseeker/block/{id}', 'Users\Admin\AdminController@JobseekerBlock')->name('admin.jobseeker.block');


    // contact 


    Route::post('/jobseeker/message/send', 'Users\Admin\AdminController@Contact')->name('admin.contact');
});
