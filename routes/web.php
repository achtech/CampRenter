<?php

use App\Http\Controllers\frontend\FCamperController;
use App\Http\Controllers\frontend\FClientController;
use App\Http\Controllers\frontend\FContactController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FC_CamperController;
use App\Http\Controllers\frontend\FC_messageController;
use App\Http\Controllers\frontend\FC_notificationController;
use App\Http\Controllers\frontend\FC_bookingController;
use App\Http\Controllers\frontend\FC_walletController;
use App\Http\Controllers\frontend\FC_reviewController;
use App\Http\Controllers\frontend\FBlogController;

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

Route::get('lang/{lang}', function ($lang) {
    \Session::put('locale', $lang);
    $user = User::find(auth()->user() ? auth()->user()->id : 0);
    if ($user) {
        $user->lang = $lang;
        $user->update();
    }
    return back();
});
Route::group(['middleware' => 'Lang'], function () {
    /** Frontend */
    Route::get('/', 'App\Http\Controllers\frontend\FHomeController@index')->name('home.index');
    Route::get('/profile', 'App\Http\Controllers\frontend\FUserController@index')->name('clients.user.profile');
    Route::get('/fcamper', 'App\Http\Controllers\frontend\FCamperController@index')->name('frontend.camper');
    //Route::get('/signUp', [ClientController::class, 'sign_up'])->name('client.index');
    Route::post('/storeClient', [FClientController::class, 'store'])->name('frontend.client.store');
    Route::resource('client', FClientController::class, ['except' => ['destroy', 'store'], 'names' => [
        'index' => 'client.index',
        'show' => 'frontend.client.show',
    ]]);
    Route::get('/rentout', [FCamperController::class, 'rent_out'])->name('rent_out');
    Route::get('/rentoutdetails', [FCamperController::class, 'rent_out_details'])->name('rent_out_details');
    Route::get('/contact', [FContactController::class, 'index'])->name('contact');
    Route::get('/terms', [FContactController::class, 'terms'])->name('terms');
    Route::get('/disclaimer', [FContactController::class, 'disclaimer'])->name('disclaimer');
    Route::get('/imprint', [FContactController::class, 'imprint'])->name('imprint');
    Route::get('/help', [FContactController::class, 'help'])->name('help');
    Route::post('signIn', 'App\Http\Controllers\frontend\FClientController@doLogin')->name('signIn');
    Route::get('auth/facebook', [FClientController::class, 'redirectToFacebook']);
    Route::get('auth/facebook/callback', 'App\Http\Controllers\frontend\FClientController@handleFacebookCallback');
    Route::post('/signUp', [FClientController::class, 'sign_up']);
    Route::get('/blog', [FBlogController::class, 'index'])->name('frontend.blog');
    Route::get('blog/{id}/detail', [FBlogController::class, 'show'])->name('frontend.blog.fdetail');
    Route::get('blog/search', [FBlogController::class, 'search'])->name('frontend.blog.search');

    /************* Clients FrentEnd **********************/
    Route::get('/camper_client', [FC_CamperController::class, 'index'])->name('frontend.clients.camper');
    Route::get('/message_client', [FC_messageController::class, 'index'])->name('frontend.clients.message');
    Route::get('/detail_message_client', [FC_messageController::class, 'show'])->name('frontend.clients.message.detail');
    Route::get('/notification_client', [FC_notificationController::class, 'index'])->name('frontend.clients.notification');
    Route::get('/booking_client', [FC_bookingController::class, 'index'])->name('frontend.clients.booking');
    Route::get('/wallet_client', [FC_walletController::class, 'index'])->name('frontend.clients.wallet');
    Route::get('/review_client', [FC_reviewController::class, 'index'])->name('frontend.clients.review');
    Route::get('/search_camper_client', [FC_CamperController::class, 'show'])->name('frontend.camper.search');
    Route::get('/details_camper_client', [FC_CamperController::class, 'detail'])->name('frontend.camper.detail');

    /** Backend */
    Route::get('/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('dashboard');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::get('/dashboard', function () {
        if (auth()->user() == null) {
            return view('/auth/login');
        } else {
            return redirect(route('dashboard'));
        }
    });

    Route::get('/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('dashboard');
    Route::get('/confirm/{id}', 'App\Http\Controllers\admin\DashboardController@confirmCamper')->name('dashboard.confirm');
    //Route::get('/lastBookings', 'App\Http\Controllers\admin\DashboardController@getLastBookings')->name('dashboard');

    //ADMIN->USER
    Route::get('user/updateProfile', 'App\Http\Controllers\admin\UserController@updateProfile')->name('user.updateProfile');
    Route::PUT('user/updateDataProfile', 'App\Http\Controllers\admin\UserController@updateDataProfile')->name('user.updateDataProfile');
    Route::get('user/changePassword', 'App\Http\Controllers\admin\UserController@changePassword')->name('user.changePassword');
    Route::PUT('user/updatePassword', 'App\Http\Controllers\admin\UserController@updatePassword')->name('user.updatePassword');

    Route::get('user/userprofile', 'App\Http\Controllers\admin\UserController@profile')->name('user.profile');
    Route::delete('user/{id}/delete', 'App\Http\Controllers\admin\UserController@destroy')->name('user.delete');
    Route::resource('user', 'App\Http\Controllers\admin\UserController', ['except' => 'destroy', 'names' => [
        'index' => 'user.index',
        'create' => 'user.create',
        'update' => 'user.update',
        'edit' => 'user.edit',
        'store' => 'user.store',
        'show' => 'user.show',
    ]]);

    //ADMIN -> Blog
    Route::delete('blog/{id}/delete', 'App\Http\Controllers\admin\BlogController@destroy')->name('admin.blog.delete');
    Route::resource('admin/blog', 'App\Http\Controllers\admin\BlogController', ['except' => 'destroy', 'names' => [
        'index' => 'admin.blog.index',
        'create' => 'admin.blog.create',
        'update' => 'admin.blog.update',
        'edit' => 'admin.blog.edit',
        'store' => 'admin.blog.store',
        'show' => 'admin.blog.show',
    ]]);

    //ADMIN->CLIENT
    Route::get('client/{id}/blockActivateClient', 'App\Http\Controllers\admin\ClientController@blockActivateClient')->name('client.blockActivateClient');
    Route::delete('client/{id}/delete', 'App\Http\Controllers\admin\ClientController@destroy')->name('client.delete');
    Route::get('client/{id}/detail', 'App\Http\Controllers\admin\ClientController@detail')->name('client.detail');
    Route::get('client/{id}/campers', 'App\Http\Controllers\admin\ClientController@clientCampers')->name('client.campers');
    Route::get('client/{id}/bookings', 'App\Http\Controllers\admin\ClientController@clientBookings')->name('client.bookings');
    Route::get('client/{id}/camperDetail', 'App\Http\Controllers\admin\ClientController@checkCamperDetail')->name('client.camperDetail');
    Route::get('client/{id}/rentDetail', 'App\Http\Controllers\admin\ClientController@checkBookingDetail')->name('client.rentDetail');

    Route::resource('client', 'App\Http\Controllers\admin\ClientController', ['except' => 'destroy', 'names' => [
        'index' => 'admin.client.index',
        'create' => 'admin.client.create',
        'update' => 'admin.client.update',
        'store' => 'admin.client.store',
        'show' => 'admin.client.show',
    ]]);

    //ADMIN->EQUIPMENT
    Route::get('camper/{id}/reviews', 'App\Http\Controllers\admin\CamperController@reviews')->name('camper.reviews');
    Route::get('camper/{id}/confirm', 'App\Http\Controllers\admin\CamperController@confirm')->name('camper.confirm');
    Route::get('camper/{id}/detail', 'App\Http\Controllers\admin\CamperController@detail')->name('camper.detail');
    Route::delete('camper/{id}/delete', 'App\Http\Controllers\admin\CamperController@destroy')->name('camper.delete');
    Route::get('camper/unconfirmedCamper', 'App\Http\Controllers\admin\CamperController@getUnconfirmedCampers')->name('camper.unconfirmedCamper');
    Route::resource('camper', 'App\Http\Controllers\admin\CamperController', ['except' => 'destroy', 'names' => [
        'index' => 'camper.index',
        'create' => 'camper.create',
        'update' => 'camper.update',
        'edit' => 'camper.edit',
        'store' => 'camper.store',
        'show' => 'camper.show',
    ]]);

    Route::get('camper/{id}/blockActivateCamper', 'App\Http\Controllers\admin\CamperController@blockActivateCamper')->name('camper.blockActivateCamper');
    Route::get('camper/{id}/detailBooking', 'App\Http\Controllers\admin\CamperController@detailBooking')->name('camper.detailBooking');
    Route::get('camper/{id}/detailCamper', 'App\Http\Controllers\admin\CamperController@detailCamper')->name('camper.detailCamper');
    Route::get('camper/{id}/detail', 'App\Http\Controllers\admin\CamperController@detail')->name('camper.detail');
    Route::delete('camper/{id}/delete', 'App\Http\Controllers\admin\CamperController@destroy')->name('camper.delete');
    Route::resource('camper', 'App\Http\Controllers\admin\CamperController', ['except' => 'destroy', 'names' => [
        'index' => 'camper.index',
        'create' => 'camper.create',
        'update' => 'camper.update',
        'edit' => 'camper.edit',
        'store' => 'camper.store',
        'show' => 'camper.show',
    ]]);

    //ADMIN->INSURANCE
    Route::delete('insurance/{id}/delete', 'App\Http\Controllers\admin\InsuranceController@destroy')->name('insurance.delete');
    Route::resource('insurance', 'App\Http\Controllers\admin\InsuranceController', ['except' => 'destroy', 'names' => [
        'index' => 'insurance.index',
        'create' => 'insurance.create',
        'update' => 'insurance.update',
        'edit' => 'insurance.edit',
        'store' => 'insurance.store',
        'show' => 'insurance.show',
    ]]);

    //ADMIN->INSURANCE
    Route::delete('insuranceCompany/{id}/delete', 'App\Http\Controllers\admin\InsuranceCompanyController@destroy')->name('insuranceCompany.delete');
    Route::resource('insuranceCompany', 'App\Http\Controllers\admin\InsuranceCompanyController', ['except' => 'destroy', 'names' => [
        'index' => 'insuranceCompany.index',
        'create' => 'insuranceCompany.create',
        'update' => 'insuranceCompany.update',
        'edit' => 'insuranceCompany.edit',
        'store' => 'insuranceCompany.store',
        'show' => 'insuranceCompany.show',
    ]]);

    //ADMIN->COMIMSSION
    Route::get('commission/{id}/delete', 'App\Http\Controllers\admin\CommissionController@destroy')->name('commission.destroy');
    Route::resource('commission', 'App\Http\Controllers\admin\CommissionController', ['except' => 'destroy', 'names' => [
        'index' => 'commission.index',
        'create' => 'commission.create',
        'update' => 'commission.update',
        'edit' => 'commission.edit',
        'store' => 'commission.store',
        'show' => 'commission.show',
    ]]);

    Route::delete('promotion/{id}/delete', 'App\Http\Controllers\admin\PromotionController@destroy')->name('promotion.delete');
    Route::get('promotion/{id}/activate', 'App\Http\Controllers\admin\PromotionController@activate')->name('promotion.activate');
    Route::resource('promotion', 'App\Http\Controllers\admin\PromotionController', ['except' => 'destroy', 'names' => [
        'index' => 'promotion.index',
        'create' => 'promotion.create',
        'update' => 'promotion.update',
        'edit' => 'promotion.edit',
        'store' => 'promotion.store',
        'show' => 'promotion.show',
    ]]);
    //ADMIN->PROMOTION
    Route::resource('promotion', 'App\Http\Controllers\admin\PromotionController', ['except' => 'destroy', 'names' => [
        'index' => 'promotion.index',
        'create' => 'promotion.create',
        'update' => 'promotion.update',
        'edit' => 'promotion.edit',
        'store' => 'promotion.store',
        'show' => 'promotion.show',
    ]]);

    //ADMIN->AVATAR
    Route::delete('avatar/{id}/delete', 'App\Http\Controllers\admin\AvatarController@destroy')->name('avatar.delete');
    Route::resource('avatar', 'App\Http\Controllers\admin\AvatarController', ['except' => 'destroy', 'names' => [
        'index' => 'avatar.index',
        'create' => 'avatar.create',
        'update' => 'avatar.update',
        'edit' => 'avatar.edit',
        'store' => 'avatar.store',
        'show' => 'avatar.show',
    ]]);

    //ADMIN->FUEL
    Route::delete('fuel/{id}/delete', 'App\Http\Controllers\admin\FuelController@destroy')->name('fuel.delete');
    Route::resource('fuel', 'App\Http\Controllers\admin\FuelController', ['except' => 'destroy', 'names' => [
        'index' => 'fuel.index',
        'create' => 'fuel.create',
        'update' => 'fuel.update',
        'edit' => 'fuel.edit',
        'store' => 'fuel.store',
        'show' => 'fuel.show',
    ]]);

    //ADMIN->LICENCECATEGORIES
    Route::delete('licenceCategory/{id}/delete', 'App\Http\Controllers\admin\LicenceCategoryController@destroy')->name('licenceCategory.delete');
    Route::resource('licenceCategory', 'App\Http\Controllers\admin\LicenceCategoryController', ['except' => 'destroy', 'names' => [
        'index' => 'licenceCategory.index',
        'create' => 'licenceCategory.create',
        'update' => 'licenceCategory.update',
        'edit' => 'licenceCategory.edit',
        'store' => 'licenceCategory.store',
        'show' => 'licenceCategory.show',
    ]]);

    //ADMIN->TRANSMISSION
    Route::delete('transmission/{id}/delete', 'App\Http\Controllers\admin\TransmissionController@destroy')->name('transmission.delete');
    Route::resource('transmission', 'App\Http\Controllers\admin\TransmissionController', ['except' => 'destroy', 'names' => [
        'index' => 'transmission.index',
        'create' => 'transmission.create',
        'update' => 'transmission.update',
        'edit' => 'transmission.edit',
        'store' => 'transmission.store',
        'show' => 'transmission.show',
    ]]);

    //ADMIN->EQUIPMENTCATEGORY
    Route::delete('camperCategory/{id}/delete', 'App\Http\Controllers\admin\CamperCategoryController@destroy')->name('camperCategory.delete');
    Route::resource('camperCategory', 'App\Http\Controllers\admin\CamperCategoryController', ['except' => 'destroy', 'names' => [
        'index' => 'camperCategory.index',
        'create' => 'camperCategory.create',
        'update' => 'camperCategory.update',
        'edit' => 'camperCategory.edit',
        'store' => 'camperCategory.store',
        'show' => 'camperCategory.show',
    ]]);

    //ADMIN->BOOKING
    Route::get('booking/{id}/delete', 'App\Http\Controllers\admin\Bookingcontroller@destroy')->name('booking.destroy');
    Route::get('booking/{id}/detail', 'App\Http\Controllers\admin\Bookingcontroller@detail')->name('booking.detail');
    Route::get('booking/search', 'App\Http\Controllers\admin\Bookingcontroller@search')->name('booking.search');
    Route::get('booking/{id}/chat', 'App\Http\Controllers\admin\Bookingcontroller@chat')->name('booking.chat');
    Route::resource('booking', 'App\Http\Controllers\admin\BookingController', ['except' => 'destroy', 'names' => [
        'index' => 'booking.index',
        'create' => 'booking.create',
        'update' => 'booking.update',
        'edit' => 'booking.edit',
        'store' => 'booking.store',
        'show' => 'booking.show',
    ]]);

    Route::get('applyFilter', 'App\Http\Controllers\admin\BillingController@filter')->name('applyFilter');
    Route::get('excel-export', 'App\Http\Controllers\admin\BillingController@export')->name('excel-export');
    Route::get('billing/{id}/bookings', 'App\Http\Controllers\admin\BillingController@bookings')->name('billing.bookings');

    Route::resource('billing', 'App\Http\Controllers\admin\BillingController', ['except' => 'destroy', 'names' => [
        'index' => 'billing.index',
        'create' => 'billing.create',
        'update' => 'billing.update',
        'edit' => 'billing.edit',
        'store' => 'billing.store',
        'show' => 'billing.show',
    ]]);
    //ADMIN->INSURANCECOMPANY
    Route::delete('inssuranceCompany/{id}/delete', 'App\Http\Controllers\admin\InsuranceCompanyController@destroy')->name('inssuranceCompany.delete');
    Route::resource('inssuranceCompany', 'App\Http\Controllers\admin\InsuranceCompanyController', ['except' => 'destroy', 'names' => [
        'index' => 'inssuranceCompany.index',
        'create' => 'inssuranceCompany.create',
        'update' => 'inssuranceCompany.update',
        'edit' => 'inssuranceCompany.edit',
        'store' => 'inssuranceCompany.store',
        'show' => 'inssuranceCompany.show',
    ]]);

    //ADMIN->MESSAGE
    Route::delete('message/{id}/delete', 'App\Http\Controllers\admin\MessageController@destroy')->name('message.delete');
    Route::get('message/sendEmail', 'App\Http\Controllers\admin\MessageController@sendEmail')->name('message.sendEmail');
    Route::resource('message', 'App\Http\Controllers\admin\MessageController', ['except' => 'destroy', 'names' => [
        'index' => 'message.index',
        'store' => 'message.store',
        'show' => 'message.show',
    ]]);
    //ADMIN->BACKUP
    Route::delete('backup/{id}/delete', ['BackupController', 'destroy'])->name('backup.delete');
    Route::get('backup/{id}/download', 'App\Http\Controllers\admin\BackupController@download')->name('backup.download');

    Route::resource('backup', 'App\Http\Controllers\admin\BackupController', ['except' => 'destroy', 'names' => [
        'index' => 'backup.index',
        'store' => 'backup.store',
        'show' => 'backup.show',
    ]]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
