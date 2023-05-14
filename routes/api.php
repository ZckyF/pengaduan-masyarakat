<?php

use App\Events\Message;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('complaints', function() {
    return response()->json(Complaint::all()->where('deleted', false));
});

Route::get('tes', function() {
    // Call Event
    Message::dispatch("AJG");
});