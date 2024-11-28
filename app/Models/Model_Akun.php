<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Akun extends Model
{
    protected $table = 'spm_akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['nama_akun', 'username_akun', 'password', 'id_alias', 'role'];

    public function getDataAkun()
    {
        return $this->findAll();
    }

    public function getSemua()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT spm_akun.id_akun, spm_akun.nama_akun, spm_role.nama_role from spm_akun join spm_role on spm_role.id_role = spm_akun.role")->getResult();
        return $query;
    }
}
