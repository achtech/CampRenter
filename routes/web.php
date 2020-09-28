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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

//ADMIN->USER
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
Route::get('client/{id}/delete', 'ClientController@destroy')->name('client.destroy');
Route::resource('client', 'App\Http\Controllers\ClientController', ['except' => 'destroy', 'names' => [
    'index' => 'client.index',
    'create' => 'client.create',
    'update' => 'client.update',
    'edit' => 'client.edit',
    'store' => 'client.store',
    'show' => 'client.show',
]]);

//ADMIN->EQUIPMENT
Route::get('equipment/{id}/delete', 'EquipmentController@destroy')->name('equipment.destroy');
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
Route::get('commission/{id}/delete', 'App\Http\Controllers\ComissionController@destroy')->name('commission.destroy');
Route::resource('commission', 'App\Http\Controllers\ComissionController', ['except' => 'destroy', 'names' => [
    'index' => 'commission.index',
    'create' => 'commission.create',
    'update' => 'commission.update',
    'edit' => 'commission.edit',
    'store' => 'commission.store',
    'show' => 'commission.show',
]]);

//ADMIN->AVATAR
Route::get('avatar/{id}/delete', 'AvatarController@destroy')->name('avatar.destroy');
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
Route::get('transmission/{id}/delete', 'TransmissionController@destroy')->name('transmission.destroy');
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
Route::get('booking/{id}/delete', 'BookingController@destroy')->name('booking.destroy');
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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
