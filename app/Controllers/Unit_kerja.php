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

class Unit_kerja extends BaseController
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
    // public function index()
    // {
    // $data['title'] = 'Judul Template';
    // return view('template/template', $data);
    // }
    public function v_unit_kerja()
    {

        $hasil = $this->hak_akses();
        if ($hasil == true) {
            $data['title'] = 'Unit Kerja';
            return view('backend/v_unit_kerja', $data);
        } else {
            return redirect()->to('/login');
        }
    }
    public function hak_akses()
    {
        $param_kd_menu = '100';
        $controller = service('request')->uri->getSegment(1);
        // echo $controller;
        // var_dump($controller);
        $ada_kd_menu_di_menu = $this->db->query("SELECT kd_menu from tb_menu where controller = '" . $controller . "' and status='Aktif'")->getNumRows();
        // echo $ada_kd_menu_di_menu;
        if ($ada_kd_menu_di_menu > 0) {
            $param_kd_menu = $this->db->query("SELECT kd_menu from tb_menu where controller = '" . $controller . "' and status='Aktif'")->getRow()->kd_menu;
            // echo $param_kd_menu;
        } else {
            $ada_kd_menu_di_child = $this->db->query("SELECT kd_menu from tb_child_menu where controller = '" . $controller . "' and status='Aktif'")->getNumRows();
            if ($ada_kd_menu_di_child > 0) {
                $param_kd_menu = $this->db->query("SELECT kd_menu from tb_child_menu where controller = '" . $controller . "' and status='Aktif'")->getRow()->kd_menu;
            } else {
                $param_kd_menu = '100';
            }
        }
        // echo '<script>alert('.$param_kd_menu.')</script>';
        // $param_kd_menu = 900;

        $hasil = false;
        $ada_level = $this->db->query("SELECT kd_level, nama_level, aktif_level from tb_level where kd_level = '" . session()->get('kd_level_user') . "' and aktif_level = 'Aktif' ")->getNumRows();
        if ($ada_level > 0) {
            $ada_otoritas = $this->db->query("SELECT * from tb_otoritas where kd_level = '" . session()->get('kd_level_user') . "' and status = 'Aktif' ")->getNumRows();
            if ($ada_otoritas > 0) {
                $ada_menu_di_otoritas = $this->db->query("SELECT * from tb_otoritas where kd_level = '" . session()->get('kd_level_user') . "' and status = 'Aktif' and kd_menu = '" . $param_kd_menu . "' ")->getNumRows();
                if ($ada_menu_di_otoritas > 0) {
                    $kd_menu_di_oto = $this->db->query("SELECT * from tb_otoritas where kd_level = '" . session()->get('kd_level_user') . "' and status = 'Aktif' and kd_menu = '" . $param_kd_menu . "' ")->getRow();
                    $ada_kd_menu_di_menu = $this->db->query("SELECT * from tb_menu where kd_menu = '" . $kd_menu_di_oto->kd_menu . "' and status = 'Aktif'")->getNumRows();
                    if ($ada_kd_menu_di_menu > 0) {
                        $kd_menu_di_menu = $this->db->query("SELECT * from tb_menu where kd_menu = '" . $kd_menu_di_oto->kd_menu . "' and status = 'Aktif'")->getRow();
                        if ($kd_menu_di_oto->kd_menu == $kd_menu_di_menu->kd_menu) {
                            $hasil = true;
                        } else {
                            $hasil = false;
                        }
                    } else {
                        $ada_kd_menu_di_child = $this->db->query("SELECT * from tb_child_menu where kd_menu = '" . $kd_menu_di_oto->kd_menu . "' and status = 'Aktif'")->getNumRows();
                        if ($ada_kd_menu_di_child > 0) {
                            $kd_menu_di_child = $this->db->query("SELECT * from tb_child_menu where kd_menu = '" . $kd_menu_di_oto->kd_menu . "' and status = 'Aktif'")->getRow();
                            if ($kd_menu_di_oto->kd_menu == $kd_menu_di_child->kd_menu) {
                                $hasil = true;
                            } else {
                                $hasil = false;
                            }
                        } else {
                            $hasil = false;
                        }
                    }
                } else {
                    $hasil = false;
                }
            } else {
                $hasil = false;
            }
        } else {
            $hasil = false;
        }
        return $hasil;
    }
    public function tabel_unit()
    {
        $sQuery1 = "SELECT * FROM tb_unit_kerja ";
        $sQuery2 = "SELECT COUNT(kd_unit) AS TOTFIL FROM tb_unit_kerja ";
        $sQuery3 = "SELECT COUNT(kd_unit) AS TOT FROM tb_unit_kerja ";
        $sIndexColumn = "kd_unit";

        $where2 = " kd_cab_unit <>'abc' ";
        // $this->kd_cab = 001;
        if (session()->get('konsolidasi_user') == '1') {
            $where2 = " kd_cab_unit <>'abc' ";
        }
        if (session()->get('konsolidasi_user') == '2') {
            // $where2 = " kd_induk_pihak = '" . session()->get('kd_induk_user') . "' ";
            $where2 = " kd_cab_unit <>'abc' ";
        }
        if (session()->get('konsolidasi_user') == '3') {
            // $where2 = " kd_cab_unit = '" . session()->get('kd_unit_user') . "' ";
            $where2 = " kd_cab_unit <>'abc' ";
        }


        $aColumns = array(
            'kd_unit', 'kd_induk_unit', 'aktif_unit', 'nama_unit'
        );

        $sLimit = "";
        $sOrder = "";
        $sWhere = "";
        $where3 = " where " . $where2;

        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = " LIMIT " . intval($_GET['iDisplayStart']) . ", " .
                intval($_GET['iDisplayLength']);
        }
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sOrder .= "" . $aColumns[intval($_GET['iSortCol_' . $i])] . " " .
                        ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= "" . $aColumns[$i] . " LIKE '%" . $_GET['sSearch'] . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        if ($sWhere == "") {
            $where2 = " where " . $where2;
        } else {
            $sWhere = $sWhere . " and ";
        }
        $sQuery = $sQuery1 . $sWhere . $where2 . $sOrder  . $sLimit;
        // $sQuery = $sQuery1 . $sWhere . $where2 . ' order by tgl_pembuat_pks desc' . $sLimit;
        // $sQuery = $sQuery1;


        //$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
        $runResult = $this->db->query($sQuery);
        $rResult = $runResult->getResult();
        // echo json_encode($rResult);
        /* Data set length after filtering */
        $sQuery2 = $sQuery2 . $sWhere . $where2;
        $rResultFilterTotal = $this->db->query($sQuery2);
        $aResultFilterTotal = $rResultFilterTotal->getRow()->TOTFIL;
        $iFilteredTotal = $aResultFilterTotal;

        /* Total data set length  */
        $sQuery3 = $sQuery3 . $where3;
        $rResultTotal = $this->db->query($sQuery3);
        $iTotal = $rResultTotal->getRow()->TOT;
        // $hasil = $this->db->query($sQuery1)->result();
        // echo json_encode($hasil);
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );


        foreach ($rResult as $aRow) {

            $row = array();
            $row[] = $aRow->kd_unit; //0
            $row[] = $aRow->kd_induk_unit; //1
            $row[] = $aRow->nama_unit; //2
            //3
            if ($aRow->aktif_unit == 'Aktif') {
                $row[] = '<span class="label label-primary">' . $aRow->aktif_unit . '</span>';
            } else if ($aRow->aktif_unit == 'Tidak Aktif') {
                $row[] = '<span class="label label-danger">' . $aRow->aktif_unit . '</span>';
            } else {
                $row[] = '<span class="label label-warning">' . $aRow->aktif_unit . '</span>';
            }
            //4
            $row[] = '<button title="Edit" id="edit_unit" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_unit" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6

            $row[] = $aRow->kd_unit; //5
            $row[] = $aRow->kd_induk_unit; //6

            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
    }
    public function get_unit_tanpa_konsolidasi()
    {
        // $hasil = $this->db->query("SELECT * FROM tb_level order by waktu_maker_level desc limit 5")->getResult();
        $hasil = $this->db->query("SELECT kd_unit, nama_unit FROM tb_unit_kerja where aktif_unit = 'Aktif' ")->getResult();

        $data['unit'] = $hasil;
        echo json_encode($data);
    }
    public function simpan_unit()
    {

        if (!$this->validate([

            'kd_unit_tambah' => [
                'rules' => 'required|is_unique[tb_unit_kerja.kd_unit]|numeric',
                'errors' => [
                    'required' => 'Kode Unit Harus diisi',
                    'is_unique' => 'Kode Unit Sudah Ada',
                    'numeric' => 'Kode Unit Harus Berupa Angka'
                ]
            ],
            'kd_induk_unit_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Induk Harus diisi'
                ]
            ],
            'nama_unit_tambah' => [
                'rules' => 'required|is_unique[tb_unit_kerja.nama_unit]',
                'errors' => [
                    'required' => 'Nama Unit Kerja Harus diisi',
                    'is_unique' => 'Nama Unit Sudah Ada',
                ]
            ],
            'alamat_unit_tambah' => [
                'rules' => 'required|max_length[249]',
                'errors' => [
                    'required' => 'Alamat Unit Harus diisi',
                    'max_length' => 'Alamat Unit Maksimal 250 Karakter',

                ]
            ],
            'telpon_unit_tambah' => [
                'rules' => 'required|max_length[13]|numeric',
                'errors' => [
                    'required' => 'Telepon Harus diisi',
                    'max_length' => 'Telepon Maksimal 13 Karakter',
                    'numeric' => 'Telepon Hanya Memuat Angka',

                ]
            ],
            'aktif_unit_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Harus diisi',
                ]
            ],



        ])) {
            // session()->setFlashdata('error', $this->validator->listErrors());
            // return redirect()->back()->withInput();
            echo $this->validator->listErrors();
        } else {

            // Proses penyimpanan data
            $data = [
                'kd_unit' => $this->request->getVar('kd_unit_tambah'),
                'kd_induk_unit' => $this->request->getVar('kd_induk_unit_tambah'),
                'nama_unit' => $this->request->getVar('nama_unit_tambah'),
                'alamat_unit' => $this->request->getVar('alamat_unit_tambah'),
                'telpon_unit' => $this->request->getVar('telpon_unit_tambah'),
                'aktif_unit' => $this->request->getVar('aktif_unit_tambah'),

                'kd_cab_unit' => session()->get('kd_unit_user'),
                'kd_induk_unit2' => session()->get('kd_induk_user'),

                'maker_unit' => session()->get('nama_user'),
                'waktu_maker_unit' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_maker_unit' => session()->get('kd_unit_user'),
            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $cek_kd_unit = $this->db->query("SELECT kd_unit from tb_unit_kerja where kd_unit = '" . $data['kd_unit'] . "' ")->getNumRows();
            if ($cek_kd_unit < 1) {

                $this->db->table('tb_unit_kerja')->insert($data);
                $pengaruh = $this->db->affectedRows();
                echo json_encode($pengaruh);
            } else {
                echo 'Simpan Unit Kerja Gagal';
            }
        }
    }
    public function get_tabel_unit_by_id($kd_unit)
    {
        $aRow = $this->db->query("SELECT * FROM tb_unit_kerja where kd_unit = '" . $kd_unit . "' ")->getRow();
        //foreach ($rResult as $aRow) {
        $row = array();
        $row[] = $aRow->kd_unit; //0
        $row[] = $aRow->kd_induk_unit; //1
        $row[] = $aRow->nama_unit; //2
        //3
        if ($aRow->aktif_unit == 'Aktif') {
            $row[] = '<span class="label label-primary">' . $aRow->aktif_unit . '</span>';
        } else if ($aRow->aktif_unit == 'Tidak Aktif') {
            $row[] = '<span class="label label-danger">' . $aRow->aktif_unit . '</span>';
        } else {
            $row[] = '<span class="label label-warning">' . $aRow->aktif_unit . '</span>';
        }
        //4
        $row[] = '<button title="Edit" id="edit_unit" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_unit" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6

        $row[] = $aRow->kd_unit; //5
        $row[] = $aRow->kd_induk_unit; //6
        $row[] = $aRow->nama_unit; //7
        $row[] = $aRow->alamat_unit; //8
        $row[] = $aRow->telpon_unit; //9
        $row[] = $aRow->aktif_unit; //10


        $row[] = $aRow->maker_unit; //11
        //12
        if (empty($aRow->waktu_maker_unit)) {

            $row[] = $aRow->waktu_maker_unit;
        } else {

            $dateArr = explode(' ', $aRow->waktu_maker_unit);
            $row[] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
        }
        //13
        $row[] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_maker_unit . "'")->getRow()->nama_unit;
        $row[] = $aRow->updater_unit; //14
        //15
        if (empty($aRow->waktu_updater_unit)) {

            $row[] = $aRow->waktu_updater_unit;
        } else {

            $dateArr = explode(' ', $aRow->waktu_updater_unit);
            $row[] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
        }
        //16
        if (!empty($aRow->kd_unit_updater_unit)) {
            $row[] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_updater_unit . "'")->getRow()->nama_unit;
        } else {
            $row[] = $aRow->kd_unit_updater_unit;
        }
        //
        $kd_cab_unit = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_cab_unit . "'")->getRow()->nama_unit;
        //
        $kd_induk_unit2 = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_induk_unit2 . "'")->getRow()->nama_unit;
        $row[] = $kd_cab_unit . '/ ' . $kd_induk_unit2; //17
        //18
        if ($aRow->aktif_unit == 'Aktif') {
            $row[] = $aRow->aktif_unit;
        } else {
            $row[] = 'Tidak Aktif';
        }

        $output['data'] = $row;
        echo json_encode($output);
    }
    public function edit_unit()
    {

        if (!$this->validate([

            'kd_induk_unit_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Induk Harus diisi'
                ]
            ],
            'nama_unit_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Unit Kerja Harus diisi',
                ]
            ],
            'alamat_unit_edit' => [
                'rules' => 'required|max_length[249]',
                'errors' => [
                    'required' => 'Alamat Unit Harus diisi',
                    'max_length' => 'Alamat Unit Maksimal 250 Karakter',

                ]
            ],
            'telpon_unit_edit' => [
                'rules' => 'required|max_length[13]|numeric',
                'errors' => [
                    'required' => 'Telepon Harus diisi',
                    'max_length' => 'Telepon Maksimal 13 Karakter',
                    'numeric' => 'Telepon Hanya Memuat Angka',

                ]
            ],
            'aktif_unit_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Harus diisi',
                ]
            ],





        ])) {

            echo $this->validator->listErrors();
        } else {
            // Proses penyimpanan data
            $data = [
                // 'kd_unit' => $this->request->getVar('kd_unit_tambah'),
                'kd_induk_unit' => $this->request->getVar('kd_induk_unit_edit'),
                'nama_unit' => $this->request->getVar('nama_unit_edit'),
                'alamat_unit' => $this->request->getVar('alamat_unit_edit'),
                'telpon_unit' => $this->request->getVar('telpon_unit_edit'),
                'aktif_unit' => $this->request->getVar('aktif_unit_edit'),

                'updater_unit' => session()->get('nama_user'),
                'waktu_updater_unit' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_updater_unit' => session()->get('kd_unit_user'),

            ];
            $kd_unit = $this->request->getVar('kd_unit_edit');
            $nama_unit_input = $this->request->getVar('nama_unit_edit');
            $nama_unit_db = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit = '" . $kd_unit . "' ")->getRow()->nama_unit;
            if ($nama_unit_input != $nama_unit_db) {
                $cek_nama_unit = $this->db->query("SELECT nama_unit from tb_unit_kerja where nama_unit = '" . $nama_unit_input . "' ")->getNumRows();
                if ($cek_nama_unit > 0) {
                    // echo 'Nama unit tidak sudah ada';
                    echo 'Nama unit kerja sudah ada';
                } else {
                    //pengecekan kd info tidak boleh sama sebelum insert
                    $cek_kd_unit = $this->db->query("SELECT kd_unit from tb_unit_kerja where kd_unit = '" . $kd_unit . "' ")->getNumRows();
                    if ($cek_kd_unit > 0) {

                        $this->db->table('tb_unit_kerja')->where('kd_unit', $kd_unit)->update($data);
                        $pengaruh = $this->db->affectedRows();
                        echo json_encode($pengaruh);
                    } else {
                        echo 'Edit Data Unit Kerja Gagal';
                    }
                }
            } else {
                //pengecekan kd info tidak boleh sama sebelum insert
                $cek_kd_unit = $this->db->query("SELECT kd_unit from tb_unit_kerja where kd_unit = '" . $kd_unit . "' ")->getNumRows();
                if ($cek_kd_unit > 0) {

                    $this->db->table('tb_unit_kerja')->where('kd_unit', $kd_unit)->update($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Edit Data Unit Kerja Gagal';
                }
            }
        }
    }
    public function get_unit()
    {
        // $hasil = $this->db->query("SELECT * FROM tb_level order by waktu_maker_level desc limit 5")->getResult();
        $hasil = $this->db->query("SELECT kd_unit, nama_unit FROM tb_unit_kerja where aktif_unit = 'Aktif' ")->getResult();
        // $data['asuransi'] = $this->aplikasi_model->asuransi();
        if (session()->get('konsolidasi_user') == '2') {
            $hasil = $this->db->query("SELECT kd_unit, nama_unit FROM tb_unit_kerja where aktif_unit = 'Aktif' and kd_induk_unit ='" . session()->get('kd_induk_user') . "' ")->getResult();
        }
        if (session()->get('konsolidasi_user') == '3') {
            $hasil = $this->db->query("SELECT kd_unit, nama_unit FROM tb_unit_kerja where aktif_unit = 'Aktif' and kd_unit ='" . session()->get('kd_unit_user') . "' ")->getResult();
        }
        $data['unit'] = $hasil;
        echo json_encode($data);
    }
}
