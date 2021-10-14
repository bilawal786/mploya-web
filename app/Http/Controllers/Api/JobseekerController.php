<?php

namespace App\Http\Controllers\Api;

use App\Job;
use App\User;
use App\Review;
use App\Applied;
use App\Bookmark;
use App\Interview;
use Illuminate\Http\Request;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AllJobCollection;
use App\Http\Resources\ReviewCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\EmployerCollection;
use App\Notifications\JobApplyNotification;
use App\Http\Resources\PopularEmployerResource;
use App\Http\Resources\AllJobFrontendCollection;



class JobseekerController extends Controller
{
    ////////////////////////////////////////////////////////  jobseeker ////////////////////////
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
        $user = User::where('id', '=', $id)->where('user_type', '=', 'jobseeker')->first();

        if ($user) {
            $request->name ? $user->name = $request->name : '';
            $request->address ? $user->address = $request->address : '';
            $request->occupation ? $user->occupation = $request->occupation : '';
            $request->CNIC ? $user->CNIC = $request->CNIC : '';
            $request->phone ? $user->phone = $request->phone : '';
            $request->city ? $user->city = $request->city : '';
            $request->facebook_link ? $user->facebook_link = $request->facebook_link : '';
            $request->instagram_link ? $user->instagram_link = $request->instagram_link : '';
            $request->twitter_link ? $user->twitter_link = $request->twitter_link : '';
            $request->linkedin_link ? $user->linkedin_link = $request->linkedin_link : '';
            $request->country ? $user->country = $request->country : '';
            $request->father_name ? $user->father_name = $request->father_name : '';
            $request->description ? $user->description = $request->description : '';
            $request->skill_name ? $user->skill_name = $request->skill_name : '';
            $request->language ? $user->language = $request->language : '';
            $user->educations = $request->educations;
            $user->experiences = $request->experiences;
            $user->works = $request->works;
            $request->certification_name ? $user->certification_name = $request->certification_name : '';
            $request->certification_year ? $user->certification_year = $request->certification_year : '';
            $request->certification_description ? $user->certification_description = $request->certification_description : '';
            if ($request->hasfile('image')) {
                if (!empty($user->image) && ($user->image != "assets/dist/img/userpic.png")) {
                    $image_path = $user->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = $id . 'profile' . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'profile_images/';
                $image->move($destinationPath, $name);
                $user->image = 'profile_images/' . $name;
            }

            if ($request->hasfile('video')) {
                if (!empty($user->video) && ($user->video != "profile_videos/1630307178profile_video.mp4")) {
                    $video_path = $user->video;
                    unlink($video_path);
                }
                $video = $request->file('video');
                $name = $id . 'profile_video' . '.' . $video->getClientOriginalExtension();
                $destinationPath = 'profile_videos/';
                $video->move($destinationPath, $name);
                $user->video = 'profile_videos/' . $name;
            }
            $user->update();
            $success['message'] = 'Profile Updated Successfully!';
            $success['success'] = true;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'User Not Found', 'success' => false], 401);
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

        $jobs = Job::where('status', '=', 'open')->get();
        if ($jobs->isEmpty()) {
            return response()->json(['error' => 'Jobs not Found', 'success' => false], 404);
        } else {
            $data = AllJobCollection::collection($jobs);
            return response()->json(AllJobCollection::collection($data));
        }
    }

    public function AllJobsFrontend()
    {
        $jobs = Job::where('status', '=', 'open')->get();
        if ($jobs->isEmpty()) {
            return response()->json(['error' => 'Jobs not Found', 'success' => false], 404);
        } else {
            $data = AllJobFrontendCollection::collection($jobs);
            return response()->json(AllJobFrontendCollection::collection($data));
        }
    }

    // ApplyJob Function 

    public function ApplyJob(Request $request)
    {
        $jobseeker_id = Auth::guard('api')->user()->id;
        $job = Job::where('id', '=', $request->job_id)->first();
        $jobseeker = User::where('id', '=', $jobseeker_id)->where('user_type', '=', 'jobseeker')->first();

        $alreadyapply = Applied::where('user_id', '=', $jobseeker_id)->where('job_id', '=', $request->job_id)->get();
        if ($alreadyapply->isEmpty()) {
            $appliedjob = new Applied();
            $appliedjob->user_id = $jobseeker_id;
            $appliedjob->status = $job->status;
            $appliedjob->job_id = $request->job_id;
            $appliedjob->save();
            $appliedjob->users()->attach($jobseeker_id);
            $jobseeker->notify(new JobApplyNotification($jobseeker));
            $success['message'] = 'Applied Successfully!';
            $success['success'] = true;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['message' => 'You already  Applied On This Job', 'success' => false], 200);
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
            return response()->json(['error' => 'You Are Not Able To Get Applied Jobs', 'success' => false], 404);
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
                $bookmarkjob = Bookmark::where('job_id', '=', $request->job_id)->where('jobseeker_id', '=', $jobseeker_id)->first();
                if ($bookmarkjob == null) {
                    $bookmark  = new Bookmark();
                    $bookmark->job_id = $request->job_id;
                    $bookmark->jobseeker_id = $jobseeker_id;
                    $bookmark->save();
                    $success['message'] = 'Job Bookmark Successfully!';
                    $success['success'] = true;
                    return response()->json($success, $this->successStatus);
                } else {
                    $unbookmark = Bookmark::where('job_id', '=', $request->job_id)->where('jobseeker_id', '=', $jobseeker_id)->first();
                    $unbookmark->delete();
                    $success['message'] = 'Job UnBookmark Successfully!';
                    $success['success'] = true;
                    return response()->json($success, $this->successStatus);
                }
            } else {
                return response()->json(['message' => 'Job Are Closed', 'success' => false], 200);
            }
        } else {
            return response()->json(['error' => 'You Are Not Able To Bookmark Jobs', 'success' => false], 404);
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
                $data = AllJobCollection::collection($jobs);
                return response()->json(AllJobCollection::collection($data));
            }
        } else {
            return response()->json(['error' => 'You Are Not Able To Get Bookmark Jobs', 'success' => false], 404);
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
            return response()->json(['error' => 'Bookmarked Job Not Found', 'success' => false], 404);
        }
    }

    // new 

    public function JobseekerAddReview(Request $request)
    {
        $user_type = Auth::guard('api')->user()->user_type;
        $jobseeker_id = Auth::guard('api')->user()->id;
        if ($user_type == 'jobseeker') {
            $review = new Review();
            $review->user_id = $jobseeker_id;
            $review->receiver = $request->employer_id;
            $review->star = $request->star;
            $review->description = $request->description;
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
            return response()->json(['error' => 'You Are Not Able To Get Reviews', 'success' => false], 404);
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
            return response()->json(['error' => 'Popular Employer  Not Found', 'success' => false], 404);
        }
    }

    // ??????????????????????????????????  InterviewRequeste ???????????????????? 

    public function InterviewRequeste()
    {
        $jobseeker_id = Auth::guard('api')->user()->id;
        $employer_ids = Interview::where('jobseeker_id', '=', $jobseeker_id)->pluck('employer_id');
        $employers = User::whereIn('id', $employer_ids)->get();
        if ($employers->isEmpty()) {
            return response()->json(['error' => 'Employers not Found', 'success' => false], 404);
        } else {
            $data = EmployerCollection::collection($employers);
            return response()->json(EmployerCollection::collection($data));
        }
    }


    public function searchJob(Request $request)
    {

        $jobs = Job::Where('job_title', 'LIKE', '%' . $request->job_title . '%')
            ->Where('min_salary', '>=', $request->min_salary)
            ->Where('max_salary', '<=', $request->max_salary)
            ->Where('min_experience', '>=', $request->min_experience)
            ->Where('max_experience', '<=', $request->max_experience)
            ->Where('salary_type', 'LIKE', '%' . $request->salary_type . '%')
            ->Where('job_type', 'LIKE', '%' . $request->job_type . '%')
            ->get();

        if ($jobs->isEmpty()) {
            return response()->json(['error' => 'Jobs not Found', 'success' => false], 404);
        } else {
            $data = AllJobCollection::collection($jobs);
            return response()->json(AllJobCollection::collection($data));
        }
    }
}
