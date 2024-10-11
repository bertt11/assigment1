<?php

use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Models\EventCategory;
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



Route::resource('events', EventController::class);
Route::resource('organizers', OrganizerController::class);
Route::resource('event_categories', EventCategoryController::class);


Route::get('/', [EventController::class, 'eventMenu'])->name('eventMenu');
Route::get('/events/{id}', [EventController::class, 'detailEvent'])->name('events.detailEvent');
Route::get('/master-organizer', [OrganizerController::class, 'index'])->name('masterOrganizer');

Route::get('/organizers/create', [OrganizerController::class, 'create'])->name('organizers.create');
Route::post('/organizers', [OrganizerController::class, 'store'])->name('organizers.store');
Route::get('/organizers/{id}/edit', [OrganizerController::class, 'edit'])->name('organizers.edit');
Route::put('/organizers/{id}', [OrganizerController::class, 'update'])->name('organizers.update');

// Rute untuk melihat detail organizer
Route::get('/organizers/{id}', [OrganizerController::class, 'show'])->name('organizers.show');

// Tambahkan routing untuk halaman Master Event Category
Route::get('/master-event-category', [EventCategoryController::class, 'index'])->name('masterEventCategory');
Route::get('/master-event-category/create', [EventCategoryController::class, 'create'])->name('eventCategory.create');
Route::post('/master-event-category', [EventCategoryController::class, 'store'])->name('eventCategory.store');
Route::get('/master-event-category/{id}/edit', [EventCategoryController::class, 'edit'])->name('eventCategory.edit');
Route::put('/master-event-category/{id}', [EventCategoryController::class, 'update'])->name('eventCategory.update');
Route::delete('/master-event-category/{id}', [EventCategoryController::class, 'destroy'])->name('eventCategory.destroy');


// Rute untuk menampilkan semua event
Route::get('/events', [EventController::class, 'index'])->name('masterEvent');

// Rute untuk membuat event baru
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Rute untuk menyimpan event baru
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Rute untuk menampilkan event berdasarkan ID
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Rute untuk mengedit event
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');



// Rute untuk memperbarui event
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

// Rute untuk menghapus event
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');





    

