<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ],
            'phone_no' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'editor'],

            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',

            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
