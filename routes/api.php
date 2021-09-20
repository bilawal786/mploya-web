<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


// User Login Route

Route::post('/user/login', 'Api\LoginRegisterController@Login');

// User Register Route

// Route::post('/user/register', 'Api\LoginRegisterController@Register');

// Forgot Password Route
Route::post('/forgot/password', 'Api\AuthController@forgot_password');

// Otp Verify Route for  Forgot Password

Route::post('otp/verify', 'Api\AuthController@opt_verify');

// Password Reset Route

// Route::group(['middleware' => 'auth:api'], function () {
Route::post('/reset/password', 'Api\AuthController@reset_password');
// });

// Email Verify Rouute  register

Route::post('/user/signup', 'Api\LoginRegisterController@Signup');

Route::post('/opt/verify/email', 'Api\LoginRegisterController@OptVerify');


// Social Register Route

Route::post('/social/register', 'Api\LoginRegisterController@SocialRegister');

// Get All Jobs Route

Route::get(
    '/all/jobs/frontend',
    'Api\JobseekerController@AllJobsFrontend'
);

Route::group(
    ['middleware' => ['auth:api', 'UserBlock']],
    function () {
        //************************ employer Route *****************************/

        // employer Profile Update Route

        Route::post('employer/profile/update', 'Api\EmployerController@ProfileUpdate');

        // Job Post Route

        Route::post('/job/post', 'Api\EmployerController@JobPost');

        // Get All Job

        Route::get('/employer/jobs', 'Api\EmployerController@AllJobs');

        // Get Single Job

        Route::get('/single/job/{id}', 'Api\EmployerController@SingleJob');



        // Get Single employer

        Route::get('/single/employer/{id}', 'Api\EmployerController@SingleEmployer');


        // Get Single jobseeker

        Route::get('/single/jobseeker/{id}', 'Api\EmployerController@SingleJobseeker');

        // Delete Job Route

        Route::delete('/delete/job/{id}', 'Api\EmployerController@DeleteJob');

        // Edit Job Route

        Route::post('job/edit', 'Api\EmployerController@UpdateJob');

        // Change Job Status Route

        Route::get('/job/{id}', 'Api\EmployerController@ChangeJobStatus');

        // Change Password Route

        Route::post('/password/change', 'Api\EmployerController@PasswordChange');


        // Change Profile Status Route

        Route::get('/profile/{id}', 'Api\EmployerController@ChangeProfileStatus');

        /////////////////////////////////

        // Get All Employer

        Route::get('/all/employers', 'Api\JobseekerController@AllJobseeker');

        /////////////////////////////////// NEW API /////////////////////////////////

        // Get All Popular Employer

        Route::get('/popular/employers', 'Api\EmployerController@AllPapularEmployer');


        // single popular employer

        Route::get('/single/popular/employer/{id}', 'Api\JobseekerController@SinglePapularEmployer');

        // single popular jobseeker

        Route::get('/single/popular/jobseeker/{id}', 'Api\EmployerController@SinglePapularJobseeker');

        // add review

        Route::post('/employer/add/review', 'Api\EmployerController@EmployerAddReview');


        // get all reviw of employer

        Route::get('/employer/review', 'Api\EmployerController@EmployerReview');


        /////////////////////////////////// END NEW API /////////////////////////////////


        // Get All jobseeker

        Route::get('/all/jobseeker', 'Api\EmployerController@AllEmployer');


        // Get All Popular jobseeker

        Route::get('/popular/jobseekers', 'Api\EmployerController@AllPapularJobseeker');

        // Get All  jbseeker  Applied For Job

        Route::get('/applied/jobseeker', 'Api\EmployerController@AppliedEmployer');

        //  Jobseeker  Bookmark  Route

        Route::post('/jobseeker/bookmark', 'Api\EmployerController@EmployerBookmark');


        // Get All Bookmarked Jobseeker Route

        Route::get('/all/bookmark/jobseeker', 'Api\EmployerController@AllBookmarkEmployer');

        // Get Single Bookmarked jobseeker

        Route::get('/single/bookmarked/jobseeker/{id}', 'Api\EmployerController@SingleBookmarkEmployer');


        // Interview Route

        Route::post('/interview', 'Api\EmployerController@Interview');


        //************************ End Employer Route *****************************/


        // common route

        Route::get('/user/profile', 'Api\EmployerController@UserProfile');


        //************************ jobseeker Route *****************************/


        // jobseeker Profile Update Route

        Route::post('/jobseeker/profile/update', 'Api\JobseekerController@ProfileUpdate');


        // Get All Jobs Route

        Route::get(
            '/all/jobs',
            'Api\JobseekerController@AllJobs'
        );

        // Apply For Job Route

        Route::post('/apply/job', 'Api\JobseekerController@ApplyJob');

        // Get All Applied Jobs Route

        Route::get(
            '/jobseeker/applied/jobs',
            'Api\JobseekerController@EmployerAppliedJob'
        );

        //  Jobs  Bookmark  Route

        Route::post('/job/bookmark', 'Api\JobseekerController@JobBookmark');


        // Get All Bookmarked Jobs Route

        Route::get('/all/bookmark/jobs', 'Api\JobseekerController@AllBookmarkJobs');

        // Get Single BookmarkedJob

        Route::get('/single/bookmarked/job/{id}', 'Api\JobseekerController@SingleBookmarkedJob');

        //************************ Jobseeker Route End *****************************/

        //************************ Category Route *****************************/

        Route::get('/all/category', 'Api\CategoryController@AllCategory');

        // sub categories

        Route::get('/all/subcategories/{id}', 'Api\CategoryController@AllSubCategory');

        // Get all Jobs related to that catefgory

        Route::get('/category/related/jobs/{id}', 'Api\CategoryController@CategoryRelatedJobs');


        //************************ Subscription  Route *****************************/


        // Get All  Subscription Route

        Route::get('/all/subscription', 'Api\SubscriptionController@AllSubscription');

        // Purchase Subscription  Route

        Route::post('/purchase/subscription', 'Api\SubscriptionController@PurchaseSubscription');

        // Get current Purchased Subscription  Route

        Route::get('/current/purchased/subscription', 'Api\SubscriptionController@CurrentPruchasedSubscription');


        // Get Single Subscription

        Route::get('/single/subscription/{id}', 'Api\SubscriptionController@SingleSubscription');


        /////     new api //

        Route::post(
            '/jobseeker/add/review',
            'Api\JobseekerController@JobseekerAddReview'
        );


        // get all reviw of jobseeker

        Route::get('/jobseeker/review', 'Api\JobseekerController@JobseekerReview');

        // ???????????????????????????  new api ??????????????????????????

        Route::get('/interview/requested/jobseekers', 'Api\EmployerController@InterviewRequestedJobseeker');

        Route::get('/request/interview', 'Api\JobseekerController@InterviewRequeste');

        Route::post('/reschedule/interview', 'Api\EmployerController@RescheduleInterview');

        // Serch api

        Route::post('/serach/job', 'Api\JobseekerController@searchJob');
    }
);
