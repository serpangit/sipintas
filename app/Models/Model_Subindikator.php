<?php

namespace App\Models;

use \CodeIgniter\Model;

class Model_Subindikator extends Model
{
    protected $table = "spm_subindikator";
    protected $primaryKey = "id_subindikator";
    protected $allowedFields = ['nama_subindikator', 'id_indikatorfk'];

    public function get_datasubindikator()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT spm_subindikator.id_subindikator,spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, spm_subindikator.target_pemenuhan from spm_subindikator join spm_indikator on spm_indikator.id_indikator = id_indikatorfk")->getResult();
        return $query;
    }
}
