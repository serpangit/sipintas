<?php

// use App\Controllers\BaseController;
namespace App\Controllers;


class CekSession extends BaseController
{
    public function cek()
    {
        if (session()->logged !== TRUE) {
            return view('/authorization/login');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/user');
            }
            return redirect()->to('/admin');
        }
    }
}
