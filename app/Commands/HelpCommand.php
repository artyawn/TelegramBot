<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    protected string $name = 'help';


    protected array $aliases = ['listcommands'];


    protected string $description = 'Help command, Get a list of all commands';


    public function handle()
    {
        $response = $this->getUpdate();

        $text = 'Hey stranger, thanks for visiting me.' . chr(10) . chr(10);
        $text .= 'I am a bot and working for' . chr(10);
        $text .= env('APP_URL') . chr(10) . chr(10);
        $text .= 'Please come and visit me there.' . chr(10);

        $this->replyWithMessage(compact('text'));

    }
}
