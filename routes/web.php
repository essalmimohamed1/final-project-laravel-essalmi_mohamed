<?php

use App\Http\Controllers\About;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route for the home page
Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard, accessible only to authenticated and verified users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route for displaying the event organizer page
Route::get('/organisateur', [EventController::class, 'index'])->name('event.index');

// Route for storing a new event
Route::post('/organisateur/store', [EventController::class, 'store'])->name('event.store');

// Route for showing all events, returns JSON
Route::get('/organisateur/show', [EventController::class, 'show']);
Route::put('/organisateur/{organisateur}', [EventController::class, 'update'])->name('events.update');
Route::delete('/organisateur/{organisateur}', [EventController::class, 'destroy'])->name('events.destroy');

// Include authentication-related routes
// Route for displaying the contact page
// routes/web.php


Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');



require __DIR__.'/auth.php';
