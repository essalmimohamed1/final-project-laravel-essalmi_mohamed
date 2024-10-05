<?php

use App\Http\Controllers\About;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\stripeController;
use Illuminate\Support\Facades\Route;

// Route for the home page
Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard, accessible only to authenticated and verified users
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'showRandomEvent'])->name('event.random');


// Routes for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route for displaying the event organizer page
Route::get('/event', [EventController::class, 'index'])->name('events.index');

// Route for storing a new event
Route::post('/events/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/{event}/edit', [EventController::class, 'edit'])->name('event.edit');

Route::get('/event', [EventController::class, 'fetch'])->name('event.fetch');

// Route for showing all events, returns JSON
Route::get('/event/show', [EventController::class, 'show']);
Route::put('/event/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/event/{organisateur}', [EventController::class, 'destroy'])->name('events.destroy');
// Route for updating the event

// Route to show the form for editing the event
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('organisateur.edit');

// Route to update the event (PUT request)
Route::put('/event/{id}', [EventController::class, 'update'])->name('organisateur.update');

// Include authentication-related routes
// Route for displaying the contact page
// routes/web.php
Route::resource('events', EventController::class);



Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');


// buy
Route::post('/event/pay/{eventId}', [EventController::class, 'session'])->name('event.pay');
Route::get('/session', [stripeController::class, 'session']);
Route::get('/success', [StripeController::class, 'success'])->name('success');
require __DIR__.'/auth.php';
