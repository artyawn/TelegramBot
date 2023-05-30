<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Route::get('bot/sendMessage', function() {
//    Telegram::sendMessage([
//        'chat_id' => '871463833',
//        'text' => 'Hello world!'
//    ]);
//});
Route::prefix('bot')->group( function () {
    Route::post('/ctwlwhwtnrurwhlebnfkflzagvlauizvknxkthrrkekfhxubdzmgimnkenhipubomehcrfcoeekfwcixtwtlfgqwhtshaqogmueknpefftmlfsdbdwkbuizazglnvfyp/webhook', function () {
        $update = Telegram::commandsHandler(true);
    });
//    Route::get('getUpdates', [UserController::class, 'getUpdates']);
    Route::get('users', [UserController::class, 'list']);
    Route::get('trashedUsers', [UserController::class, 'listWithTrashed']);
    Route::get('store', [UserController::class, 'store']);
    Route::get('export', [UserController::class, 'export']);
    Route::delete('delete', [UserController::class, 'destroy']);
    Route::delete('forceDelete', [UserController::class, 'forceDelete']);
});

