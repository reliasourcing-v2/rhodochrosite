<?php

namespace App\Http\Controllers\User\Computation;

use Inertia\Inertia;
use App\Models\CmsPage;
use App\Models\Computation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Computation\ComputationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComputationMail;

class ComputationController extends Controller
{

    public function submit(ComputationRequest $request)
    {
        $vars = $request->validated();

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('computation_images', $filename);
            $vars['pdf'] = $path;
        }

        $computation = Computation::create($vars);

        $this->computationMailer($computation);

    }

    private function computationMailer(Computation $computation)
    {
        $email = $computation['email'];
        $explodedMails = explode(", ", $email);
        
        Mail::to($explodedMails)->send(new ComputationMail($computation));
    }
}
