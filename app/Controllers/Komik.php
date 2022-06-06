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
        $komik = $this->komikModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            'komik' => $komik
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
}
