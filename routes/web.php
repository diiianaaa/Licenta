<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TableTypeController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\BlogController;
use App\Models\User;
use App\Models\Admin;

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

// Admin Route----------

Route::prefix('admin')->group(function () {



    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.index');

    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');




    Route::get('/blog/view', [BlogController::class, 'InfoView'])->name('blog');

    Route::post('/blog/store', [BlogController::class, 'InfoStore'])->name('blog.store');





    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register')->middleware('admin');

    Route::post('/register/create', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');

    Route::get('/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile')->middleware('admin');

    Route::get('/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

    Route::post('/profile/edit', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');


    //Tables


    Route::get('/tables', [TableController::class, 'index'])->name('tables_index');

    Route::post('/tables/store', [TableController::class, 'TableStore'])->name('table.store');


    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation_index');

    Route::get('/reservation/store', [ReservationController::class, 'ReservationStore'])->name('reservation.store');;
});


Route::get('/reservTable', [ReservationController::class, 'Reservation'])->name('reservation');


// Seller Route

Route::prefix('seller')->group(function () {

    Route::get('/login', [SellerController::class, 'SellerIndex'])->name('seller_login_form');

    Route::post('/login/owner', [SellerController::class, 'SellerLogin'])->name('seller.login');

    Route::get('/dashboard', [SellerController::class, 'SellerDashboard'])->name('seller.dashboard')->middleware('seller');

    Route::get('/logout', [SellerController::class, 'SellerLogout'])->name('seller.logout')->middleware('seller');

    Route::get('/register', [SellerController::class, 'SellerRegister'])->name('seller.register')->middleware('seller');

    Route::post('/register/create', [SellerController::class, 'SellerRegisterCreate'])->name('seller.register.create');
});
//End Seller Route


Route::get('/', [IndexController::class, 'index']);

// Route::get('/user/reservation',[ReservationController::class, 'Reservation'])->name('user.reservation');

Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

// Route::post('/user/book',[IndexController::class, 'UserBooking'])->name('user.book.table');

Route::post('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.Password');

Route::post('/user/upate/password', [IndexController::class, 'UserPasswordUpdate'])->name('change.password.update');





//Category

Route::prefix('category')->group(function () {

    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');



    //Admin Subcategory


    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');

    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

    Route::post('sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

    Route::get('sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');





    //sub-subCategory

    Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');

    Route::post('sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');

    Route::get('sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');

    Route::post('sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');

    Route::get('sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
});




//product admin
Route::prefix('product')->group(function () {

    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');

    Route::post('/store1', [ProductController::class, 'StoreProduct'])->name('product-store1');

    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');

    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');

    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');

    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');

    Route::get('/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
});

Route::prefix('slider')->group(function () {

    Route::get('/slider/view', [SliderController::class, 'SliderView'])->name('manage-slider');

    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');

    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
});





// MultiLanguage


Route::get('/language/german', [LanguageController::class, 'German'])->name('german.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

//Product Details Page

Route::get('product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);;

Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);


//Add to cart

Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);


//WishList

Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);


//Cart


Route::get('/mycart', [CartPageController::class, 'ViewWishList'])->name('mycart');

Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);


Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);


Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);


//Checkout

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);





// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);



Route::prefix('shipping')->group(function () {

    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

    Route::post('/division/update', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');




    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');

    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');





    Route::get('/country/view', [ShippingAreaController::class, 'CountryView'])->name('manage-country');

    Route::post('/country/store', [ShippingAreaController::class, 'CountryStore'])->name('country.store');

    Route::get('/country/edit/{id}', [ShippingAreaController::class, 'CountryEdit'])->name('country.edit');

    Route::post('/country/update', [ShippingAreaController::class, 'CountryUpdate'])->name('country.update');

    Route::get('/country/delete/{id}', [ShippingAreaController::class, 'CountryDelete'])->name('country.delete');
});


    Route::get('/search', [ProductController::class, 'search'])->name('search');



    Route::get('/blog/user/view', [BlogController::class, 'InfoViewUser'])->name('blog_view');


//Blog






Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
