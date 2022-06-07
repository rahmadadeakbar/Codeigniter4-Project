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
            'title' => 'Menambah Data Komik'
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
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
}
