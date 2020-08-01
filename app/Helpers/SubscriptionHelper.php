<?php 

namespace App\Helpers;

use App\Subscriber;
use Illuminate\Support\Facades\Http;

class SubscriptionHelper
{
    public $email = '';

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function subscribe($token)
    {
        $response = Http::withToken($token)->put("https://api.sendgrid.com/v3/marketing/contacts", [
            "contacts"=>[[
                "email"=>$this->email
            ]
            ]
        ]);

        if($response->successful())
        {
            $subscriber = new Subscriber;
            $subscriber->email = $this->email;
            $subscriber->save();
        }
    }
}
