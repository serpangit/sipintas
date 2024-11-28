<?php

namespace App\Models;

use \CodeIgniter\Model;

class Model_Commonmodel extends Model
{
    public function selectData($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->select("*");
        $builder->where($where);
        $query = $builder->get();
        // echo $this->db->getLastQuery();
        // die();
        return $query->getResult();
    }

    public function getDate($alias)
    {
        $db = \Config\Database::connect();
        // $builder = $this->db->table("temuan_$alias");
        // $builder->select("SELECT DATE(created_at) AS tanggal", false);
        return $db->query("SELECT DATE(created_at) AS tanggal FROM temuan_$alias")->getResult();
    }

    public function getTable($table)
    {
        $builder = $this->db->table($table);
        $builder->select("*");
        $query = $builder->get();
        return $query->getResult();
    }

    public function getKategori()
    {
        // $builder = $this->db->table($table);
        // $builder->select()
        $db = \Config\Database::connect();
        $select_kategori_ais = $db->query("SELECT spm_kategori.nama_kategori from temuan_ais join spm_kategori on spm_kategori.id_kategori = temuan_ais.idfk_kategori")->getResult();
        return $select_kategori_ais;
    }

    public function getAis()
    {
        $db = \Config\Database::connect();
        // $query = $db->query('SELECT id_temuan, spm_kategori.nama_kategori, spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, created_at, temuan_ais.target_pemenuhan, lokasi_objek, jalur, deskripsi, dokumentasi_0, dokumentasi_50, dokumentasi_100, pic FROM temuan_ais JOIN spm_kategori on spm_kategori.id_kategori = temuan_ais.idfk_kategori JOIN spm_indikator on spm_indikator.id_indikator = temuan_ais.idfk_indikator JOIN spm_subindikator on spm_subindikator.id_subindikator = temuan_ais.idfk_subindikator')->getResult();
        $query = $db->query("SELECT id_temuan, spm_kategori.nama_kategori, spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, date_format(created_at, '%Y-%m-%d') as created_at, temuan_ais.target_pemenuhan, temuan_ais.tanggal_selesai, lokasi_objek, jalur, deskripsi, dokumentasi_0, dokumentasi_50, dokumentasi_100, latitude,longitude, pic, temuan_ais.status FROM temuan_ais JOIN spm_kategori on spm_kategori.id_kategori = temuan_ais.idfk_kategori JOIN spm_indikator on spm_indikator.id_indikator = temuan_ais.idfk_indikator JOIN spm_subindikator on spm_subindikator.id_subindikator = temuan_ais.idfk_subindikator")->getResult();
        return $query;
    }

    public function getAisCount()
    {
        $db = \Config\Database::connect();
        // $query = $db->query('SELECT id_temuan, spm_kategori.nama_kategori, spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, created_at, temuan_ais.target_pemenuhan, lokasi_objek, jalur, deskripsi, dokumentasi_0, dokumentasi_50, dokumentasi_100, pic FROM temuan_ais JOIN spm_kategori on spm_kategori.id_kategori = temuan_ais.idfk_kategori JOIN spm_indikator on spm_indikator.id_indikator = temuan_ais.idfk_indikator JOIN spm_subindikator on spm_subindikator.id_subindikator = temuan_ais.idfk_subindikator')->getResult();
        $query = $db->query("SELECT id_temuan, spm_kategori.nama_kategori, spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, date_format(created_at, '%Y-%m-%d') as created_at, temuan_ais.target_pemenuhan, temuan_ais.tanggal_selesai, lokasi_objek, jalur, deskripsi, dokumentasi_0, dokumentasi_50, dokumentasi_100, latitude,longitude, pic, temuan_ais.status FROM temuan_ais JOIN spm_kategori on spm_kategori.id_kategori = temuan_ais.idfk_kategori JOIN spm_indikator on spm_indikator.id_indikator = temuan_ais.idfk_indikator JOIN spm_subindikator on spm_subindikator.id_subindikator = temuan_ais.idfk_subindikator where temuan_ais.status = 'open'")->getNumRows();
        return $query;
    }

    public function update_50($id, $dok_50)
    {
        $alias = session()->get('alias');
        $db = \Config\Database::connect();
        // $query = $db->query("UPDATE temuan_ais set dokumentasi_50 = '$dok_50' where id_temuan = $id")->getResult();
        $ais = $db->table('temuan_ais');
        $ais->where('id_temuan', $id)->set('dokumentasi_50', $dok_50)->update();
        // return $query;
    }

    public function update_100($id, $dok_100)
    {
        $alias = session()->get('alias');
        $db = \Config\Database::connect();
        // $query = $db->query("UPDATE temuan_ais set dokumentasi_100 = '$dok_100' where id_temuan = $id")->getResult();
        // return $query;
        $ais = $db->table('temuan_ais');
        $ais->where('id_temuan', $id)->set('dokumentasi_100', $dok_100)->update();
    }

    public function detail_getAis($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT id_temuan, spm_kategori.nama_kategori, spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, date_format(created_at, '%Y-%m-%d') as created_at, temuan_ais.target_pemenuhan, lokasi_objek, jalur, deskripsi, dokumentasi_0, dokumentasi_50, dokumentasi_100, pic FROM temuan_ais JOIN spm_kategori on spm_kategori.id_kategori = temuan_ais.idfk_kategori JOIN spm_indikator on spm_indikator.id_indikator = temuan_ais.idfk_indikator JOIN spm_subindikator on spm_subindikator.id_subindikator = temuan_ais.idfk_subindikator WHERE temuan_ais.id_temuan = $id")->getResult();
        return $query;
    }

    public function data_mitra($alias)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT id_temuan, spm_kategori.nama_kategori, spm_indikator.nama_indikator, spm_subindikator.nama_subindikator, date_format(created_at, '%Y-%m-%d') as created_at, temuan_ais.target_pemenuhan, temuan_ais.tanggal_selesai, lokasi_objek, jalur, deskripsi, dokumentasi_0, dokumentasi_50, dokumentasi_100, latitude, longitude, pic FROM temuan_$alias JOIN spm_kategori on spm_kategori.id_kategori = temuan_ais.idfk_kategori JOIN spm_indikator on spm_indikator.id_indikator = temuan_ais.idfk_indikator JOIN spm_subindikator on spm_subindikator.id_subindikator = temuan_ais.idfk_subindikator")->getResult();
        return $query;
    }
}
