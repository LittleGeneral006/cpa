<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Files\File;

// use CodeIgniter\I18n\Time;
use DateTime;
// Import namespace yang diperlukan
use CodeIgniter\Validation\Rules;

class Template extends BaseController
{
    private $now;
    public $db;
    public $session;
    public $email;
    public function __construct()
    {
        helper('date');
        // $this->Service = new ConfigServices();
        $this->db = \Config\Database::connect();
        $this->email = \Config\Services::email();
        $this->now = date('Y-m-d H:i:s', now());
        // $this->UsersModel = new UsersModel();
        $this->session = session();
    }
    public function index()
    {
        $data['title'] = 'Judul Template';
        // $data['menu'] = $this->db->query("SELECT * from tb_menu where status='aktif' group by kd_menu order by kd_menu asc")->getResult();
        return view('template/template', $data);
    }
    
    public function get_pengaturan()
    {
        $query = $this->db->query("SELECT * from tb_pengaturan")->getRow();
        $tampung = [
            'id' => $query->id,
            'singkatan_web' => $query->singkatan_web,
            'judul_web' => $query->judul_web,
            'copyright' => $query->copyright,
            'warna_tema' => $query->warna_tema,
            // 'redirect' => $query->redirect,
            // 'default_password' => $query->default_password
        ];
        if ($tampung) {
            $data = [
                'status' => 'success',
                'message' => $tampung
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => 'data pengaturan website tidak ditemukan'
            ];
        }
        echo json_encode($data);
    }
}
