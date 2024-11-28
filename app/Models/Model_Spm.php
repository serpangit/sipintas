<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Spm extends Model
{
    protected $table = 'spm_tabel';
    protected $primaryKey = 'id_spm';
    protected $allowedFields = [
        'id_mit',
        'id_kat',
        'target_pemenuhan',
        'lokasi_objek',
        'jalur',
        'indikator',
        'deskripsi',
        'dokumentasi_0',
        // 'dokumentasi_50',
        // 'dokumentasi_100',
        'pic'
    ];

    public function create($file)
    {
        $target = strtotime($_POST['target_pemenuhan']);

        $data = [
            // 'id_mit' => 2,
            // 'id_kat' => 3,
            // 'target_pemenuhan' => '2024-06-11',
            // 'lokasi_objek' => 'asdsad',
            // 'jalur' => 'asdsad',
            // 'indikator' => 'asdsad',
            // 'deskripsi' => 'asdsad',
            // 'dokumentasi_0' => 'asdsad',
            // 'pic' => 'asdsad'
            'id_mit' => $_POST['mitra_spm'],
            'id_kat' => $_POST['kategori_spm'],
            'target_pemenuhan' => $target,
            'lokasi_objek' => $_POST['lokasi_objek'],
            'jalur' => $_POST['jalur'],
            'indikator' => $_POST['indikator'],
            'deskripsi' => $_POST['deskripsi'],
            'dokumentasi_0' => $file,
            'pic' => $_POST['pic']

        ];
        // $this->set('FOREIGN_KEY_CHECKS=0');
        return $this->allowEmptyInserts()->insert($data);
    }

    public function simpan_gambar()
    {
        $data = [
            'dokumentasi_0' => $_FILES['dokumentasi_0'],
        ];
        return $this->allowEmptyInserts()->insert($data);
        // $db = \Config\Database::connect();
        // $query = $this->db->table($this->table)->insert($data);
        // return $query;
    }

    public function spm_baru($tabel, $data)
    {
        $db = \Config\Database::connect();
        // $query = "INSERT INTO temuan$tabel VALUES $data";
        // return $db->query($query)->getResult();
        $builder = $db->table("temuan_$tabel");
        $builder->insert($data);
    }
}
