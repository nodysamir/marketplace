<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\User;

class FrontendController extends Controller
{
     public function findBasedOnCategory(Category $categorySlug){
        $advertisements = $categorySlug->ads;
        $filterBySubcategory = Subcategory::where('category_id',$categorySlug->id)->get();
        return view('product.category',compact('advertisements','filterBySubcategory'));


     }


    public function findBasedOnSubcategory($categorySlug, Subcategory $subcategorySlug,Request $request){

          $advertisementBasedOnFilter = Advertisement::where('subcategory_id',$subcategorySlug->id)->when($request->minPrice,function($query,$minPrice){

            return $query->where('price','>=',$minPrice);
          })->when($request->maxPrice,function($query,$maxPrice){
              return $query->where('price','<=',$maxPrice);
          })->get();

          $advertisementWithoutFilter = $subcategorySlug->ads;
          $filterByChildCategories = $subcategorySlug->ads->unique('childcategory');

          $advertisements = $request->minPrice||$request->maxPrice? $advertisementBasedOnFilter:$advertisementWithoutFilter;
          return view('product.subcategory',compact('advertisements','filterByChildCategories')) ;
    }
    public function findBasedOnChildcategory($categorySlug, Subcategory $subcategorySlug,Childcategory $childcategorySlug,Request $request){
        $advertisementBasedOnFilter = Advertisement::where('childcategory_id',$childcategorySlug->id)->when($request->minPrice,function($query,$minPrice){

            return $query->where('price','>=',$minPrice);
          })->when($request->maxPrice,function($query,$maxPrice){
              return $query->where('price','<=',$maxPrice);
          })->get();
          $advertisementWithoutFilter= $childcategorySlug->ads;
        $filterByChildCategories = $subcategorySlug->ads->unique('childcategory');
        $advertisements = $request->minPrice||$request->maxPrice? $advertisementBasedOnFilter:$advertisementWithoutFilter;
        return view('product.childcategory',compact('advertisements','filterByChildCategories')) ;
  }


  public function show($id,$slug)
  {

      $advertisement = Advertisement::where('id',$id)->where('slug',$slug)->first();
      return view('product.show',compact('advertisement'));
  }

   //show user ads
   public function viewUserAds($id)
   {
       $advertisements = Advertisement::latest()->where('user_id',$id)->paginate(20);
       $user = User::find($id);
       return view('seller.ads',compact('advertisements','user'));
   }

}
