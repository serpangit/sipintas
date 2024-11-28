<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Mitra extends Model
{
    protected $table = 'spm_mitra';
    protected $primaryKey = 'id_mitra';
    protected $allowedFields = ['nama_mitra', 'alias', 'link_halaman'];

    public function getDataMitra()
    {
        // $this->where('alias' == 'wsp');
        // return $this->findAll();
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM spm_mitra where alias <> 'wsp'")->getResult();
    }

    public function getDataAis_count()
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM temuan_ais")->getNumRows();
    }

    public function getDataAis_open()
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM temuan_ais where temuan_ais.status = 'open'")->getNumRows();
    }

    public function getDataAis_close()
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM temuan_ais where temuan_ais.status = 'close'")->getNumRows();
    }

    public function getDataDb_count()
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM temuan_db")->getNumRows();
    }

    public function getDataDb_open()
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM temuan_db where temuan_db.status = 'open'")->getNumRows();
    }

    public function getDataDb_close()
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM temuan_db where temuan_db.status = 'close'")->getNumRows();
    }
}
