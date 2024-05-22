<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksionalModel;
use CodeIgniter\API\ResponseTrait;

class GetData extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('date');
        // $this->Service = new ConfigServices();
        $this->db = \Config\Database::connect();
        $this->email = \Config\Services::email();
        $this->now = date('Y-m-d H:i:s', now());
        $this->TransaksionalModel = new TransaksionalModel();
        $this->session = session();
    }
    public function index()
    {
        //
    }

    public function FCR($kd_data)
    {
        // $dataTampil['FCR'] = $this->TransaksionalModel->FCR($kd_data);
        // // error_log(print_r($dataTampil, true));
        // header('Content-Type: application/json');
        // echo json_encode($dataTampil);

        $FCR = $this->TransaksionalModel->FCR($kd_data);

        if (!$FCR) {
            return $this->failNotFound('Data tidak ditemukan');
        }

        return $this->respond($FCR);
    }
}
