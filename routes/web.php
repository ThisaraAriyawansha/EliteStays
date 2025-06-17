<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;



use App\Http\Controllers\TvTypeController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomImageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerHotelController;
use App\Http\Controllers\CustomerRoomController;
use App\Http\Controllers\CustomerRoomImageController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\CustomerBookingManageController;









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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('customer/customerHome', [AuthController::class, 'customerHome']);
Route::get('register', [AuthController::class, 'add_user']);
Route::post('register', [AuthController::class, 'insert_user'])->name('add_user');
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);

Route::get('admin/dashboard', [DashboardController::class, 'indexadmin'])->name('dashboard');




// routes/web.php
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Public Site Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/flights', [HomeController::class, 'flights'])->name('flights');
Route::get('/hotelFilter', [HomeController::class, 'hotelFilter'])->name('hotelFilter');
Route::get('/property', [HomeController::class, 'property'])->name('property');
Route::get('/hotelDetails', [HomeController::class, 'hotelDetails'])->name('hotelDetails');
Route::post('/getBookingDetails', [HomeController::class, 'getBookingDetails'])->name('getBookingDetails');
Route::get('/bookingPage', [HomeController::class, 'bookingPage'])->name('bookingPage');
Route::get('/bookingTravelerInfo', [HomeController::class, 'bookingTravelerInfo'])->name('bookingTravelerInfo');
Route::get('/makePayemt', [HomeController::class, 'makePayemt'])->name('makePayemt');
Route::get('/bookingSucessfull', [HomeController::class, 'bookingSucessfull'])->name('bookingSucessfull');


//Manage Hotel
Route::get('/addHotel', [HotelController::class, 'addHotel'])->name('addHotel');
Route::post('/storehotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/manageHotel', [HotelController::class, 'manageHotel'])->name('manageHotel');
Route::get('/hotels/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{id}', [HotelController::class, 'update'])->name('hotels.update');


//Manage the room
Route::get('/addRoom', [RoomController::class, 'addRoom'])->name('addRoom');
Route::post('/storerooms', [RoomController::class, 'store'])->name('admin.rooms.store');
Route::get('/manageRoom', [RoomController::class, 'manageRoom'])->name('manageRoom');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('admin.rooms.update');

//Manage Room Images
Route::get('/rooms/{roomId}/images', [RoomImageController::class, 'manageImages'])->name('admin.rooms.images');
Route::post('/rooms/{roomId}/images', [RoomImageController::class, 'storeImage'])->name('admin.rooms.images.store');
Route::delete('/rooms/{roomId}/images/{imageId}', [RoomImageController::class, 'destroyImage'])->name('admin.rooms.images.destroy');


//Manage Customer
Route::get('/signup', [CustomerController::class, 'signup'])->name('signup');
Route::post('/customerregister', [CustomerController::class, 'customerregister'])->name('customerregister');
Route::get('/customerlogin', [CustomerController::class, 'customerlogin'])->name('customerlogin');
Route::post('/customerlogin', [CustomerController::class, 'authenticate'])->name('customer.login');
Route::get('/customerprofile', [CustomerController::class, 'profile'])->name('customer.profile');
Route::post('/profile/update', [CustomerController::class, 'updateProfile'])->name('customer.updateProfile');
Route::post('/profile/update-email', [CustomerController::class, 'updateEmail'])->name('customer.updateEmail');
Route::post('/profile/update-password', [CustomerController::class, 'updatePassword'])->name('customer.updatePassword');
Route::post('/customerlogout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::get('/password/reset', [CustomerController::class, 'showPasswordResetForm'])->name('password.request');


//Manage Customer Add Hotel
Route::get('/customeraddHotel', [CustomerHotelController::class, 'customeraddHotel'])->name('customeraddHotel');
Route::post('/customer/store-hotel', [CustomerHotelController::class, 'storeHotel'])->name('customer.storeHotel');

Route::get('/customerManageHotel', [CustomerHotelController::class, 'customerManageHotel'])->name('customerManageHotel');
Route::get('/customerupdate-hotel', [CustomerHotelController::class, 'updateHotel'])->name('customer.updateHotel');
Route::post('/customer/save-hotel', [CustomerHotelController::class, 'saveHotel'])->name('customer.saveHotel');

//Manage Customer Add Room
Route::get('/customerroomadd', [CustomerRoomController::class, 'customerAddRoom'])->name('customerAddRoom');
Route::post('/customer/room/store', [CustomerRoomController::class, 'storeRoom'])->name('customerStoreRoom');

Route::get('/customerManageRoom', [CustomerRoomController::class, 'customerManageRoom'])->name('customerManageRoom');
Route::get('/customerroomedit', [CustomerRoomController::class, 'customerEditRoom'])->name('customerEditRoom');
Route::post('/customer/room/update', [CustomerRoomController::class, 'updateRoom'])->name('customerUpdateRoom');


//Manage Customer Room Images
Route::get('/customerroomimages', [CustomerRoomImageController::class, 'index'])->name('customerRoomImages');
Route::post('/customerroomimagesupload', [CustomerRoomImageController::class, 'upload'])->name('customerRoomImagesUpload');
Route::delete('/customerroomimagesdelete', [CustomerRoomImageController::class, 'delete'])->name('customerRoomImagesDelete');

//Manage Hotel Profile
Route::get('/hotelProfile', [HomeController::class, 'hotelProfile'])->name('hotelProfile');


//Booking
Route::post('/roombooking', [RoomBookingController::class, 'roombooking'])->name('roombooking');



//Manage Booking Customer
Route::get('/customerManageBooking', [CustomerBookingManageController::class, 'customerManageBooking'])->name('customerManageBooking');
Route::get('/customerViewBooking', [CustomerBookingManageController::class, 'viewBooking'])->name('customerViewBooking');
Route::patch('/customer-update-booking-status/{id}', [CustomerBookingManageController::class, 'updateBookingStatus'])->name('customerUpdateBookingStatus');