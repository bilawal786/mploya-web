<?php

namespace App\Http\Controllers\Users\Admin;

use App\Job;
use App\User;
use App\Applied;
use App\Category;
use App\Subcategory;
use App\Subscription;
use Illuminate\Http\Request;
use App\PruchasedSubscription;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use App\Notifications\ContactNotification;
use App\Http\Resources\PurchasedSubscriptionCollection;

class AdminController extends Controller
{
    public function __construct()
    {


        $this->middleware('auth:admin');
    }

    public function index()
    {
        $totalemployers = count(User::where('user_type', '=', 'employer')->get());
        $totaljobseeker = count(User::where('user_type', '=', 'jobseeker')->get());
        $totalcat = count(Category::all());
        $totalsub = count(Subscription::where('status', '=', 1)->get());
        $totalactivesub = count(PruchasedSubscription::all());
        $totaljobs = count(Job::where('status', '=', 'open')->get());
        return view('admin.index', compact('totalemployers', 'totaljobseeker', 'totalcat', 'totalsub', 'totalactivesub', 'totaljobs'));
    }

    public function AllEmployer()
    {
        $employers = User::where('user_type', '=', 'employer')->get();
        return view('admin.employer.all', compact('employers'));
    }

    public function EmployerView($id)
    {
        $employer = User::find($id);
        $one = $employer->image == '0' ? 0 : 1;
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
        $purchasedsub = PruchasedSubscription::where('employer_id', '=', $id)->get();
        $jobs = Job::where('employer_id', '=', $id)->get();
        $totaljobs = count($jobs);
        return view('admin.employer.view', compact('employer', 'jobs', 'totaljobs', 'percentage', 'purchasedsub'));
    }

    public function JobSeekers()
    {
        $jobseekers = User::where('user_type', '=', 'jobseeker')->get();
        return view('admin.jobseeker.all', compact('jobseekers'));
    }

    public function JobSeekerView($id)
    {
        $jobseeker = User::find($id);


        // if($jobseeker->)

        $one = $jobseeker->address == '0' ? 0 : 1;
        $two = $jobseeker->CNIC == '0' ? 0 : 1;
        $three = $jobseeker->phone == '0' ? 0 : 1;
        $four = $jobseeker->image == '0' ? 0 : 1;

        $five = $jobseeker->city == '0' ? 0 : 1;
        $six = $jobseeker->country == '0' ? 0 : 1;
        $seven = $jobseeker->father_name == '0' ? 0 : 1;
        $eight = $jobseeker->description == null ? 0 : 1;


        $nine = ($jobseeker->education_name == null) ? 0 : 1;
        $ten = ($jobseeker->education_description == null) ? 0 : 1;
        $eleven = ($jobseeker->education_complete_date == null) ? 0 : 1;
        $twelve = ($jobseeker->education_is_continue == null) ? 0 : 1;

        $thirteen = ($jobseeker->project_title == null) ? 0 : 1;
        $fourteen = ($jobseeker->project_occupation == null) ? 0 : 1;
        $fifteen = ($jobseeker->project_year == null) ? 0 : 1;
        $sixteen = ($jobseeker->project_links == null) ? 0 : 1;

        $seventeen = ($jobseeker->project_description == null) ? 0 : 1;
        $eighteen = ($jobseeker->skill_name == null) ? 0 : 1;
        $nineteen = ($jobseeker->certification_name == null) ? 0 : 1;
        $twenty = ($jobseeker->certification_year == null) ? 0 : 1;
        $twentyone = ($jobseeker->certification_description == null) ? 0 : 1;

        $twentytwo = ($jobseeker->language == null) ? 0 : 1;


        $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nine + $ten + $eleven + $twelve + $thirteen
            + $fourteen + $fifteen + $sixteen + $seventeen + $eighteen + $nineteen + $twenty + $twentyone + $twentytwo + 2;
        $percentage = (int)round(($sum / 24) * 100);



        $jobsid = Applied::where('user_id', '=', $id)->pluck('job_id');
        $appliedjobs = Job::whereIn('id', $jobsid)->get();
        $totalappliedjobs = count($appliedjobs);
        return view('admin.jobseeker.view', compact('jobseeker', 'appliedjobs', 'totalappliedjobs', 'percentage'));
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
        $subscriptions = Subscription::where('status', '=', 1)->get();
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


    //  make empoyer popular  or Unpopular

    public function EmployerMakePopular($id)
    {

        $popularemployer =  User::find($id);
        if ($popularemployer->is_popular == 0) {
            $popularemployer->is_popular = 1;
            $popularemployer->update();
            return response()->json([
                'success' => 'Employer Populared Successfully!',
            ]);
        } else {
            $popularemployer->is_popular = 0;
            $popularemployer->update();
            return response()->json([
                'error' => 'Employer UnPopulared Successfully!',
            ]);
        }
    }



    // block employer or unblock

    public function EmployerBlock($id)
    {

        $employerblock =  User::find($id);
        if ($employerblock->is_block == 1) {
            $employerblock->is_block = 0;
            $employerblock->update();

            return response()->json([
                'error' => 'Employer Blocked Successfully!',
            ]);
        } else {
            $employerblock->is_block = 1;
            $employerblock->update();

            return response()->json([
                'success' => 'Employer UnBlocked Successfully!',
            ]);
        }
    }




    //  make jobseeker popular or unpopular

    public function JobseekerMakePopular($id)
    {

        $popularjobseeker =  User::find($id);
        if ($popularjobseeker->is_popular == 0) {
            $popularjobseeker->is_popular = 1;
            $popularjobseeker->update();
            return response()->json([
                'success' => 'Jobseeker Populared Successfully!',
            ]);
        } else {
            $popularjobseeker->is_popular = 0;
            $popularjobseeker->update();
            return response()->json([
                'error' => 'Jobseeker UnPopulared Successfully!',
            ]);
        }
    }



    // block jobseeker or unblock

    public function JobseekerBlock($id)
    {

        $jobseekerblock =  User::find($id);
        if ($jobseekerblock->is_block == 1) {
            $jobseekerblock->is_block = 0;
            $jobseekerblock->update();

            return response()->json([
                'error' => 'Jobseeker Blocked Successfully!',
            ]);
        } else {
            $jobseekerblock->is_block = 1;
            $jobseekerblock->update();

            return response()->json([
                'success' => 'Jobseeker UnBlocked Successfully!',
            ]);
        }
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

    public function PurchasedSubscription()
    {
        $purchasedsubscriptions = PruchasedSubscription::all();

        return view('admin.subscription.purchased', compact('purchasedsubscriptions'));
    }
}
