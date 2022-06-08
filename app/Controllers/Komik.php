<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        // $komik = $this->komikModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        // manual database
        // $db = \config\Database::connect();
        // $builder = $db->table('komik');
        // $builder->select('*');
        // $builder->orderBy('id', 'DESC');
        // $komik = $builder->get()->getResultArray();
        // dd($komik);

        //manual database 2
        // $komikModel = new App\Models\KomikModel();
        // dd($komik);

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        //jika tidak ada ditable
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data komik tidak ditemukan');
        }
        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Menambah Data Komik',
            'validation' => \config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|min_length[3]|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'min_length' => '{field} komik harus lebih dari {param} karakter.',
                    'is_unique' => '{field} komik sudah ada.'
                ]
            ],
            'penulis' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'min_length' => '{field} komik harus lebih dari {param} karakter.'
                ]
            ],
        ])) {
            $validation = \config\Services::validation();
            // dd($validation); 
            return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/komik');
    }

    public function delete($id)
    {

        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {

        $data = [
            'title' => 'Edit Data Komik',
            'validation' => \config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id)
    {

        // cek judul

        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rules_judul = 'required';
        } else {
            $rules_judul = 'required|min_length[3]|is_unique[komik.judul]';
        }
        // validasi update
        if (!$this->validate([
            'judul' => [
                'rules' => $rules_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'min_length' => '{field} komik harus lebih dari {param} karakter.',
                    'is_unique' => '{field} komik sudah ada.'
                ]
            ],
            'penulis' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'min_length' => '{field} komik harus lebih dari {param} karakter.'
                ]
            ],
        ])) {
            $validation = \config\Services::validation();
            // dd($validation); 
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil update');
        return redirect()->to('/komik');
    }
}
