<?php

namespace App\Http\Controllers\Users\Admin;

use App\Job;
use App\Language;
use App\User;
use App\Applied;
use App\Category;
use App\Subcategory;
use App\Subscription;
use Illuminate\Http\Request;
use App\PruchasedSubscription;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        $employers = User::where('user_type', '=', 'employer')->where('profile_status', '=', 'visible')->get();
        return view('admin.employer.all', compact('employers'));
    }

    public function EmployerView($id)
    {
        $employer = User::find($id);
        $one = $employer->image == 'assets/dist/img/profilepic.png' ? 0 : 1;
        $two = $employer->company_name == '0' ? 0 : 1;
        $three = ($employer->language == null) ? 0 : 1;
        $four = $employer->address == '0' ? 0 : 1;
        $five = ($employer->facebook_link == null) ? 0 : 1;
        $six = ($employer->instagram_link == null) ? 0 : 1;
        $seven = ($employer->twitter_link == null) ? 0 : 1;
        $eight = ($employer->linkedin_link == null) ? 0 : 1;
        $nin = $employer->phone == '0' ? 0 : 1;
        $ten = $employer->description == null ? 0 : 1;
        $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nin + $ten + 3;
        $percentage = (int)round(($sum / 12) * 100);
        $purchasedsub = PruchasedSubscription::where('employer_id', '=', $id)->get();
        $jobs = Job::where('employer_id', '=', $id)->get();
        $totaljobs = count($jobs);
        return view('admin.employer.view', compact('employer', 'jobs', 'totaljobs', 'percentage', 'purchasedsub'));
    }

    public function JobSeekers()
    {
        $jobseekers = User::where('user_type', '=', 'jobseeker')->where('profile_status', '=', 'visible')->get();
        return view('admin.jobseeker.all', compact('jobseekers'));
    }

    public function JobSeekerView($id)
    {
        $jobseeker = User::find($id);
        $one = $jobseeker->address == '0' ? 0 : 1;
        $two = $jobseeker->CNIC == '0' ? 0 : 1;
        $three = $jobseeker->phone == '0' ? 0 : 1;
        $four = $jobseeker->image == 'assets/dist/img/profilepic.png' ? 0 : 1;

        $five = $jobseeker->city == '0' ? 0 : 1;
        $six = $jobseeker->country == '0' ? 0 : 1;
        $seven = $jobseeker->father_name == '0' ? 0 : 1;
        $eight = $jobseeker->description == null ? 0 : 1;
        // new
        $nine = $jobseeker->video == '0' ? 0 : 1;
        $ten = $jobseeker->educations == null ? 0 : 1;
        $eleven = $jobseeker->experiences == null ? 0 : 1;
        $twelve = $jobseeker->works == null ? 0 : 1;
        $thirteen = ($jobseeker->facebook_link == null) ? 0 : 1;
        $fourteen = ($jobseeker->instagram_link == null) ? 0 : 1;
        $fifteen = ($jobseeker->twitter_link == null) ? 0 : 1;
        $sixteen = ($jobseeker->linkedin_link == null) ? 0 : 1;
        // end new
        $seventeen = ($jobseeker->skill_name == null) ? 0 : 1;
        $eighteen = ($jobseeker->certification_name == null) ? 0 : 1;
        $nineteen = ($jobseeker->certification_year == null) ? 0 : 1;
        $twenty = ($jobseeker->certification_description == null) ? 0 : 1;
        $twentyone = ($jobseeker->language == null) ? 0 : 1;
        $twentytwo = $jobseeker->video == '0' ? 0 : 1;
        $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nine + $ten + $eleven + $twelve + $thirteen
            + $fourteen + $fifteen + $sixteen + $seventeen + $eighteen + $nineteen + $twenty + $twentyone + $twentytwo  + 3;
        $percentage = (int)round(($sum / 25) * 100);
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

    //  Create JOb

    public function CreateJob()
    {
        return view('admin.job.create');
    }

    // store job

    public function JobStore(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'job_title' => ['required'],
                'description' => ['required'],
                'category_id' => ['required'],
                'min_salary' => ['required'],
                'max_salary' => ['required'],
                'salary_type' => ['required'],
                'education' => ['required'],
                'occupation' => ['required'],
                'min_experience' => ['required'],
                'max_experience' => ['required'],
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
            $job = new Job();
            $job->job_title = $request->job_title;
            $job->employer_id = Auth::user()->id;
            $job->role = 'admin';
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
            $job->save();
            return response()->json([
                'success' => 'Job Add Successfully!',
            ]);
        }
    }

    // Get All Jobs

    public function AllJob()
    {
        $jobs = Job::where('status', '=', 'open')->get();
        return view('admin.job.all', compact('jobs'));
    }

    public  function SingleJob($id)
    {
        $job = Job::find($id);
        return view('admin.job.single', compact('job'));
    }

    // edit Job

    public function EditJob($id)
    {
        $job = Job::find($id);
        return view('admin.job.edit', compact('job'));
    }


    public function JobUpdate(Request $request)
    {
        if (Job::where('id', $request->job_id)->exists()) {
            $job = Job::find($request->job_id);
            $job->job_title = $request->job_title;
            $job->description = $request->description;
            $job->salary_type = $request->salary_type;
            $job->min_salary = $request->min_salary;
            $job->max_salary = $request->max_salary;
            $job->occupation = $request->occupation;
            $job->education =  $request->education;
            $job->min_experience = $request->min_experience;
            $job->max_experience = $request->max_experience;
            $job->subcategory_id = $request->subcategory_id;
            $job->requirements = $request->requirements;
            $job->link = $request->link;
            $job->vacancies = $request->vacancies;
            $job->job_type = $request->job_type;
            $job->skills = implode(',', $request->skills);
            $job->update();
            return response()->json([
                'success' => 'Job Update Successfully!',
            ]);
        } else {
            return response()->json([
                'error' => 'Job Not Found Successfully!',
            ]);
        }
    }

    // delete job

    public function DeleteJob($id)
    {

        $job = Job::find($id);
        $job->delete();
        $notification = array(
            'messege' => 'Job Delete Successfully!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }


    public function ChangeJobStatus($id)
    {
        $job = Job::find($id);
        if ($job) {

            if ($job->status == 'open') {
                $job->status = 'close';
                $job->update();
                $notification = array(
                    'messege' => 'Job Status Change Successfully!',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $job->status = 'open';
                $job->update();
                $notification = array(
                    'messege' => 'Job Status Change Successfully!',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Job Not Found!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function AllSubCategoryAjax($id)
    {
        $subcategories = Subcategory::where('category_id', '=', $id)->get();
        return response()->json($subcategories);
    }
    public function languages()
    {
        $langs = Language::all();
        return view('admin.languages.index', compact('langs'));
    }
    public function languageCreate()
    {
        $lan = Language::find(1);
        return view('admin.languages.create', compact('lan'));
    }
    public function languageStore(Request $request)
    {
        $lang = new Language();
        $lang->name = $request->name;
        $lang->code = $request->code;

        $lang->l1 = $request->l1;
        $lang->l2 = $request->l2;
        $lang->l3 = $request->l3;
        $lang->l4 = $request->l4;
        $lang->l5 = $request->l5;
        $lang->l6 = $request->l6;
        $lang->l7 = $request->l7;
        $lang->l8 = $request->l8;
        $lang->l9 = $request->l9;
        $lang->l10 = $request->l10;

        $lang->l11 = $request->l11;
        $lang->l12 = $request->l12;
        $lang->l13 = $request->l13;
        $lang->l14 = $request->l14;
        $lang->l15 = $request->l15;
        $lang->l16 = $request->l16;
        $lang->l17 = $request->l17;
        $lang->l18 = $request->l18;
        $lang->l19 = $request->l19;
        $lang->l20 = $request->l20;


        $lang->l21 = $request->l21;
        $lang->l22 = $request->l22;
        $lang->l23 = $request->l23;
        $lang->l24 = $request->l24;
        $lang->l25 = $request->l25;
        $lang->l26 = $request->l26;
        $lang->l27 = $request->l27;
        $lang->l28 = $request->l28;
        $lang->l29 = $request->l29;
        $lang->l30 = $request->l30;

        $lang->l31 = $request->l31;
        $lang->l32 = $request->l32;
        $lang->l33 = $request->l33;
        $lang->l34 = $request->l34;
        $lang->l35 = $request->l35;
        $lang->l36 = $request->l36;
        $lang->l37 = $request->l37;
        $lang->l38 = $request->l38;
        $lang->l39 = $request->l39;
        $lang->l40 = $request->l40;

        $lang->l41 = $request->l41;
        $lang->l42 = $request->l42;
        $lang->l43 = $request->l43;
        $lang->l44 = $request->l44;
        $lang->l45 = $request->l45;
        $lang->l46 = $request->l46;
        $lang->l47 = $request->l47;
        $lang->l48 = $request->l48;
        $lang->l49 = $request->l49;
        $lang->l50 = $request->l50;

        $lang->l51 = $request->l51;
        $lang->l52 = $request->l52;
        $lang->l53 = $request->l53;
        $lang->l54 = $request->l54;
        $lang->l55 = $request->l55;
        $lang->l56 = $request->l56;
        $lang->l57 = $request->l57;
        $lang->l58 = $request->l58;
        $lang->l59 = $request->l59;
        $lang->l60 = $request->l60;

        $lang->l61 = $request->l61;
        $lang->l62 = $request->l62;
        $lang->l63 = $request->l63;
        $lang->l64 = $request->l64;
        $lang->l65 = $request->l65;
        $lang->l66 = $request->l66;
        $lang->l67 = $request->l67;
        $lang->l68 = $request->l68;
        $lang->l69 = $request->l69;
        $lang->l70 = $request->l70;

        $lang->l71 = $request->l71;
        $lang->l72 = $request->l72;
        $lang->l73 = $request->l73;
        $lang->l74 = $request->l74;
        $lang->l75 = $request->l75;
        $lang->l76 = $request->l76;
        $lang->l77 = $request->l77;
        $lang->l78 = $request->l78;
        $lang->l79 = $request->l79;
        $lang->l80 = $request->l80;

        $lang->l81 = $request->l81;
        $lang->l82 = $request->l82;
        $lang->l83 = $request->l83;
        $lang->l84 = $request->l84;
        $lang->l85 = $request->l85;
        $lang->l86 = $request->l86;
        $lang->l87 = $request->l87;
        $lang->l88 = $request->l88;
        $lang->l89 = $request->l89;
        $lang->l90 = $request->l90;

        $lang->l91 = $request->l91;
        $lang->l92 = $request->l92;
        $lang->l93 = $request->l93;
        $lang->l94 = $request->l94;
        $lang->l95 = $request->l95;
        $lang->l96 = $request->l96;
        $lang->l97 = $request->l97;
        $lang->l98 = $request->l98;
        $lang->l99 = $request->l99;
        $lang->l100 = $request->l100;

        $lang->l101 = $request->l101;
        $lang->l102 = $request->l102;
        $lang->l103 = $request->l103;
        $lang->l104 = $request->l104;
        $lang->l105 = $request->l105;
        $lang->l106 = $request->l106;
        $lang->l107 = $request->l107;
        $lang->l108 = $request->l108;
        $lang->l109 = $request->l109;
        $lang->l110 = $request->l110;

        $lang->l111 = $request->l111;
        $lang->l112 = $request->l112;
        $lang->l113 = $request->l113;
        $lang->l114 = $request->l114;
        $lang->l115 = $request->l115;
        $lang->l116 = $request->l116;
        $lang->l117 = $request->l117;
        $lang->l118 = $request->l118;
        $lang->l119 = $request->l119;
        $lang->l120 = $request->l120;

        $lang->l121 = $request->l121;
        $lang->l122 = $request->l122;
        $lang->l123 = $request->l123;
        $lang->l124 = $request->l124;
        $lang->l125 = $request->l125;
        $lang->l126 = $request->l126;
        $lang->l127 = $request->l127;
        $lang->l128 = $request->l128;
        $lang->l129 = $request->l129;
        $lang->l130 = $request->l130;

        $lang->l131 = $request->l131;
        $lang->l132 = $request->l132;
        $lang->l133 = $request->l133;
        $lang->l134 = $request->l134;
        $lang->l135 = $request->l135;
        $lang->l136 = $request->l136;
        $lang->l137 = $request->l137;
        $lang->l138 = $request->l138;
        $lang->l139 = $request->l139;
        $lang->l140 = $request->l140;

        $lang->l141 = $request->l141;
        $lang->l142 = $request->l142;
        $lang->l143 = $request->l143;
        $lang->l144 = $request->l144;
        $lang->l145 = $request->l145;
        $lang->l146 = $request->l146;
        $lang->l147 = $request->l147;
        $lang->l148 = $request->l148;
        $lang->l149 = $request->l149;
        $lang->l150 = $request->l150;

        $lang->l151 = $request->l151;
        $lang->l152 = $request->l152;
        $lang->l153 = $request->l153;
        $lang->l154 = $request->l154;
        $lang->l155 = $request->l155;
        $lang->l156 = $request->l156;
        $lang->l157 = $request->l157;
        $lang->l158 = $request->l158;
        $lang->l159 = $request->l159;
        $lang->l160 = $request->l160;

        $lang->l161 = $request->l161;
        $lang->l162 = $request->l162;
        $lang->l163 = $request->l163;
        $lang->l164 = $request->l164;
        $lang->l165 = $request->l165;
        $lang->l166 = $request->l166;
        $lang->l167 = $request->l167;
        $lang->l168 = $request->l168;
        $lang->l169 = $request->l169;
        $lang->l170 = $request->l170;

        $lang->l171 = $request->l171;
        $lang->l172 = $request->l172;
        $lang->l173 = $request->l173;
        $lang->l174 = $request->l174;
        $lang->l175 = $request->l175;
        $lang->l176 = $request->l176;
        $lang->l177 = $request->l177;
        $lang->l178 = $request->l178;
        $lang->l179 = $request->l179;
        $lang->l180 = $request->l180;

        $lang->l181 = $request->l181;
        $lang->l182 = $request->l182;
        $lang->l183 = $request->l183;
        $lang->l184 = $request->l184;
        $lang->l185 = $request->l185;
        $lang->l186 = $request->l186;
        $lang->l187 = $request->l187;
        $lang->l188 = $request->l188;
        $lang->l189 = $request->l189;

        $lang->l190 = $request->l190;
        $lang->l191 = $request->l191;
        $lang->l192 = $request->l192;
        $lang->l193 = $request->l193;
        $lang->l194 = $request->l194;
        $lang->l195 = $request->l195;
        $lang->l196 = $request->l196;
        $lang->l197 = $request->l197;
        $lang->l198 = $request->l198;
        $lang->l199 = $request->l199;
        $lang->l200 = $request->l200;

        $lang->l201 = $request->l201;
        $lang->l202 = $request->l202;
        $lang->l203 = $request->l203;
        $lang->l204 = $request->l204;
        $lang->l205 = $request->l205;
        $lang->l206 = $request->l206;
        $lang->l207 = $request->l207;
        $lang->l208 = $request->l208;
        $lang->l209 = $request->l209;
        $lang->l210 = $request->l210;

        $lang->l211 = $request->l211;
        $lang->l212 = $request->l212;
        $lang->l213 = $request->l213;
        $lang->l214 = $request->l214;
        $lang->l215 = $request->l215;
        $lang->l216 = $request->l216;

        // new
        $lang->l217 = $request->l217;
        $lang->l218 = $request->l218;
        $lang->l219 = $request->l219;
        $lang->l220 = $request->l220;
        $lang->l221 = $request->l221;
        $lang->l222 = $request->l222;
        $lang->l223 = $request->l223;
        $lang->l224 = $request->l224;
        $lang->l225 = $request->l225;
        $lang->l226 = $request->l226;
        $lang->l227 = $request->l227;
        $lang->l228 = $request->l228;
        $lang->l229 = $request->l229;

        $lang->save();
        $notification = array(
            'messege' => 'Successfully Added New Language!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function languageUpdate(Request $request, $id)
    {
        $lang = Language::find($id);
        $lang->name = $request->name;
        $lang->code = $request->code;

        $lang->l1 = $request->l1;
        $lang->l2 = $request->l2;
        $lang->l3 = $request->l3;
        $lang->l4 = $request->l4;
        $lang->l5 = $request->l5;
        $lang->l6 = $request->l6;
        $lang->l7 = $request->l7;
        $lang->l8 = $request->l8;
        $lang->l9 = $request->l9;
        $lang->l10 = $request->l10;

        $lang->l11 = $request->l11;
        $lang->l12 = $request->l12;
        $lang->l13 = $request->l13;
        $lang->l14 = $request->l14;
        $lang->l15 = $request->l15;
        $lang->l16 = $request->l16;
        $lang->l17 = $request->l17;
        $lang->l18 = $request->l18;
        $lang->l19 = $request->l19;
        $lang->l20 = $request->l20;


        $lang->l21 = $request->l21;
        $lang->l22 = $request->l22;
        $lang->l23 = $request->l23;
        $lang->l24 = $request->l24;
        $lang->l25 = $request->l25;
        $lang->l26 = $request->l26;
        $lang->l27 = $request->l27;
        $lang->l28 = $request->l28;
        $lang->l29 = $request->l29;
        $lang->l30 = $request->l30;

        $lang->l31 = $request->l31;
        $lang->l32 = $request->l32;
        $lang->l33 = $request->l33;
        $lang->l34 = $request->l34;
        $lang->l35 = $request->l35;
        $lang->l36 = $request->l36;
        $lang->l37 = $request->l37;
        $lang->l38 = $request->l38;
        $lang->l39 = $request->l39;
        $lang->l40 = $request->l40;

        $lang->l41 = $request->l41;
        $lang->l42 = $request->l42;
        $lang->l43 = $request->l43;
        $lang->l44 = $request->l44;
        $lang->l45 = $request->l45;
        $lang->l46 = $request->l46;
        $lang->l47 = $request->l47;
        $lang->l48 = $request->l48;
        $lang->l49 = $request->l49;
        $lang->l50 = $request->l50;

        $lang->l51 = $request->l51;
        $lang->l52 = $request->l52;
        $lang->l53 = $request->l53;
        $lang->l54 = $request->l54;
        $lang->l55 = $request->l55;
        $lang->l56 = $request->l56;
        $lang->l57 = $request->l57;
        $lang->l58 = $request->l58;
        $lang->l59 = $request->l59;
        $lang->l60 = $request->l60;

        $lang->l61 = $request->l61;
        $lang->l62 = $request->l62;
        $lang->l63 = $request->l63;
        $lang->l64 = $request->l64;
        $lang->l65 = $request->l65;
        $lang->l66 = $request->l66;
        $lang->l67 = $request->l67;
        $lang->l68 = $request->l68;
        $lang->l69 = $request->l69;
        $lang->l70 = $request->l70;

        $lang->l71 = $request->l71;
        $lang->l72 = $request->l72;
        $lang->l73 = $request->l73;
        $lang->l74 = $request->l74;
        $lang->l75 = $request->l75;
        $lang->l76 = $request->l76;
        $lang->l77 = $request->l77;
        $lang->l78 = $request->l78;
        $lang->l79 = $request->l79;
        $lang->l80 = $request->l80;

        $lang->l81 = $request->l81;
        $lang->l82 = $request->l82;
        $lang->l83 = $request->l83;
        $lang->l84 = $request->l84;
        $lang->l85 = $request->l85;
        $lang->l86 = $request->l86;
        $lang->l87 = $request->l87;
        $lang->l88 = $request->l88;
        $lang->l89 = $request->l89;
        $lang->l90 = $request->l90;

        $lang->l91 = $request->l91;
        $lang->l92 = $request->l92;
        $lang->l93 = $request->l93;
        $lang->l94 = $request->l94;
        $lang->l95 = $request->l95;
        $lang->l96 = $request->l96;
        $lang->l97 = $request->l97;
        $lang->l98 = $request->l98;
        $lang->l99 = $request->l99;
        $lang->l100 = $request->l100;

        $lang->l101 = $request->l101;
        $lang->l102 = $request->l102;
        $lang->l103 = $request->l103;
        $lang->l104 = $request->l104;
        $lang->l105 = $request->l105;
        $lang->l106 = $request->l106;
        $lang->l107 = $request->l107;
        $lang->l108 = $request->l108;
        $lang->l109 = $request->l109;
        $lang->l110 = $request->l110;

        $lang->l111 = $request->l111;
        $lang->l112 = $request->l112;
        $lang->l113 = $request->l113;
        $lang->l114 = $request->l114;
        $lang->l115 = $request->l115;
        $lang->l116 = $request->l116;
        $lang->l117 = $request->l117;
        $lang->l118 = $request->l118;
        $lang->l119 = $request->l119;
        $lang->l120 = $request->l120;

        $lang->l121 = $request->l121;
        $lang->l122 = $request->l122;
        $lang->l123 = $request->l123;
        $lang->l124 = $request->l124;
        $lang->l125 = $request->l125;
        $lang->l126 = $request->l126;
        $lang->l127 = $request->l127;
        $lang->l128 = $request->l128;
        $lang->l129 = $request->l129;
        $lang->l130 = $request->l130;

        $lang->l131 = $request->l131;
        $lang->l132 = $request->l132;
        $lang->l133 = $request->l133;
        $lang->l134 = $request->l134;
        $lang->l135 = $request->l135;
        $lang->l136 = $request->l136;
        $lang->l137 = $request->l137;
        $lang->l138 = $request->l138;
        $lang->l139 = $request->l139;
        $lang->l140 = $request->l140;

        $lang->l141 = $request->l141;
        $lang->l142 = $request->l142;
        $lang->l143 = $request->l143;
        $lang->l144 = $request->l144;
        $lang->l145 = $request->l145;
        $lang->l146 = $request->l146;
        $lang->l147 = $request->l147;
        $lang->l148 = $request->l148;
        $lang->l149 = $request->l149;
        $lang->l150 = $request->l150;

        $lang->l151 = $request->l151;
        $lang->l152 = $request->l152;
        $lang->l153 = $request->l153;
        $lang->l154 = $request->l154;
        $lang->l155 = $request->l155;
        $lang->l156 = $request->l156;
        $lang->l157 = $request->l157;
        $lang->l158 = $request->l158;
        $lang->l159 = $request->l159;
        $lang->l160 = $request->l160;

        $lang->l161 = $request->l161;
        $lang->l162 = $request->l162;
        $lang->l163 = $request->l163;
        $lang->l164 = $request->l164;
        $lang->l165 = $request->l165;
        $lang->l166 = $request->l166;
        $lang->l167 = $request->l167;
        $lang->l168 = $request->l168;
        $lang->l169 = $request->l169;
        $lang->l170 = $request->l170;

        $lang->l171 = $request->l171;
        $lang->l172 = $request->l172;
        $lang->l173 = $request->l173;
        $lang->l174 = $request->l174;
        $lang->l175 = $request->l175;
        $lang->l176 = $request->l176;
        $lang->l177 = $request->l177;
        $lang->l178 = $request->l178;
        $lang->l179 = $request->l179;
        $lang->l180 = $request->l180;

        $lang->l181 = $request->l181;
        $lang->l182 = $request->l182;
        $lang->l183 = $request->l183;
        $lang->l184 = $request->l184;
        $lang->l185 = $request->l185;
        $lang->l186 = $request->l186;
        $lang->l187 = $request->l187;
        $lang->l188 = $request->l188;
        $lang->l189 = $request->l189;

        $lang->l190 = $request->l190;
        $lang->l191 = $request->l191;
        $lang->l192 = $request->l192;
        $lang->l193 = $request->l193;
        $lang->l194 = $request->l194;
        $lang->l195 = $request->l195;
        $lang->l196 = $request->l196;
        $lang->l197 = $request->l197;
        $lang->l198 = $request->l198;
        $lang->l199 = $request->l199;
        $lang->l200 = $request->l200;

        $lang->l201 = $request->l201;
        $lang->l202 = $request->l202;
        $lang->l203 = $request->l203;
        $lang->l204 = $request->l204;
        $lang->l205 = $request->l205;
        $lang->l206 = $request->l206;
        $lang->l207 = $request->l207;
        $lang->l208 = $request->l208;
        $lang->l209 = $request->l209;
        $lang->l210 = $request->l210;

        $lang->l211 = $request->l211;
        $lang->l212 = $request->l212;
        $lang->l213 = $request->l213;
        $lang->l214 = $request->l214;
        $lang->l215 = $request->l215;
        $lang->l216 = $request->l216;

        // new
        $lang->l217 = $request->l217;
        $lang->l218 = $request->l218;
        $lang->l219 = $request->l219;
        $lang->l220 = $request->l220;
        $lang->l221 = $request->l221;
        $lang->l222 = $request->l222;
        $lang->l223 = $request->l223;
        $lang->l224 = $request->l224;
        $lang->l225 = $request->l225;
        $lang->l226 = $request->l226;
        $lang->l227 = $request->l227;
        $lang->l228 = $request->l228;
        $lang->l229 = $request->l229;

        $lang->save();
        $notification = array(
            'messege' => 'Successfully Update Language!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function languageEdit($id)
    {
        $lan = Language::find($id);
        return view('admin.languages.edit', compact('lan'));
    }
}
