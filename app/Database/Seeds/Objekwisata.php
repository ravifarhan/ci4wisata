<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Objekwisata extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $data = [
            'kode'         => $faker->buildingNumber,
            'nama'         => $faker->streetName,
            'tiket_anak'   => $faker->numberBetween(10000, 50000),
            'tiket_dewasa' => $faker->numberBetween(10000, 50000),
            'gambar'       => 'wonderful.png',
    ];
    $this->db->table('wisata')->insert($data);
    }
}
