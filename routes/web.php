<?php

use App\Http\Controllers\frontend\FBlogController;
use App\Http\Controllers\frontend\FCamperController;
use App\Http\Controllers\frontend\FClientController;
use App\Http\Controllers\frontend\FContactController;
use App\Http\Controllers\frontend\FC_bookingController;
use App\Http\Controllers\frontend\FC_bookmarkController;
use App\Http\Controllers\frontend\FC_CamperController;
use App\Http\Controllers\frontend\FC_messageController;
use App\Http\Controllers\frontend\FC_notificationController;
use App\Http\Controllers\frontend\FC_rentOutController;
use App\Http\Controllers\frontend\FC_reviewController;
use App\Http\Controllers\frontend\FC_walletController;
use App\Http\Controllers\frontend\FUserController;
use App\Http\Controllers\frontend\SocialController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

//** Stripe */
Route::get('stripe-payment', [\App\Http\Controllers\StripeController::class, 'handleGet']);
Route::post('stripe-payment', [\App\Http\Controllers\StripeController::class, 'handlePost'])->name('stripe.payment');

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
    //    login
    Route::get('/showlogin/client', [\App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('frontend.client.show_login');;
    Route::post('/showlogin/client', [\App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
    /** Frontend */

    Route::get('/', 'App\Http\Controllers\frontend\FHomeController@index')->name('home.index');
    Route::get('/profile', 'App\Http\Controllers\frontend\FUserController@index')->name('clients.user.profile');
    Route::get('/fcamper', 'App\Http\Controllers\frontend\FCamperController@index')->name('frontend.camper');

    Route::post('/client/profil/update', [FClientController::class, 'userUpdateClient'])->name('frontend.client.updateData');
    Route::post('/client/changePassword', [FClientController::class, 'changePassword'])->name('frontend.client.change_password');
    Route::post('/storeClient', [FClientController::class, 'store'])->name('frontend.client.store');
    Route::get('/login/ShowResetPassword', [FClientController::class, 'ShowResetPassword'])->name('frontend.client.showresetpassword');
    Route::get('/showRegister', [FClientController::class, 'showRegister'])->name('frontend.client.show_register');
    Route::post('/resetPassword', [FClientController::class, 'resetPassword'])->name('frontend.client.resetPassword');
    Route::get('/editPass', [FClientController::class, 'edit'])->name('frontend.client.editClient');
    Route::put('/updateClient', [FClientController::class, 'updatePassword'])->name('frontend.client.updatePassword');
    //Route::get('/account', 'App\Http\Controllers\frontend\FClientController@checkProfile')->name('frontend.client.profil');
    Route::get('/rentout', [FC_rentOutController::class, 'index'])->name('rent_out');
    Route::get('/personnalData', [FCamperController::class, 'personnalData'])->name('personnalData');
    Route::get('/slidecamper', [FCamperController::class, 'slide_camper'])->name('slide_camper');
    Route::get('/campersteps', [FCamperController::class, 'camper_steps'])->name('camper_steps');
    Route::get('/fillinvehicle', [FC_rentOutController::class, 'fill_in_vehicle'])->name('fill_in_vehicle');
    Route::get('/equipment', [FCamperController::class, 'equipment'])->name('equipment');
    Route::get('/accessories', [FCamperController::class, 'accessories'])->name('accessories');
    Route::get('/description', [FCamperController::class, 'description'])->name('description');
    Route::get('/insurance_front', [FCamperController::class, 'insurance'])->name('insurance_front');
    Route::get('/rental_terms', [FCamperController::class, 'rental_terms'])->name('rental_terms');
    Route::get('/conditions', [FCamperController::class, 'conditions'])->name('conditions');
    Route::get('/calendar', [FCamperController::class, 'calendar'])->name('calendar');
    Route::get('/contact', [FContactController::class, 'index'])->name('contact');
    Route::get('/terms', [FContactController::class, 'terms'])->name('terms');
    Route::get('/disclaimer', [FContactController::class, 'disclaimer'])->name('disclaimer');
    Route::get('/imprint', [FContactController::class, 'imprint'])->name('imprint');
    Route::get('/help', [FContactController::class, 'help'])->name('help');
    Route::post('/ajax/selectedAvatar', [FUserController::class, 'selectedAvatar'])->name('frontend.avatar.select');
    //Route::group(['prefix' => 'client', 'middleware' => 'client'], function () {
    //Route::prefix('/client')->namespace('frontend')->group(function () {
    // Route::post('login', 'App\Http\Controllers\frontend\FClientController@login');
    //});
    Route::post('/store_personnal_data', [FC_rentOutController::class, 'store2'])->name('frontend.camper.storePersonnalData');
    Route::post('/store_camper_profile', [FC_rentOutController::class, 'storeCamperProfile'])->name('frontend.camper.storeCamperProfile');

    Route::get('/login/client', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm')->name('frontend.login.client');;
    Route::post('/login/client', 'App\Http\Controllers\Auth\LoginController@adminLogin');
    Route::get('auth/facebook', [FClientController::class, 'redirectToFacebook']);
    Route::get('auth/facebook/callback', 'App\Http\Controllers\frontend\FClientController@handleFacebookCallback');

    Route::get('auth/google', [FClientController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [FClientController::class, 'handleGoogleCallback']);

    Route::post('/signUp', [FClientController::class, 'sign_up']);
    Route::get('/blog', [FBlogController::class, 'index'])->name('frontend.blog');
    Route::get('blog/{id}/detail', [FBlogController::class, 'show'])->name('frontend.blog.fdetail');
    Route::get('blog/search', [FBlogController::class, 'search'])->name('frontend.blog.search');
    Route::post('blog/storeComment', [FBlogController::class, 'store'])->name('frontend.blog.storeComment');

    /************* Clients FrentEnd **********************/
    Route::get('/camper/search', [FC_CamperController::class, 'search'])->name('frontend.camper.search');
    Route::get('/camper/search/category/{id}', [FC_CamperController::class, 'searchByCategory'])->name('frontend.camper.searchByCategory');
    Route::get('/camper_client', [FC_CamperController::class, 'index'])->name('frontend.clients.camper');
    Route::get('/message_client', [FC_messageController::class, 'index'])->name('frontend.clients.message');
    Route::get('/message_client/detail/{id}', [FC_messageController::class, 'show'])->name('frontend.clients.message.detail');
    Route::post('/message_client/register', [FC_messageController::class, 'store'])->name('frontend.chat.register_chat');
    Route::get('/notification_client', [FC_notificationController::class, 'index'])->name('frontend.clients.notification');
    Route::get('/booking_client', [FC_bookingController::class, 'index'])->name('frontend.clients.booking');
    Route::post('/send_invoice_client', [FC_messageController::class, 'sendInvoice'])->name('frontend.clients.send.invoice');

    Route::get('/wallet_client', [FC_walletController::class, 'index'])->name('frontend.clients.wallet');

    Route::get('/review_client', [FC_reviewController::class, 'index'])->name('frontend.clients.review');
    Route::get('/review_helpfulReview/{id}', [FC_reviewController::class, 'helpfulReview'])->name('frontend.clients.review.helpfulReview');
    Route::post('/review_addReview', [FC_reviewController::class, 'addReview'])->name('frontend.clients.review.addReview');
    Route::get('/camper/detail/client/{id}', [FC_CamperController::class, 'detail'])->name('frontend.camper.detail');
    Route::get('/details_booking_paiement', [FC_CamperController::class, 'bookingPaiement'])->name('frontend.camper.booking_paiement');
    Route::get('/bookmark_client', [FC_bookmarkController::class, 'index'])->name('frontend.clients.bookmark');
    Route::post('/ajax/addBookmarks', [FC_bookmarkController::class, 'addOrRemove'])->name('frontend.camper.add_bookmark');
    Route::get('/ajax/rentByCategory/{id}', [FC_rentOutController::class, 'rentByCategory'])->name('rent_out_by_category');
    Route::get('/bookmark/{id}/delete', [FC_bookmarkController::class, 'removeFromBookMark'])->name('frontend.bookmark.delete');
    Route::post('/camper/request_booking/{id}', [FC_bookingController::class, 'requestBooking'])->name('frontend.add_request_booking');
    Route::post('/storeMessage', [FContactController::class, 'store'])->name('frontend.contact.store');
    Route::get('/client/notification/detail/{id}', [FC_notificationController::class, 'show'])->name('frontend.clients.notification.detail');
    Route::get('/booking/booking_owner/detail/{id}', [FC_bookingController::class, 'detailBookingOwner'])->name('booking.owner_booking.detail');
    Route::get('/booking/booking_owner/confirm/{id}', [FC_bookingController::class, 'confirmBookingOwner'])->name('booking.owner_booking.confirm');
    Route::get('/booking/booking_owner/reject/{id}', [FC_bookingController::class, 'rejectBookingOwner'])->name('booking.owner_booking.reject');
    Route::get('/booking/booking_renter/process/{id}', [FC_bookingController::class, 'processBookingRenter'])->name('booking.renter_booking.process');
    Route::get('/message_client/add/{id}', [FC_messageController::class, 'addMessage'])->name('frontend.booking.add_message');
    Route::get('/review/owner/feedback/{id}', [FC_reviewController::class, 'feedback'])->name('frontend.review.add_feedback');
    Route::get('/review/owner/edit/{id}', [FC_reviewController::class, 'editReview'])->name('frontend.review.edit_review');

    /** Backend */
    Route::get('/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('dashboard');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    //Route::get('/logoutC', '\App\Http\Controllers\Auth\LoginController@clientLogout')->name('client.logout');
    Route::post('/logoutC', '\App\Http\Controllers\Auth\LoginController@logout')->name('client.logout');
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
    Route::delete('camperSubCategory/{id}/delete', 'App\Http\Controllers\admin\CamperSubCategoryController@destroy')->name('camperSubCategory.delete');
    Route::resource('camperSubCategory', 'App\Http\Controllers\admin\CamperSubCategoryController', ['except' => 'destroy', 'names' => [
        'index' => 'camperSubCategory.index',
        'create' => 'camperSubCategory.create',
        'update' => 'camperSubCategory.update',
        'edit' => 'camperSubCategory.edit',
        'store' => 'camperSubCategory.store',
        'show' => 'camperSubCategory.show',
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
    Route::post('message/sendEmail', 'App\Http\Controllers\admin\MessageController@sendEmail')->name('message.sendEmail');
    Route::get('/answerClient/{id}', 'App\Http\Controllers\admin\MessageController@sendEmailToClient')->name('message.sendEmailToClient');
    Route::resource('message', 'App\Http\Controllers\admin\MessageController', ['except' => ['destroy', 'sendEmailToClient'], 'names' => [
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

//facebook call
Route::get('/redirect/{service}', [App\Http\Controllers\SocialController::class, 'redirect']);
Route::get('/callback/{service}', [App\Http\Controllers\SocialController::class, 'callback']);
