<?php

namespace App\Http\Controllers\Users\Admin;

use App\Job;
use App\User;
use App\Applied;
use App\Category;
use App\Subcategory;
use App\Subscription;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use App\Notifications\ContactNotification;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function AllEmployer()
    {
        $employers = User::where('user_type', '=', 'employer')->get();
        return view('admin.employer.all', compact('employers'));
    }

    public function EmployerView($id)
    {
        $employer = User::find($id);
        $jobs = Job::where('employer_id', '=', $id)->get();
        $totaljobs = count($jobs);
        return view('admin.employer.view', compact('employer', 'jobs', 'totaljobs'));
    }

    public function JobSeekers()
    {
        $jobseekers = User::where('user_type', '=', 'jobseeker')->get();
        return view('admin.jobseeker.all', compact('jobseekers'));
    }

    public function JobSeekerView($id)
    {
        $jobseeker = User::find($id);
        $jobsid = Applied::where('user_id', '=', $id)->pluck('job_id');
        $appliedjobs = Job::whereIn('id', $jobsid)->get();
        $totalappliedjobs = count($appliedjobs);
        return view('admin.jobseeker.view', compact('jobseeker', 'appliedjobs', 'totalappliedjobs'));
    }

    public function CreateCategory()
    {
        return view('admin.category.create');
    }

    public function CategoryStore(Request $request)
    {

        if ($request->ajax()) {
            $category = new Category();
            $category->title = $request->title;
            if ($request->hasfile('image')) {
                if (!empty($category->image)) {
                    $image_path = $category->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = time() . 'category' . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'category_images/';
                $image->move($destinationPath, $name);
                $category->image = 'category_images/' . $name;
            }

            $category->save();
            return response()->json([
                'success' => 'Category Add Successfully!',
            ]);
        }
    }

    public function AllCategory()
    {
        $categories = Category::all();
        return view('admin.category.all', compact('categories'));
    }

    public function DeleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        $notification = array(
            'messege' => 'Category Delete Successfully!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function UpdateCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        if ($request->ajax()) {
            $category = Category::find($request->category_id);
            $category->title = $request->title;
            if ($request->hasfile('image')) {
                if (!empty($category->image)) {
                    $image_path = $category->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = time() . 'category' . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'category_images/';
                $image->move($destinationPath, $name);
                $category->image = 'category_images/' . $name;
            }
            $category->update();
            return response()->json([
                'success' => 'Category Update Successfully!',
            ]);
        }
    }

    public function CreateSubscription()
    {
        return view('admin.subscription.create');
    }

    public function SubscriptionStore(Request $request)
    {
        if ($request->ajax()) {
            $subscription = new Subscription();
            $subscription->title = $request->title;
            $subscription->price = $request->price;
            $subscription->valid_job = $request->valid_job;
            $subscription->color = $request->color;
            $subscription->status = $request->status;
            $subscription->description = $request->description;
            $subscription->save();
            return response()->json([
                'success' => 'Subscription Add Successfully!',
            ]);
        }
    }

    public function AllSubscription()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscription.all', compact('subscriptions'));
    }

    public function DeleteSubscription($id)
    {
        $subscription = Subscription::find($id);
        $subscription->delete();
        $notification = array(
            'messege' => 'Subscription Delete Successfully!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditSubscription($id)
    {
        $subscription = Subscription::find($id);
        return view('admin.subscription.edit', compact('subscription'));
    }

    public function SubscriptionUpdate(Request $request)
    {
        if ($request->ajax()) {
            $subscription = Subscription::find($request->subscription_id);
            $subscription->title = $request->title;
            $subscription->price = $request->price;
            $subscription->valid_job = $request->valid_job;
            $subscription->color = $request->color;
            $subscription->status = $request->status;
            $subscription->description = $request->description;
            $subscription->update();
            return response()->json([
                'success' => 'Subscription Update Successfully!',
            ]);
        }
    }

    public function CreateSubCategory()
    {
        return view('admin.subcategory.create');
    }

    public function SubCategoryStore(Request $request)
    {

        if ($request->ajax()) {
            $subcategory = new Subcategory();
            $subcategory->title = $request->title;
            $subcategory->category_id = $request->category_id;
            if ($request->hasfile('image')) {
                if (!empty($subcategory->image)) {
                    $image_path = $subcategory->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = time() . 'subcategory' . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'subcategory_images/';
                $image->move($destinationPath, $name);
                $subcategory->image = 'subcategory_images/' . $name;
            }

            $subcategory->save();
            return response()->json([
                'success' => 'Sub Category Add Successfully!',
            ]);
        }
    }

    public function AllSubCategory()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.all', compact('subcategories'));
    }

    public function UpdateSubCategory($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    public function DeleteSubCategory($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        $notification = array(
            'messege' => 'Sub Category Delete Successfully!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }


    public function SubCategoryUpdate(Request $request)
    {
        if ($request->ajax()) {
            $subcategory = Subcategory::find($request->subcategory_id);
            $subcategory->title = $request->title;
            $subcategory->category_id = $request->category_id;
            if ($request->hasfile('image')) {
                if (!empty($subcategory->image)) {
                    $image_path = $subcategory->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = time() . 'category' . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'category_images/';
                $image->move($destinationPath, $name);
                $subcategory->image = 'category_images/' . $name;
            }
            $subcategory->update();
            return response()->json([
                'success' => 'Sub Category Update Successfully!',
            ]);
        }
    }


    //  make empoyer popular 

    public function EmployerMakePopular($id)
    {

        $popularemployer =  User::find($id);
        $popularemployer->is_popular = 1;
        $popularemployer->update();
        return response()->json([
            'success' => 'Employer Populared Successfully!',
        ]);
    }

    // un popular 

    public function EmployerMakeUnPopular($id)
    {
        $unpopularemployer =  User::find($id);
        $unpopularemployer->is_popular = 0;
        $unpopularemployer->update();
        return response()->json([
            'success' => 'Employer UnPopulared Successfully!',
        ]);
    }

    // block employer

    public function EmployerBlock($id)
    {

        $employerblock =  User::find($id);
        $employerblock->is_block = 0;
        $employerblock->update();

        return response()->json([
            'error' => 'Employer Blocked Successfully!',
        ]);
    }

    public function EmployerUnBlock($id)
    {
        $unemployerblock =  User::find($id);
        $unemployerblock->is_block = 1;
        $unemployerblock->update();

        return response()->json([
            'success' => 'Employer UnBlocked Successfully!',
        ]);
    }



    //  make jobseeker popular 

    public function JobseekerMakePopular($id)
    {

        $popularjobseeker =  User::find($id);
        $popularjobseeker->is_popular = 1;
        $popularjobseeker->update();
        return response()->json([
            'success' => 'Jobseeker Populared Successfully!',
        ]);
    }

    // un popular 

    public function JobseekerMakeUnPopular($id)
    {
        $unpopularjobseeker =  User::find($id);
        $unpopularjobseeker->is_popular = 0;
        $unpopularjobseeker->update();
        return response()->json([
            'success' => 'Jobseeker UnPopulared Successfully!',
        ]);
    }

    // block jobseeker

    public function JobseekerBlock($id)
    {

        $jobseekerblock =  User::find($id);
        $jobseekerblock->is_block = 0;
        $jobseekerblock->update();

        return response()->json([
            'error' => 'Jobseeker Blocked Successfully!',
        ]);
    }

    public function JobseekerUnBlock($id)
    {
        $unjobseekerblock =  User::find($id);
        $unjobseekerblock->is_block = 1;
        $unjobseekerblock->update();

        return response()->json([
            'success' => 'Jobseeker UnBlocked Successfully!',
        ]);
    }


    public function Contact(Request $request)
    {
        if ($request->ajax()) {
            dd($request->user_id);
            $user = User::find($request->user_id);
            $user->notify(new ContactNotification($request->message));

            return response()->json([
                'success' => 'Message Send Successfully!',
            ]);
        }
    }
}
