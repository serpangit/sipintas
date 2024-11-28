<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if (session()->logged !== TRUE) {
        //     if (session()->get('role') == 1) {
        //         return redirect()->to('/admin');
        //     } else {
        //         return redirect()->to('/user');
        //     }
        //     return redirect()->to('/login');
        // }
        if (session()->logged !== TRUE) {
            return redirect()->to('/login');
        }
        // echo session()->get('role');
        // die;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
