<?php

use App\Http\Controllers\AdvertisemenController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





// admin

Route::group(['prefix' => 'auth'], function() {
    Route::resource('/category','CategoryController');
});

// Route::get('/', function () {
//     return view('index');
// });




// admin

Route::group(['prefix' => 'auth','middleware'=>'admin'], function() {
    Route::get('/', function () {
        return view('backend.admin.index');
    });
    Route::resource('/category','CategoryController');
    Route::resource('/subcategory','SubcategoryController');
    Route::resource('/childcategory','ChildcategoryController');


    //adminlisting
    Route::get('/allads','AdminListingController@index')->name('all.ads');

    //listing reported ad
    Route::get('/reported-ads','FraudController@index')->name('all.reported.ads');

    //report this ad
Route::post('/report-this-ad','FraudController@store')->name('report.ad');


});
Route::get('/','FrontAdsController@index');



Auth::routes(['verify'=>true]);
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ads
Route::get('/ads/create','AdvertisemenController@create')->middleware('auth')->name('ads.create');
Route::post('/ads/store','AdvertisemenController@store')->middleware('auth')->name('ads.store');
Route::get('/ads','AdvertisemenController@index')->middleware('auth')->name('ads.index');
Route::get('/ads/{id}/edit','AdvertisemenController@edit')->middleware('auth')->name('ads.edit');
Route::put('/ads/{id}/update','AdvertisemenController@update')->middleware('auth')->name('ads.update');
Route::put('/ads/{id}/delete','AdvertisemenController@destroy')->middleware('auth')->name('ads.destroy');

Route::get('/ad-pending','AdvertisementController@pendingAds')->name('pending.ad');


// profile
Route::get('/profile','ProfileController@index')->name('profile')->middleware('auth');
Route::post('/profile','ProfileController@updatepassword')->name('password.update')->middleware('auth');
Route::post('/profile','ProfileController@updateprofile')->name('profile.update')->middleware('auth');

// frontend
Route::get('/product/{categorySlug}','FrontendController@findBasedOnCategory')->name('category.show');
Route::get('/product/{categorySlug}/{subcategorySlug}','FrontendController@findBasedOnSubcategory')->name('subcategory.show');
Route::get('/products/{id}/{slug}', 'FrontendController@show')
    ->name('product.view');

    // messages

    Route::post('/send/message','SendMessageController@store')->middleware('auth');
Route::get('messages','MessageController@index')->name('messages')->middleware('auth');
Route::get('/users','MessageController@chatWithThisUser');
Route::get('/message/user/{id}','MessageController@showMessages');
Route::post('/start-conversation','MessageController@startConversation');

//user ads
Route::get('/ads/{userId}/view','FrontendController@viewUserAds')->name('show.user.ads');

//login with facebook
Route::get('auth/facebook', 'SocialLoginController@facebookRedirect');

Route::get('auth/facebook/callback', 'SocialLoginController@loginWithFacebook');

//Save ad
Route::post('/ad/save','SaveAdController@saveAd');
Route::post('/ad/remove','SaveAdController@removeAd')->name('ad.remove');
Route::get('/saved-ads','SaveAdController@getMyads')->name('saved.ad');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
