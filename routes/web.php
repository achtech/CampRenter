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
    Route::get('/confirm/{id}', 'App\Http\Controllers\DashboardController@confirmEquipment')->name('dashboard.confirm');
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
    Route::get('client/{id}/delete', 'App\Http\Controllers\ClientController@destroy')->name('client.destroy');
    Route::get('client/{id}/block', 'App\Http\Controllers\ClientController@blockClient')->name('client.block');
    Route::get('client/{id}/active', 'App\Http\Controllers\ClientController@activateClient')->name('client.active');
    Route::get('client/{id}/detail', 'App\Http\Controllers\ClientController@detail')->name('client.detail');
    Route::get('client/{id}/equipmentDetail', 'App\Http\Controllers\ClientController@checkEquipmentDetail')->name('client.equipmentDetail');
    Route::get('client/{id}/rentDetail', 'App\Http\Controllers\ClientController@checkBookingDetail')->name('client.rentDetail');

    Route::resource('client', 'App\Http\Controllers\ClientController', ['except' => 'destroy', 'names' => [
        'index' => 'client.index',
        'create' => 'client.create',
        'update' => 'client.update',
        'store' => 'client.store',
        'show' => 'client.show',
    ]]);

    //ADMIN->EQUIPMENT
    Route::get('equipment/{id}/confirm', 'App\Http\Controllers\EquipmentController@confirm')->name('equipment.confirm');
    Route::get('equipment/{id}/detail', 'App\Http\Controllers\EquipmentController@detail')->name('equipment.detail');
    Route::get('equipment/{id}/delete', 'App\Http\Controllers\EquipmentController@destroy')->name('equipment.destroy');
    Route::get('equipment/unconfirmedEquipment', 'App\Http\Controllers\EquipmentController@getUnconfirmedCampers')->name('equipment.unconfirmedEquipment');
    Route::resource('equipment', 'App\Http\Controllers\EquipmentController', ['except' => 'destroy', 'names' => [
        'index' => 'equipment.index',
        'create' => 'equipment.create',
        'update' => 'equipment.update',
        'edit' => 'equipment.edit',
        'store' => 'equipment.store',
        'show' => 'equipment.show',
    ]]);

    Route::get('equipment/{id}/detailBooking', 'App\Http\Controllers\EquipmentController@detailBooking')->name('equipment.detailBooking');
    Route::get('equipment/{id}/detailEquipment', 'App\Http\Controllers\EquipmentController@detailEquipment')->name('equipment.detailEquipment');
    Route::get('equipment/{id}/detail', 'App\Http\Controllers\EquipmentController@detail')->name('equipment.detail');
    Route::get('equipment/{id}/delete', 'App\Http\Controllers\EquipmentController@destroy')->name('equipment.destroy');
    Route::resource('equipment', 'App\Http\Controllers\EquipmentController', ['except' => 'destroy', 'names' => [
        'index' => 'equipment.index',
        'create' => 'equipment.create',
        'update' => 'equipment.update',
        'edit' => 'equipment.edit',
        'store' => 'equipment.store',
        'show' => 'equipment.show',
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
    Route::get('equipmentCategory/{id}/delete', 'App\Http\Controllers\EquipmentCategoryController@destroy')->name('equipmentCategory.destroy');
    Route::resource('equipmentCategory', 'App\Http\Controllers\EquipmentCategoryController', ['except' => 'destroy', 'names' => [
        'index' => 'equipmentCategory.index',
        'create' => 'equipmentCategory.create',
        'update' => 'equipmentCategory.update',
        'edit' => 'equipmentCategory.edit',
        'store' => 'equipmentCategory.store',
        'show' => 'equipmentCategory.show',
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

    //ADMIN->CAMPERNAME
    Route::get('camperName/{id}/delete', 'CamperNameController@destroy')->name('camperName.destroy');
    Route::resource('camperName', 'App\Http\Controllers\CamperNameController', ['except' => 'destroy', 'names' => [
        'index' => 'camperName.index',
        'create' => 'camperName.create',
        'update' => 'camperName.update',
        'edit' => 'camperName.edit',
        'store' => 'camperName.store',
        'show' => 'camperName.show',
    ]]);


    //ADMIN->billings
    //Route::get('inssuranceCompany/{id}/delete', 'InsuranceCompanyController@destroy')->name('inssuranceCompany.destroy');

    Route::get('applyFilter', 'App\Http\Controllers\BillingController@filter')->name('applyFilter');
    Route::get('excel-export', 'App\Http\Controllers\BillingController@export')->name('excel-export');
    Route::resource('billing', 'App\Http\Controllers\BillingController', ['except' => 'destroy', 'names' => [
        'index' => 'billing.index',
        'create' => 'billing.create',
        'update' => 'billing.update',
        'edit' => 'billing.edit',
        'store' => 'billing.store',
        'show' => 'billing.show',
    ]]);
    //ADMIN->INSURANCECOMPANY
    Route::get('inssuranceCompany/{id}/delete', 'InsuranceCompanyController@destroy')->name('inssuranceCompany.destroy');
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
    Route::resource('message', 'App\Http\Controllers\MessageController', ['except' => 'destroy', 'names' => [
        'index' => 'message.index',
        'store' => 'message.store',
        'show' => 'message.show',
    ]]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
