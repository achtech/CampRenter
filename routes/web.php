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
Route::get('owner/{id}/delete', 'ClientController@destroy')->name('owner.destroy');
Route::post('owners/create', 'App\Http\Controllers\ClientController@store');
Route::resource('owner', 'App\Http\Controllers\ClientController', ['except' => 'destroy', 'names' => [
    'index' => 'owners.index',
    'create' => 'owners.create',
    'update' => 'owners.update',
    'edit' => 'owners.edit',
    'show' => 'owners.show',
]]);


//ADMIN->EQUIPMENT
Route::get('equipment/{id}/delete', 'equipmentController@destroy')->name('equipment.destroy');
Route::resource('equipment', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'equipments.index',
    'create' => 'equipment.create',
    'update' => 'equipment.update',
    'edit' => 'equipment.edit',
    'store' => 'equipment.store',
    'show' => 'equipment.show',
]]);

//ADMIN->INSSURANCE
Route::get('inssurance/{id}/delete', 'inssuranceController@destroy')->name('inssurance.destroy');
Route::resource('inssurance', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'inssurances.index',
    'create' => 'inssurance.create',
    'update' => 'inssurance.update',
    'edit' => 'inssurance.edit',
    'store' => 'inssurance.store',
    'show' => 'inssurance.show',
]]);

//ADMIN->COMIMSSION
Route::get('commission/{id}/delete', 'commissionController@destroy')->name('commission.destroy');
Route::resource('commission', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'commissions.index',
    'create' => 'commission.create',
    'update' => 'commission.update',
    'edit' => 'commission.edit',
    'store' => 'commission.store',
    'show' => 'commission.show',
]]);

//ADMIN->AVATAR
Route::get('avatar/{id}/delete', 'avatarController@destroy')->name('avatar.destroy');
Route::resource('avatar', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'avatars.index',
    'create' => 'avatar.create',
    'update' => 'avatar.update',
    'edit' => 'avatar.edit',
    'store' => 'avatar.store',
    'show' => 'avatar.show',
]]);

//ADMIN->FUEL
Route::get('fuel/{id}/delete', 'fuelController@destroy')->name('fuel.destroy');
Route::resource('fuel', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'fuels.index',
    'create' => 'fuel.create',
    'update' => 'fuel.update',
    'edit' => 'fuel.edit',
    'store' => 'fuel.store',
    'show' => 'fuel.show',
]]);

//ADMIN->LICENCECATEGORIES
Route::get('licenceCategory/{id}/delete', 'licenceCategoryController@destroy')->name('licenceCategory.destroy');
Route::resource('licenceCategory', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'licenceCategories.index',
    'create' => 'licenceCategory.create',
    'update' => 'licenceCategory.update',
    'edit' => 'licenceCategory.edit',
    'store' => 'licenceCategory.store',
    'show' => 'licenceCategory.show',
]]);

//ADMIN->TRANSMISSION
Route::get('transmission/{id}/delete', 'transmissionController@destroy')->name('transmission.destroy');
Route::resource('transmission', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'transmissions.index',
    'create' => 'transmission.create',
    'update' => 'transmission.update',
    'edit' => 'transmission.edit',
    'store' => 'transmission.store',
    'show' => 'transmission.show',
]]);

//ADMIN->VEHICULECATEGORIES
Route::get('equipmentCategory/{id}/delete', 'equipmentCategoryController@destroy')->name('equipmentCategory.destroy');
Route::resource('equipmentCategory', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'equipmentCategories.index',
    'create' => 'equipmentCategory.create',
    'update' => 'equipmentCategory.update',
    'edit' => 'equipmentCategory.edit',
    'store' => 'equipmentCategory.store',
    'show' => 'equipmentCategory.show',
]]);

//ADMIN->BOOKING
Route::get('booking/{id}/delete', 'bookingController@destroy')->name('booking.destroy');
Route::resource('booking', 'App\Http\Controllers\Controller', ['except' => 'destroy', 'names' => [
    'index' => 'bookings.index',
    'create' => 'booking.create',
    'update' => 'booking.update',
    'edit' => 'booking.edit',
    'store' => 'booking.store',
    'show' => 'booking.show',
]]);
