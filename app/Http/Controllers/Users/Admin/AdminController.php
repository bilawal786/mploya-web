<?php

namespace App\Http\Controllers\Users\Admin;

use App\User;
use App\Category;
use App\Subscription;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;

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

    public function JobSeekers()
    {
        $jobseekers = User::where('user_type', '=', 'jobseeker')->get();
        return view('admin.jobseeker.all', compact('jobseekers'));
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
            $subscription->status = $request->status;
            $subscription->description = $request->description;
            $subscription->update();
            return response()->json([
                'success' => 'Subscription Update Successfully!',
            ]);
        }
    }
}
