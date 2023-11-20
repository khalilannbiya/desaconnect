<?php

namespace App\Http\Responses;

use RealRashid\SweetAlert\Facades\Alert;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;



class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {

        $userName = auth()->user()->name;
        $home = "";
        if (auth()->user()->role_id === 1) {
            // Role As an Admin
            $home = '/admin/dashboard';
        } else if (auth()->user()->role_id === 2) {
            // Role as a staff
            $home = '/staff/dashboard';
        } else {
            // Role as a complainant
            $home = '/';
        }

        Alert::toast("<strong>Login Berhasil!</strong> Selamat datang $userName", 'success')->toHtml()->timerProgressBar();
        return redirect()->intended($home);
    }
}
