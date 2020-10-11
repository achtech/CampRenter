<?php

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

Route::get('lang/{lang}', function ($lang) {
    \Session::put('locale', $lang);
    return back();
});
Route::group(['middleware' => 'Lang'], function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::get('/', function () {
        if (auth()->user() == null) {
            return view('/auth/login');
        } else {
            return redirect(route('dashboard'));
        }
    });

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/confirm/{id}', 'App\Http\Controllers\DashboardController@confirmCamper')->name('dashboard.confirm');
    //Route::get('/lastBookings', 'App\Http\Controllers\DashboardController@getLastBookings')->name('dashboard');

    //ADMIN->USER
    Route::get('user/updateProfile', 'App\Http\Controllers\UserController@updateProfile')->name('user.updateProfile');
    Route::get('user/changePassword', 'App\Http\Controllers\UserController@changePassword')->name('user.changePassword');
    Route::PUT('user/updatePassword', 'App\Http\Controllers\UserController@updatePassword')->name('user.updatePassword');

    Route::get('user/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
    Route::get('user/{id}/delete', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => 'destroy', 'names' => [
        'index' => 'user.index',
        'create' => 'user.create',
        'update' => 'user.update',
        'edit' => 'user.edit',
        'store' => 'user.store',
        'show' => 'user.show',
    ]]);

    //ADMIN->CLIENT
    Route::get('client/{id}/blockActivateClient', 'App\Http\Controllers\ClientController@blockActivateClient')->name('client.blockActivateClient');
    Route::get('client/{id}/delete', 'App\Http\Controllers\ClientController@destroy')->name('client.destroy');
    Route::get('client/{id}/detail', 'App\Http\Controllers\ClientController@detail')->name('client.detail');
    Route::get('client/{id}/campers', 'App\Http\Controllers\ClientController@clientCampers')->name('client.campers');
    Route::get('client/{id}/bookings', 'App\Http\Controllers\ClientController@clientBookings')->name('client.bookings');
    Route::get('client/{id}/camperDetail', 'App\Http\Controllers\ClientController@checkCamperDetail')->name('client.camperDetail');
    Route::get('client/{id}/rentDetail', 'App\Http\Controllers\ClientController@checkBookingDetail')->name('client.rentDetail');

    Route::resource('client', 'App\Http\Controllers\ClientController', ['except' => 'destroy', 'names' => [
        'index' => 'client.index',
        'create' => 'client.create',
        'update' => 'client.update',
        'store' => 'client.store',
        'show' => 'client.show',
    ]]);

    //ADMIN->EQUIPMENT
    Route::get('camper/{id}/confirm', 'App\Http\Controllers\CamperController@confirm')->name('camper.confirm');
    Route::get('camper/{id}/detail', 'App\Http\Controllers\CamperController@detail')->name('camper.detail');
    Route::get('camper/{id}/delete', 'App\Http\Controllers\CamperController@destroy')->name('camper.destroy');
    Route::get('camper/unconfirmedCamper', 'App\Http\Controllers\CamperController@getUnconfirmedCampers')->name('camper.unconfirmedCamper');
    Route::resource('camper', 'App\Http\Controllers\CamperController', ['except' => 'destroy', 'names' => [
        'index' => 'camper.index',
        'create' => 'camper.create',
        'update' => 'camper.update',
        'edit' => 'camper.edit',
        'store' => 'camper.store',
        'show' => 'camper.show',
    ]]);

    Route::get('camper/{id}/blockActivateCamper', 'App\Http\Controllers\CamperController@blockActivateCamper')->name('camper.blockActivateCamper');
    Route::get('camper/{id}/detailBooking', 'App\Http\Controllers\CamperController@detailBooking')->name('camper.detailBooking');
    Route::get('camper/{id}/detailCamper', 'App\Http\Controllers\CamperController@detailCamper')->name('camper.detailCamper');
    Route::get('camper/{id}/detail', 'App\Http\Controllers\CamperController@detail')->name('camper.detail');
    Route::get('camper/{id}/delete', 'App\Http\Controllers\CamperController@destroy')->name('camper.destroy');
    Route::resource('camper', 'App\Http\Controllers\CamperController', ['except' => 'destroy', 'names' => [
        'index' => 'camper.index',
        'create' => 'camper.create',
        'update' => 'camper.update',
        'edit' => 'camper.edit',
        'store' => 'camper.store',
        'show' => 'camper.show',
    ]]);

    //ADMIN->INSURANCE
    Route::get('insurance/{id}/delete', 'App\Http\Controllers\InsuranceController@destroy')->name('insurance.destroy');
    Route::resource('insurance', 'App\Http\Controllers\InsuranceController', ['except' => 'destroy', 'names' => [
        'index' => 'insurance.index',
        'create' => 'insurance.create',
        'update' => 'insurance.update',
        'edit' => 'insurance.edit',
        'store' => 'insurance.store',
        'show' => 'insurance.show',
    ]]);

    //ADMIN->INSURANCE
    Route::get('insuranceCompany/{id}/delete', 'App\Http\Controllers\InsuranceCompanyController@destroy')->name('insuranceCompany.destroy');
    Route::resource('insuranceCompany', 'App\Http\Controllers\InsuranceCompanyController', ['except' => 'destroy', 'names' => [
        'index' => 'insuranceCompany.index',
        'create' => 'insuranceCompany.create',
        'update' => 'insuranceCompany.update',
        'edit' => 'insuranceCompany.edit',
        'store' => 'insuranceCompany.store',
        'show' => 'insuranceCompany.show',
    ]]);

    //ADMIN->COMIMSSION
    Route::get('commission/{id}/delete', 'App\Http\Controllers\CommissionController@destroy')->name('commission.destroy');
    Route::resource('commission', 'App\Http\Controllers\CommissionController', ['except' => 'destroy', 'names' => [
        'index' => 'commission.index',
        'create' => 'commission.create',
        'update' => 'commission.update',
        'edit' => 'commission.edit',
        'store' => 'commission.store',
        'show' => 'commission.show',
    ]]);

    Route::get('promotion/{id}/delete', 'App\Http\Controllers\PromotionController@destroy')->name('promotion.destroy');
    Route::get('promotion/{id}/activate', 'App\Http\Controllers\PromotionController@activate')->name('promotion.activate');
    Route::resource('promotion', 'App\Http\Controllers\PromotionController', ['except' => 'destroy', 'names' => [
        'index' => 'promotion.index',
        'create' => 'promotion.create',
        'update' => 'promotion.update',
        'edit' => 'promotion.edit',
        'store' => 'promotion.store',
        'show' => 'promotion.show',
    ]]);
    //ADMIN->PROMOTION
    Route::resource('promotion', 'App\Http\Controllers\PromotionController', ['except' => 'destroy', 'names' => [
        'index' => 'promotion.index',
        'create' => 'promotion.create',
        'update' => 'promotion.update',
        'edit' => 'promotion.edit',
        'store' => 'promotion.store',
        'show' => 'promotion.show',
    ]]);

    //ADMIN->AVATAR
    Route::get('avatar/{id}/delete', 'App\Http\Controllers\AvatarController@destroy')->name('avatar.destroy');
    Route::resource('avatar', 'App\Http\Controllers\AvatarController', ['except' => 'destroy', 'names' => [
        'index' => 'avatar.index',
        'create' => 'avatar.create',
        'update' => 'avatar.update',
        'edit' => 'avatar.edit',
        'store' => 'avatar.store',
        'show' => 'avatar.show',
    ]]);

    //ADMIN->FUEL
    Route::get('fuel/{id}/delete', 'App\Http\Controllers\FuelController@destroy')->name('fuel.destroy');
    Route::resource('fuel', 'App\Http\Controllers\FuelController', ['except' => 'destroy', 'names' => [
        'index' => 'fuel.index',
        'create' => 'fuel.create',
        'update' => 'fuel.update',
        'edit' => 'fuel.edit',
        'store' => 'fuel.store',
        'show' => 'fuel.show',
    ]]);

    //ADMIN->LICENCECATEGORIES
    Route::get('licenceCategory/{id}/delete', 'App\Http\Controllers\LicenceCategoryController@destroy')->name('licenceCategory.destroy');
    Route::resource('licenceCategory', 'App\Http\Controllers\LicenceCategoryController', ['except' => 'destroy', 'names' => [
        'index' => 'licenceCategory.index',
        'create' => 'licenceCategory.create',
        'update' => 'licenceCategory.update',
        'edit' => 'licenceCategory.edit',
        'store' => 'licenceCategory.store',
        'show' => 'licenceCategory.show',
    ]]);

    //ADMIN->TRANSMISSION
    Route::get('transmission/{id}/delete', 'App\Http\Controllers\TransmissionController@destroy')->name('transmission.destroy');
    Route::resource('transmission', 'App\Http\Controllers\TransmissionController', ['except' => 'destroy', 'names' => [
        'index' => 'transmission.index',
        'create' => 'transmission.create',
        'update' => 'transmission.update',
        'edit' => 'transmission.edit',
        'store' => 'transmission.store',
        'show' => 'transmission.show',
    ]]);

    //ADMIN->EQUIPMENTCATEGORY
    Route::get('camperCategory/{id}/delete', 'App\Http\Controllers\CamperCategoryController@destroy')->name('camperCategory.destroy');
    Route::resource('camperCategory', 'App\Http\Controllers\CamperCategoryController', ['except' => 'destroy', 'names' => [
        'index' => 'camperCategory.index',
        'create' => 'camperCategory.create',
        'update' => 'camperCategory.update',
        'edit' => 'camperCategory.edit',
        'store' => 'camperCategory.store',
        'show' => 'camperCategory.show',
    ]]);

    //ADMIN->CAMPERNAMES
    Route::get('camperStatus/{id}/delete', 'App\Http\Controllers\CamperStatusController@destroy')->name('camperStatus.destroy');
    Route::resource('camperStatus', 'App\Http\Controllers\CamperStatusController', ['except' => 'destroy', 'names' => [
        'index' => 'camperStatus.index',
        'create' => 'camperStatus.create',
        'update' => 'camperStatus.update',
        'edit' => 'camperStatus.edit',
        'store' => 'camperStatus.store',
        'show' => 'camperStatus.show',
    ]]);

    //ADMIN->CAMPER STAUS
    Route::get('camperNames/{id}/delete', 'App\Http\Controllers\CamperNamesController@destroy')->name('camperNames.destroy');
    Route::resource('camperNames', 'App\Http\Controllers\CamperNamesController', ['except' => 'destroy', 'names' => [
        'index' => 'camperNames.index',
        'create' => 'camperNames.create',
        'update' => 'camperNames.update',
        'edit' => 'camperNames.edit',
        'store' => 'camperNames.store',
        'show' => 'camperNames.show',
    ]]);

    //ADMIN->BOOKING
    Route::get('booking/{id}/delete', 'App\Http\Controllers\Bookingcontroller@destroy')->name('booking.destroy');
    Route::get('booking/{id}/detail', 'App\Http\Controllers\Bookingcontroller@detail')->name('booking.detail');
    Route::get('booking/search', 'App\Http\Controllers\Bookingcontroller@search')->name('booking.search');
    Route::get('booking/{id}/chat', 'App\Http\Controllers\Bookingcontroller@chat')->name('booking.chat');
    Route::resource('booking', 'App\Http\Controllers\BookingController', ['except' => 'destroy', 'names' => [
        'index' => 'booking.index',
        'create' => 'booking.create',
        'update' => 'booking.update',
        'edit' => 'booking.edit',
        'store' => 'booking.store',
        'show' => 'booking.show',
    ]]);

    //ADMIN->billings
    //Route::get('inssuranceCompany/{id}/delete', 'InsuranceCompanyController@destroy')->name('inssuranceCompany.destroy');

    Route::get('applyFilter', 'App\Http\Controllers\BillingController@filter')->name('applyFilter');
    Route::get('excel-export', 'App\Http\Controllers\BillingController@export')->name('excel-export');
    Route::get('billing/{id}/bookings', 'App\Http\Controllers\BillingController@bookings')->name('billing.bookings');

    Route::resource('billing', 'App\Http\Controllers\BillingController', ['except' => 'destroy', 'names' => [
        'index' => 'billing.index',
        'create' => 'billing.create',
        'update' => 'billing.update',
        'edit' => 'billing.edit',
        'store' => 'billing.store',
        'show' => 'billing.show',
    ]]);
    //ADMIN->INSURANCECOMPANY
    Route::get('inssuranceCompany/{id}/delete', 'App\Http\Controllers\InsuranceCompanyController@destroy')->name('inssuranceCompany.destroy');
    Route::resource('inssuranceCompany', 'App\Http\Controllers\InsuranceCompanyController', ['except' => 'destroy', 'names' => [
        'index' => 'inssuranceCompany.index',
        'create' => 'inssuranceCompany.create',
        'update' => 'inssuranceCompany.update',
        'edit' => 'inssuranceCompany.edit',
        'store' => 'inssuranceCompany.store',
        'show' => 'inssuranceCompany.show',
    ]]);

    //ADMIN->MESSAGE
    Route::get('message/{id}/delete', ['MessageController', 'destroy'])->name('message.destroy');
    Route::get('message/sendEmail', 'App\Http\Controllers\MessageController@sendEmail')->name('message.sendEmail');
    Route::resource('message', 'App\Http\Controllers\MessageController', ['except' => 'destroy', 'names' => [
        'index' => 'message.index',
        'store' => 'message.store',
        'show' => 'message.show',
    ]]);
    //ADMIN->BACKUP
    Route::get('backup/{id}/delete', ['BackupController', 'destroy'])->name('backup.destroy');
    Route::resource('backup', 'App\Http\Controllers\BackupController', ['except' => 'destroy', 'names' => [
        'index' => 'backup.index',
        'store' => 'backup.store',
        'show' => 'backup.show',
    ]]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
