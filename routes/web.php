<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\FeedbackController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;


Route::get('/', function () {return redirect('/dashboard');})->middleware('auth','isAdmin');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth','isAdmin');
  Route::post('/store-data', [DataController::class, 'store'])->name('store_data');
	Route::post('/billing', [PageController::class, 'remove'])->name('page');
	Route::delete('/data/{id}', [DataController::class ,'destroy'])->name('remove');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/borrow', [PageController::class, 'borrow'])->name('borrow');
	Route::post('/borrow/{book}', 'BorrowController@borrow')->name('borrow_book');
	Route::get('/return', [PageController::class, 'return'])->name('return');
	Route::get('/my-profile', [PageController::class, 'sp'])->name('student-profile');
	Route::get('/feedback', [PageController::class, 'feedback'])->name('feedback');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	// Borrow a book
//Route::post('/books/{bookId}/borrow', [BookController::class, 'borrow'])->middleware('auth')->name('add');
// Return a book
//Route::post('/books/{bookId}/return', [MyController::class, 'myMethod'])->middleware('auth')->name('books.return');
Route::post('/books/{bookId}/return', [BookController::class, 'return','myMethod'])->middleware('auth')->name('books.return');
// View the list of borrowed books
Route::get('/borrowed', [BorrowController::class, 'index'])->middleware('auth');
Route::post('/books/{bookId}/borrow', [BorrowController::class,'borrow'])->name('books.add');

//Route::post('/borrow/{bookId}', 'BorrowController@borrow')->name('add');
Route::get('/return/{bookId}', 'BorrowController@return')->name('return');
Route::get('/feedback', [FeedbackController::class, 'showForm']);
Route::post('/feedback', [FeedbackController::class, 'submitForm'])->name('feedback');

});
