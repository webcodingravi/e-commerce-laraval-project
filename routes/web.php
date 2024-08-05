<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BannerController;
use App\Http\Middleware\AdminLoginMiddleware;
use App\Http\Middleware\GuestAdminMiddleware;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Middleware\CustomerLoginMiddleware;
use App\Http\Middleware\GuestCustomerMiddleware;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\admin\CategorieController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\admin\SubCategroyController;
use App\Http\Controllers\admin\DiscountCodeController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\admin\ProductSubCategoryController;



// Front route
Route::get('/', [FrontController::class, 'index'])->name('front.home');
Route::get('/shop/{categorySlug?}/{subCategorySlug?}', [ShopController::class, 'index'])->name('front.shop');
Route::get('/product/{slug}', [ShopController::class, 'product'])->name('front.product');
Route::get('/cart', [CartController::class, 'cart'])->name('front.cart');
Route::Post('/update-cart', [CartController::class, 'updateCart'])->name('front.updateCart');
Route::Post('/delete-item', [CartController::class, 'deleteItem'])->name('front.deleteItem.cart');
Route::Post('/add-to-cart', [CartController::class, 'addToCart'])->name('front.addToCart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('front.checkout');
Route::post('/process-checkout', [CartController::class, 'processCheckout'])->name('front.processCheckout');
Route::get('/thanks/{orderId}', [CartController::class, 'thankyou'])->name('front.thankyou');
Route::post('/get-order-summary', [CartController::class, 'getOrderSummery'])->name('front.getOrderSummery');
Route::post('/apply-discount', [CartController::class, 'applyDiscount'])->name('front.applyDiscount');
Route::post('/remove-discount', [CartController::class, 'removeCoupon'])->name('front.removeCoupon');
Route::post('/add-to-whislist', [FrontController::class, 'addToWishlist'])->name('front.addToWhislist');
Route::get('/page/{slug}', [FrontController::class, 'page'])->name('front.page');
Route::post('/send-contact-email', [FrontController::class, 'sendContactEmail'])->name('front.sendContactEmail');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('front.forgotPassword');
Route::post('/process-forgot-password', [AuthController::class, 'processForgotPassword'])->name('front.processForgotPassword');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('front.resetPassword');
Route::post('/process-reset-password', [AuthController::class, 'processResetPassword'])->name('front.processResetPassword');
Route::post('/save-rating/{productId}', [ShopController::class, 'saveRating'])->name('front.saveRating');



Route::prefix("account")->group(function() {
Route::middleware([GuestCustomerMiddleware::class])->group(function() {
Route::get('/register',[AuthController::class, 'register'])->name('account.register');
Route::post('/process-register',[AuthController::class, 'processRegister'])->name('account.processRegister');
Route::get('/login',[AuthController::class, 'login'])->name('account.login');
Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('account.authenticate');

});

Route::middleware([CustomerLoginMiddleware::class])->group(function() {
  Route::get('/profile',[AuthController::class, 'profile'])->name('account.profile');
  Route::post('/update-profile',[AuthController::class, 'updateProfile'])->name('account.updateProfile');
  Route::post('/update-address',[AuthController::class, 'updateAddress'])->name('account.updateAddress');
  Route::get('/change-password',[AuthController::class, 'ShowChangePasswordForm'])->name('account.changePassword');
  Route::post('/process-password',[AuthController::class, 'changePassword'])->name('account.processChangePassword');



  Route::get('/my-orders',[AuthController::class, 'myorders'])->name('account.orders');
  Route::get('/my-wishlist',[AuthController::class, 'wishlist'])->name('account.wishlist');
  Route::post('/remove-product-from-wishlist',[AuthController::class, 'removeProductFromWishList'])->name('account.removeProductFromWishList');
  Route::get('/order-detail/{orderId}',[AuthController::class, 'orderDetail'])->name('account.orderDetail');
  Route::get('/logout',[AuthController::class, 'logout'])->name('account.logout');



});

});





// Admin route
Route::prefix('admin')->group(function() {
Route::middleware([GuestAdminMiddleware::class])->group(function() {
Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/authentication', [AdminLoginController::class, 'Authentication'])->name('admin.auth');

});

Route::middleware([AdminLoginMiddleware::class])->group(function() {

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/logout',[DashboardController::class, 'logout'])->name('admin.logout');



// temp-image create
Route::post('/upload-temp-image',[TempImagesController::class, 'create'])->name('temp-images.create');


// Category route
Route::resource('/categories', CategorieController::class);

Route::get('/category-export', [CategorieController::class, 'export'])->name('category.export');


// sub category route

Route::resource('/sub-categories', SubCategroyController::class);

Route::get('/subCategory-export', [SubCategroyController::class, 'export'])->name('subCategory.export');

// Brand route

Route::resource('/brand', BrandController::class);

Route::get('/brands-export', [BrandController::class, 'export'])->name('brands.export');


// products route
Route::resource('/products', ProductController::class);
Route::get('/get-products', [ProductController::class, 'getProducts'])->name('products.getProducts');
Route::get('/product-export', [ProductController::class, 'export'])->name('product.export');
Route::get('/ratings', [ProductController::class, 'productRating'])->name('products.productRating');
Route::get('/change-rating-status', [ProductController::class, 'changeRatingStatus'])->name('products.changeRatingStatus');







// products-subcategory route
Route::resource('/products-subCategory', ProductSubCategoryController::class);


// productImages update Route

Route::post('/product-images/update', [ProductImageController::class, 'update'])->name('product-images.update');

Route::delete('/product-images', [ProductImageController::class, 'destroy'])->name('product-images.destroy');


// shipping Routes

Route::resource('/shipping', ShippingController::class);
Route::get('/shipping-export', [ShippingController::class, 'export'])->name('shipping.export');


// Discount code Routes
Route::resource('/coupons', DiscountCodeController::class);


// Order Route
Route::get('/orders',[OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}',[OrderController::class, 'detail'])->name('orders.detail');
Route::post('/order/change-status/{id}',[OrderController::class, 'changeOrderStatus'])->name('orders.changeOrderStatus');
Route::post('/orders/send-email/{id}',[OrderController::class, 'sendInvoiceEmail'])->name('orders.sendInvoiceEmail');

Route::get('/orders-export', [OrderController::class, 'export'])->name('orders.export');



// Users Routes

Route::resource('/users', UserController::class);

Route::get('/users-export', [UserController::class, 'export'])->name('users.export');


// Pages Routes

Route::resource('/pages', PageController::class);



// password setting route
Route::get('/change-password',[SettingController::class, 'showChangePasswordForm'])->name('admin.showChangePasswordForm');

Route::post('/admin-process-password',[SettingController::class, 'processChangePassword'])->name('admin.processChangePassword');






// slug route
Route::get('/getSlug',function(Request $request){
 $slug = '';
 if(!empty($request->title)) {
  $slug = Str::slug($request->title);
 }
 return response()->json([
  'status' =>true,
  'slug' => $slug
 ]);
})->name('getSlug');

});


});
