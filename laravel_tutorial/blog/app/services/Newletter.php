<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter {
    public function subscribe(string $email) {
        $mailchimp = new ApiClient();
        
    
        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);
        
        // $response = $mailchimp->addListMember('d3c0c95629', [
        //     'email_address' => request('email'),
        //     'status'=> 'subscribed'
        // ]);
        try {
            $response = $mailchimp->lists->addListMember('c1a7beb679', [
                'email_address' => request('email'),
                'status' => 'subscribed',
            ]);
        } catch (\Exception $e) {
            \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter.'
            ]);
        }
    }
}