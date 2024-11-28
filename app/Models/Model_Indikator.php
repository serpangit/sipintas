<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Indikator extends Model
{
    protected $table = 'spm_indikator';
    protected $primaryKey = 'id_indikator';
    protected $allowedFields = ['id_kategorifk', 'nama_indikator'];

    public function get_dataindikator()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT spm_indikator.id_indikator,spm_kategori.nama_kategori,spm_indikator.nama_indikator from spm_indikator join spm_kategori on spm_kategori.id_kategori = id_kategorifk ORDER BY id_indikator ASC")->getResult();
        return $query;
    }

    public function cekdb($data)
    {
        return $this->find($data);
    }

    function getSubkategori($id_kategori)
    {
        $this->where('id_kategorifk', $id_kategori);
        $this->orderBy('nama_indikator', 'ASC');
        $query = $this->find('nama_indikator');

        $output = '<option value="">=== Pilih Indikator ===</option>';

        foreach ($query->getResult as $q) {
            $output .= '<option value="' . $q->id_subkategori . '">' . $q->nama_indikator . '</option>';
        }

        return $output;
    }
}
