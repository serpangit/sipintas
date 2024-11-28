<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Login extends Model
{
    protected $table = 'spm_akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['nama_akun', 'username_akun', 'password', 'id_alias'];

    public function select_mitra($alias)
    {
        $db = \Config\Database::connect();
        $select_mitra = $db->query("SELECT spm_mitra.alias from spm_akun join spm_mitra on spm_mitra.id_mitra = $alias")->getResult();
        return $select_mitra;
    }
}
