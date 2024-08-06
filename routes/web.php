<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;




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

Route::get('/', [HomeController::class,'homepage']);

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

route::get('/home', [HomeController::class,'index'])->middleware('auth')->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/publication_page', [AdminController::class,'publication_page']);

Route::post('/add_pub', [AdminController::class,'add_pub']);

Route::get('/show_pub', [AdminController::class,'show_pub']);

Route::get('/delete_pub/{id}', [AdminController::class,'delete_pub']);

Route::get('/edit_pub/{id}', [AdminController::class,'edit_pub']);

Route::post('/update_pub/{id}', [AdminController::class,'update_pub']);

Route::get('/pub_details/{id}', [HomeController::class,'pub_details']);

use App\Http\Controllers\AdminUserController;



Route::get('/events', [AdminController::class,'events']);

Route::get('/events_create', [AdminController::class,'events_create']);

Route::post('/events_store', [AdminController::class,'events_store']);

Route::get('/events_destroy/{id}', [AdminController::class,'events_destroy']);

Route::get('/events_edit/{id}', [AdminController::class,'events_edit']);

Route::put('/update_event/{id}', [AdminController::class,'update_event']);

Route::post('event_attendies', [HomeController::class, 'event_attendies']);
Route::get('/payment-status', [HomeController::class, 'paymentStatus'])->name('status'); // For PayPal return URL


Route::get('/forum', [HomeController::class,'forum']);


Route::post('/add_comment', [HomeController::class,'add_comment']);
Route::post('/add_reply', [HomeController::class,'add_reply']);


/////////////////

