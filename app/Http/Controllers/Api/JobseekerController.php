<?php

namespace App\Http\Controllers\Api;

use App\Job;
use App\User;
use App\Review;
use App\Applied;
use App\Bookmark;
use Illuminate\Http\Request;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AllJobCollection;
use App\Http\Resources\ReviewCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BookmarkCollection;
use App\Http\Resources\EmployerCollection;
use App\Http\Resources\JobseekerCollection;
use App\Notifications\JobApplyNotification;
use App\Http\Resources\PopularEmployerResource;



class JobseekerController extends Controller
{
    ////////////////////////////////////////////////////////  jobseeker ////////////////////////
    public $successStatus = 200;

    //  Profile Update Function 

    public function ProfileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'name' => ['string', 'max:255'],
            'address' => ['string'],
            'CNIC' => ['bail', 'regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/'],
            'image' => ['mimes:jpeg,jpg,png,gif|max:10000'],
            'video' => ['mimes:mp4,ogx,oga,ogv,ogg,webm'],
            'city' => ['string'],
            'country' => ['string'],
            'father_name' => ['string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'success' => false], 401);
        }
        $id = $request->id;
        $user = User::where('id', '=', $id)->where('user_type', '=', 'jobseeker')->first();
        if ($user) {
            $request->name ? $user->name = $request->name : '';
            $request->address ? $user->address = $request->address : '';
            $request->CNIC ? $user->CNIC = $request->CNIC : '';
            $request->phone ? $user->phone = $request->phone : '';
            $request->city ? $user->city = $request->city : '';
            $request->country ? $user->country = $request->country : '';
            $request->father_name ? $user->father_name = $request->father_name : '';
            $request->description ? $user->description = $request->description : '';
            $request->language ? $user->language = implode(',', $request->language) : '';
            $request->education_name ? $user->education_name = implode(',', $request->education_name) : '';
            $request->education_description ? $user->education_description = implode(',', $request->education_description) : '';
            $request->education_complete_date ? $user->education_complete_date = implode(',', $request->education_complete_date) : '';
            $request->education_is_continue ? $user->education_is_continue = implode(',', $request->education_is_continue) : '';
            $request->project_title ? $user->project_title = implode(',', $request->project_title) : '';
            $request->project_occupation ? $user->project_occupation = implode(',', $request->project_occupation) : '';
            $request->project_year ? $user->project_year = implode(',', $request->project_year) : '';
            $request->project_links ? $user->project_links = implode(',', $request->project_links) : '';
            $request->project_description ? $user->project_description = implode(',', $request->project_description) : '';
            $request->skill_name ? $user->skill_name = implode(',', $request->skill_name) : '';
            $request->certification_name ? $user->certification_name = implode(',', $request->certification_name) : '';
            $request->certification_year ? $user->certification_year = implode(',', $request->certification_year) : '';
            $request->certification_description ? $user->certification_description = implode(',', $request->certification_description) : '';
            if ($request->hasfile('image')) {
                if (!empty($user->image)) {
                    $image_path = $user->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = time() . 'profile' . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'profile_images/';
                $image->move($destinationPath, $name);
                $user->image = 'profile_images/' . $name;
            }

            if ($request->hasfile('video')) {
                if (!empty($user->video)) {
                    $video_path = $user->video;
                    unlink($video_path);
                }
                $video = $request->file('video');
                $name = time() . 'profile_video' . '.' . $video->getClientOriginalExtension();
                $destinationPath = 'profile_videos/';
                $video->move($destinationPath, $name);
                $user->video = 'profile_videos/' . $name;
            }
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

            $alreadyapply = Applied::where('user_id', '=', $request->jobseeker_id)->where('job_id', '=', $request->job_id)->get();
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
                return response()->json(['error' => 'Bookmarked Jobs not Found', 'success' => false], 404);
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
            return response()->json(['message' => 'Bookmarked Job Not Found', 'success' => false], 404);
        }
    }

    // new 

    public function JobseekerAddReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employer_id' => ['required'],
            'star' => 'required|integer|between:0,5',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'success' => false], 401);
        }
        $user_type = Auth::guard('api')->user()->user_type;
        $jobseeker_id = Auth::guard('api')->user()->id;
        if ($user_type == 'jobseeker') {
            $review = new Review();
            $review->user_id = $jobseeker_id;
            $review->receiver = $request->employer_id;
            $review->star = $request->star;
            $review->save();
            $success['message'] = 'Review Add Successfully';
            $success['success'] = true;
            return response()->json($success, $this->successStatus);
        }
        return response()->json(['error' => 'You Are Not Able To Add Review', 'success' => false], 404);
    }


    // get review 

    public function JobseekerReview()
    {
        $jobseeker_id = Auth::guard('api')->user()->id;
        $user_type = Auth::guard('api')->user()->user_type;
        if ($user_type == 'jobseeker') {
            $reviews = Review::where('receiver', '=', $jobseeker_id)->get();
            if ($reviews->isEmpty()) {
                return response()->json(['error' => 'Reviews not Found', 'success' => false], 404);
            } else {
                $data = ReviewCollection::collection($reviews);
                return response()->json(ReviewCollection::collection($data));
            }
        } else {
            return response()->json(['message' => 'You Are Not Able To Get Reviews', 'success' => false], 401);
        }
    }

    /// single popular employer

    public function SinglePapularEmployer($id)
    {
        $popularemployer = User::find($id);
        if ($popularemployer) {
            $data = new PopularEmployerResource($popularemployer);
            return $data->toJson();
        } else {
            return response()->json(['message' => 'Popular Employer  Not Found', 'success' => false], 404);
        }
    }
}
