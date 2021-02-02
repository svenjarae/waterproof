<?php

use Illuminate\Support\Facades\Route;
// use Artisan

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
    return view('welcome');
});

//logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//Test email command (remind user of maintenace)
Route::get('/cronjob', function () {
    Artisan::call('reminder:emails');
    return view('welcome');
});


Auth::routes();


//home
Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

//admin assignments
Route::get('/admin/assignments', [App\Http\Controllers\AdminAssignmentsController::class, 'index'])->name('admin.assignments.index');
Route::get('/admin/assignments/{id}', [App\Http\Controllers\AdminAssignmentsController::class, 'show'])->name('admin.assignments.show');
Route::put('/admin/assignments/{id}', [App\Http\Controllers\AdminAssignmentsController::class, 'update'])->name('admin.assignments.update');
Route::delete('/admin/assignments/{id}', [App\Http\Controllers\AdminAssignmentsController::class, 'destroy'])->name('admin.assignments.destroy');

//admin customers
Route::get('/admin/customer', [App\Http\Controllers\AdminCustomerController::class, 'index'])->name('admin.customer.index');
Route::get('/admin/customer/{id}', [App\Http\Controllers\AdminCustomerController::class, 'show'])->name('admin.customer.show');


//else
Route::get('/help', [App\Http\Controllers\HomeController::class, 'info'])->name('help');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');

//equipment
Route::get('/equipment', [App\Http\Controllers\EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/equipment/add', [App\Http\Controllers\EquipmentController::class, 'create'])->name('equipment.create');
Route::post('/equipment', [App\Http\Controllers\EquipmentController::class, 'store']);
Route::get('/equipment/{id}', [App\Http\Controllers\EquipmentController::class, 'show'])->name('equipment.show');
Route::put('/equipment/{id}', [App\Http\Controllers\EquipmentController::class, 'update'])->name('equipment.update');
Route::delete('/equipment/{id}', [App\Http\Controllers\EquipmentController::class, 'destroy'])->name('equipment.destroy');

//service
Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.index');
Route::get('/service/request', [App\Http\Controllers\ServiceController::class, 'create'])->name('service.create');
Route::post('/service/assignments', [App\Http\Controllers\ServiceController::class, 'store']);
Route::get('/service/assignments', [App\Http\Controllers\ServiceController::class, 'overview'])->name('service.assignments');
Route::get('/service/assignments/{id}', [App\Http\Controllers\ServiceController::class, 'show'])->name('service.show');
Route::delete('/service/assignments/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.destroy');




//account
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index');
Route::put('/account', [App\Http\Controllers\AccountController::class, 'update'])->name('account.update');
// Route::put('/account', [App\Http\Controllers\AccountController::class, 'passwordUpdate'])->name('account.passwordUpdate');
// FIXME:
// Route::put('/account', [App\Http\Controllers\AccountController::class, 'updateAddress'])->name('account.updateAddress');
Route::delete('/account', [App\Http\Controllers\AccountController::class, 'destroy'])->name('account.destroy');

