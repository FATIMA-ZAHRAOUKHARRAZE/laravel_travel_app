<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckForePrice;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('traveling/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');
//BOOKING 
Route::get('traveling/Reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'Reservation'])->name('traveling.Reservation');

Route::post('traveling/Reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'StoreReservation'])->name('traveling.Reservation.store');
//PAYING
Route::get('traveling/Pay', [App\Http\Controllers\Traveling\TravelingController::class, 'Paypaypal'])->name('traveling.Pay')->middleware('check.for.price');
Route::get('traveling/success', [App\Http\Controllers\Traveling\TravelingController::class, 'success'])->name('traveling.success')->middleware('check.for.price');
//CHERCHER
Route::get('traveling/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'deals'])->name('traveling.deals');
Route::any('traveling/search-deals', [App\Http\Controllers\Traveling\TravelingController::class, 'searchdeals'])->name('traveling.search.deals');

//users pages
Route::get('users/bookings', [App\Http\Controllers\Users\UsersController::class, 'bookings'])->name('users.bookings');
