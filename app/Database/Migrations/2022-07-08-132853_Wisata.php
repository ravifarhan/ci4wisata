<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wisata extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode' => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],    
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],    
            'tiket_anak' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],    
            'tiket_dewasa' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('kode', true);
        $this->forge->createTable('wisata');
    }

    public function down()
    {
        $this->forge->dropTable('wisata');
    }
}
