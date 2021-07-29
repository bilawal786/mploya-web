<?php

namespace App\Http\Controllers\Api;

use App\Job;
use App\User;
use App\Applied;
use App\Bookmark;
use Illuminate\Http\Request;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AllJobCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BookmarkCollection;
use App\Http\Resources\EmployerCollection;
use App\Http\Resources\JobseekerCollection;
use App\Notifications\JobApplyNotification;


class JobseekerController extends Controller
{

    ////////////////////////////////////////////////////////  jobseeker ////////////////////////
    public $successStatus = 200;

    //  Profile Update Function 

    public function ProfileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'CNIC' => ['bail', 'required', 'regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/'],
            'phone' => ['required'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'father_name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'education_name' => ['required'],
            'education_description' => ['required'],
            'education_complete_date' => ['required'],
            'education_is_continue' => ['required'],
            'project_title' => ['required'],
            'project_occupation' => ['required'],
            'project_year' => ['required'],
            'project_links' => ['required'],
            'project_description' => ['required'],
            'skill_name' => ['required'],
            'certification_name' => ['required'],
            'certification_year' => ['required'],
            'certification_description' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'success' => false], 401);
        }
        $id = $request->id;
        $user = User::where('id', '=', $id)->where('user_type', '=', 'jobseeker')->first();
        if ($user) {
            $user->name = $request->name;
            $user->address = $request->address;
            $user->CNIC = $request->CNIC;
            $user->phone = $request->phone;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->father_name = $request->father_name;
            $user->description = $request->description;
            $user->education_name = implode(',', $request->education_name);
            $user->education_description = implode(',', $request->education_description);
            $user->education_complete_date = implode(',', $request->education_complete_date);
            $user->education_is_continue = implode(',', $request->education_is_continue);

            $user->project_title = implode(',', $request->project_title);
            $user->project_occupation = implode(',', $request->project_occupation);
            $user->project_year = implode(',', $request->project_year);
            $user->project_links = implode(',', $request->project_links);
            $user->project_description = implode(',', $request->project_description);


            $user->skill_name = implode(',', $request->skill_name);


            $user->certification_name = implode(',', $request->certification_name);
            $user->certification_year = implode(',', $request->certification_year);
            $user->certification_description = implode(',', $request->certification_description);

            $user->update();
            $success['message'] = 'Profile Updated Successfully!';
            $success['success'] = true;
            return response()->json($success, $this->successStatus);
        }
    }

    // All Employer Function

    public function AllJobseeker()
    {

        $employers = User::where('user_type', '=', 'employer')->where('profile_status', '=', 'visible')->get();
        if ($employers->isEmpty()) {
            return response()->json(['error' => 'Employers not Found', 'success' => false], 404);
        } else {
            $data = EmployerCollection::collection($employers);
            return response()->json(EmployerCollection::collection($data));
        }
    }

    // Get All Jobs Function 

    public function AllJobs()
    {

        $jobs = Job::all();
        if ($jobs->isEmpty()) {
            return response()->json(['error' => 'Jobs not Found', 'success' => false], 404);
        } else {
            $data = AllJobCollection::collection($jobs);
            return response()->json(AllJobCollection::collection($data));
        }
    }

    // ApplyJob Function 

    public function ApplyJob(Request $request)
    {

        if ($request->user_type == 'jobseeker') {
            $validator = Validator::make($request->all(), [
                'job_id' => ['required'],
                'jobseeker_id' => ['required'],
                'user_type' => ['required', 'string', 'max:255'],
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'success' => false], 401);
            }
            $job = Job::where('id', '=', $request->job_id)->first();
            $jobseeker = User::where('id', '=', $request->jobseeker_id)->where('user_type', '=', 'jobseeker')->first();
            // $jobseeker = User::find($job->jobseeker_id);

            $alreadyapply = Applied::where('user_id', '=', $request->jobseeker_id)->get();
            if ($alreadyapply->isEmpty()) {
                $appliedjob = new Applied();
                $appliedjob->user_id = $request->jobseeker_id;
                $appliedjob->status = $job->status;
                $appliedjob->job_id = $request->job_id;
                $appliedjob->save();
                $appliedjob->users()->attach($request->jobseeker_id);
                $message = $jobseeker->name . ' ' . 'Applied For' . ' ' . $job->job_title;
                $jobseeker->notify(new JobApplyNotification($message));
                $success['message'] = 'Applied Successfully!';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            } else {
                return response()->json(['message' => 'You already  Apply On This Job', 'success' => false], 401);
            }
        } else {
            return response()->json(['error' => 'You Are not Able To Apply', 'success' => false], 401);
        }
    }

    //  JobseekerAppliedJob Function

    public function EmployerAppliedJob()
    {

        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'jobseeker') {
            $jobseeker_id = Auth::guard('api')->user()->id;
            $jobsid = Applied::where('user_id', '=', $jobseeker_id)->pluck('job_id');
            $appliedjobs = Job::whereIn('id', $jobsid)->get();

            if ($appliedjobs->isEmpty()) {
                return response()->json(['error' => 'Applied Jobs not Found', 'success' => false], 404);
            } else {
                $data = AllJobCollection::collection($appliedjobs);
                return response()->json(AllJobCollection::collection($data));
            }
        } else {
            return response()->json(['message' => 'You Are Not Able To Get Applied Jobs', 'success' => false], 401);
        }
    }

    // JobBookmark Function 
    public  function JobBookmark(Request $request)
    {

        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'jobseeker') {
            $jobseeker_id = Auth::guard('api')->user()->id;
            $job = Job::find($request->job_id);
            if ($job->status == 'open') {
                $bookmark  = new Bookmark();
                $bookmark->job_id = $request->job_id;
                $bookmark->jobseeker_id = $jobseeker_id;
                $bookmark->save();
                $success['message'] = 'Job Bookmark Successfully!';
                $success['success'] = true;
                return response()->json($success, $this->successStatus);
            } else {
                return response()->json(['message' => 'Job Are Closed', 'success' => false], 401);
            }
        } else {
            return response()->json(['message' => 'You Are Not Able To Bookmark Jobs', 'success' => false], 401);
        }
    }

    // AllBookmarkJobs Function 


    public function AllBookmarkJobs()
    {

        $jobseeker_id = Auth::guard('api')->user()->id;
        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'jobseeker') {
            $jobs_id = Bookmark::where('jobseeker_id', '=', $jobseeker_id)->pluck('job_id');
            $jobs = Job::whereIn('id', $jobs_id)->get();
            if ($jobs->isEmpty()) {
                return response()->json(['error' => 'Jobs not Found', 'success' => false], 404);
            } else {
                $data = BookmarkCollection::collection($jobs);
                return response()->json(BookmarkCollection::collection($data));
            }
        } else {
            return response()->json(['message' => 'You Are Not Able To Get Bookmark Jobs', 'success' => false], 401);
        }
    }

    // SingleBookmarkedJob

    public function SingleBookmarkedJob($id)
    {
        $job_id = Bookmark::where('job_id', '=', $id)->pluck('job_id');
        $bookmarked_job = Job::whereIn('id', $job_id)->first();
        if ($bookmarked_job) {
            $data = new JobResource($bookmarked_job);
            return $data->toJson();
        } else {
            return response()->json(['message' => 'Bookmarked Jobs Not Found', 'success' => false], 404);
        }
    }
}
