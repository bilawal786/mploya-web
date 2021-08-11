<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\SubcategoryCollection;
use App\Http\Resources\CategoryRelatedJobsResource;


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
        $category = Category::find($id);
        if ($category == null) {
            return response()->json(['error' => 'Jobs  not Found', 'success' => false], 404);
        } else {
            $data = new CategoryRelatedJobsResource($category);
            return $data->toJson();
        }
    }
}
