<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController as Controller;

class AdminProfileController extends Controller
{
    /**
     * Show the general profile settings screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function show(Request $request)
    {
        return Jetstream::inertia()->render($request, 'Admin/Profile/Show', [
            'selectedTab' => $request->query('tab'),
            'sessions' => $this->sessions($request)->all(),
            'user' => $request->user(),
        ]);
    }
}
