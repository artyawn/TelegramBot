<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{

    protected string $name = 'start';

    protected string $description = 'Join chat';



    public function handle()
    {
        $keyboard = [
            ['Add worker'],
            ['View workers'],
            ['View fired workers'],
            ['Export excel']
        ];

        $reply_markup = Keyboard::make([
                'keyboard' => $keyboard,
                'resize_keyboard' => true,
                'one_time_keyboard' => false,
            ]);

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'reply_markup' => $reply_markup,
        ]);
    }
}
