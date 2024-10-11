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


   
    

