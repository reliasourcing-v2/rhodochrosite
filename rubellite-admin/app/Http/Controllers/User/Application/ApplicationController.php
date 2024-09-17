<?php

namespace App\Http\Controllers\User\Application;

use Inertia\Inertia;
use App\Models\CmsPage;
use App\Models\Application;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Application\ApplicationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationMail;

class ApplicationController extends Controller
{

    public function submit(ApplicationRequest $request)
    {
        $vars = $request->validated();

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('application_images', $filename);
            $vars['cv'] = $path;
        }

        $application = Application::create($vars);

        $this->applicationMailer($application);

    }

    private function applicationMailer(Application $application)
    {
        $cms = CmsPage::where('slug', 'careers')->first();

        $email = $cms->content['application_email_recipient'];
        $explodedMails = explode(", ", $email);
        
        Mail::to($explodedMails)->send(new ApplicationMail($application));
    }
}
