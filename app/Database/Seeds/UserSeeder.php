<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;
use  App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new UserModel();

        $user_object->insertBatch([
            [
                "name" => "Rahul Sharma",
                "email" => "rahul_sharma@mail.com",
                "phone_no" => "7899654125",
                "role" => "admin",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ],
            [
                "name" => "Prabhat Pandey",
                "email" => "prabhat@mail.com",
                "phone_no" => "8888888888",
                "role" => "editor",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ]
        ]);

        // $faker = \Faker\Factory::create('id_ID');

        // for ($i = 0; $i < 5; $i++) {

        //     $data = [
        //         'nama' => $faker->name,
        //         'email' => $faker->,
        //         'phone_no' => $faker->phoneNumber,
        //         'role'    => 'admin',
        //         'password'    => password_hash("12345678", PASSWORD_DEFAULT),
        //         'created_at' => Time::createFromTimestamp($faker->unixTime()),
        //         'updated_at' => Time::now()
        //     ];

        //     $this->db->table('users')->insert($data);
        // }
    }
}
