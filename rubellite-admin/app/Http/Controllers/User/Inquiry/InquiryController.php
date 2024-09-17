<?php

namespace App\Http\Controllers\User\Inquiry;

use Inertia\Inertia;
use App\Models\CmsPage;
use App\Models\Inquiry;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Inquiry\InquiryRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryMail;

class InquiryController extends Controller
{

    public function submit(InquiryRequest $request)
    {
        $vars = $request->validated();

        $inquiry = Inquiry::create($vars);

        $this->inquiryMailer($inquiry);

    }

    private function inquiryMailer(Inquiry $inquiry)
    {
        $cms = CmsPage::where('slug', 'contact-us')->first();

        $email = $cms->content['inquiry_email_recipient'];
        $explodedMails = explode(", ", $email);
        
        Mail::to($explodedMails)->send(new InquiryMail($inquiry));
    }
}
