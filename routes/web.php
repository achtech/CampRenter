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
Route::get('user/{id}/delete', 'userController@deusersstroy')->name('user.destroy');
Route::resource('user', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'user.index',
    'create' => 'user.create',
    'update' => 'user.update',
    'edit' => 'user.edit',
    'store' => 'user.store',
    'show' => 'user.show',
]]);

//ADMIN->OWNER
Route::get('owner/{id}/delete', 'ownerController@destroy')->name('owner.destroy');
Route::resource('owner', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'owner.index',
    'create' => 'owner.create',
    'update' => 'owner.update',
    'edit' => 'owner.edit',
    'store' => 'owner.store',
    'show' => 'owner.show',
]]);

//ADMIN->RENTER
Route::get('renter/{id}/delete', 'renterController@destroy')->name('renter.destroy');
Route::resource('renter', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'renter.index',
    'create' => 'renter.create',
    'update' => 'renter.update',
    'edit' => 'renter.edit',
    'store' => 'renter.store',
    'show' => 'renter.show',
]]);

//ADMIN->EQUIPMENT
Route::get('equipment/{id}/delete', 'equipmentController@destroy')->name('equipment.destroy');
Route::resource('equipment', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'equipment.index',
    'create' => 'equipment.create',
    'update' => 'equipment.update',
    'edit' => 'equipment.edit',
    'store' => 'equipment.store',
    'show' => 'equipment.show',
]]);

//ADMIN->INSSURANCE
Route::get('inssurance/{id}/delete', 'inssuranceController@destroy')->name('inssurance.destroy');
Route::resource('inssurance', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'inssurance.index',
    'create' => 'inssurance.create',
    'update' => 'inssurance.update',
    'edit' => 'inssurance.edit',
    'store' => 'inssurance.store',
    'show' => 'inssurance.show',
]]);

//ADMIN->COMIMSSION
Route::get('commission/{id}/delete', 'commissionController@destroy')->name('commission.destroy');
Route::resource('commission', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'commission.index',
    'create' => 'commission.create',
    'update' => 'commission.update',
    'edit' => 'commission.edit',
    'store' => 'commission.store',
    'show' => 'commission.show',
]]);

//ADMIN->AVATAR
Route::get('avatar/{id}/delete', 'avatarController@destroy')->name('avatar.destroy');
Route::resource('avatar', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'avatar.index',
    'create' => 'avatar.create',
    'update' => 'avatar.update',
    'edit' => 'avatar.edit',
    'store' => 'avatar.store',
    'show' => 'avatar.show',
]]);

//ADMIN->FUEL
Route::get('fuel/{id}/delete', 'fuelController@destroy')->name('fuel.destroy');
Route::resource('fuel', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'fuel.index',
    'create' => 'fuel.create',
    'update' => 'fuel.update',
    'edit' => 'fuel.edit',
    'store' => 'fuel.store',
    'show' => 'fuel.show',
]]);

//ADMIN->LICENCECATEGORIES
Route::get('licenceCategory/{id}/delete', 'licenceCategoryController@destroy')->name('licenceCategory.destroy');
Route::resource('licenceCategory', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'licenceCategory.index',
    'create' => 'licenceCategory.create',
    'update' => 'licenceCategory.update',
    'edit' => 'licenceCategory.edit',
    'store' => 'licenceCategory.store',
    'show' => 'licenceCategory.show',
]]);

//ADMIN->TRANSMISSION
Route::get('transmission/{id}/delete', 'transmissionController@destroy')->name('transmission.destroy');
Route::resource('transmission', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'transmission.index',
    'create' => 'transmission.create',
    'update' => 'transmission.update',
    'edit' => 'transmission.edit',
    'store' => 'transmission.store',
    'show' => 'transmission.show',
]]);

//ADMIN->VEHICULECATEGORIES
Route::get('equipmentCategory/{id}/delete', 'equipmentCategoryController@destroy')->name('equipmentCategory.destroy');
Route::resource('equipmentCategory', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'equipmentCategory.index',
    'create' => 'equipmentCategory.create',
    'update' => 'equipmentCategory.update',
    'edit' => 'equipmentCategory.edit',
    'store' => 'equipmentCategory.store',
    'show' => 'equipmentCategory.show',
]]);

//ADMIN->BOOKING
Route::get('booking/{id}/delete', 'bookingController@destroy')->name('booking.destroy');
Route::resource('booking', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'booking.index',
    'create' => 'booking.create',
    'update' => 'booking.update',
    'edit' => 'booking.edit',
    'store' => 'booking.store',
    'show' => 'booking.show',
]]);
