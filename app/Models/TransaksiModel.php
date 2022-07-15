<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'nofak';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nofak', 'kode', 'jumlah_anak', 'jumlah_dewasa'];

    public function getAll()
    {
        $builder = $this->db->table('transaksi');
        $builder->join('wisata', 'wisata.kode = transaksi.kode');
        $query = $builder->get();
        return $query->getResult();
    }

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
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
