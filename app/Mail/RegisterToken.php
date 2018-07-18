<?php
namespace App\Mail;

use App\Model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class RegisterToken extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * RegisterToken constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info("register token: " . json_encode($this->user) );
        return $this->markdown('mail.register')
                    ->with([
                               'name' => $this->user->name,
                               'url' => route('email.verify', ['token' => $this->user->confirmation_token])
                           ]);
    }
}
