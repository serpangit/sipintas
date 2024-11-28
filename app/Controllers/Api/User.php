<?php

namespace App\Controllers\Api;

use App\Models\Model_Kategori;
use App\Models\Model_Subindikator;
use App\Models\Model_Subkategori;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    use ResponseTrait;

    // public function show($id_kategori = null)
    // {
    //     $kategori = new Model_Kategori();
    //     // $data = $kategori->getIdKategori();
    //     $data = $kategori->find($id_kategori);

    //     return $this->respond($data);
    // }

    public function show($id_subindikator = null)
    {
        $subindikator = new Model_Subindikator();
        // $data = $kategori->getIdKategori();
        $data = $subindikator->find($id_subindikator);

        return $this->respond($data);
    }
}
