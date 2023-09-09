<?php

use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NavbarController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MediaUploadController;
use App\Http\Controllers\Admin\PermissionController;


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

Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    dd("cache cleared");
});


Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/', [HomeController::class, 'newHome'])->name('home');
Route::get('/cme-program', [HomeController::class, 'cmeProgram'])->name('cme-program');
Route::get('/medical-equipment', [HomeController::class, 'medicalEquipment'])->name('medical-equipment');
Route::get('/product_detail/{id}', [HomeController::class, 'product_Details'])->name('product_detail');
//Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add.to.cart');
Route::get('/product/cart/{id}', [HomeController::class, 'product_Cart'])->name('product_cart');
Route::get('/shophead', [HomeController::class, 'showHeader'])->name('shophead');

//Route::patch('update-cart', [HomeController::class, 'updateCart'])->name('update.cart');
//Route::delete('remove-from-cart', [HomeController::class, 'removeCartItem'])->name('remove.from.cart');

//
Route::get('cart', [HomeController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [HomeController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [HomeController::class, 'remove'])->name('remove.from.cart');
//Route::get('/e-registration', [HomeController::class, 'contactUS'])->name('e-registration');
//Route::post('/e-registration', [HomeController::class, 'storeRegistration']);
Route::get('checkout', [HomeController::class, 'Checkout'])->name('checkout');
Route::post('checkout', [HomeController::class, 'storeCheckout']);
Route::get('/cart-icon', [HomeController::class, 'getCartIcon'])->name('cart-icon');


Auth::routes();

Route::group([
    'middleware'    => ['auth'],
    'prefix'        => 'admin',
], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //Users Controller
    Route::resource('users', UsersController::class);
    Route::post('get-users',  [UsersController::class, 'getUsers'])->name('admin.getUsers');
    Route::post('get-user', [UsersController::class, 'userDetail'])->name('admin.getUser');
    Route::get('users/delete/{id}',  [UsersController::class, 'destroy'])->name('user-delete');
    Route::post('delete-selected-users',  [UsersController::class, 'DeleteSelectedUsers'])->name('delete-selected-users');
    Route::get('edit-profile/{id}',  [UsersController::class, 'show'])->name('edit-profile');
    Route::get('/profile-setting', [UsersController::class, 'profileSetting'])->name('user.profile');
    Route::post('/profile-setting', [UsersController::class, 'updateProfile'])->name('user.profile');

    //Roles Controller
    Route::resource('roles', RoleController::class);
    Route::post('get-roles',  [RoleController::class, 'getRoles'])->name('admin.getRoles');
    Route::post('get-role', [RoleController::class, 'roleDetail'])->name('admin.getRole');
    Route::get('roles/delete/{id}',  [RoleController::class, 'destroy'])->name('role-delete');
    Route::post('delete-selected-roles',  [RoleController::class, 'DeleteSelectedRoles'])->name('delete-selected-roles');

    //Permission Controller
    Route::resource('permissions', PermissionController::class);
    Route::post('get-permissions',  [PermissionController::class, 'getPermissions'])->name('admin.getPermissions');
    Route::post('get-permission', [PermissionController::class, 'permissionDetail'])->name('admin.getPermission');
    Route::get('permissions/delete/{id}',  [PermissionController::class, 'destroy'])->name('permission-delete');
    Route::post('delete-selected-permissions',  [PermissionController::class, 'DeleteSelectedPermissions'])->name('delete-selected-permissions');

    //Logs Controller
    Route::resource('logs', LogController::class);
    Route::post('get-log', [LogController::class, 'logDetail'])->name('admin.getLog');
    Route::get('log/delete/{id}',  [LogController::class, 'destroy'])->name('log-delete');
    Route::post('delete-selected-logs',  [LogController::class, 'DeleteSelectedLogs'])->name('delete-selected-logs');

    //Gallery Controller
    Route::get('/gallery2', [GalleryController::class, 'gallery']);

    Route::resource('gallery', GalleryController::class);
    Route::post('get-gallery', [GalleryController::class, 'getGallery'])->name('admin.getGallery');
    Route::get('gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery-delete');
    Route::post('delete-selected-gallery', [GalleryController::class, 'deleteSelectedGallery'])->name('delete-selected-gallery');
    //Service Controller
    Route::get('/service2', [ServiceController::class, 'service']);

    Route::resource('service', ServiceController::class);
    Route::post('get-service', [ServiceController::class, 'getService'])->name('admin.getService');
    Route::get('service/delete/{id}', [ServiceController::class, 'destroy'])->name('service-delete');
    Route::post('delete-selected-service', [ServiceController::class, 'deleteSelectedService'])->name('delete-selected-service');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');

    //ProductController
    Route::get('/product2',[ProductController::class.'product']);

    Route::resource('product', ProductController::class);
    Route::post('get-products', [ProductController::class, 'getProducts'])->name('admin.getProducts');
    Route::post('get-products', [ProductController::class, 'productDetail'])->name('admin.getProducts');
    Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');
    Route::post('delete-selected-product', [ProductController::class, 'deleteSelectedProduct'])->name('delete-selected-product');
    Route::get('/products', [ProductController::class, 'index'])->name('products');

    //SliderController
    Route::get('/order2',[OrderController::class.'product']);

    Route::resource('order', OrderController::class);
    Route::post('get-orders', [OrderController::class, 'getOrders'])->name('admin.getOrders');
    Route::post('get-orders', [OrderController::class, 'orderDetail'])->name('admin.getOrders');
    Route::get('order/delete/{id}', [OrderController::class, 'destroy'])->name('order-delete');
    Route::post('delete-selected-order', [OrderController::class, 'deleteSelectedOrder'])->name('delete-selected-order');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');


    //SliderController
    Route::get('/navbar2',[NavbarController::class.'navbar']);

    Route::resource('navbar', NavbarController::class);
    Route::post('get-navbars', [NavbarController::class, 'getNavbars'])->name('admin.getNavbars');
//    Route::post('get-navbars', [NavbarController::class, 'navbarDetail'])->name('admin.getNavbars');
    Route::post('get-navbar-detail', [NavbarController::class, 'navbarDetail'])->name('admin.getNavbarDetail');
    Route::get('navbar/delete/{id}', [NavbarController::class, 'destroy'])->name('navbar-delete');
    Route::post('delete-selected-navbar', [NavbarController::class, 'deleteSelectedNavbar'])->name('delete-selected-navbar');
    Route::get('/navbars', [NavbarController::class, 'index'])->name('navbars');

//    Route::get('/pdfs', [PDFController::class, 'index'])->name('pdf.index');

//    Route::get('/pdfs2',[PDFController::class.'pdf']);
    Route::get('/pdfs', [PDFController::class, 'index'])->name('pdf.index');
    Route::resource('pdf', PDFController::class);
    Route::post('get-pdfs', [PDFController::class, 'getPdfs'])->name('admin.getPdfs');
    Route::post('get-pdfs', [PDFController::class, 'pdfDetail'])->name('admin.getPdfs');
    Route::get('pdf/delete/{id}', [PDFController::class, 'destroy'])->name('pdf-delete');
    Route::post('delete-selected-pdf', [PDFController::class, 'deleteSelectedPdf'])->name('delete-selected-pdf');
//    Route::get('/pdf', [PDFController::class, 'index'])->name('pdf');

    //SliderController
    Route::get('/slider2', [SliderController::class, 'service']);

    Route::resource('slider', SliderController::class);
    Route::post('get-slider', [SliderController::class, 'getSlider'])->name('admin.getSlider');
    Route::get('slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider-delete');
    Route::post('delete-selected-slider', [SliderController::class, 'deleteSelectedSlider'])->name('delete-selected-slider');

    //general settings
    Route::get('/general-settings/site-identity', [GeneralSettingsController::class, 'site_identity'])->name('admin.general.site.identity');
    Route::post('/general-settings/site-identity', [GeneralSettingsController::class, 'update_site_identity']);

    Route::get('/general-settings/pdf', [GeneralSettingsController::class, 'pdf'])->name('admin.general.pdf');
    Route::post('/general-settings/pdf', [GeneralSettingsController::class, 'update_pdf']);

    Route::get('/general-settings/basic-settings', [GeneralSettingsController::class, 'basic_settings'])->name('admin.general.basic.settings');
    Route::post('/general-settings/basic-settings', [GeneralSettingsController::class, 'update_basic_settings']);
    //smtp settings
    Route::get('/general-settings/smtp-settings', [GeneralSettingsController::class, 'smtp_settings'])->name('admin.general.smtp.settings');
    Route::post('/general-settings/smtp-settings', [GeneralSettingsController::class, 'update_smtp_settings']);

    //general settings
    Route::get('/section/slider', [GeneralSettingsController::class, 'slider'])->name('admin.general.slider');
    Route::post('/section/slider', [GeneralSettingsController::class, 'update_slider']);
    Route::get('/section/message', [GeneralSettingsController::class, 'message'])->name('admin.general.message');
    Route::post('/section/message', [GeneralSettingsController::class, 'update_message']);
    Route::get('/section/service',[GeneralSettingsController::class, 'service'])->name('admin.general.service');
    Route::post('/section/service', [GeneralSettingsController::class, 'update_service']);
    Route::get('/section/footer',[GeneralSettingsController::class, 'footer'])->name('admin.general.footer');
    Route::post('/section/footer', [GeneralSettingsController::class, 'update_footer']);


    /* media upload routes */
    Route::post('/media-upload/all', [MediaUploadController::class, 'all_upload_media_file'])->name('admin.upload.media.file.all');
    Route::post('/media-upload', [MediaUploadController::class, 'upload_media_file'])->name('admin.upload.media.file');
    Route::post('/media-upload/pdf', [MediaUploadController::class, 'uploadPdfFile'])->name('admin.upload.pdf.file');
    Route::post('/media-upload/delete', [MediaUploadController::class, 'delete_upload_media_file'])->name('admin.upload.media.file.delete');

});
