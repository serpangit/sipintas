<?php

namespace App\Controllers;

use App\Models\Model_Akun;
use App\Models\Model_Commonmodel;
use App\Models\Model_Indikator;
use App\Models\Model_Kategori;
use App\Models\Model_Mitra;
use App\Models\Model_Role;
use App\Models\Model_Subindikator;
use CodeIgniter\Database\RawSql;

use function PHPSTORM_META\map;
use function PHPSTORM_META\type;

class Admin extends BaseController
{
    protected $getDb;
    protected $akun;
    protected $kategori;
    protected $indikator;
    protected $subindikator;
    protected $role;
    protected $common;

    public function __construct()
    {
        // $this->cek_sesi();

        $this->akun = new Model_Akun();
        $this->kategori = new Model_Kategori();
        $this->indikator = new Model_Indikator();
        $this->subindikator = new Model_Subindikator();
        $this->role = new Model_Role();
        $this->common = new Model_Commonmodel();

        $mitra = new Model_Mitra();
        $role = new Model_Role();
        $this->getDb = [
            'akun' => $this->akun->getSemua(),
            'mitra' => $mitra->getDataMitra(),
            'mitra2' => $mitra->findAll(),
            'role' => $role->getDataRole(),
            'kategori' => $this->kategori->findAll(),
            'indikator' => $this->indikator->get_dataindikator(),
            'subindikator' => $this->subindikator->get_datasubindikator(),
            'role' => $this->role->findAll(),
            'data_ais_count' => $mitra->getDataAis_count(),
            'data_ais_open' => $mitra->getDataAis_open(),
            'data_ais_close' => $mitra->getDataAis_close(),
            'data_db_count' => $mitra->getDataDb_count(),
            'data_db_open' => $mitra->getDataDb_open(),
            'data_db_close' => $mitra->getDataDb_close(),
            // 'jenis' => $db->query("SELECT spm_role.nama_role FROM spm_akun join spm_role on spm_role.id_role = spm_akun.role")->getResult()
        ];
    }

    public function cek_sesi()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
    }
    public function dashboard()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
        $this->cek_sesi();
        session()->remove('utilitas');
        $mitra = new Model_Mitra();
        $data = [
            'mitra' => $mitra->getDataMitra(),
            'data_ais_count' => $mitra->getDataAis_count(),
            'data_ais_open' => $mitra->getDataAis_open(),
            'data_ais_close' => $mitra->getDataAis_close(),
            'data_db_count' => $mitra->getDataDb_count(),
            'data_db_open' => $mitra->getDataDb_open(),
            'data_db_close' => $mitra->getDataDb_close(),
        ];
        return view('admin/dashboard', $data);
    }

    //Halaman mitra
    public function mitra_ais()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
        session()->remove('utilitas');
        $mitra = new Model_Mitra();
        $data = [
            'data_ais' => $this->common->getAis(),
            'mitra' => $mitra->getDataMitra(),
            'data_ais_count' => $mitra->getDataAis_count(),
            'data_ais_open' => $mitra->getDataAis_open(),
            'data_ais_close' => $mitra->getDataAis_close(),
            'data_db_count' => $mitra->getDataDb_count(),
            'data_db_open' => $mitra->getDataDb_open(),
            'data_db_close' => $mitra->getDataDb_close(),
        ];
        return view('admin/mitra/mitra_ais', $data);
    }

    public function mitra_db()
    {
        return view('/admin/mitra/mitra_db');
    }

    //Halaman Utilitas
    public function mitra()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
        session()->setFlashdata('utilitas', 'mitra');
        $mitra = new Model_Mitra();
        $data = [
            'mitra' => $mitra->getDataMitra()
        ];
        return view('admin/utilitas/mitra', $data);
    }

    public function tambah_mitra()
    {
        $forge = \Config\Database::forge();
        $mitra = new Model_Mitra();
        $nama_mitra = $this->request->getVar('nama_mitra');
        $alias = $this->request->getVar('alias');
        $link = "base_url('admin/mitra_$alias')";
        // echo $link;
        // die;

        $rules = [
            'nama_mitra' => [
                'rules' => 'required|is_unique[spm_mitra.nama_mitra]',
                'errors' => [
                    'required' => 'Nama Mitra harus diisi.',
                    'is_unique' => 'Nama Mitra sudah ada'
                ]
            ],
            'alias' => [
                'rules' => 'required|is_unique[spm_mitra.alias]',
                'errors' => [
                    'required' => 'Nama Alias Harus diisi.',
                    'is_unique' => 'Nama Alias sudah ada'
                ]
            ]
        ];
        $fields = [
            "id_temuan" => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'idfk_kategori' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'idfk_indikator' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'idfk_subindikator' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'target_pemenuhan' => [
                'type' => 'date'
            ],
            'lokasi_objek' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'jalur' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'deskripsi' => [
                'type' => 'varchar',
                'constraint' => 500
            ],
            'dokumentasi_0' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'dokumentasi_50' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'dokumentasi_100' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'latitude' => [
                'type' => 'double'
                // 'constraint' => 50
            ],
            'longitude' => [
                'type' => 'double'
                // 'constraint' => 50
            ],
            'pic' => [
                'type' => 'varchar',
                'constraint' => 50
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $forge->addPrimaryKey('id_temuan');
        $forge->addField($fields);
        $forge->createTable("temuan_$alias", true);
        // $forge->addKey('idfk_kategori', false, false, 'fk_kategori');
        // $forge->addKey('idfk_indikator', false, false, 'fk_indikator');
        // $forge->addKey('idfk_subindikator', false, false, 'fk_subindikator');
        // $forge->addForeignKey('idfk_kategori', 'kategori', 'id_kategori', '', '', 'kategori_fk');
        // $forge->addForeignKey('idfk_kategori', 'kategori', 'id_kategori', 'CASCADE', 'CASCADE', "temuan_'$alias'_ibfk_1");
        $forge->processIndexes("temuan_$alias");
        $mitra->save([
            'nama_mitra' => $nama_mitra,
            'alias' => $alias,
            'link_halaman' => $link
        ]);
        // if ($forge->createTable("temuan_$alias", true)) {
        //     $mitra->save([
        //         'nama_mitra' => $nama_mitra,
        //         'alias' => $alias
        //     ]);
        // } else {
        //     echo "gagal";
        // }
        // die;
        // $forge->addForeignKey('idfk_kategori', 'kategori', 'id_kategori', 'CASCADE', 'CASCADE', "temuan_.$alias._ibfk1");

        session()->setFlashdata('pesan', "Mitra $nama_mitra Berhasil ditambahkan");
        return redirect()->back();
        // return redirect()->to(base_url('admin'));
    }

    public function hapus_mitra($id_mitra)
    {
        $this->cek_sesi();
        $mitra = new Model_Mitra();
        $mitra->select('alias, nama_mitra');
        $cari_alias = $mitra->where('id_mitra', $id_mitra)->find();
        $forge = \Config\Database::forge();
        foreach ($cari_alias as $c) {
            $alias = $c['alias'];
            $nama_mitra = $c['nama_mitra'];
            $forge->dropTable("temuan_$alias");
            // dd($cari_alias);
            $mitra->delete($id_mitra);
            session()->setFlashdata('pesan', "Mitra $nama_mitra berhasil dihapus");
            return redirect()->back();
        }
    }

    public function kategori()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
        session()->setFlashdata('utilitas', 'kategori');
        return view('admin/utilitas/kategori', $this->getDb);
    }
    public function tambah_kategori()
    {
        $this->cek_sesi();
        $kategori = new Model_Kategori();
        $kat = $this->request->getVar('nama_kategori');
        $kategori->save([
            'nama_kategori' => $kat
        ]);
        session()->setFlashdata('pesan', "Kategori $kat berhasil ditambahkan");
        return redirect()->back();
    }

    public function hapus_kategori($id_kategori)
    {
        $this->cek_sesi();
        $cari_kategori = $this->kategori->where('id_kategori', $id_kategori)->find();
        foreach ($cari_kategori as $key) {
            $nama_kategori = $key['nama_kategori'];
            $this->kategori->delete($id_kategori);
            session()->setFlashdata('pesan', "Kategori $nama_kategori berhasil dihapus");
            return redirect()->back();
        }
    }

    public function indikator()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
        session()->setFlashdata('utilitas', 'indikator');
        return view('admin/utilitas/indikator', $this->getDb);
    }

    public function tambah_indikator()
    {
        $this->cek_sesi();
        $id_kategori = $this->request->getVar('nama_kategori');
        $indikator = $this->request->getVar('nama_indikator');
        $data = [
            'id_kategorifk' => $id_kategori,
            'nama_indikator' => $indikator
        ];
        $this->indikator->save($data);
        $this->indikator->getInsertID();
        session()->setFlashdata('pesan', "Indikator $indikator berhasil ditambahkan");
        return redirect()->back();
    }

    public function hapus_indikator($id_indikator)
    {
        $this->cek_sesi();
        $cari_indikator = $this->indikator->where('id_indikator', $id_indikator)->find();
        foreach ($cari_indikator as $key) {
            $nama_indikator = $key['nama_indikator'];
            $this->indikator->delete($id_indikator);
            session()->setFlashdata('pesan', "Indikator $nama_indikator berhasil dihapus");
            return redirect()->back();
        }
    }

    public function subindikator()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
        session()->setFlashdata('utilitas', 'subindikator');
        return view('admin/utilitas/subindikator', $this->getDb);
    }

    public function tambah_subindikator()
    {
        $this->cek_sesi();
        $sub_indikator = $this->request->getVar('nama_subindikator');
        $indikator = $this->request->getVar('nama_indikator');
        $data = [
            'nama_subindikator' => $sub_indikator,
            'id_indikatorfk' => $indikator
        ];
        // echo json_encode($data);
        // die;
        $this->subindikator->save($data);
        $this->subindikator->getInsertID();
        session()->setFlashdata('pesan', "Sub-indikator $sub_indikator berhasil ditambahkan");
        return redirect()->back();
    }

    public function hapus_subindikator($id_subindikator)
    {
        $this->cek_sesi();
        $cari_subindikator = $this->subindikator->where('id_subindikator', $id_subindikator)->find();
        foreach ($cari_subindikator as $key) {
            $nama_subindikator = $key['nama_subindikator'];
            $this->subindikator->delete($id_subindikator);
            session()->setFlashdata('pesan', "Sub-indikator $nama_subindikator berhasil dihapus");
            return redirect()->back();
        }
    }

    public function akun()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
        // $db = \Config\Database::connect();
        // $query = $db->query("SELECT spm_role.nama_role FROM spm_akun join spm_role on spm_role.id_role = spm_akun.role")->getResult();
        session()->setFlashdata('utilitas', 'akun');
        $data = $this->getDb;
        return view('admin/utilitas/akun', $data);
    }

    public function tambah_akun()
    {
        $this->cek_sesi();
        $nama_akun = $this->request->getVar('nama_akun');
        $role_akun = $this->request->getVar('role');
        $nama_mitra = $this->request->getVar('nama_mitra');
        $username_akun = $this->request->getVar('username_akun');
        $password_akun = $this->request->getVar('password_akun');
        $rules = [
            'nama_akun' => ['rules' => 'required|is_unique[spm_akun.nama_akun]', 'errors' => ['required' => 'Field harus diisi', 'is_unique' => 'Nama Akun sudah terdaftar']],
            'username_akun' => ['rules' => 'required|is_unique[spm_akun.username_akun]|regex_match[/^\S*$/]', 'errors' => ['required' => 'Field harus diisi', 'is_unique' => 'Username sudah terdaftar', 'regex_match' => 'Tidak boleh ada spasi']],
            'nama_mitra' => ['rules' => 'required', 'errors' => ['required' => 'Mitra harus diisi']],
            'role' => ['rules' => 'required', 'errors' => ['required' => 'Role harus diisi']],
            'password_akun' => ['rules' => 'required|max_length[25]|min_length[8]', 'errors' => ['required' => 'Password harus diisi', 'min_length' => 'Password tidak boleh kurang dari 8 karakter', 'max_length' => 'Password tidak boleh lebih dari 25 karakter']]
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->akun->save([
            'nama_akun' => $nama_akun,
            'role' => $role_akun,
            'username_akun' => $username_akun,
            'password' => password_hash($password_akun, PASSWORD_DEFAULT),
            'id_alias' => $nama_mitra
        ]);
        session()->setFlashdata('pesan', "Akun $nama_akun berhasil ditambahkan.");
        return redirect()->back();
    }

    public function hapus_akun($id_akun)
    {
        $cari_akun = $this->akun->where('id_akun', $id_akun)->find();
        foreach ($cari_akun as $key) {
            $nama_akun = $key['nama_akun'];
            $this->akun->delete($id_akun);
            session()->setFlashdata('pesan', "Akun $nama_akun berhasil dihapus");
            return redirect()->back();
        }
    }
    public function role()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/user');
        }
        session()->setFlashdata('utilitas', 'role');
        return view('admin/utilitas/role', $this->getDb);
    }

    public function temuan_asd()
    {
        echo "Halaman asd";
    }

    public function astra()
    {
        echo "Halaman astra";
    }
}
