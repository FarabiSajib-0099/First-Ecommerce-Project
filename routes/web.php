<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminCouponComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminProductEditComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\WishlistComponent;

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



Route::get('/',HomeComponent::class);
Route::get('/redirect', function(){
    return auth()->user()->role_type == 'ADM' ? redirect()->route('admin.dashboard') : redirect()->route('user.dashboard');
});
Route::get('/about',AboutComponent::class);

Route::get('/shop',ShopComponent::class);

Route::get('/cart',CartComponent::class)->name('product.cart');

Route::get('/checkout',CheckoutComponent::class)->name('checkout.page');

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product/category/{category_slug}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search');

Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//For user or customer
Route::middleware(['auth:sanctum','verified'])->group(function(){
Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

//For Admin

Route::middleware(['auth:sanctum','verified', 'authAdmin'])->prefix('admin')->group(function(){
    Route::get('/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/categories',AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/add/category',AdminAddCategoryComponent::class)->name('add.category');
    Route::get('/edit/category/{category_slug}',AdminEditCategoryComponent::class)->name('edit.category');
    Route::get('/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/add/product',AdminAddProductComponent::class)->name('add.products');
    Route::get('/product/edit/{product_slug}',AdminProductEditComponent::class)->name('edit.product');

    Route::get('/slider',AdminHomeSliderComponent::class)->name('admin.slider');
    Route::get('/add/slider',AdminAddHomeSliderComponent::class)->name('add.slider');
    Route::get('/edit/slider/{slider_id}',AdminEditHomeSliderComponent::class)->name('edit.slider');
    Route::get('/home/categories',AdminHomeCategoryComponent::class)->name('admin.home_categories');
    Route::get('/sale',AdminSaleComponent::class)->name('admin.sale');

    Route::get('/coupon',AdminCouponComponent::class)->name('admin.coupon');
    Route::get('/add/coupon',AdminAddCouponComponent::class)->name('add.coupon');
    Route::get('/edit/component/{coupon_id}',AdminEditCouponComponent::class)->name('edit.coupon');

});
