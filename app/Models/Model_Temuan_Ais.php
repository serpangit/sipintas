<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Temuan_Ais extends Model
{
    protected $table = "temuan_ais";
    protected $primaryKey = 'id_temuan';
    protected $allowedFields = ['id_temuan', 'idfk_kategori', 'idfk_indikator', 'created_at', 'target_pemenuhan', 'tanggal_selesai', 'lokasi_objek', 'jalur', 'deskripsi', 'dokumentasi_0', 'dokumentasi_50', 'dokumentasi_100', 'latitude', 'longitude', 'pic', 'status'];

    public function data($stat)
    {
        $builder = $this->table('temuan_ais');
        $builder->select("id_temuan, spm_kategori.nama_kategori, spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, date_format(created_at, '%Y-%m-%d') as created_at, temuan_ais.target_pemenuhan, temuan_ais.tanggal_selesai, lokasi_objek, jalur, deskripsi, dokumentasi_0, dokumentasi_50, dokumentasi_100, latitude, longitude, pic, status");
        $builder->join('spm_kategori', 'spm_kategori.id_kategori = temuan_ais.idfk_kategori');
        $builder->join('spm_indikator', 'spm_indikator.id_indikator = temuan_ais.idfk_indikator');
        $builder->join('spm_subindikator', 'spm_subindikator.id_subindikator = temuan_ais.idfk_subindikator');
        $builder->where('status', $stat);
        return $builder;
    }

    public function data_review($stat)
    {
        $builder = $this->table('temuan_ais');
        $builder->select("id_temuan, a.nama_kategori, spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, date_format(created_at, '%Y-%m-%d') as created_at, temuan_ais.target_pemenuhan, temuan_ais.tanggal_selesai, lokasi_objek, jalur, deskripsi, dokumentasi_0, dokumentasi_50, dokumentasi_100, latitude, longitude, pic, status");
        $builder->join('spm_kategori as a', 'a.id_kategori = temuan_ais.idfk_kategori');
        $builder->join('spm_indikator as b', 'b.id_indikator = temuan_ais.idfk_indikator');
        $builder->join('spm_subindikator as c', 'c.id_subindikator = temuan_ais.idfk_subindikator');
        $builder->where('status', $stat);
        return $builder;
    }

    // public function data($stat)
    // {
    //     $builder = $this->table('temuan_ais');
    //     $builder->select('id_temuan', 'idfk_kategori', 'idfk_indikator', 'created_at', 'target_pemenuhan', 'tanggal_selesai', 'lokasi_objek', 'jalur', 'deskripsi', 'dokumentasi_0', 'dokumentasi_50', 'dokumentasi_100', 'latitude', 'longitude', 'pic', 'status');
    //     $builder->where('status', $stat);
    //     return $builder;
    // }
}
