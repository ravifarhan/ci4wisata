<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nofak' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],    
            'jumlah_anak' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],    
            'jumlah_dewasa' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('nofak', true);
        // $this->forge->addForeignKey('kode','wisata', 'kode');
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('transaksi', 'transaksi_kode_foreign');
        $this->forge->dropTable('transaksi');
    }
}
