<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantStore_DetailsController;
use App\Http\Controllers\MerchantAccepting_PaymentsController;
use App\Http\Controllers\MerchantShipping_InformationController;
use App\Http\Controllers\MerchantProduct_ManagementController;
use App\Http\Controllers\Product_Category_ManagementController;
use App\Http\Controllers\MerchantOrder_ManagementController;
use App\Http\Controllers\User_ManagementController;
use App\Http\Controllers\Blog_ManagementController;
use App\Http\Controllers\Slider_ManagementController;
use App\Http\Controllers\Banner_ManagementController;
use App\Http\Controllers\MerchentController;
use App\Http\Controllers\MerchentManagementController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CMS_ManagementController;
use App\Http\Controllers\Promocode_ManagementController;
use App\Http\Controllers\Merchant_ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Blog_Category_ManagementController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminNewsletterController;
use App\Http\Controllers\AdminCmsController;
use App\Http\Controllers\AdminEmailNotificationController;
use App\Http\Controllers\MerchantPaymentOptionController;
use App\Http\Controllers\MerchantSocialLinkController;
use App\Http\Controllers\MerchantMarketingController;
use App\Http\Controllers\AdminMarketingController;
use App\Http\Controllers\ShippingmentController;

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
Route::get('/migrate', function(){
    \Artisan::call('migrate');
    dd('migrated!');
});

Route::get('/', function () {
    return view('merchent.home');
});
Route::get('/blogs/{slug}',[AdminBlogController::class, 'listBlogs']);
Route::get('/blogs',[AdminBlogController::class, 'listBlogs'])->name('ListBlogs');
Route::get('/term-and-condition',[CMS_ManagementController::class, 'GetTerm'])->name('term-and-condition');

Route::post('/merchant/login',[Merchant_LoginController::class,'postLogin'])->name('merchant/login')->middleware('auth');

Route::get('/merchant/blog-category-management', [Blog_Category_ManagementController::class, 'index'])->name('blog-category-management')->middleware('auth');
Route::match(['get'], '/blog-category-change-status', [Blog_Category_ManagementController::class, 'ChangeStatus'])->name('category-change-status')->middleware('auth');
Route::get('/DeleteBlogCategory', [Blog_Category_ManagementController::class, 'destroy'])->name('DeleteBlogCategory');
Route::post('/UpdateBlogCategory', [Blog_Category_ManagementController::class, 'update'])->name('UpdateBlogCategory');
Route::post('/AddBlogCategory', [Blog_Category_ManagementController::class, 'store'])->name('AddBlogCategory');
Route::get('/merchant/profile', [Merchant_ProfileController::class, 'index']  )->name('merchant-profile')->middleware('auth');
Route::get('/merchant/change-password', [Merchant_ProfileController::class, 'changePassword'])->name('merchant-change-password')->middleware('auth');
Route::get('/merchant/plan-deatil', [Merchant_ProfileController::class, 'plandetail'])->name('merchant-plan-detail')->middleware('auth');
Route::get('/merchant/store-deatil', [Merchant_ProfileController::class, 'storedetail'])->name('merchant-store-detail')->middleware('auth');
Route::get('/merchant/layout-deatil', [Merchant_ProfileController::class, 'layoutdetail'])->name('merchant-layout-detail')->middleware('auth');
Route::post('/merchant/update-password', [Merchant_ProfileController::class, 'updatePassword'])->name('merchant-update-password')->middleware('auth');
Route::post('/merchant/update-profile', [Merchant_ProfileController::class, 'updateProfile'])->name('merchant-update-profile')->middleware('auth');
Route::post('/merchant/update-store-deatil', [Merchant_ProfileController::class, 'updatestoredetail'])->name('merchant-update-store-detail')->middleware('auth');
Route::post('/merchant/update-plan-deatil', [Merchant_ProfileController::class, 'updateplandetail'])->name('merchant-update-plan-detail')->middleware('auth');
Route::post('/merchant/update-layout-deatil', [Merchant_ProfileController::class, 'updatelayoutdetail'])->name('merchant-update-layout-detail')->middleware('auth');
Route::post('/merchant/upload-profile-image', [Merchant_ProfileController::class, 'uploadprofileimage'])->name('merchant-upload-profile-image')->middleware('auth');
Route::get('/merchant/gallery', [Merchant_ProfileController::class, 'gallery']  )->name('merchant-gallery')->middleware('auth');
Route::get('/merchant/add-gallery', [Merchant_ProfileController::class, 'addgallery']  )->name('merchant-add-gallery')->middleware('auth');
Route::post('/merchant/store-gallery', [Merchant_ProfileController::class, 'storegallery']  )->name('merchant-store-gallery')->middleware('auth');
Route::get('/merchant/delete-gallery', [Merchant_ProfileController::class, 'deletegallery']  )->name('merchant-delete-gallery')->middleware('auth');

Route::get('/merchant/page', [CMS_ManagementController::class, 'pageform'])->name('merchant-page')->middleware('auth');
Route::post('/merchant/add-page', [CMS_ManagementController::class, 'store'])->name('merchant-add-page')->middleware('auth');
Route::get('/merchant/update-page/{id}', [CMS_ManagementController::class, 'updatepageform'])->name('merchant-update-page')->middleware('auth');
Route::post('/merchant/store-page/{id}', [CMS_ManagementController::class, 'storeupdatepage'])->name('merchant-store-page')->middleware('auth');
Route::get('/merchant/delete-page/{id}', [CMS_ManagementController::class, 'destroy'])->name('merchant-delete-page')->middleware('auth');
Route::get('/merchant/cms-management', [CMS_ManagementController::class, 'index'])->name('merchant-cms-management')->middleware('auth');
Route::match(['get'], '/page-change-status', [CMS_ManagementController::class, 'ChangeStatus'])->name('page-change-status')->middleware('auth');
Route::post('/merchant/upload-page', [CMS_ManagementController::class, 'upload'])->name('upload-page')->middleware('auth');

Route::match(['get'], '/variable-product-variation/{id}', [MerchantProduct_ManagementController::class, 'variableproductvariation'])->name('variable-product-variation')->middleware('auth');

Route::post('/new-attribute', [MerchantProduct_ManagementController::class, 'newattribute'])->name('new-attribute');

Route::match(['get'], '/variable-product-attribute/{id}', [MerchantProduct_ManagementController::class, 'variableproductattribute'])->name('variable-product-attribute')->middleware('auth');

Route::match(['post'], '/variable-product-attribute/{id}', [MerchantProduct_ManagementController::class, 'variableattributevalue'])->name('variable-product-attribute')->middleware('auth');
Route::match(['post'], '/variable-product-variation-save', [MerchantProduct_ManagementController::class, 'variableAttributeSave'])->name('variable-product-attribute-save')->middleware('auth');
Route::match(['post'], '/variable-product-variation-insert', [MerchantProduct_ManagementController::class, 'variableAttributeInsert'])->name('variable-product-variation-insert')->middleware('auth');
Route::match(['get'], '/product-change-status', [MerchantProduct_ManagementController::class, 'ChangeStatus'])->name('product-change-status')->middleware('auth');


Route::get('/merchant/slider-management', [Slider_ManagementController::class, 'index'])->name('slider-management')->middleware('auth');
Route::post('/UpdateSlider', [Slider_ManagementController::class, 'update'])->name('UpdateSlider');
Route::get('/DeleteSlider/{id}', [Slider_ManagementController::class, 'destroy'])->name('DeleteSlider');
Route::post('/merchant/add-slider', [Slider_ManagementController::class, 'store'])->name('AddSlider');

Route::get('/merchant/banner-management', [Banner_ManagementController::class, 'index'])->name('banner-management')->middleware('auth');
Route::post('/UpdateBanner', [Banner_ManagementController::class, 'update'])->name('UpdateBanner');
Route::get('/DeleteBanner/{id}', [Banner_ManagementController::class, 'destroy'])->name('DeleteBanner');
Route::post('/merchant/add-banner', [Banner_ManagementController::class, 'store'])->name('AddBanner');

Route::get('/product-category-management', [Product_Category_ManagementController::class, 'index'])->name('product-category-management')->middleware('auth');
Route::match(['get'], '/category-change-status', [Product_Category_ManagementController::class, 'ChangeStatus'])->name('category-change-status')->middleware('auth');

Route::get('/search-promocode', [Promocode_ManagementController::class, 'search'])->name('search-promocode')->middleware('auth');

Route::get('/merchant/promocode-management', [Promocode_ManagementController::class, 'index'])->name('merchant-promocode-management')->middleware('auth');
Route::match(['get'], '/promocode-change-status', [Promocode_ManagementController::class, 'ChangeStatus'])->name('promocode-change-status')->middleware('auth');
Route::get('/merchant/DeletePromocode/{id}', [Promocode_ManagementController::class, 'destroy'])->name('DeletePromocode');

Route::post('/merchant/UpdatePromocode/{id}', [Promocode_ManagementController::class, 'update'])->name('UpdatePromocode');

Route::post('/merchant/AddPromocode', [Promocode_ManagementController::class, 'store'])->name('AddPromocode');
Route::get('/merchant/PromocodeForm', [Promocode_ManagementController::class, 'promocodeform'])->name('PromocodeForm');
Route::get('/merchant/PromocodeUpdateForm/{id}', [Promocode_ManagementController::class, 'promocodeupdateform'])->name('PromocodeUpdateForm');

//products
Route::get('/product-management', [MerchantProduct_ManagementController::class, 'index'])->name('product-management')->middleware('auth');
Route::get('/add-product', [MerchantProduct_ManagementController::class, 'addProduct'])->name('add-products')->middleware('auth');
Route::get('/edit-product/{id}', [MerchantProduct_ManagementController::class, 'addProduct'])->name('edit-products')->middleware('auth');
Route::get('/delete-product/{id}', [MerchantProduct_ManagementController::class, 'deleteProduct'])->name('delete-products')->middleware('auth');
Route::get('products-import', [MerchantProduct_ManagementController::class, 'importExportView'])->name('file-import')->middleware('auth');
Route::post('file-import', [MerchantProduct_ManagementController::class, 'import'])->name('import')->middleware('auth');
Route::get('file-export', [MerchantProduct_ManagementController::class, 'fileExport'])->name('file-export')->middleware('auth');

Route::get('/order-management', [MerchantOrder_ManagementController::class, 'PendingOrder'])->name('order.management')->middleware('auth');
Route::get('/order-details/{id}', [MerchantOrder_ManagementController::class, 'orderDetails'])->name('order.details')->middleware('auth');
Route::get('/order-approve/{id}', [MerchantOrder_ManagementController::class, 'orderApprove'])->name('order.approve')->middleware('auth');
Route::post('/order-cancell', [MerchantOrder_ManagementController::class, 'orderCancell'])->name('order-cancell')->middleware('auth');
Route::post('/order-cancell-user', [MerchantOrder_ManagementController::class, 'orderCancellByUser'])->name('order-cancell-user')->middleware('auth');
Route::get('/export', [MerchantOrder_ManagementController::class, 'export'])->name('order.export')->middleware('auth');
Route::get('/order-invoice/{id}', [MerchantOrder_ManagementController::class, 'orderInvoice'])->name('order.invoice')->middleware('auth');

// shipping Details
Route::get('/country-manager', [ShippingmentController::class, 'countrymanager'])->name('country.manager')->middleware('auth');
Route::post('/country-manager', [ShippingmentController::class, 'addcountrymanager'])->name('country.manager')->middleware('auth');
Route::get('/country-manager-view', [ShippingmentController::class, 'countrymanagerview'])->name('country.manager.view')->middleware('auth');
Route::get('/country-manager-update/{id}', [ShippingmentController::class, 'countrymanagerupdate'])->name('country.manager.update')->middleware('auth');
Route::post('/country-manager-update', [ShippingmentController::class, 'countrymanagerupdateedit'])->name('country.manager.update')->middleware('auth');
Route::get('/country-manager-delete/{id}', [ShippingmentController::class, 'countrymanagerupdatedelete'])->name('country.manager.delete')->middleware('auth');
Route::get('/shipping-zone', [ShippingmentController::class, 'shippingzone'])->name('shipping.zone')->middleware('auth');
Route::post('/shipping-zone', [ShippingmentController::class, 'shippingzoneinsert'])->name('shipping.zone')->middleware('auth');
Route::get('/shipping-zone-view', [ShippingmentController::class, 'shippingzoneview'])->name('shipping.zone.view')->middleware('auth');
Route::get('/shipping-zone-update/{id}', [ShippingmentController::class, 'shippingzoneupdate'])->name('shipping.zone.update')->middleware('auth');
Route::post('/shipping-zone-update', [ShippingmentController::class, 'shippingzoneupdatedit'])->name('shipping.zone.update')->middleware('auth');
Route::get('/shipping-zone-delete/{id}', [ShippingmentController::class, 'shippingzoneupdatedelete'])->name('shipping.zone.delete')->middleware('auth');
Route::get('/shipping-zone-maping', [ShippingmentController::class, 'shippingzonemaping'])->name('shipping.zone.maping')->middleware('auth');
Route::post('/shipping-zone-maping', [ShippingmentController::class, 'shippingzonemapinginsert'])->name('shipping.zone.maping')->middleware('auth');
Route::get('/shipping-zone-maping-view', [ShippingmentController::class, 'shippingzonemapingview'])->name('shipping.zone.maping.view')->middleware('auth');
Route::get('/shipping-zone-maping-view-update/{id}', [ShippingmentController::class, 'shippingzonemapingupdate'])->name('shipping.zone.maping.view-update')->middleware('auth');
Route::post('/shipping-zone-maping-view-update', [ShippingmentController::class, 'shippingzonemapingupdatedit'])->name('shipping.zone.maping.view-update')->middleware('auth');
Route::get('/shipping-zone-maping-delete/{id}', [ShippingmentController::class, 'shippingzonemapingdelete'])->name('shipping.zone.maping.delete')->middleware('auth');
Route::get('/shipping-configuration', [ShippingmentController::class, 'shippingzonemapingconfiguration'])->name('shipping.configuration')->middleware('auth');
Route::post('/shipping-configuration', [ShippingmentController::class, 'shippingzonemapingconfigurationadd'])->name('shipping.configuration')->middleware('auth');
Route::get('/shipping-configuration-view', [ShippingmentController::class, 'shippingzonemapingconfigurationview'])->name('shipping.configuration-view')->middleware('auth');
Route::get('/shipping-configuration-update/{id}', [ShippingmentController::class, 'shippingzonemapingconfigurationupdate'])->name('shipping.configuration-update')->middleware('auth');
Route::post('/shipping-configuration-update', [ShippingmentController::class, 'shippingzonemapingconfigurationupdatedit'])->name('shipping.configuration-update-sdit')->middleware('auth');
Route::get('/shipping-configuration-delete/{id}', [ShippingmentController::class, 'shippingzonemapingconfigurationupdatedelete'])->name('shipping.configuration-delete')->middleware('auth');
Route::get('/shipping-label', [ShippingmentController::class, 'shippinglabel'])->name('shipping.label')->middleware('auth');
Route::post('/shipping-label', [ShippingmentController::class, 'shippinglabelinsert'])->name('shipping.label.insert')->middleware('auth');
Route::get('/shipping-label-view', [ShippingmentController::class, 'shippinglabelview'])->name('shipping.label.view')->middleware('auth');
Route::get('/shipping-label-update/{id}', [ShippingmentController::class, 'shippinglabelupdate'])->name('shipping.label.update')->middleware('auth');
Route::post('/shipping-label-update', [ShippingmentController::class, 'shippinglabelupdateinsert'])->name('shipping.label.update')->middleware('auth');
Route::get('/shipping-label-delete/{id}', [ShippingmentController::class, 'shippinglabeldelete'])->name('shipping.label.delete')->middleware('auth');
Route::get('/shipping-label-table/{id}', [ShippingmentController::class, 'shippinglabeltable'])->name('shipping.label.table')->middleware('auth');



//payment setting
Route::get('/payment-option', [MerchantPaymentOptionController::class, 'paymentGet'])->name('payment.option')->middleware('auth');
Route::post('/payment-option', [MerchantPaymentOptionController::class, 'paymentOption'])->name('payment.option.form')->middleware('auth');
Route::get('cod-change-status', [MerchantPaymentOptionController::class, 'CODStatus'])->name('cod-status')->middleware('auth');
Route::get('payment-change-status', [MerchantPaymentOptionController::class, 'paymentStatus'])->name('payment-status')->middleware('auth');
Route::get('paypal-option-status', [MerchantPaymentOptionController::class, 'paypalStatus'])->name('paypal-status')->middleware('auth');
Route::get('yoco-option-status', [MerchantPaymentOptionController::class, 'yocoStatus'])->name('yoco-status')->middleware('auth');
Route::get('payfast-option-status', [MerchantPaymentOptionController::class, 'payfastStatus'])->name('payfast-status')->middleware('auth');

//social.link
Route::get('/social-link', [MerchantSocialLinkController::class, 'socialLink'])->name('social.link')->middleware('auth');
Route::post('/social-option-form', [MerchantSocialLinkController::class, 'socialLinkUpdate'])->name('social.option.form')->middleware('auth');

//marketing
Route::get('/marketing-option', [MerchantMarketingController::class, 'Marketing'])->name('marketing')->middleware('auth');
Route::post('/marketing-form', [MerchantMarketingController::class, 'marketingUpdate'])->name('marketing.form')->middleware('auth');




Route::get('/user-management', [User_ManagementController::class, 'index'])->name('user-management')->middleware('auth');

Route::get('/DeleteCategory', [Product_Category_ManagementController::class, 'destroy'])->name('DeleteCategory');

Route::post('/UpdateCategory', [Product_Category_ManagementController::class, 'update'])->name('UpdateCategory');

Route::post('/AddCategory', [Product_Category_ManagementController::class, 'store'])->name('AddCategory');

Route::get('/merchant/blog-management', [Blog_ManagementController::class, 'index'])->name('merchant-blog-management')->middleware('auth');
Route::get('/DeleteBlog', [Blog_ManagementController::class, 'destroy'])->name('DeleteBlog');
Route::match(['get'], '/blog-change-status', [Blog_ManagementController::class, 'ChangeStatus'])->name('blog-change-status')->middleware('auth');
Route::post('/merchant/AddBlog', [Blog_ManagementController::class, 'store'])->name('merchant-addBlog');
Route::get('/merchant/add-blog', [Blog_ManagementController::class, 'blog'])->name('add-blog')->middleware('auth');
Route::get('/merchant/update-blog/{id}', [Blog_ManagementController::class, 'blog'])->name('update-blog')->middleware('auth');
Route::post('/merchant/UpdateBlog', [Blog_ManagementController::class, 'update'])->name('UpdateBlog')->middleware('auth');
Route::post('/merchant/upload-blog', [Blog_ManagementController::class, 'upload'])->name('upload-blog')->middleware('auth');

//Route::get('/GetDetail', [MerchantAccepting_PaymentsController::class, 'GetDetail'])->name('GetDetail');


Route::post('/StoreDetails', [MerchantStore_DetailsController::class, 'store'])->name('StoreDetails');

Route::post('/PlanId', [MerchantStore_DetailsController::class, 'planid'])->name('PlanId');

Route::post('/DomainName', [MerchantStore_DetailsController::class, 'domainname'])->name('DomainName');

Route::get('/DomainName_check', [MerchantStore_DetailsController::class, 'domainNamecheck'])->name('DomainName/DomainNamecheck');

Route::get('/DomainName_Create', [MerchantStore_DetailsController::class, 'domainCreate'])->name('DomainName/DomainNameCreate');

Route::get('/Domain_Detail', [MerchantDomain_DetailController::class, 'domainDetail'])->name('DomainDetail');

Route::get('/Domain_expire', [MerchantDomain_DetailController::class, 'domainCheckExpire'])->name('Domain/DomainExpire
');


Route::post('/LayoutId', [MerchantStore_DetailsController::class, 'layoutid'])->name('LayoutId');

Route::post('/CoverImage', [MerchantStore_DetailsController::class, 'coverimage'])->name('CoverImage');

Route::post('/MerchantAccepting_Payments/store', [MerchantAccepting_PaymentsController::class, 'store'])->name('MerchantAccepting_Payments/store');

Route::post('/MerchantShipping_Information/store', [MerchantShipping_InformationController::class, 'store'])->name('MerchantShipping_Information/store');

Route::post('/MerchantProduct_Management/store', [MerchantProduct_ManagementController::class, 'store'])->name('MerchantProduct_Management/store');

Route::get('/MerchantCms_setting',[MerchantCmssettingController::class,'ViewCmsSetting'])->name('MerchantCms_setting/ViewCmsSetting');

Route::get('/MerchantCms_setting/taxRateSetting',[MerchantCmssettingController::class,'taxRateSetting'])->name('MerchantCms_setting/taxRateSetting');


Route::get('/merchantCms_setting/tax_rate_store',[MerchantCmssettingController::class,'tax_rate_store'])->name('merchantCms_setting.tax_rate_store');


Route::post('/MerchantCms_setting/store',[MerchantCmssettingController::class,'store'])->name('merchantcms_setting/store');

Route::view('/home', "merchent.home" )->name('home');

Route::view('/features', "merchent.features" )->name('features');

Route::view('/plans', "merchent.plans" )->name('plans');
require __DIR__.'/auth.php';

Route::view('/store_details', "merchent.storedetails" )->name('store_details')->middleware('auth');
require __DIR__.'/auth.php';

Route::view('/domain_name', "merchent.domain_name" )->name('domain_name')->middleware('auth');

Route::view('/selectlayout', "merchent.selectlayout" )->name('selectlayout')->middleware('auth');

Route::view('/shipping_information', "merchent.shipping_information" )->name('shipping_information')->middleware('auth');

Route::view('/accepting_payments', "merchent.accepting_payments" )->name('accepting_payments')->middleware('auth');

Route::view('/congratulations', "merchent.congratulations" )->name('congratulations')->middleware('auth');


//Route::view('/dashboard', "merchant-dashboard.index" )->name('dashboard')->middleware('auth');
Route::get('/dashboard',[ShippingmentController::class,'indexload'])->name('dashboard')->middleware('auth');

Route::view('/payment-management', "merchant-dashboard.payment-management" )->name('payment-management')->middleware('auth');

Route::view('/faq', "merchent.faq" )->name('faq');



require __DIR__.'/auth.php';


Route::get('merchents-blog', [MerchentManagementController::class, 'blog_management'])->name('merchents-blog');



// web layouts routes
Route::group(['prefix'=>'user'], function(){

	Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::post('/more_data', 'HomeController@more_data')->name('more_data');

    Route::get('/about', [CMS_ManagementController::class, 'aboutus'] )->name('about');
    Route::get('/contact', [CMS_ManagementController::class, 'contact'] )->name('contact');
    Route::get('/product/{id}', [HomeController::class, 'singleProduct'])->name('product');
    Route::view('/search', "web-layouts.search" )->name('search');
    Route::view('/login', "web-layouts.login" )->name('login');
    Route::view('/register', "web-layouts.register" )->name('register');
    Route::post('/register', [RegisteredUserController::class, 'userStore'])->name('user.register');
    Route::post('/login', [AuthenticatedSessionController::class, 'userLogin'])->name('user.login');
    Route::get('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart.save');
    Route::get('/add-to-wishlist', [WishlistController::class, 'addToWishlist'])->name('add-to-wishlist.save');
    Route::get('/products/{slug}',[HomeController::class, 'products']);
    Route::get('/products',[HomeController::class, 'products'])->name('products');
    Route::post('/change-attribute',[HomeController::class, 'changeAttribute'])->name('change.attribute');
    Route::get('/logout',[HomeController::class, 'Logout'])->name('user.logout')->middleware('auth');
    Route::get('/livesearch',[HomeController::class, 'livesearch'])->name('livesearch');
    Route::post('submitotp', [HomeController::class, 'submitOtp'])->name('submitotp');
    Route::post('product-search', [HomeController::class, 'FormSearch'])->name('FormSearch');
    Route::post('sendotp', [HomeController::class, 'sendotp'])->name('sendotp');
    Route::get('shopping-cart', [CartController::class, 'CartGetData'])->name('shopping.cart');
    Route::get('remove-cart', [CartController::class, 'CartDeleteData'])->name('remove.cart');
    Route::get('wishlist', [WishlistController::class, 'wishlistGet'])->name('wishlist')->middleware('auth');
    Route::get('checkout', [CartController::class, 'CheckoutData'])->name('checkout')->middleware('auth');
    Route::get('remove-wishlist/{id}', [WishlistController::class, 'wishlistRemove'])->name('wishlistRemove')->middleware('auth');
    Route::post('billing-address', [HomeController::class, 'BillingAddress'])->name('billing.address')->middleware('auth');
    Route::get('checkout-process', [CartController::class, 'Sales'])->name('checkout.process')->middleware('auth');
    Route::view('/thank-you', 'web-layouts.order.thankyou')->middleware('auth');
    Route::get('user-profile', [HomeController::class, 'userProfile'])->name('user-profile')->middleware('auth');
    Route::get('user-order', [HomeController::class, 'userOrder'])->name('user-order')->middleware('auth');
    Route::get('user-address-book', [HomeController::class, 'addressBook'])->name('address.book')->middleware('auth');
    Route::post('profile-update', [HomeController::class, 'profileUpdate'])->name('profile.update')->middleware('auth');
    Route::get('address/delete/{id}', [HomeController::class, 'addressBookDelete'])->name('address.book.delete')->middleware('auth');
    Route::get('change/password/', [HomeController::class, 'changePassword'])->name('user.change.password')->middleware('auth');
    Route::post('change/password', [HomeController::class, 'changePasswordForm'])->name('change.password.form')->middleware('auth');
    Route::post('coupon/apply', [HomeController::class, 'couponApplyEnd'])->name('coupon.apply')->middleware('auth');
    Route::get('blog/{url}', [HomeController::class, 'blogDetails'])->name('blog.details');
    Route::get('/blogs/{slug}',[HomeController::class, 'Blogs']);
    Route::get('/blogs',[HomeController::class, 'Blogs'])->name('blogs');
    Route::get('/blog-search',[HomeController::class, 'BlogsSearch'])->name('blog.search');
    Route::post('/product-review',[HomeController::class, 'productReviews'])->name('products.review');
    Route::post('handle-payment', [PayPalPaymentController::class, 'handlePayment'])->name('make.payment')->middleware('auth');
    Route::get('cancel-payment', [PayPalPaymentController::class, 'paymentCancel'])->name('cancel.payment')->middleware('auth');
    Route::get('payment-success', [PayPalPaymentController::class, 'paymentSuccess'])->name('success.payment')->middleware('auth');
    Route::post('yoco-token-save', [PayPalPaymentController::class, 'yocoToken'])->name('yoco.token.save')->middleware('auth');


});


// admin layouts routes
Route::group(['prefix'=>'admin'], function(){

	Route::view('/', 'admin.login')->name('admin');
    Route::Post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'logout'])->middleware('admin');
    Route::get('/profile', [AdminController::class, 'profile'])->middleware('admin');
    Route::view('/change-password', 'admin/change-password')->middleware('admin');
    Route::post('/change-password', [AdminController::class, 'changepassword'])->name('admin.changepassword')->middleware('admin');

    //merchant
    Route::get('merchents', [MerchentManagementController::class, 'index'])->name('merchents')->middleware('admin');
    Route::get('view-merchent/{id}', [MerchentManagementController::class, 'show'])->name('view-merchent')->middleware('admin');
    Route::get('user-change-status', [MerchentManagementController::class, 'changeUserStatus'])->name('user-change-status')->middleware('admin');
    Route::post('delete-merchent/{id}', [MerchentManagementController::class, 'destroy'])->name('delete-merchent');


    //blog route
    Route::get('/blog', [AdminBlogController::class, 'blog_management'])->name('admin.blog')->middleware('admin');
    Route::get('add-blog', [AdminBlogController::class, 'blog'])->name('admin.add.blog')->middleware('admin');
    Route::post('add-blog', [AdminBlogController::class, 'store'])->name('admin.form.add-blog')->middleware('admin');
    Route::get('update-admin-blog/{id}', [AdminBlogController::class, 'blog'])->name('update-admin-blog');
    Route::get('delete-admin-blog{id}', [AdminBlogController::class, 'DeleteBlog'])->name('delete-admin-blog');
    Route::get('/blog-change-status', [AdminBlogController::class, 'BlogChangeStatus'])->name('blog-change-status')->middleware('admin');

    //blog cate route
    Route::get('/category', [AdminBlogController::class, 'CategoryList'])->name('admin.blog.category')->middleware('admin');
    Route::post('add-category', [AdminBlogController::class, 'storeCategory'])->name('admin.form.add-category')->middleware('admin');
    Route::get('/add-category', [AdminBlogController::class, 'category'])->name('admin.blog.add.category')->middleware('admin');
    Route::get('/delete-category/{id}', [AdminBlogController::class, 'DeleteCategory'])->name('delete.blog.category')->middleware('admin');
    Route::get('/update-category/{id}', [AdminBlogController::class, 'category'])->name('admin.blog.update.category')->middleware('admin');
    Route::get('/category-change-status', [AdminBlogController::class, 'ChangeStatus'])->name('category-change-status')->middleware('admin');

    //subcriptions
    Route::get('subcriptions', [SubscriptionController::class, 'index'])->name('subscriptions')->middleware('admin');
    Route::get('add-subcriptions', [SubscriptionController::class, 'add_subscriptions'])->name('add-subscriptions')->middleware('admin');
    Route::post('add-subcriptions', [SubscriptionController::class, 'post_subscription'])->name('add-subscriptions')->middleware('admin');
    Route::post('update-subscriptions/{subscription}', [SubscriptionController::class, 'update_subscriptions'])->name('update-subscriptions')->middleware('admin');
    Route::get('edit-subscriptions/{subscription}', [SubscriptionController::class, 'edit_subscription'])->name('edit-subcriptions')->middleware('admin');
    Route::get('delete-subcription/{subscription}', [SubscriptionController::class, 'delete_subscription'])->name('delete-subscription')->middleware('admin');
    Route::get('subs-list', [SubscriptionController::class, 'get_subs'])->name('subs-list')->middleware('admin');
    Route::get('/subscriptions-change-status', [SubscriptionController::class, 'ChangeStatus'])->name('subscriptions-change-status')->middleware('admin');

    //news letter
    Route::get('newsletter/{type}', [AdminNewsletterController::class, 'index'])->name('admin.newsletter')->middleware('admin');
    Route::post('newsletter', [AdminNewsletterController::class, 'newsLetter'])->name('admin.form.newsletter')->middleware('admin');

    //about page
    Route::get('about', [AdminCmsController::class, 'AboutPage'])->name('admin.about')->middleware('admin');
    Route::post('about-update', [AdminCmsController::class, 'AboutPageUpdate'])->name('admin.about.update')->middleware('admin');
    Route::get('faq', [AdminCmsController::class, 'faqPage'])->name('admin.faq')->middleware('admin');
    Route::get('add-faq', [AdminCmsController::class, 'AddFaq'])->name('admin.add.faq')->middleware('admin');
    Route::get('/delete-faq/{id}', [AdminCmsController::class, 'DeleteFaq'])->name('delete.admin.faq')->middleware('admin');
    Route::post('add-faq', [AdminCmsController::class, 'AddFormFaq'])->name('admin.add.form.faq')->middleware('admin');
    Route::get('/update-faq/{id}', [AdminCmsController::class, 'AddFaq'])->name('update.admin.faq')->middleware('admin');

    //marketing admin and payment option management admin
    Route::get('marketing-admin',[AdminMarketingController::class,'index'])->name('admin.marketing.admin')->middleware('admin');
    Route::get('payment-management-admin',[AdminMarketingController::class,'paymentmanagementadmin'])->name('admin.payment.management.admin')->middleware('admin');
    Route::post('payment-management-admin',[AdminMarketingController::class,'paymentmanagementadminaction'])->name('admin.payment.management.admin')->middleware('admin');
    Route::get('order-status',[AdminMarketingController::class,'orderstatus'])->name('admin.order.status')->middleware('admin');
    Route::post('order-status',[AdminMarketingController::class,'addorder'])->name('admin.order.status')->middleware('admin');
    Route::get('order-status-check',[AdminMarketingController::class,'orderstatuscheck'])->name('admin.order.status.check')->middleware('admin');
    Route::get('order-status-update/{id}',[AdminMarketingController::class,'orderstatusupdate'])->name('admin.order.status.update')->middleware('admin');
    Route::post('order-status-update',[AdminMarketingController::class,'orderstatusupdation'])->name('admin.order.status.update')->middleware('admin');
    Route::get('order-status-delete/{id}',[AdminMarketingController::class,'orderstatusdelete'])->name('admin.order.status.delete')->middleware('admin');
    Route::get('marketing-tools',[AdminMarketingController::class,'marketingtools'])->name('admin.marketing.tools')->middleware('admin');
    Route::post('marketing-tools',[AdminMarketingController::class,'marketingtoolsaction'])->name('admin.marketing.tools')->middleware('admin');
    Route::get('shipping-method',[AdminMarketingController::class,'shippingmethod'])->name('admin.shipping.method')->middleware('admin');



    //term
    Route::get('term-condition', [AdminCmsController::class, 'TermPage'])->name('admin.term')->middleware('admin');
    Route::post('term-update', [AdminCmsController::class, 'TermPageUpdate'])->name('admin.term.update')->middleware('admin');

    //email notification
    Route::get('email-notification', [AdminEmailNotificationController::class, 'index'])->name('admin.email.notification')->middleware('admin');
    Route::get('/new_merchant-change', [AdminEmailNotificationController::class, 'new_merchantStatus'])->name('new_merchant-change')->middleware('admin');
    Route::get('/cancell-change', [AdminEmailNotificationController::class, 'cancellStatus'])->name('cancell-change')->middleware('admin');
    Route::get('/upgraded-change', [AdminEmailNotificationController::class, 'upgradedStatus'])->name('upgraded-change')->middleware('admin');
    Route::get('/trial_expire-change', [AdminEmailNotificationController::class, 'trial_expireStatus'])->name('trial_expire-change')->middleware('admin');
    Route::get('/not_setup-change', [AdminEmailNotificationController::class, 'not_setupStatus'])->name('not_setup-change')->middleware('admin');


    //promo code
    Route::get('promo-code', [PromoCodeController::class, 'promos'])->name('promo-code')->middleware('admin');
    Route::post('add-promo-code',[PromoCodeController::class, 'add_promo_code'])->name('add-promo-code')->middleware('admin');
    Route::put('update-promo-code',[PromoCodeController::class, 'update_promo_code'])->name('update-promo-code')->middleware('admin');
    Route::get('add-promo-code',[PromoCodeController::class, 'promo_code'])->name('add-promo-code')->middleware('admin');
    Route::get('edit-promo-code/{id}',[PromoCodeController::class, 'promo_code_edit'])->name('edit-promo-code')->middleware('admin');
    Route::get('delete-promo-code/{id}',[PromoCodeController::class, 'promo_code_delete'])->name('delete-promo-code')->middleware('admin');
    Route::get('/status-change', [PromoCodeController::class, 'ChangeStatus'])->name('status-change')->middleware('admin');

});
