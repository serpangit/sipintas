<?php

namespace App\Controllers;

use App\Models\Model_Akun;
use App\Models\Model_Login;

class Login extends BaseController
{
    public function login()
    {
        // if (session()->get('role') == 1) {
        //     return redirect()->to('admin');
        // } elseif (session()->get('role') != 1) {
        //     return redirect()->to('user');
        // }
        // return view('/authorization/login');
        if (session()->logged !== TRUE) {
            return view('/authorization/login');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/user');
            }
            return redirect()->to('/admin');
        }
    }

    public function auth()
    {
        $model = new Model_Login();
        $username_akun = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username_akun', $username_akun)->first();

        // $alias = $data['id_alias'];
        // $alias_mitra = $model->select_mitra($data['id_alias']);
        if ($data) {
            $alias_mitra = $model->select_mitra($data['id_alias']);
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($data['role'] == 1) {
                foreach ($alias_mitra as $key) {
                    if ($verify_pass) {
                        $sess_data = [
                            'nama_akun' => $data['nama_akun'],
                            'alias' => $key->alias,
                            'role' => $data['role'],
                            'logged' => TRUE
                        ];
                        session()->set($sess_data);
                        return redirect()->to('/admin');
                    }
                }
            } else {
                foreach ($alias_mitra as $key) {
                    if ($verify_pass) {
                        // $sess_data = [
                        //     'nama_akun' => $data['nama_akun'],
                        //     'alias' => $key->alias
                        // ];
                        // session()->set($sess_data);
                        // return redirect()->to('/user');
                        $sess_data = [
                            'nama_akun' => $data['nama_akun'],
                            'alias' => $key->alias,
                            'role' => $data['role'],
                            'logged' => TRUE
                        ];
                        // echo $key->alias;
                        // die;
                        session()->set($sess_data);
                        return redirect()->to('/user');
                    } else {
                        session()->setFlashdata('message', 'Password yang anda masukkan salah');
                        return redirect()->back();
                    }
                }
            }
        }
        session()->setFlashdata('message', 'Username tidak ada');
        return redirect()->back();
    }

    public function keluar()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
