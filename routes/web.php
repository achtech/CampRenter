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
Route::get('users/{id}/delete', 'usersController@deusersstroy')->name('users.destroy');
Route::resource('users', 'UsersController', ['except' => 'destroy', 'names' => [
    'index' => 'users.index',
    'create' => 'users.create',
    'update' => 'users.update',
    'edit' => 'users.edit',
    'store' => 'users.store',
    'show' => 'users.show',
]]);

//ADMIN->OWNER
Route::get('owners/{id}/delete', 'ownersController@destroy')->name('owners.destroy');
Route::resource('owners', 'App\Http\Controllers\OwnersController', ['except' => 'destroy', 'names' => [
    'index' => 'owners.index',
    'create' => 'owners.create',
    'update' => 'owners.update',
    'edit' => 'owners.edit',
    'store' => 'owners.store',
    'show' => 'owners.show',
]]);

//ADMIN->RENTER
Route::get('renters/{id}/delete', 'rentersController@destroy')->name('renters.destroy');
Route::resource('renters', 'RentersController', ['except' => 'destroy', 'names' => [
    'index' => 'renters.index',
    'create' => 'renters.create',
    'update' => 'renters.update',
    'edit' => 'renters.edit',
    'store' => 'renters.store',
    'show' => 'renters.show',
]]);

//ADMIN->EQUIPMENT
Route::get('equipments/{id}/delete', 'equipmentsController@destroy')->name('equipments.destroy');
Route::resource('equipments', 'EquipmentsController', ['except' => 'destroy', 'names' => [
    'index' => 'equipments.index',
    'create' => 'equipments.create',
    'update' => 'equipments.update',
    'edit' => 'equipments.edit',
    'store' => 'equipments.store',
    'show' => 'equipments.show',
]]);

//ADMIN->INSSURANCE
Route::get('inssurances/{id}/delete', 'inssurancesController@destroy')->name('inssurances.destroy');
Route::resource('inssurances', 'InssurancesController', ['except' => 'destroy', 'names' => [
    'index' => 'inssurances.index',
    'create' => 'inssurances.create',
    'update' => 'inssurances.update',
    'edit' => 'inssurances.edit',
    'store' => 'inssurances.store',
    'show' => 'inssurances.show',
]]);

//ADMIN->COMIMSSION
Route::get('commissions/{id}/delete', 'commissionsController@destroy')->name('commissions.destroy');
Route::resource('commissions', 'CommissionsController', ['except' => 'destroy', 'names' => [
    'index' => 'commissions.index',
    'create' => 'commissions.create',
    'update' => 'commissions.update',
    'edit' => 'commissions.edit',
    'store' => 'commissions.store',
    'show' => 'commissions.show',
]]);

//ADMIN->AVATAR
Route::get('avatars/{id}/delete', 'avatarsController@destroy')->name('avatars.destroy');
Route::resource('avatars', 'AvatarsController', ['except' => 'destroy', 'names' => [
    'index' => 'avatars.index',
    'create' => 'avatars.create',
    'update' => 'avatars.update',
    'edit' => 'avatars.edit',
    'store' => 'avatars.store',
    'show' => 'avatars.show',
]]);

//ADMIN->FUEL
Route::get('fuels/{id}/delete', 'fuelsController@destroy')->name('fuels.destroy');
Route::resource('fuels', 'FuelsController', ['except' => 'destroy', 'names' => [
    'index' => 'fuels.index',
    'create' => 'fuels.create',
    'update' => 'fuels.update',
    'edit' => 'fuels.edit',
    'store' => 'fuels.store',
    'show' => 'fuels.show',
]]);

//ADMIN->LICENCECATEGORIES
Route::get('licenceCategories/{id}/delete', 'licenceCategoriesController@destroy')->name('licenceCategories.destroy');
Route::resource('licenceCategories', 'LicenceCategoriesController', ['except' => 'destroy', 'names' => [
    'index' => 'licenceCategories.index',
    'create' => 'licenceCategories.create',
    'update' => 'licenceCategories.update',
    'edit' => 'licenceCategories.edit',
    'store' => 'licenceCategories.store',
    'show' => 'licenceCategories.show',
]]);

//ADMIN->TRANSMISSION
Route::get('transmissions/{id}/delete', 'transmissionsController@destroy')->name('transmissions.destroy');
Route::resource('transmissions', 'TransmissionsController', ['except' => 'destroy', 'names' => [
    'index' => 'transmissions.index',
    'create' => 'transmissions.create',
    'update' => 'transmissions.update',
    'edit' => 'transmissions.edit',
    'store' => 'transmissions.store',
    'show' => 'transmissions.show',
]]);

//ADMIN->VEHICULECATEGORIES
Route::get('vehiculeCategories/{id}/delete', 'vehiculeCategoriesController@destroy')->name('vehiculeCategories.destroy');
Route::resource('vehiculeCategories', 'VehiculeCategoriesController', ['except' => 'destroy', 'names' => [
    'index' => 'vehiculeCategories.index',
    'create' => 'vehiculeCategories.create',
    'update' => 'vehiculeCategories.update',
    'edit' => 'vehiculeCategories.edit',
    'store' => 'vehiculeCategories.store',
    'show' => 'vehiculeCategories.show',
]]);

//ADMIN->BOOKING
Route::get('bookings/{id}/delete', 'bookingsController@destroy')->name('bookings.destroy');
Route::resource('bookings', 'BookingsController', ['except' => 'destroy', 'names' => [
    'index' => 'bookings.index',
    'create' => 'bookings.create',
    'update' => 'bookings.update',
    'edit' => 'bookings.edit',
    'store' => 'bookings.store',
    'show' => 'bookings.show',
]]);
