<?php

namespace App\Http\Controllers\User\Subscription;

use Inertia\Inertia;
use App\Models\CmsPage;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Subscription\SubscriptionRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;

class SubscriptionController extends Controller
{

public function submit(SubscriptionRequest $request)
    {
        $vars = $request->validated();

        $subscription = Subscription::create($vars);

        $this->subscriptionMailer($subscription);

    }

    private function subscriptionMailer(Subscription $subscription)
    {
        $cms = CmsPage::where('slug', 'contact-us')->first();

        $email = $cms->content['subscription_email_recipient'];
        $explodedMails = explode(", ", $email);
        
        Mail::to($explodedMails)->send(new SubscriptionMail($subscription));
    }
}
