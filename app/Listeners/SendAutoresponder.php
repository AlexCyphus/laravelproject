<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAutoresponder
{
    public function handle(MessageWasReceived $event)
    {
      $message = $event->message;
      Mail::send('emails.contact', ['msg' => $message], function($m) use ($message){
         $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
      });
    }
}
