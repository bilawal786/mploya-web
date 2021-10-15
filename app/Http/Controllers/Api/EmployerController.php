<?php

namespace App\Http\Controllers\Api;

use App\Job;
use App\User;
use App\Review;
use App\Applied;
use App\Interview;
use App\Notification;
use App\Employerbookmark;
use App\HireForJob;
use Illuminate\Http\Request;
use App\PruchasedSubscription;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\AllJobCollection;
use App\Http\Resources\EmployerResource;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\JobseekerResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JobseekerCollection;
use App\Http\Resources\UserProfileResource;
use App\Notifications\InterviewNotfication;
use App\Http\Resources\PopularJobseekerResource;
use App\Http\Resources\AppliedEmployerCollection;
use App\Http\Resources\PopularEmployerCollection;
use App\Http\Resources\BookmarkEmployerCollection;
use App\Http\Resources\PopularJobseekerCollection;

class EmployerController extends Controller
{

    ////////////////////////////////////////////////////////  Employer  //////////////////// 

    public $successStatus = 200;

    //  Profile Update Function 

    public function ProfileUpdate(Request $request)
    {
        if (!$request->id) {
            $success['error'] = "Id is Required ";
            $success['success'] = false;
            return response()->json($success, 401);
        }
        $validator = Validator::make($request->all(), [
            'video'  =>  'max:20480',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $id = $request->id;
        $profile = User::where('id', '=', $id)->where('user_type', '=', 'employer')->first();
        if ($profile) {
            $request->name ? $profile->name = $request->name : '';
            $request->address ? $profile->address = $request->address : '';
            $request->profile_status ? $profile->profile_status = $request->profile_status : '';

            $request->facebook_link ? $profile->facebook_link = $request->facebook_link : '';
            $request->instagram_link ? $profile->instagram_link = $request->instagram_link : '';
            $request->twitter_link ? $profile->twitter_link = $request->twitter_link : '';
            $request->linkedin_link ? $profile->linkedin_link = $request->linkedin_link : '';

            $request->phone ? $profile->phone = $request->phone : '';
            $request->description ? $profile->description = $request->description : '';
            $request->company_name ? $profile->company_name = $request->company_name : '';
            $request->language ? $profile->language =  implode(',', $request->language) : '';
            if ($request->hasfile('image')) {
                if (!empty($profile->image) && ($profile->image != "assets/dist/img/userpic.png")) {
                    $image_path = $profile->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = time() . 'profile' . $image->getClientOriginalExtension();
                $destinationPath = 'profile_images/';
                $image->move($destinationPath, $name);
                $profile->image = 'profile_images/' . $name;
            }


            if ($request->hasfile('company_logo')) {
                if (!empty($profile->company_logo)) {
                    $logo_path = $profile->company_logo;
                    unlink($logo_path);
                }
                $company_logo = $request->file('company_logo');
                $name = time() . 'company_logo' . $company_logo->getClientOriginalExtension();
                $destinationPath = 'company_logo/';
                $company_logo->move($destinationPath, $name);
                $profile->company_logo = 'company_logo/' . $name;
            }

            if ($request->hasfile('video')) {
                if (!empty($profile->video)) {
                    $video_path = $profile->video;
                    unlink($video_path);
                }
                $video = $request->file('video');
                $name = time() . 'profile_video' . $video->getClientOriginalExtension();
                $destinationPath = 'profile_videos/';
                $video->move($destinationPath, $name);
                $profile->video = 'profile_videos/' . $name;
            }
            $profile->update();
            $success['message'] = 'Profile Updated Successfully!';
            $success['success'] = true;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'User Not Found', 'success' => false], 401);
        }
    }


    // JobPost Function

    public function JobPost(Request $request)
    {
        if (Auth::guard('api')->check()) {
            $user_type = Auth::guard('api')->user()->user_type;
            $user_id = Auth::guard('api')->user()->id;
            $purchased_subscription = PruchasedSubscription::where('employer_id', '=', $user_id)->first();
            if ($user_type == 'employer') {
                if (empty($purchased_subscription)) {

                    return response()->json(['error' => 'You Are Not Able To Post Job, Please Pruchased Subscription', 'success' => false], 200);
                } else {
                    if ($purchased_subscription->valid_job == '0') {
                        return response()->json(['error' => 'You Are Not Able To Post More Job, Please Upgrate Subscription', 'success' => false], 401);
                    } else {
                        $job = new Job();
                        $job->role = 'employer';
                        $job->job_title = $request->job_title;
                        $job->employer_id = $user_id;
                        $job->status = 'open';
                        $job->description = $request->description;
                        $job->salary_type = $request->salary_type;
                        $job->min_salary = $request->min_salary;
                        $job->max_salary = $request->max_salary;
                        $job->occupation = $request->occupation;
                        $job->education = $request->education;
                        $job->category_id = $request->category_id;
                        $job->min_experience = $request->min_experience;
                        $job->max_experience = $request->max_experience;
                        // new feild
                        $job->subcategory_id = $request->subcategory_id;
                        $job->requirements = $request->requirements;
                        $job->link = $request->link;
                        $job->vacancies = $request->vacancies;
                        $job->job_type = $request->job_type;
                        $job->skills = implode(',', $request->skills);

                        if ($job->save()) {
                            $job->users()->attach($user_id);
                            $purchased_subscription->valid_job -= 1;
                            $purchased_subscription->update();
                            $success['message'] = 'Job Add Successfully!';
                            $success['success'] = true;
                            return response()->json($success, $this->successStatus);
                        } else {
                            return response()->json(['error' => 'Something Wrong, Try Again', 'success' => false], 401);
                        }
                    }
                }
            } else {

                return response()->json(['error' => 'You Are Not Able To Post Job', 'success' => false], 200);
            }
        } else {
            return response()->json(['error' => 'User not authorized', 'success' => false], 401);
        }
    }

    // Get All Job Function\

    public function AllJobs()
    {

        $id = Auth::guard('api')->user()->id;
        $role = Auth::guard('api')->user()->user_type;
        $jobs = Job::where('employer_id', '=', $id)->where('role', '=', $role)->where('status', '=', 'open')->get();
        if ($jobs->isEmpty()) {
            return response()->json(['error' => 'Jobs not Found', 'success' => false], 404);
        } else {
            $data = AllJobCollection::collection($jobs);
            return response()->json(AllJobCollection::collection($data));
        }
    }

    // Get Single Job

    public function SingleJob($id)
    {


        $job = Job::find($id);
        if ($job) {
            $data = new JobResource($job);
            return $data->toJson();
        } else {
            return response()->json(['error' => 'Job Not Found', 'success' => false], 401);
        }
    }

    public function SingleEmployer($id)
    {


        $employer = User::find($id);
        if ($employer) {
            $data = new EmployerResource($employer);
            return $data->toJson();
        } else {
            return response()->json(['error' => 'Employer Not Found', 'success' => false], 401);
        }
    }




    public function SingleJobseeker($id)
    {
        $jobseeker = User::find($id);
        if ($jobseeker) {
            $data = new JobseekerResource($jobseeker);
            return $data->toJson();
        } else {
            return response()->json(['error' => 'Jobseeker Not Found', 'success' => false], 401);
        }
    }

    // Edit Job Function

    public function UpdateJob(Request $request)
    {
        if (Auth::guard('api')->check()) {
            if (Job::where('id', $request->id)->exists()) {
                $job = Job::find($request->id);
                $job->job_title = $request->job_title;
                $job->description = $request->description;
                $job->salary_type = $request->salary_type;
                $job->min_salary = $request->min_salary;
                $job->max_salary = $request->max_salary;
                $job->occupation = $request->occupation;
                $job->education =  $request->education;
                $job->min_experience = $request->min_experience;
                $job->max_experience = $request->max_experience;
                // $job->subcategory_id = $request->subcategory_id;
                $job->requirements = $request->requirements;
                $job->link = $request->link;
                $job->vacancies = $request->vacancies;
                $job->job_type = $request->job_type;
                $job->skills = implode(',', $request->skills);
                $job->update();

                $success['message'] = 'Job Update Successfully!';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            } else {
                return response()->json(['error' => 'Job Not Found', 'success' => false], 401);
            }
        } else {
            return response()->json(['error' => 'User not authorized', 'success' => false], 401);
        }
    }

    // Delete Job Function 

    public function DeleteJob($id)
    {
        $job = Job::find($id);
        if ($job) {
            $job->delete();
            $success['message'] = 'Job Delete Successfully!';
            $success['success'] = true;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'Job Not Found', 'success' => false], 401);
        }
    }


    // Change Job Status

    public function ChangeJobStatus($id)
    {
        $job = Job::find($id);
        if ($job) {
            if ($job->status == 'open') {
                $job->status = 'close';
                $job->update();
                $success['message'] = 'Job Status Change Successfully, and Now Current Status is Close';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            } else {
                $job->status = 'open';
                $job->update();
                $success['message'] = 'Job Status Change Successfully, and Now Current Status is Open';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            }
        } else {
            return response()->json(['error' => 'Job Not Found', 'success' => false], 401);
        }
    }

    // Change Profile Status

    public function ChangeProfileStatus($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->profile_status == 'visible') {
                $user->profile_status = 'Not Visible';
                $user->update();
                $success['message'] = 'Profile Status Change Successfully and Now Current Status is Not Visible';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            } else {
                $user->profile_status = 'visible';
                $user->update();
                $success['message'] = 'Profile Status Change Successfully and Now Current Status is Visible';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            }
        } else {
            return response()->json(['error' => 'User Not Found', 'success' => false], 401);
        }
    }

    // Change Password Function 

    public function PasswordChange(Request $request)
    {
        if (User::where('id', $request->id)->exists()) {
            $user = User::find($request->id);
            $user->password = Hash::make($request->password);
            $user->update();
            $success['message'] = 'Password Update Successfully!';
            $success['success'] = true;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'User Not Found', 'success' => false], 401);
        }
    }


    // Get All Jobseeker Function 

    public function AllEmployer()
    {
        $jobseekers = User::where('user_type', '=', 'jobseeker')->where('profile_status', '=', 'visible')->get();
        if ($jobseekers->isEmpty()) {
            return response()->json(['error' => 'Jobseeker not Found', 'success' => false], 404);
        } else {
            $data = JobseekerCollection::collection($jobseekers);
            return response()->json(JobseekerCollection::collection($data));
        }
    }


    // Applied Jobseeker Function 

    public function AppliedEmployer()
    {

        $employer_id = Auth::guard('api')->user()->id;
        $jobsid = Job::where('employer_id', '=', $employer_id)->pluck('id');
        $appliedjobs = Applied::whereIn('job_id', $jobsid)->get();

        if ($appliedjobs->isEmpty()) {
            return response()->json(['error' => 'Applied Jobseeker not Found', 'success' => false], 401);
        } else {
            $data = AppliedEmployerCollection::collection($appliedjobs);
            return response()->json(AppliedEmployerCollection::collection($data));
        }
    }

    // Jobseeker Bookmark Function 
    public  function EmployerBookmark(Request $request)
    {

        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'employer') {
            $employer_id = Auth::guard('api')->user()->id;
            $employer = User::find($request->jobseeker_id);
            if ($employer->profile_status == 'visible') {
                $bookmarkjobseeker = Employerbookmark::where('jobseeker_id', '=', $request->jobseeker_id)->first();
                if ($bookmarkjobseeker == null) {
                    $bookmark  = new Employerbookmark();
                    $bookmark->jobseeker_id = $request->jobseeker_id;
                    $bookmark->employer_id = $employer_id;
                    $bookmark->save();
                    $success['message'] = 'Jobseeker Bookmark Successfully!';
                    $success['success'] = true;
                    return response()->json($success, $this->successStatus);
                } else {
                    $unbookmark = Employerbookmark::where('jobseeker_id', '=', $request->jobseeker_id)->first();
                    $unbookmark->delete();
                    $success['message'] = 'Jobseeker UnBookmark Successfully!';
                    $success['success'] = true;
                    return response()->json($success, $this->successStatus);
                }
            } else {
                return response()->json(['message' => 'Profile Not Visible', 'success' => false], 200);
            }
        } else {
            return response()->json(['error' => 'You Are Not Able To Bookmark Employer', 'success' => false], 401);
        }
    }


    // AllBookmarkJobseeker Function 

    public function AllBookmarkEmployer()
    {

        $employer_id = Auth::guard('api')->user()->id;
        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'employer') {
            $jobseeker_id = Employerbookmark::where('employer_id', '=', $employer_id)->pluck('jobseeker_id');
            $jobseekers = User::whereIn('id', $jobseeker_id)->get();
            if ($jobseekers->isEmpty()) {
                return response()->json(['error' => 'Jobseeker not Found', 'success' => false], 404);
            } else {
                $data = BookmarkEmployerCollection::collection($jobseekers);
                return response()->json(BookmarkEmployerCollection::collection($data));
            }
        } else {
            return response()->json(['error' => 'You Are Not Able To Get Bookmark Jobseeker', 'success' => false], 401);
        }
    }


    // SingleBookmarkJobseeker

    public function SingleBookmarkEmployer($id)
    {
        $jobseeker_id = Employerbookmark::where('jobseeker_id', '=', $id)->pluck('jobseeker_id');
        $bookmarked_jobseekers = User::whereIn('id', $jobseeker_id)->first();
        if ($bookmarked_jobseekers) {
            $data = new JobseekerResource($bookmarked_jobseekers);
            return $data->toJson();
        } else {
            return response()->json(['error' => 'Bookmarked Jobseeker Not Found', 'success' => false], 401);
        }
    }


    // Interview Function 

    public function Interview(Request $request)
    {

        $jobseeker = User::find($request->jobseeker_id);
        $token = $jobseeker->deviceToken;
        $employer_id = Auth::guard('api')->user()->id;
        $employerName = Auth::guard('api')->user()->name;
        $user_type = Auth::guard('api')->user()->user_type;
        $alreadyrequested = Interview::where('employer_id', '=', $employer_id)->where('jobseeker_id', '=', $request->jobseeker_id)->first();

        if ($alreadyrequested) {
            return response()->json(['error' => 'Interview Schedule Already', 'success' => false], 401);
        } else {
            if ($user_type == 'employer') {
                $interview = new Interview();
                $interview->employer_id = $employer_id;
                $interview->jobseeker_id = $request->jobseeker_id;
                $interview->date = $request->date;
                $interview->time = $request->time;
                $interview->save();
                $jobseeker = User::find($request->jobseeker_id);
                $message = "Your Date" . ' ' . $request->date . ' ' . " and Time" . ' ' . $request->time . ' ' . "for interview. Good Luck!";
                $jobseeker->notify(new InterviewNotfication($message));
                $success['message'] = 'Interview Schedule Successfully and check your Email';
                $success['success'] = true;
                // fcm notification
                // $token = "fgxOcp0BSfeLAYiaipFF7F:APA91bEMXM_zhttv9s0r9qO0z3KB8zbKTmNu4cuWHN7JkGkHYFh0DZQxmZ1LwhITB0d8hHoyNaBQ4-kkc0bP4o9jkqKynREDQXvsfgiEj-cCrNXj_jZDqP6WNTYhQ4RmgF7dG4RB6onT";
                $key = "AAAADlLsBN0:APA91bGeeIWLQN0TBh2EhUh1_nKc3csfNRUohq2xwHSYhqk1GM4lJm36yJQsjkPhmBbZWQ03sIUe25PrnEMwmsctqHzAuGl5SdLv8ESMWPl8GvR88y88frLlB9_GJIYtj5-OTzaje8Ay";
                $msg = array(
                    'title' => "Interview Schedule",
                    'body'  => "Hi From, " . $employerName . "Interview Schedule Successfully and check your Email",

                );

                $fields = array(
                    'to'        => $token,
                    'notification'  => $msg
                );

                $headers = array(
                    'Authorization: key=' . $key,
                    'Content-Type: application/json'
                );
                //#Send Reponse To FireBase Server 
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
                curl_close($ch);
                $notification = new Notification();
                $notification->sender_id = $employer_id;
                $notification->reciever_id = $request->jobseeker_id;
                $notification->title = $msg['title'];
                $notification->message = $msg['body'];
                $notification->status = 1;
                $notification->save();
                // end fcm notification
                return response()->json($success, $this->successStatus);
            } else {
                return response()->json(['error' => 'You Are Not Able To Schedule', 'success' => false], 401);
            }
        }
    }

    // ne api function 

    // Get  All Papular Employer

    public function AllPapularEmployer()
    {
        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'jobseeker') {
            $popularemployers = User::where('is_popular', '=', '1')->where('user_type', '=', 'employer')->get();
            if ($popularemployers->isEmpty()) {
                return response()->json(['error' => 'Popular Employers not Found', 'success' => false], 404);
            } else {
                $data = PopularEmployerCollection::collection($popularemployers);
                return response()->json(PopularEmployerCollection::collection($data));
            }
        }
        return response()->json(['error' => 'You Are Not Able To Get Popular Employers', 'success' => false], 404);
    }

    // Get  All Papular Jobseeker

    public function AllPapularJobseeker()
    {
        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'employer') {
            $popularjobseeker = User::where(
                'is_popular',
                '=',
                '1'
            )->where('user_type', '=', 'jobseeker')->get();
            if ($popularjobseeker->isEmpty()) {
                return response()->json(
                    ['error' => 'Popular Jobseekers not Found', 'success' => false],
                    404
                );
            } else {
                $data = PopularJobseekerCollection::collection($popularjobseeker);
                return response()->json(PopularJobseekerCollection::collection($data));
            }
        }
        return response()->json(['error' => 'You Are Not Able To Get Popular Jobseeker', 'success' => false], 404);
    }


    /// single popular jobseeker

    public function SinglePapularJobseeker($id)
    {
        $popularjobseeker = User::find($id);
        if ($popularjobseeker) {
            $data = new PopularJobseekerResource($popularjobseeker);
            return $data->toJson();
        } else {
            return response()->json(['error' => 'Popular Jobseeker  Not Found', 'success' => false], 404);
        }
    }

    public function EmployerAddReview(Request $request)
    {
        $user_type = Auth::guard('api')->user()->user_type;
        $employer_id = Auth::guard('api')->user()->id;
        $isAddReview = HireForJob::where('employer_id', '=', $employer_id)->where('jobseeker_id', '=', $request->jobseeker_id)->first();
        $isAlreadyAddReview = Review::where('user_id', '=', $employer_id)->where('receiver', '=', $request->jobseeker_id)->first();
        // sender
        $reviewSender = User::find($request->jobseeker_id);
        if ($reviewSender != null) {
            $reviewsenderImage = $reviewSender->image;
            $reviewsenderName = $reviewSender->name;
        } else {
            $reviewsenderImage = '';
            $reviewsenderName = '';
        }
        if ($isAddReview != null) {
            if ($user_type == 'employer') {
                if ($isAlreadyAddReview == null) {
                    $review = new Review();
                    $review->user_id = $employer_id;
                    $review->reviewsenderImage = $reviewsenderImage;
                    $review->reviewsenderName = $reviewsenderName;
                    $review->receiver = $request->jobseeker_id;
                    $review->star = $request->star;
                    $review->description = $request->description;
                    $review->save();
                    $success['message'] = 'Review Add Successfully';
                    $success['success'] = true;
                    return response()->json($success, $this->successStatus);
                } else {
                    return response()->json(['message' => 'You Can Add Only One Review', 'success' => false], 200);
                }
            }
            return response()->json(['error' => 'You Are Not Able To Add Review', 'success' => false], 404);
        }
        return response()->json(['message' => 'You Are Not Able To Add Review,First Hire This Person For Add Review', 'success' => false], 200);
    }


    public function EmployerReview()
    {
        $employer_id = Auth::guard('api')->user()->id;
        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'employer') {
            $reviews = Review::where('receiver', '=', $employer_id)->get();
            if ($reviews->isEmpty()) {
                return response()->json(['error' => 'Reviews not Found', 'success' => false], 404);
            } else {
                $data = ReviewCollection::collection($reviews);
                return response()->json(ReviewCollection::collection($data));
            }
        } else {
            return response()->json(['error' => 'You Are Not Able To Get Reviews', 'success' => false], 404);
        }
    }



    // common function UserProfile

    public function UserProfile()
    {
        $user_id = Auth::guard('api')->user()->id;
        $user = User::find($user_id);
        if ($user) {
            $data = new UserProfileResource($user);
            return $data->toJson();
        } else {
            return response()->json(['error' => 'user not Found', 'success' => false], 404);
        }
    }


    // ????????????????????????????? InterviewRequestedJobseeker ????????????????????

    public function InterviewRequestedJobseeker()
    {
        $employer_id = Auth::guard('api')->user()->id;
        $jobseekers_ids = Interview::where('employer_id', '=', $employer_id)->pluck('jobseeker_id');
        $jobseekers = User::whereIn('id', $jobseekers_ids)->get();
        if ($jobseekers->isEmpty()) {
            return response()->json(['error' => 'Jobseekers not Found', 'success' => false], 404);
        } else {
            $data = JobseekerCollection::collection($jobseekers);
            return response()->json(JobseekerCollection::collection($data));
        }
    }

    // ????????????????????????????????  RescheduleInterview  ?????????????????


    public function RescheduleInterview(Request $request)
    {
        $jobseeker = User::find($request->jobseeker_id);
        $token = $jobseeker->deviceToken;
        $employer_id = Auth::guard('api')->user()->id;
        $employerName = Auth::guard('api')->user()->name;
        $user_type = Auth::guard('api')->user()->user_type;
        $id = $request->id;
        if ($user_type == 'employer') {
            $interview =  Interview::find($id);
            $interview->employer_id = $employer_id;
            $interview->jobseeker_id = $request->jobseeker_id;
            $interview->date = $request->date;
            $interview->time = $request->time;
            $interview->update();
            $jobseeker = User::find($request->jobseeker_id);
            $message = "Your Date" . ' ' . $request->date . ' ' . " and Time" . ' ' . $request->time . ' ' . "for interview. Good Luck!";
            $jobseeker->notify(new InterviewNotfication($message));
            $success['message'] = 'Interview Reschedule Successfully and check your Email';
            $success['success'] = true;
            // fcm notification
            // $token = "fgxOcp0BSfeLAYiaipFF7F:APA91bEMXM_zhttv9s0r9qO0z3KB8zbKTmNu4cuWHN7JkGkHYFh0DZQxmZ1LwhITB0d8hHoyNaBQ4-kkc0bP4o9jkqKynREDQXvsfgiEj-cCrNXj_jZDqP6WNTYhQ4RmgF7dG4RB6onT";
            $key = "AAAADlLsBN0:APA91bGeeIWLQN0TBh2EhUh1_nKc3csfNRUohq2xwHSYhqk1GM4lJm36yJQsjkPhmBbZWQ03sIUe25PrnEMwmsctqHzAuGl5SdLv8ESMWPl8GvR88y88frLlB9_GJIYtj5-OTzaje8Ay";
            $msg = array(
                'title' => "Interview Reschedule",
                'body'  => "Hi From, " . $employerName . "Interview Reschedule Successfully and check your Email",

            );

            $fields = array(
                'to'        => $token,
                'notification'  => $msg
            );

            $headers = array(
                'Authorization: key=' . $key,
                'Content-Type: application/json'
            );
            //#Send Reponse To FireBase Server 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            curl_close($ch);
            $notification = new Notification();
            $notification->sender_id = $employer_id;
            $notification->reciever_id = $request->jobseeker_id;
            $notification->title = $msg['title'];
            $notification->message = $msg['body'];
            $notification->status = 1;
            $notification->save();
            // end fcm notification
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'You Are Not Able To Schedule', 'success' => false], 401);
        }
    }

    // common function 

    function getLanguageCode()
    {
        $json = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . request()->ip());
        $details = json_decode($json);
        $country_code = $details->geoplugin_countryCode;
        $currencySymbol = $details->geoplugin_currencySymbol;

        switch ($country_code) {
            case "DJ":
            case "ER":
            case "ET":

                $lang = "aa";
                break;

            case "AE":
            case "BH":
            case "DZ":
            case "EG":
            case "IQ":
            case "JO":
            case "KW":
            case "LB":
            case "LY":
            case "MA":
            case "OM":
            case "QA":
            case "SA":
            case "SD":
            case "SY":
            case "TN":
            case "YE":

                $lang = "ar";
                break;

            case "AZ":

                $lang = "az";
                break;

            case "BY":

                $lang = "be";
                break;

            case "BG":

                $lang = "bg";
                break;

            case "BD":

                $lang = "bn";
                break;

            case "BA":

                $lang = "bs";
                break;

            case "CZ":

                $lang = "cs";
                break;

            case "DK":

                $lang = "da";
                break;

            case "AT":
            case "CH":
            case "DE":
            case "LU":

                $lang = "de";
                break;

            case "MV":

                $lang = "dv";
                break;

            case "BT":

                $lang = "dz";
                break;

            case "GR":

                $lang = "el";
                break;

            case "AG":
            case "AI":
            case "AQ":
            case "AS":
            case "AU":
            case "BB":
            case "BW":
            case "CA":
            case "GB":
            case "IE":
            case "KE":
            case "NG":
            case "NZ":
            case "PH":
            case "SG":
            case "US":
            case "ZA":
            case "ZM":
            case "ZW":

                $lang = "en";
                break;

            case "AD":
            case "AR":
            case "BO":
            case "CL":
            case "CO":
            case "CR":
            case "CU":
            case "DO":
            case "EC":
            case "ES":
            case "GT":
            case "HN":
            case "MX":
            case "NI":
            case "PA":
            case "PE":
            case "PR":
            case "PY":
            case "SV":
            case "UY":
            case "VE":

                $lang = "es";
                break;

            case "EE":

                $lang = "et";
                break;

            case "IR":

                $lang = "fa";
                break;

            case "FI":

                $lang = "fi";
                break;

            case "FO":

                $lang = "fo";
                break;

            case "BE":
            case "FR":
            case "SN":

                $lang = "fr";
                break;

            case "IL":

                $lang = "he";
                break;

            case "IN":

                $lang = "hi";
                break;

            case "HR":

                $lang = "hr";
                break;

            case "HT":

                $lang = "ht";
                break;

            case "HU":

                $lang = "hu";
                break;

            case "AM":

                $lang = "hy";
                break;

            case "ID":

                $lang = "id";
                break;

            case "IS":

                $lang = "is";
                break;

            case "IT":

                $lang = "it";
                break;

            case "JP":

                $lang = "ja";
                break;

            case "GE":

                $lang = "ka";
                break;

            case "KZ":

                $lang = "kk";
                break;

            case "GL":

                $lang = "kl";
                break;

            case "KH":

                $lang = "km";
                break;

            case "KR":

                $lang = "ko";
                break;

            case "KG":

                $lang = "ky";
                break;

            case "UG":

                $lang = "lg";
                break;

            case "LA":

                $lang = "lo";
                break;

            case "LT":

                $lang = "lt";
                break;

            case "LV":

                $lang = "lv";
                break;

            case "MG":

                $lang = "mg";
                break;

            case "MK":

                $lang = "mk";
                break;

            case "MN":

                $lang = "mn";
                break;

            case "MY":

                $lang = "ms";
                break;

            case "MT":

                $lang = "mt";
                break;

            case "MM":

                $lang = "my";
                break;

            case "NP":

                $lang = "ne";
                break;

            case "AW":
            case "NL":

                $lang = "nl";
                break;

            case "NO":

                $lang = "no";
                break;

            case "PL":

                $lang = "pl";
                break;

            case "AF":

                $lang = "ps";
                break;

            case "AO":
            case "BR":
            case "PT":

                $lang = "pt";
                break;

            case "RO":

                $lang = "ro";
                break;

            case "RU":
            case "UA":

                $lang = "ru";
                break;

            case "RW":

                $lang = "rw";
                break;

            case "AX":

                $lang = "se";
                break;

            case "SK":

                $lang = "sk";
                break;

            case "SI":

                $lang = "sl";
                break;

            case "SO":

                $lang = "so";
                break;

            case "AL":

                $lang = "sq";
                break;

            case "ME":
            case "RS":

                $lang = "sr";
                break;

            case "SE":

                $lang = "sv";
                break;

            case "TZ":

                $lang = "sw";
                break;

            case "LK":

                $lang = "ta";
                break;

            case "TJ":

                $lang = "tg";
                break;

            case "TH":

                $lang = "th";
                break;

            case "TM":

                $lang = "tk";
                break;

            case "CY":
            case "TR":

                $lang = "tr";
                break;

            case "PK":

                $lang = "ur";
                break;

            case "UZ":

                $lang = "uz";
                break;

            case "VN":

                $lang = "vi";
                break;

            case "CN":
            case "HK":
            case "TW":

                $lang = "zh";
                break;

            default:
                break;
        }
        $success['language'] = $lang;
        $success['currencySymbol'] = $currencySymbol;
        return response()->json($success);
    }

    // getCoordinate

    public function getCoordinate()
    {
        $response = Http::get('http://ipinfo.io/119.155.58.47/json');
        $data = $response->object();
        $loc = explode(',', $data->loc);
        $latitude = $loc[0];
        $longitude = $loc[1];
        $lat = floatval($latitude);
        $lng = floatval($longitude);
        $success['latitude'] =  $lat;
        $success['longitude'] =  $lng;
        return response()->json($success);
    }

    // new   

    public function ProfileValidation()
    {
        $employer_id = Auth::guard('api')->user()->id;
        $employer = User::find($employer_id);
        $one = $employer->image == 'assets/dist/img/userpic.png' ? 0 : 1;
        $two = $employer->company_name == '0' ? 0 : 1;
        $three = ($employer->language == null) ? 0 : 1;
        $four = $employer->address == '0' ? 0 : 1;
        $five = ($employer->facebook_link == null) ? 0 : 1;
        $six = ($employer->instagram_link == null) ? 0 : 1;
        $seven = ($employer->twitter_link == null) ? 0 : 1;
        $eight = ($employer->linkedin_link == null) ? 0 : 1;
        $nin = $employer->phone == '0' ? 0 : 1;
        $ten = $employer->description == null ? 0 : 1;
        $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nin + $ten + 2;
        $percentage = (int)round(($sum / 12) * 100);

        $active = PruchasedSubscription::where('employer_id', '=', $employer_id)->exists();

        $activeSubscription = PruchasedSubscription::where('employer_id', '=', $employer_id)->first();
        if ($activeSubscription != null) {

            $valid_job = (int)$activeSubscription->valid_job;
        } else {
            $valid_job = 0;
        }


        return response()->json(['percentage' => $percentage, 'active' => $active, 'valid_job' => $valid_job]);
    }

    /// HireJobseeker 

    public function HireJobseeker(Request $request)
    {
        $alreadyHire = HireForJob::where('employer_id', '=', Auth::guard('api')->user()->id)->where('jobseeker_id', '=', $request->jobseeker_id)->first();
        if ($alreadyHire == null) {
            $hireJobseeker = new HireForJob();
            $hireJobseeker->employer_id = Auth::guard('api')->user()->id;
            $hireJobseeker->jobseeker_id = $request->jobseeker_id;
            $hireJobseeker->save();
            $success['message'] = 'You Hire This Person Successfully';
            $success['success'] = true;
            return response()->json($success, 200);
        }
        return response()->json(['message' => 'You Already Hire This Person', 'success' => false], 200);
    }

    // public function getSenderImage($id)
    // {
    //     $sender = User::find($id);
    //     if ($sender != null) {
    //         $senderImage = $sender->image;
    //         $success['senderImage'] = $senderImage;
    //         $success['success'] = true;
    //         return response()->json($success, 200);
    //     } else {
    //         return response()->json(['message' => 'No Image', 'success' => false], 200);
    //     }
    // }
}
