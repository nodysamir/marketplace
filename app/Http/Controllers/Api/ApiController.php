<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getcategory()
    {
       $category = Category::get();
       return response()->json($category);
    }
    public function getsubcategory(Request $request){
        $subcategory = Subcategory::where('category_id',$request->category_id)->get();
        return response()->json($subcategory);
    }
    public function getchildcategory(Request $request){
        $childcategory = Childcategory::where('subcategory_id',$request->subcategory_id)->get();
        return response()->json($childcategory);
    }
}
