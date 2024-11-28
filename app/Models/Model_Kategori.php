<?php



namespace App\Models;

use CodeIgniter\Model;

class Model_Kategori extends Model
{

    protected $table = 'spm_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = [
        'nama_kategori',
        'target_pemenuhan'
    ];

    // public function getDataKategori()
    // {
    //     return $this->findAll();
    // }
    public function getDataKategori($mitra)
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT * FROM temuan_$mitra")->getResult();
    }

    public function getDataKat()
    {
        $db = \Config\Database::connect();
        return $db->query("SELECT nama_kategori FROM spm_kategori where id_kategori = 1")->getResult();
    }
}
