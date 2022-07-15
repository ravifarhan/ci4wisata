<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'wisata';
    protected $primaryKey       = 'kode';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['kode', 'nama', 'tiket_anak', 'tiket_dewasa', 'gambar'];

    public function getWisata($kode = false)
    {
        if($kode == false){
            return $this->findAll();
        }
        return $this->where(['kode' => $kode])->first();
    }
    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [
    //     'nama'        => 'required|is_unique[wisata.nama]',
    // ];
    // protected $validationMessages   = [
    //     'nama' => [
    //         'required'  => 'Mohon Isi Nama',
    //         'is_unique' => 'Maaf. Nama Sudah Ada',
    //     ],
    // ];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
