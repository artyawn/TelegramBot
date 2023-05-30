<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Keyboard\Button;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class UserController extends Controller
{


    public function list()
    {
        $users = User::all()->sortBy('name');

        foreach ($users as $user) {
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => "Имя: $user->name, birth_date: $user->birth_date",
            ]);

//            $button = [
//                'inline_keyboard' => [
//                    [
//                        [
//                            'text' => 'fired',
//                            'callback_data' => "$user->id"
//                        ]
//                    ]
//                ]
//            ];
//            Http::post('https://api.telegram.org/bot6165345473:AAHn87y8SzKtRlX7xP1sf5r9zf__R4eTdME/sendMessage',
//                [
//                    'chat_id' => env('TELEGRAM_CHAT_ID'),
//                    'text' => 'fired',
//                    'reply_markup' => $button
//                ]);
        }
    }

    public function listWithTrashed()
    {
        return UserResource::collection(User::onlyTrashed());
    }
    public function store()
    {

    }

    public function export()
    {

    }

    public function destroy(User $user)
    {
        $user->delete();
    }

    public function restore(User $user)
    {
        $user->restore();
    }

    public function forceDelete(User $user)
    {
        $user->forceDelete();
    }


}
