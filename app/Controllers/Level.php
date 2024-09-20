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

class Level extends BaseController
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
        $hasil = $this->hak_akses();
        $permission = $this->permission();
        $permission_tambah_level = $this->permission2('Tambah Level');
        if ($hasil == true) {
            $data['title'] = 'Setup Level';
            $data['permission'] = $permission;
            $data['permission_tambah_level'] = $permission_tambah_level;
            return view('backend/v_level', $data);
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
    public function tabel_level()
    {
        $sQuery1 = "SELECT * FROM v_level ";
        $sQuery2 = "SELECT COUNT(kd_level) AS TOTFIL FROM v_level ";
        $sQuery3 = "SELECT COUNT(kd_level) AS TOT FROM v_level ";
        $sIndexColumn = "kd_level";

        $where2 = " kd_unit_level <>'abc' ";

        $aColumns = array(
            'nama_level', 'aktif_level', 'nama_unit'
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

        // echo json_encode($rResult);
        //while ( $aRow = mysql_fetch_array( $rResult ) )
        //$i = 1; 
        foreach ($rResult as $aRow) {

            $row = array();
            $row[] = $aRow->nama_level; //0
            //1
            if ($aRow->aktif_level == 'Aktif') {
                $row[] = '<span class="label label-primary">' . $aRow->aktif_level . '</span>';
            } else {
                $row[] = '<span class="label label-danger">' . $aRow->aktif_level . '</span>';
            }
            $row[] = $aRow->nama_unit; //2
            //3
            $row[] = '<button title="Edit" id="edit_level" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button id="detail_level" title="Detail" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6
            $row[] = $aRow->kd_level; //4
            $row[] = $aRow->kd_unit_level; // 5

            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
    }
    public function simpan_level()
    {

        if (!$this->validate([
            'nama_level_tambah' => [
                'rules' => 'required|min_length[3]|max_length[100]|is_unique[tb_level.nama_level]',
                'errors' => [
                    'required' => 'Nama Level Harus diisi',
                    'min_length' => 'Nama Level Minimal 3 Karakter',
                    'max_length' => 'Nama Level Maksimal 100 Karakter',
                    // 'alpha_space' => 'Nama Level Hanya Memuat Huruf atau Spasi',
                    'is_unique' => 'Nama Level Sudah Ada',

                ]
            ],


        ])) {
            echo $this->validator->listErrors();
        } else {

            // Proses penyimpanan data
            $data = [
                'kd_level' => 'LVL' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'nama_level' => $this->request->getVar('nama_level_tambah'),
                'kd_unit_level' => session()->get('kd_unit_user'),
                'kd_induk_level' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . session()->get('kd_unit_user') . "' ")->getRow()->kd_induk_unit,
                'aktif_level' => 'Aktif',

                'maker_level' => session()->get('nama_user'),
                'waktu_maker_level' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_maker_level' => session()->get('kd_unit_user'),

            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $cek_kd_level = $this->db->query("SELECT kd_level from tb_level where kd_level = '" . $data['kd_level'] . "' ")->getNumRows();
            if ($cek_kd_level < 1) {

                $this->db->table('tb_level')->insert($data);
                $pengaruh = $this->db->affectedRows();
                echo json_encode($pengaruh);
            } else {
                echo 'Simpan Level Gagal';
            }
        }
    }
    public function get_tabel_level_by_id($kd_level)
    {
        $aRow = $this->db->query("SELECT * FROM v_level where kd_level = '" . $kd_level . "' ")->getRow();
        //foreach ($rResult as $aRow) {
        $row = array();
        $row[] = $aRow->nama_level; //0
        //1
        if ($aRow->aktif_level == 'Aktif') {
            $row[] = '<span class="label label-primary">' . $aRow->aktif_level . '</span>';
        } else {
            $row[] = '<span class="label label-danger">' . $aRow->aktif_level . '</span>';
        }
        $row[] = $aRow->nama_unit; //2
        //3
        $row[] = '<button title="Edit" id="edit_level" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button id="detail_level" title="Detail" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6
        $row[] = $aRow->kd_level; //4
        $row[] = $aRow->kd_unit_level; // 5
        $row[] = $aRow->aktif_level; //6
        // batas
        //7
        $row[] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_level . "'")->getRow()->nama_unit;
        //8
        $row[] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_induk_level . "'")->getRow()->nama_unit;

        $row[] = $aRow->maker_level; //9
        //10
        if (empty($aRow->waktu_maker_level)) {

            $row[] = $aRow->waktu_maker_level;
        } else {

            $dateArr = explode(' ', $aRow->waktu_maker_level);
            $row[] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
        }
        //11
        $row[] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_maker_level . "'")->getRow()->nama_unit;
        $row[] = $aRow->updater_level; //12
        //13
        if (empty($aRow->waktu_updater_level)) {

            $row[] = $aRow->waktu_updater_level;
        } else {

            $dateArr = explode(' ', $aRow->waktu_updater_level);
            $row[] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
        }
        //14
        if (!empty($aRow->kd_unit_updater_level)) {
            $row[] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_updater_level . "'")->getRow()->nama_unit;
        } else {
            $row[] = $aRow->kd_unit_updater_level;
        }

        $output['data'] = $row;

        echo json_encode($output);
    }
    public function edit_level()
    {
        $kd_level_input = $this->request->getVar('kd_level_edit');
        $nama_level_input = $this->request->getVar('nama_level_edit');
        $nama_level_db = $this->db->query("SELECT nama_level from tb_level where kd_level = '" . $kd_level_input . "' ")->getRow()->nama_level;
        if ($nama_level_input == $nama_level_db) {
            if (!$this->validate([
                'nama_level_edit' => [
                    'rules' => 'required|min_length[3]|max_length[100]',
                    'errors' => [
                        'required' => 'Nama Level Harus diisi',
                        'min_length' => 'Nama Level Minimal 3 Karakter',
                        'max_length' => 'Nama Level Maksimal 100 Karakter',
                        // 'alpha_space' => 'Nama Level Hanya Memuat Huruf atau Spasi',

                    ]
                ],
                'status_level_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Harus diisi',
                    ]
                ],
                'kd_unit_level_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Unit Harus diisi',
                    ]
                ],

            ])) {
                echo $this->validator->listErrors();
            } else {


                $data = [
                    // 'kd_user' => 'USER' . gmdate("YmdHis", time() + 60 * 60 * 8),
                    'nama_level' => $this->request->getVar('nama_level_edit'),
                    'kd_unit_level' => $this->request->getVar('kd_unit_level_edit'),
                    'kd_induk_level' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . $this->request->getVar('kd_unit_level_edit') . "' ")->getRow()->kd_induk_unit,
                    'aktif_level' => $this->request->getVar('status_level_edit'),

                    'updater_level' => session()->get('nama_user'),
                    'waktu_updater_level' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                    'kd_unit_updater_level' => session()->get('kd_unit_user'),

                ];



                //pengecekan kd info tidak boleh sama sebelum insert
                $kd_level = $this->request->getVar('kd_level_edit');
                $cek_kd_level = $this->db->query("SELECT kd_level from tb_level where kd_level = '" . $kd_level . "' ")->getNumRows();
                if ($cek_kd_level > 0) {

                    $this->db->table('tb_level')->where('kd_level', $kd_level)->update($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Edit Level Gagal';
                }
            }
        } else {
            if (!$this->validate([
                'nama_level_edit' => [
                    'rules' => 'required|min_length[3]|max_length[100]|is_unique[tb_level.nama_level]',
                    'errors' => [
                        'required' => 'Nama Harus diisi',
                        'min_length' => 'Nama Minimal 3 Karakter',
                        'max_length' => 'Nama Maksimal 100 Karakter',
                        // 'alpha_space' => 'Nama Hanya Memuat Huruf atau Spasi',
                        'is_unique' => 'Nama Level Sudah Ada',

                    ]
                ],
                'status_level_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Harus diisi',
                    ]
                ],
                'kd_unit_level_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Unit Harus diisi',
                    ]
                ],




            ])) {
                // session()->setFlashdata('error', $this->validator->listErrors());
                // return redirect()->back()->withInput();
                echo $this->validator->listErrors();
            } else {

                $data = [
                    // 'kd_user' => 'USER' . gmdate("YmdHis", time() + 60 * 60 * 8),
                    'nama_level' => $this->request->getVar('nama_level_edit'),
                    'kd_unit_level' => $this->request->getVar('kd_unit_level_edit'),
                    'kd_induk_level' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . $this->request->getVar('kd_unit_level_edit') . "' ")->getRow()->kd_induk_unit,
                    'aktif_level' => $this->request->getVar('status_level_edit'),

                    'updater_level' => session()->get('nama_user'),
                    'waktu_updater_level' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                    'kd_unit_updater_level' => session()->get('kd_unit_user'),

                ];



                //pengecekan kd info tidak boleh sama sebelum insert
                $kd_level = $this->request->getVar('kd_level_edit');
                $cek_kd_level = $this->db->query("SELECT kd_level from tb_level where kd_level = '" . $kd_level . "' ")->getNumRows();
                if ($cek_kd_level > 0) {

                    $this->db->table('tb_level')->where('kd_level', $kd_level)->update($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Edit Level Gagal';
                }
            }
        }
    }
    public function permission()
    {
        if (!empty(session()->get('kd_user'))) {
            $kd_level_user = $this->db->query(
                "SELECT kd_level_user 
                FROM tb_user 
                WHERE kd_user = '" . session()->get('kd_user') . "'
                "
            )->getRow()->kd_level_user;
            $permission = $this->db->query(
                "SELECT nama_permission 
                FROM v_assign 
                WHERE kd_level = '" . $kd_level_user . "'
                AND aktif_assign = 'Aktif'"
            )->getResult();
            // foreach($permission as $nama_permission){
            //     // echo json_encode($nama_permission->nama_permission);

            // }
            // var_dump($permission); die;
            // echo json_encode($permission);
            return $permission;
        } else {
            return redirect()->to('/login');
        }
    }
    public function permission2($nama_permission)
    {   
        $hasil = false;
        if (!empty(session()->get('kd_user'))) {
            $kd_level_user = $this->db->query(
                "SELECT kd_level_user 
                FROM tb_user 
                WHERE kd_user = '" . session()->get('kd_user') . "'
                "
            )->getRow()->kd_level_user;
            $permission = $this->db->query(
                "SELECT nama_permission 
                FROM v_assign 
                WHERE kd_level = '" . $kd_level_user . "'
                AND nama_permission = '".$nama_permission."'
                AND aktif_assign = 'Aktif'"
            )->getNumRows();
            // foreach($permission as $nama_permission){
            //     // echo json_encode($nama_permission->nama_permission);

            // }
            // var_dump($permission); die;
            // echo json_encode($permission);
            if($permission > 0){
                $hasil = true;
            }else{
                $hasil = false;
            }
            return $hasil;
        } else {
            return redirect()->to('/login');
        }
    }
}
