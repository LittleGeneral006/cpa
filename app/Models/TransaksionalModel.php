<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksionalModel extends Model
{
    protected $table            = 'transaksional';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function getDataEntry($kd_data)
    {
        return $this->db->table('tb_data_entry')->select('*')
            ->where('tb_data_entry', $kd_data)
            ->get()
            ->getLastRow();
    }
    public function koordinator($kd_data)
    {
        return $this->db->table('tb_fcr')
            ->select('tb_fcr.kd_data, tb_fcr.nomor as nomor, tb_fcr_agunan.bukti_kepemilikan as bukti_kepemilikan, tb_fcr_usaha.lokasi_kantor as lokasi_kantor')
            ->join('tb_fcr_agunan', 'tb_fcr.kd_data = tb_fcr_agunan.kd_data')
            ->join('tb_fcr_usaha', 'tb_fcr.kd_data = tb_fcr_usaha.kd_data')
            ->where('tb_fcr.kd_data', $kd_data)
            ->get()
            ->getLastRow();
    }
    public function FCR($kd_data)
    {
        return $this->db->table('tb_fcr')
            ->select('tb_fcr.kd_data, tb_fcr.nomor as nomor, tb_fcr_agunan.bukti_kepemilikan as bukti_kepemilikan,tb_fcr_agunan.tanggal_kepemilikan as tanggal_kepemilikan,tb_fcr_agunan.harga_tanah_buku as harga_tanah_buku,tb_fcr_agunan.harga_tanah_pasar as harga_tanah_pasar,tb_fcr_agunan.luas_total as luas_total, tb_fcr_usaha.lokasi_kantor as lokasi_kantor, tb_fcr_agunan.luas_bangunan_lantai1 as luas_bangunan_lantai1,tb_fcr_agunan.luas_bangunan_lantai2 as luas_bangunan_lantai2, tb_fcr_agunan.harga_bangunan_pasar as harga_bangunan_pasar, tb_fcr_agunan.harga_bangunan_perolehan as harga_bangunan_perolehan')
            ->join('tb_fcr_agunan', 'tb_fcr.kd_data = tb_fcr_agunan.kd_data')
            ->join('tb_fcr_usaha', 'tb_fcr.kd_data = tb_fcr_usaha.kd_data')
            ->where('tb_fcr.kd_data', $kd_data)
            ->get()
            ->getRowArray();
    }
    public function DataEntry($kd_data)
    {
        return $this->db->table('tb_data_entry')
            ->select('*')
            ->where('tb_data_entry.kd_data', $kd_data)
            ->get()
            ->getRowArray();
    }
    // public function getDataFromTable($table, $kd_data)
    // {
    //     // Query ke tabel yang dinamis menggunakan kd_data
    //     $builder = $this->db->table($table);
    //     $query = $builder->where('kd_data', $kd_data)->get();
    //     return $query->getRowArray();
    // }
    public function getDataFromTable($table, $kd_data)
    {
        $builder = $this->db->table($table);
        $query = $builder
        ->where('kd_data', $kd_data)
        ->get();

        $result = $query->getRowArray();

        // Hapus kolom created_at, updated_at, deleted_at dari hasil
        return $result;
    }
    // public function getLatestRange()
    // {
    //     return $this->db->table('t_distribusi')->select('RANGE')
    //         ->orderBy('ID', 'ASC') // Ganti 'id' dengan nama kolom yang merepresentasikan urutan data paling akhir.
    //         ->where("APPROVER != ''")
    //         ->orwhere("APPROVER != '-'")
    //         ->get()
    //         ->getLastRow();
    // }

}
