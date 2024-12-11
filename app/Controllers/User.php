<?php

namespace App\Controllers;

use App\Models\Model_Commonmodel;
use App\Models\Model_Kategori;
use App\Models\Model_Login;
use App\Models\Model_Mitra;
use App\Models\Model_Spm;
use App\Models\Model_Subkategori;
use CodeIgniter\CLI\Console;
use CodeIgniter\Files\File;
use CodeIgniter\Model;
use App\Models\Model_Temuan_Ais;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class User extends BaseController
{
    protected $model_spm;
    protected $model;
    protected $kate;
    protected $mitra;
    protected $common;
    protected $temuan_ais;
    public function __construct()
    {
        $this->model = new Model_Commonmodel();
        $this->model_spm = new Model_Spm();
        $this->kate = new Model_Kategori();
        $this->mitra = new Model_Mitra();
        $this->common = new Model_Commonmodel();
        $this->temuan_ais = new Model_Temuan_Ais();
        helper(['url', 'form']);
        $pager = service('pager');
    }

    public function dashboard()
    {
        if (session()->get('role') == 1) {
            return redirect()->to('/admin');
        }
        $db = \Config\Database::connect();
        $query = $db->query("SELECT alias from spm_mitra where alias");
        $database = session()->get('alias');
        // die;
        if (session()->get('alias') == '') {
            $alias = $db->query("SELECT * from spm_mitra where alias <> 'wsp'")->getResult();
            $no = 0;
            foreach ($alias as $key) {
                $no++;
                $data = [
                    "data" => $db->query("SELECT * FROM temuan_$key->alias")->getResult(),
                    'num' => array('1', '2')
                ];
                return view('/user/dashboard', $data);
            }
            die;
        }
        if ($database != 'wsp') {
            $alias = session()->get('alias');
            $open_count = count($this->temuan_ais->where('status', 'open')->findAll());
            $review_count = count($this->temuan_ais->where('status', 'review')->findAll());
            $revision_count = count($this->temuan_ais->where('status', 'revision')->findAll());
            session()->setFlashdata('stat', 'open');
            $data = [
                'data_open' => $this->temuan_ais->data('open')->paginate(6, 'sipintas'),
                'data_review' => $this->temuan_ais->data('review')->paginate(6, 'sipintas2'),
                'open_count' => $open_count,
                'review_count' => $review_count,
                'revision_count' => $revision_count,
                'review_count' => $review_count,
                'pager_open' => $this->temuan_ais->data('open')->pager,
                // 'pager_review' => $data_review->pager,
            ];
            //dd($data['revision_query']);
            return view('/user/dashboard', $data);
        } else {
            $alias = $db->query("SELECT * from spm_mitra where alias <> 'wsp'")->getResult();
            $data = [
                'data_ais' => $this->common->getAis(),
                'data_ais_count' => $this->common->getAisCount()
            ];
            return view('/user/dashboard', $data);
        }
    }

    public function review()
    {
        //$alias = session()->get('alias');
        $open_count = count($this->temuan_ais->where('status', 'open')->findAll());
        $review_count = count($this->temuan_ais->where('status', 'review')->findAll());
        $revision_count = count($this->temuan_ais->where('status', 'revision')->findAll());
        session()->setFlashdata('stat', 'review');
        $data = [
            'data_open' => $this->temuan_ais->data('open')->paginate(6, 'sipintas'),
            'data_review' => $this->temuan_ais->data('review')->paginate(6, 'sipintas2'),
            'open_count' => $open_count,
            'review_count' => $review_count,
            'revision_count' => $revision_count,
            'review_count' => $review_count,
            'pager_open' => $this->temuan_ais->data('open')->pager,
            'pager_review' => $this->temuan_ais->data('review')->pager,
        ];
        //dd($data['revision_query']);
        return view('/user/dashboard', $data);
    }

    public function revision()
    {
        $open_count = count($this->temuan_ais->where('status', 'open')->findAll());
        $review_count = count($this->temuan_ais->where('status', 'review')->findAll());
        $revision_count = count($this->temuan_ais->where('status', 'revision')->findAll());
        session()->setFlashdata('stat', 'revision');
        $data = [
            'data_open' => $this->temuan_ais->data('open')->paginate(6, 'sipintas'),
            'data_review' => $this->temuan_ais->data('review')->paginate(6, 'sipintas2'),
            'data_revision' => $this->temuan_ais->data('revision')->paginate(6, 'sipintas3'),
            'open_count' => $open_count,
            'review_count' => $review_count,
            'revision_count' => $revision_count,
            'review_count' => $review_count,
            'pager_open' => $this->temuan_ais->data('open')->pager,
            'pager_review' => $this->temuan_ais->data('review')->pager,
            'pager_revision' => $this->temuan_ais->data('revision')->pager,
        ];
        //dd($data['revision_query']);
        return view('/user/dashboard', $data);
    }

    public function detail_ais($id)
    {
        $data = [
            'data_ais' => $this->common->detail_getAis($id)
        ];
        // echo json_encode($data);
        // die;
        return view('user/detail_ais', $data);
    }
    public function tambah_temuan()
    {
        // $model = new Model_Commonmodel();
        $indikator = $this->model->selectData('spm_indikator');
        // echo "<pre>";
        // print_r($kategori);
        // die();
        // $subkategori = new Model_Subkategori();
        $mitra = new Model_Mitra();
        $kategori = new Model_Kategori();
        // $kat = $kategori->findAll();
        // echo json_encode($kat);
        // die;
        $data = [
            'mitra' => $mitra->getDataMitra(),
            'kategori' => $kategori->findAll(),
            // 'validation' => \Config\Services::validation(),
            'session' => service('session'),
            // 'subkategori' => $subkategori->get_datasubkategori(),
            'indikator' => $indikator
            // 'validation' => session()->getFlashdata('validation')
        ];
        // dd($data['validation']);
        // $query = $db->query("SELECT nama_kategori, target_pemenuhan FROM spm_kategori where nama_kategori = '$kategori'")->getResultArray();

        // echo json_encode($query);
        // var_dump(session());
        return view('/user/tambah_temuan', $data);
    }

    public function indikator()
    {
        $kategori_id = $this->request->getPost("kId");
        $indikatorData = $this->model->selectData("spm_indikator", array("id_kategorifk" => $kategori_id));


        // $output = "";
        // foreach ($indikatorData as $indikator) {
        //     $output .= "<option value='$indikator->id_indikator'>$indikator->nama_indikator</option>";
        // }

        echo json_encode($indikatorData);
    }

    public function subindikator()
    {
        $indikator_id = $this->request->getPost("sId");
        $subindikatorData = $this->model->selectData("spm_subindikator", array("id_indikatorfk" => $indikator_id));

        echo json_encode($subindikatorData);
    }

    public function page_layout()
    {
        return view('/user/layout/page_layout');
    }

    public function cekdb()
    {
        helper('form');
        $model = new Model_Commonmodel();
        $kategori = $model->selectData('spm_subindikator');
        echo "<pre>";
        print_r($kategori);
        die();
        return view('/user/cekdb');
    }

    public function ajax()
    {
        // echo "halaman ajax";

        $db = \Config\Database::connect();
        $kategori = $_GET['kategori'];

        $query = $db->query("SELECT nama_kategori, target_pemenuhan FROM spm_kategori where nama_kategori = '$kategori'")->getResultArray();
        echo json_encode($query);
        // print_r($query);
        // return view('/user/dashboard');
    }

    public function save()
    {
        dd($this->request->getPost());
    }

    public function create_spm()
    {
        // $s =  $this->request->getVar('mitra_spm');
        // echo ("temuan_$s");
        // die;
        session();
        $rules = [
            'mitra_spm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Mitra SPM harus dipilih'
                ]
            ],
            'kategori_spm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori SPM harus dipilih'
                ]
            ],
            'lokasi_objek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Objek harus diisi'
                ]
            ],
            'jalur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jalur harus diisi'
                ]
            ],
            'indikator' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Indikator harus diisi'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi'
                ]
            ],
            'dokumentasi_0' => [
                'rules' => 'uploaded[dokumentasi_0]',
                'errors' => [
                    'uploaded' => 'Gambar belum dipilih'
                ]
            ],
            'pic' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'PIC harus diisi'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img = $this->request->getFile('dokumentasi_0');
        $oriname = $img->getName();
        $img->move(ROOTPATH . 'public/images', $oriname);
        $alias = $this->request->getVar('mitra_spm');
        $save = [
            'idfk_kategori' => $this->request->getVar('kategori_spm'),
            'idfk_indikator' => $this->request->getVar('indikator'),
            'idfk_subindikator' => $this->request->getVar('subindikator'),
            'target_pemenuhan' => $this->request->getVar('target_pemenuhan'),
            'lokasi_objek' => $this->request->getVar('lokasi_objek'),
            'jalur' => $this->request->getVar('jalur'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'dokumentasi_0' => $oriname,
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude'),
            'pic' => $this->request->getVar('pic'),
        ];
        // echo json_encode($save);
        // die;
        $this->model_spm->spm_baru("$alias", $save);
        // $this->model_spm->save($save);
        // session()->setFlashdata('pesan', 'SPM berhasil ditambahkan');
        return redirect()->to('user')->with('pesan', 'SPM berhasil ditambahkan');
    }

    public function update_50($id)
    {
        $dok_50 = $this->request->getFile('dokumentasi_50');
        $dok_name = $dok_50->getName();
        $dok_50->move(ROOTPATH . 'public/images', $dok_name);
        $this->common->update_50($id, $dok_name);
        return redirect('user')->with('pesan', 'Progress berhasil di update');
    }

    public function update_100($id)
    {
        $dok_100 = $this->request->getFile('dokumentasi_100');
        $dok_name = $dok_100->getName();
        $dok_100->move(ROOTPATH . 'public/images', $dok_name);
        $status = 'review';
        $data_update = [
            'dokumentasi_100' => $dok_name,
            'status' => $status
        ];
        $this->temuan_ais->where('id_temuan', $id)->set($data_update)->update();
        // $this->common->update_100($id, $dok_name, $status);
        $this->email($id);
        session()->setFlashdata('pesan', 'Progress berhasil di update');
        return redirect('user');
        // if ($this->common->update_100($id, $dok_name)) {
        //     $this->email();
        // } else {
        //     session()->setFlashdata('pesan', 'Progress berhasil di update');
        //     return redirect('user');
        // }
    }

    public function proses()
    {
        helper('form');
        $produk = new Model_Spm();
        $file = $this->request->getFile('userfile');
        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(WRITEPATH . 'images/', $imageName);
        };
        $mitra = new Model_Mitra();
        $kategori = new Model_Kategori();
        $data = [
            // 'mitra' => $mitra->getDataMitra(),
            // 'kategori' => $kategori->getDataKategori(),
            'dokumentasi_0' => $imageName
        ];
        $produk->save($data);
        return "berhasil";
    }

    public function email($id)
    {
        $emailTujuan = 'althoffauzanf@gmail.com';
        $emailPengirim = 'admin@wikaserangpanimbang.com';
        $email = \Config\Services::email();
        $email->setTo($emailTujuan);
        $email->setFrom($emailPengirim);
        $email->setSubject("Update Progres temuan SPM ID - $id - Review");
        $email->setMessage("
        Progress temuan SPM dengan ID : <b>$id</b> sudah 100%, mohon untuk direview. Klik <a href= " . base_url() . "><b>Login</b></a> untuk melihat progres.
        ");

        if ($email->send()) {
            echo "<h1>Pesan terkirim ke $emailTujuan</h1>";
        } else {
            echo "<h1>Pesan gagal dikirim</h1>";
            print_r($email->printDebugger());
        }
    }
}
