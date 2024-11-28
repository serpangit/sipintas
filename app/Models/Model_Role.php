<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Role extends Model
{
    protected $table = 'spm_role';
    protected $primaryKey = 'id_role';

    public function getDataRole()
    {
        return $this->findAll();
    }
}
