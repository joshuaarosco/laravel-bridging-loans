<?php

namespace App\Listeners;

use App\Mail\LoanApproved;
use App\Mail\LoanCompleted;
use App\Mail\LoanRejected;
use App\Mail\NewUser;
use App\Events\SendEmailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendEmailEvent $event)
    {
        switch ($event->type) {
            case 'new_user':
                \Mail::to($event->data->email)->send(
                    new NewUser($event->data)
                );

                break;

            case 'loan_approved':
                \Mail::to($event->data->user->email)->send(
                    new LoanApproved($event->data)
                );

                break;

            case 'loan_completed':
                \Mail::to($event->data->user->email)->send(
                        new LoanCompleted($event->data)
                    );
    
                break;

            
             case 'loan_rejected':
                \Mail::to($event->data->user->email)->send(
                        new LoanRejected($event->data)
                    );
    
                break;
            
            default:
                // code...
                break;
        }
    }
}
