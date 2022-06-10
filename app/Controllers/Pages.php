<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // $faker = \Faker\Factory::create();
        // dd($faker->address);
        $data = [
            'title' => 'CodeIgniter Project',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {

        $data = [
            'title' => 'Contact Me',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Tuan Dipakeh No.10',
                    'kota' => 'Banda Aceh'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Tuan Dipakeh No.10',
                    'kota' => 'Banda Aceh'
                ]

            ]

        ];
        return view('pages/contact', $data);
    }
}
