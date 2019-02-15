<?php

Auth::routes();

Route::post('/logout', function(){
    Auth::logout();
    return Redirect::to('/');
});

/** COMPANY REGISTRATION ROUTE **/
Route::get('/company-register', "Lender\CompanyRegisterController@companyRegister");

Route::get('/company-register', "Lender\CompanyRegisterController@companyRegister");


/** MAIN PAGE ROUTES SYSTEM **/

// HOME PAGE ROUTE AND FUNCTIONS
Route::get('/', "HomeController@index");

// NAV ROUTE
Route::get('/nav', "Modulecontroller\FrontController@nav");

// QUICK LINKS ROUTE
Route::get('/links', "Modulecontroller\FrontController@links");

// CAROUSEL ROUTE
Route::get('/carousel', "Modulecontroller\FrontController@carousel");

// FEATURED ROUTE
Route::get('/feature', "Modulecontroller\FrontController@feature");

/** END MAIN PAGE ROUTES SYSTEM **/



/** ITEM PAGE ROUTE SYSTEM **/

// ITEM PAGE ROUTE AND FUNCTIONS
// Route::get('/items', "ItemController@items");

//BREADCRUMB ROUTE
Route::get('/breadcrumb', "Modulecontroller\ItemController@breadCrumb");

//ITEM DESCRIPTION ROUTE
Route::get('/item-description', "Modulecontroller\ItemController@itemDescription");

//ITEM FOOTER ROUTE
Route::get('/item-footer', "Modulecontroller\ItemController@itemFooter");

/** END ITEM PAGE ROUTE SYSTEM **/



// /** NEWS FEED ROUTES SYSTEM**/

// // NEWS FEED PAGE ROUTE AND FUNCTIONS
// Route::get('/newsfeed', "NewsFeedController@newsfeed");

// // NEWS FEED BREADCRUMB ROUTE
// Route::get('/news-breadcrumb', "Modulecontroller\NewsFeedController@newsFeedbreadCrumb");

// // NEWS FEED MASTER IMAGE ROUTE
// Route::get('/news-master', "Modulecontroller\NewsFeedController@newsfeedMasterImage");

// // NEWS FEED BOTTOM IMAGE LIST ROUTE
// Route::get('/news-bottom-image', "Modulecontroller\NewsFeedController@newsfeedBottomImage");

// // NEWS FEED FOOTER ROUTE
// Route::get('/news-footer', "Modulecontroller\NewsFeedController@newsfeedFooter");

// /** END NEWS FEED ROUTES SYSTEM**/



/** PROFILE ROUTE SYSTEM **/

// PROFILE PAGE ROUTE AND FUNCTIONS
Route::get('/profile', "ProfileController@profilePage");

// PROFILE COVER IMAGE ROUTE
Route::get('/profile-cover', "Modulecontroller\ProfileController@profileCover");

// PROFILE HEADER ROUTE
Route::get('/profile-header', "Modulecontroller\ProfileController@profileHeader");

// PROFILE FEATURED ROUTE
Route::get('/profile-featured', "Modulecontroller\ProfileController@profileFeatured");

/** END PROFILE ROUTE SYSTEM **/



/** REVIEW PAGE ROUTE SYSTEM **/

// REVIEW PAGE ROUTE AND FUNCTIONS
Route::get('/review', "ReviewController@reviewPage");

// REVIEW CONTENT ROUTE
Route::get('/review-contents', "Modulecontroller\ReviewController@reviewImage");


/** END REVIEW PAGE ROUTE SYSTEM **/


Schema::defaultStringLength(191);


/*Sample Routes for Inventory Module*/

Route::resource('/items', 'InventoryController\ItemController');
Route::resource('/categories', 'InventoryController\CategoryController');
Route::post('register', 'Auth\RegisterController@register')->name('register.post');
Route::get('/items/{id}', 'InventoryController\ItemController@show')->where('id', '.*');

Route::get('/{any}', function () {
  return view('inventory.items.home');
})->where('any', '.*');


/*Sample Routes for Inventory Module Created By Ryan*/