<?php

namespace App\Http\Controllers\Api;

use App\Job;
use App\User;
use App\Applied;
use App\Interview;
use App\Employerbookmark;
use Illuminate\Http\Request;
use App\PruchasedSubscription;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AllJobCollection;
use App\Http\Resources\EmployerResource;
use App\Http\Resources\JobseekerResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JobseekerCollection;
use App\Notifications\InterviewNotfication;
use App\Http\Resources\AppliedEmployerCollection;
use App\Http\Resources\BookmarkEmployerCollection;


class EmployerController extends Controller
{
    ////////////////////////////////////////////////////////  Employer  //////////////////// 

    public $successStatus = 200;

    //  Profile Update Function 

    public function ProfileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'company_name' => ['required', 'string', 'max:255'],
            'image' => ['mimes:jpeg,jpg,png,gif|max:10000'],
            'video' => ['mimes:mp4,ogx,oga,ogv,ogg,webm'],
            'social_links' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'success' => false], 401);
        }
        $id = $request->id;
        $profile = User::where('id', '=', $id)->where('user_type', '=', 'employer')->first();
        if ($profile) {
            $profile->name = $request->name;
            $profile->address = $request->address;
            $profile->company_name = $request->company_name;
            $profile->social_links = implode(',', $request->social_links);
            if ($request->hasfile('image')) {
                if (!empty($profile->image)) {
                    $image_path = $profile->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = time() . 'profile' . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'profile_images/';
                $image->move($destinationPath, $name);
                $profile->image = 'profile_images/' . $name;
            }

            if ($request->hasfile('video')) {
                if (!empty($profile->video)) {
                    $video_path = $profile->video;
                    unlink($video_path);
                }
                $video = $request->file('video');
                $name = time() . 'profile_video' . '.' . $video->getClientOriginalExtension();
                $destinationPath = 'profile_videos/';
                $video->move($destinationPath, $name);
                $profile->video = 'profile_videos/' . $name;
            }
            $profile->update();
            $success['message'] = 'Profile Updated Successfully!';
            $success['success'] = true;
            return response()->json(['response' => $success], $this->successStatus);
        } else {
            return response()->json(['message' => 'User Not Found', 'success' => false], 401);
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
                $validator = Validator::make($request->all(), [
                    'job_title' => ['required'],
                    'employer_id' => ['required'],
                    'description' => ['required'],
                    'category_id' => ['required'],
                    'salary' => ['required'],
                    'salary_type' => ['required'],
                    'education' => ['required'],
                    'occupation' => ['required'],
                    'experience' => ['required'],
                ]);
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors(), 'success' => false], 401);
                }
                if (empty($purchased_subscription)) {

                    return response()->json(['error' => 'You Are Not Able To Post Job, Please Pruchased Subscription', 'success' => false], 401);
                } else {
                    if ($purchased_subscription->valid_job == '0') {
                        return response()->json(['error' => 'You Are Not Able To Post More Job, Please Upgrate Subscription', 'success' => false], 401);
                    } else {
                        $job = new Job();
                        $job->job_title = $request->job_title;
                        $job->employer_id = $request->employer_id;
                        $job->description = $request->description;
                        $job->salary_type = $request->salary_type;
                        $job->salary = $request->salary;
                        $job->occupation = $request->occupation;
                        $job->education = $request->education;
                        $job->category_id = $request->category_id;
                        $job->experience = $request->experience;
                        if ($job->save()) {
                            $job->users()->attach($user_id);
                            $purchased_subscription->valid_job -= 1;
                            $purchased_subscription->update();
                            $success['message'] = 'Job Add Successfully!';
                            return response()->json(['response' => $success, 'success' => true], $this->successStatus);
                        } else {
                            return response()->json(['error' => 'Something Wrong, Try Again', 'success' => false], 401);
                        }
                    }
                }
            } else {

                return response()->json(['error' => 'You Are Not Able To Post Job', 'success' => false], 401);
            }
        } else {
            return response()->json(['error' => 'User not authorized', 'success' => false], 401);
        }
    }

    // Get All Job Function\

    public function AllJobs()
    {

        $id = Auth::guard('api')->user()->id;
        $jobs = Job::where('employer_id', '=', $id)->get();
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
            return response()->json(['message' => 'Job Not Found', 'success' => false], 404);
        }
    }

    public function SingleEmployer($id)
    {


        $employer = User::find($id);
        if ($employer) {
            $data = new EmployerResource($employer);
            return $data->toJson();
        } else {
            return response()->json(['message' => 'Employer Not Found', 'success' => false], 404);
        }
    }




    public function SingleJobseeker($id)
    {


        $jobseeker = User::find($id);
        if ($jobseeker) {
            $data = new JobseekerResource($jobseeker);
            return $data->toJson();
        } else {
            return response()->json(['message' => 'Jobseeker Not Found', 'success' => false], 404);
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
                $job->salary = $request->salary;
                $job->occupation = $request->occupation;
                $job->education =  $request->education;
                $job->experience =  $request->experience;
                $job->update();

                $success['message'] = 'Job Update Successfully!';
                $success['success'] = true;
                return response()->json(['response' => $success], $this->successStatus);
            } else {
                return response()->json(['message' => 'Job Not Found', 'success' => false], 404);
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
            return response()->json(['response' => $success], $this->successStatus);
        } else {
            return response()->json(['message' => 'Job Not Found', 'success' => false], 404);
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
                return response()->json(['response' => $success], $this->successStatus);
            } else {
                $job->status = 'open';
                $job->update();
                $success['message'] = 'Job Status Change Successfully, and Now Current Status is Open';
                $success['success'] = true;
                return response()->json(['response' => $success], $this->successStatus);
            }
        } else {
            return response()->json(['message' => 'Job Not Found', 'success' => false], 404);
        }
    }

    // Change Profile Status

    public function ChangeProfileStatus($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->profile_status == 'visible') {
                $user->profile_status = 'Not visible';
                $user->update();
                $success['message'] = 'Profile Status Change Successfully and Now Current Status is Not Visible';
                $success['success'] = true;
                return response()->json(['response' => $success], $this->successStatus);
            } else {
                $user->profile_status = 'visible';
                $user->update();
                $success['message'] = 'Profile Status Change Successfully and Now Current Status is Visible';
                $success['success'] = true;
                return response()->json(['response' => $success], $this->successStatus);
            }
        } else {
            return response()->json(['message' => 'User Not Found', 'success' => false], 404);
        }
    }

    // Change Password Function 

    public function PasswordChange(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'success' => false], 401);
        }
        if (User::where('id', $request->id)->exists()) {
            $user = User::find($request->id);
            $user->password = Hash::make($request->password);
            $user->update();
            $success['message'] = 'Password Update Successfully!';
            $success['success'] = true;
            return response()->json(['response' => $success], $this->successStatus);
        } else {
            return response()->json(['message' => 'User Not Found', 'success' => false], 404);
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
            return response()->json(['error' => 'Applied Jobseeker not Found', 'success' => false], 404);
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
                $bookmark  = new Employerbookmark();
                $bookmark->jobseeker_id = $request->jobseeker_id;
                $bookmark->employer_id = $employer_id;
                $bookmark->save();
                $success['message'] = 'Jobseeker Bookmark Successfully!';
                $success['success'] = true;
                return response()->json(['response' => $success], $this->successStatus);
            } else {
                return response()->json(['message' => 'Profile Not Visible', 'success' => false], 401);
            }
        } else {
            return response()->json(['message' => 'You Are Not Able To Bookmark Employer', 'success' => false], 401);
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
            return response()->json(['message' => 'You Are Not Able To Get Bookmark Jobseeker', 'success' => false], 401);
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
            return response()->json(['message' => 'Bookmarked Jobseeker Not Found', 'success' => false], 404);
        }
    }


    // Interview Function 

    public function Interview(Request $request)
    {
        $employer_id = Auth::guard('api')->user()->id;
        $user_type = Auth::guard('api')->user()->user_type;
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
            return response()->json(['response' => $success], $this->successStatus);
        } else {
            return response()->json(['message' => 'You Are Not Able To Schedule', 'success' => false], 401);
        }
    }
}
