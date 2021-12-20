<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ControlFormController;

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

Route::get('/table-responsive', function () {
    return view('view-tool.table-responsive');
});

Route::get('/profile-register', [ProfileController::class, 'profileRegister']);

Route::prefix('form')->name('form.')->group( function () {

    Route::get('/view-insert', function () {
        return view('form.view-insert');
    });

    Route::post('/view-list-table', [ControlFormController::class, 'viewListTable'])->name('view-list-table');

    Route::get('/view-list', [ControlFormController::class, 'viewList'])->name('view-list');

    Route::post('/insert-config', [ControlFormController::class, 'insertConfig'])->name('insert-config');
    Route::post('/delete-config/{id}', [ControlFormController::class, 'deleteConfig'])->name('delete-config');

});

