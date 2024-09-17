<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse;

class AdminLogoutResponse implements LogoutResponse
{

    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('admin.login');
    }

}
