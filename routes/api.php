<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/events/{id}/purchase', [TicketController::class, 'purchase']);
    Route::get('/my-tickets', [TicketController::class, 'myTickets']);

    Route::middleware('can:manage-events')->group(function () {
        Route::post('/events', [EventController::class, 'store']);
        Route::put('/events/{id}', [EventController::class, 'update']);
        Route::delete('/events/{id}', [EventController::class, 'destroy']);
    });
});

Route::get('/tickets/validate/{code}', [TicketController::class, 'validateTicket'])->name('tickets.validate');
