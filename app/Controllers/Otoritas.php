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

class Otoritas extends BaseController
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
    public function v_otoritas()
    {

        $hasil = $this->hak_akses();
        if ($hasil == true) {
            $data['title'] = 'Otoritas';
            return view('backend/v_otoritas', $data);
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
    public function tabel_otoritas()
    {
        $sQuery1 = "SELECT * FROM tb_otoritas ";
        $sQuery2 = "SELECT COUNT(kd_otoritas) AS TOTFIL FROM tb_otoritas ";
        $sQuery3 = "SELECT COUNT(kd_otoritas) AS TOT FROM tb_otoritas ";
        $sIndexColumn = "kd_otoritas";

        $where2 = " kd_otoritas <>'abc' ";

        $aColumns = array(
            'id_otoritas', 'kd_otoritas', 'kd_level', 'kd_menu', 'status'
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
        if (!empty($sOrder)) {
            $sQuery = $sQuery1 . $sWhere . $where2 . $sOrder  . $sLimit;
        } else {
            $sQuery = $sQuery1 . $sWhere . $where2 . ' order by kd_level asc' . $sLimit;
        }
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
            $row[] = $aRow->id_otoritas; //0
            $row[] = $aRow->kd_otoritas; //1
            $row[] = $aRow->kd_level; //2
            $nama_level = $this->db->query("SELECT nama_level FROM tb_level where kd_level = '" . $aRow->kd_level . "' ");
            if ($nama_level->getNumRows() > 0) {
                $nama_level2 = $nama_level->getRow()->nama_level;
            } else {
                $nama_level2 = 'No Nama Level';
            }
            $row[] = $nama_level2; //3
            $row[] = $aRow->kd_menu; //4
            $nama_parent = $this->db->query("SELECT nama_menu FROM tb_menu where kd_menu = '" . $aRow->kd_menu . "' ");
            $nama_child = $this->db->query("SELECT nama_menu FROM tb_child_menu where kd_menu = '" . $aRow->kd_menu . "' ");
            if ($nama_parent->getNumRows() > 0 && $nama_child->getNumRows() > 0) {
                $nama_menu2 = $nama_parent->getRow()->nama_menu;
            } else if ($nama_parent->getNumRows() > 0 && $nama_child->getNumRows() < 1) {
                $nama_menu2 = $nama_parent->getRow()->nama_menu;
            } else if ($nama_parent->getNumRows() < 1 && $nama_child->getNumRows() > 0) {
                $nama_menu2 = $nama_child->getRow()->nama_menu;
            } else if ($nama_parent->getNumRows() < 1 && $nama_child->getNumRows() < 1) {
                $nama_menu2 = 'No Nama Menu';
            } else {
                $nama_menu2 = 'No Nama Menu 2';
            }
            $row[] = $nama_menu2; //5
            //6
            if ($aRow->status == 'Aktif') {
                $row[] = '<span class="label label-primary">' . $aRow->status . '</span>';
            } else if ($aRow->status == 'Tidak Aktif') {
                $row[] = '<span class="label label-danger">' . $aRow->status . '</span>';
            } else {
                $row[] = '<span class="label label-warning">' . $aRow->status . '</span>';
            }
            //7
            $row[] = '<button title="Edit" id="edit_otoritas" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_otoritas" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6

            $row[] = $aRow->kd_otoritas; //8

            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
    }
    public function get_level()
    {
        $hasil = $this->db->query("SELECT kd_level, nama_level FROM tb_level where aktif_level = 'Aktif' ")->getResult();

        $data['level'] = $hasil;
        echo json_encode($data);
    }
    public function get_menu()
    {
        $hasil = $this->db->query("SELECT DISTINCT kd_menu, nama_menu 
                                    FROM tb_menu 
                                    WHERE STATUS = 'Aktif' 
                                    ORDER BY kd_menu ASC")->getResult();
        $data['menu'] = $hasil;
        echo json_encode($data);
    }
    public function get_child()
    {
        $hasil = $this->db->query("SELECT kd_menu, fry_menu, nama_menu, STATUS 
                                    FROM tb_child_menu 
                                    WHERE fry_menu IN(SELECT DISTINCT kd_menu FROM tb_menu WHERE STATUS = 'Aktif' ORDER BY kd_menu ASC) 
                                    AND STATUS = 'Aktif' 
                                    ORDER BY fry_menu ASC")->getResult();
        $data['child'] = $hasil;
        echo json_encode($data);
    }
    public function get_menu_edit()
    {
        $hasil = $this->db->query("SELECT kd_menu, nama_menu FROM tb_menu 
                                    where status = 'Aktif' 
                                    UNION
                                    SELECT kd_menu, nama_menu FROM tb_child_menu 
                                    where status = 'Aktif' 
                                    order by kd_menu asc")->getResult();
        $data['menu'] = $hasil;
        echo json_encode($data);
    }
    public function simpan_otoritas()
    {

        if (!$this->validate([

            'kd_otoritas_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Otoritas Harus diisi',
                ]
            ],
        ])) {

            echo $this->validator->listErrors();
        } else {

            // Proses penyimpanan data
            $data = [
                'kd_otoritas' => $this->request->getPost('kd_otoritas_tambah'),
                'kd_level' => $this->request->getPost('kd_level_tambah'),
                'kd_menu' => $this->request->getPost('kd_menu_tambah'),
                'status' => $this->request->getPost('status_tambah'),

            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $cek_kd_otoritas = $this->db->query("SELECT kd_otoritas from tb_otoritas where kd_otoritas = '" . $data['kd_otoritas'] . "' ")->getNumRows();
            if ($cek_kd_otoritas < 1) {
                $cek_menu = $this->db->query("SELECT * from tb_otoritas where kd_level = '" . $data['kd_level'] . "' and kd_menu = '" . $data['kd_menu'] . "' ")->getNumRows();
                if ($cek_menu < 1) {
                    $this->db->table('tb_otoritas')->insert($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Parent menu sudah ada pada level tersebut';
                }
            } else {
                echo 'Duplicate kd otoritas';
            }
        }
    }
    public function edit_otoritas()
    {

        if (!$this->validate([

            'kd_otoritas_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Otoritas Harus diisi',
                ]
            ],
        ])) {

            echo $this->validator->listErrors();
        } else {

            // Proses penyimpanan data
            $data = [
                // 'kd_otoritas' => $this->request->getPost('kd_otoritas_edit'),
                // 'kd_level' => $this->request->getPost('kd_level_edit'),
                'kd_menu' => $this->request->getPost('kd_menu_edit'),
                'status' => $this->request->getPost('status_edit'),

            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $kd_otoritas = $this->request->getPost('kd_otoritas_edit');
            $kd_level = $this->request->getPost('kd_level_edit');
            $cek_kd_otoritas = $this->db->query("SELECT kd_otoritas from tb_otoritas where kd_otoritas = '" . $kd_otoritas . "' ")->getNumRows();
            if ($cek_kd_otoritas > 0) {
                $cek_sama = $this->db->query("SELECT kd_menu from tb_otoritas where kd_otoritas = '" . $kd_otoritas . "'")->getRow()->kd_menu;
                if ($cek_sama == $data['kd_menu']) {
                    $this->db->table('tb_otoritas')->where('kd_otoritas', $kd_otoritas)->update($data);
                    $pengaruh = $this->db->affectedRows();
                    if ($pengaruh == '1') {
                        echo json_encode($pengaruh);
                    } else {
                        echo 'Update gagal karena tidak ada perubahan yang dilakukan';
                    }
                } else {
                    $cek_menu = $this->db->query("SELECT * from tb_otoritas where kd_level = '" . $kd_level . "' and kd_menu = '" . $data['kd_menu'] . "' ")->getNumRows();
                    if ($cek_menu > 0) {
                        echo 'Menu sudah ada pada level tersebut';
                    } else {
                        $this->db->table('tb_otoritas')->where('kd_otoritas', $kd_otoritas)->update($data);
                        $pengaruh = $this->db->affectedRows();
                        echo json_encode($pengaruh);
                    }
                }
            } else {
                echo 'Duplicate kd otoritas';
            }
        }
    }
    public function simpan_child()
    {
        if (!$this->validate([
            'kd_otoritas_tambah2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Otoritas Harus diisi',
                ]
            ],
        ])) {

            echo $this->validator->listErrors();
        } else {

            // Proses penyimpanan data
            $data = [
                'kd_otoritas' => $this->request->getPost('kd_otoritas_tambah2'),
                'kd_level' => $this->request->getPost('kd_level_tambah2'),
                'kd_menu' => $this->request->getPost('kd_menu_tambah2'),
                'status' => $this->request->getPost('status_tambah2'),

            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $cek_kd_otoritas = $this->db->query("SELECT kd_otoritas from tb_otoritas where kd_otoritas = '" . $data['kd_otoritas'] . "' ")->getNumRows();
            if ($cek_kd_otoritas < 1) {
                $cek_menu = $this->db->query("SELECT * from tb_otoritas where kd_level = '" . $data['kd_level'] . "' and kd_menu = '" . $data['kd_menu'] . "' ")->getNumRows();
                if ($cek_menu < 1) {
                    $this->db->table('tb_otoritas')->insert($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Child menu sudah ada pada level tersebut';
                }
            } else {
                echo 'Duplicate kd otoritas';
            }
        }
    }
    public function get_tabel_otoritas_by_id($kd_otoritas)
    {
        $aRow = $this->db->query("SELECT * FROM tb_otoritas where kd_otoritas = '" . $kd_otoritas . "' ")->getRow();
        //foreach ($rResult as $aRow) {
        $row = array();
        $row['id_otoritas'] = $aRow->id_otoritas; //0
        $row['kd_otoritas'] = $aRow->kd_otoritas; //
        $row['kd_level'] = $aRow->kd_level; //
        if (!empty($row['kd_level'])) {
            $cek_level = $this->db->query("SELECT nama_level FROM tb_level where kd_level = '" . $row['kd_level'] . "' ")->getNumRows();
            if ($cek_level > 0) {
                $row['nama_level'] = $this->db->query("SELECT nama_level FROM tb_level where kd_level = '" . $row['kd_level'] . "' ")->getRow()->nama_level;
            } else {
                $row['nama_level'] = $aRow->kd_level;
            }
        } else {
            $row['nama_level'] = $aRow->kd_level;
        }
        $row['kd_menu'] = $aRow->kd_menu; //
        $row['nama_menu'] = $aRow->kd_menu; //
        if (!empty($row['kd_menu'])) {
            $cek_menu = $this->db->query("SELECT nama_menu FROM tb_menu where kd_menu = '" . $row['kd_menu'] . "' ")->getNumRows();
            if ($cek_menu > 0) {
                $row['nama_menu'] = $this->db->query("SELECT nama_menu FROM tb_menu where kd_menu = '" . $row['kd_menu'] . "' ")->getRow()->nama_menu;
            }
            $cek_child_menu = $this->db->query("SELECT nama_menu FROM tb_child_menu where kd_menu = '" . $row['kd_menu'] . "' ")->getNumRows();
            if ($cek_child_menu > 0) {
                $row['nama_menu'] = $this->db->query("SELECT nama_menu FROM tb_child_menu where kd_menu = '" . $row['kd_menu'] . "' ")->getRow()->nama_menu;
            }
        } else {
            $row['nama_menu'] = $aRow->kd_menu;
        }
        $row['status'] = $aRow->status; //
        if($aRow->status =='Aktif'){
            $row['status_warna'] = '<span class="label label-primary">' . $aRow->status . '</span>';
        }else{
            $row['status_warna'] = '<span class="label label-danger">' . $aRow->status . '</span>';
        }

        $output['data'] = $row;
        echo json_encode($output);
    }
}
