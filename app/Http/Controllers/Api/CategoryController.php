<?php

namespace App\Http\Controllers\Api;

use App\Job;
use App\Category;
use App\Subcategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\AllJobCollection;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\SubcategoryCollection;
use App\Http\Resources\CategoryRelatedJobsResource;
use App\Http\Resources\CategoryRelatedJobsCollection;


class CategoryController extends Controller
{
    // Get All Category

    public function AllCategory()
    {

        $categories = Category::all();
        $data = CategoryCollection::collection($categories);
        return response()->json(CategoryCollection::collection($data));
    }

    // get all sub categories

    public function AllSubCategory($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get();
        $data = SubcategoryCollection::collection($subcategories);
        return response()->json(SubcategoryCollection::collection($data));
    }


    // Get All Jobs Related to that Category

    public function CategoryRelatedJobs($id)
    {
        $jobs = Job::where('category_id', '=', $id)->get();

        if ($jobs == null) {
            return response()->json(['error' => 'Jobs  not Found', 'success' => false], 404);
        } else {

            $data =  AllJobCollection::collection($jobs);
            return response()->json(AllJobCollection::collection($data));
        }
    }
}
