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

class Menu extends BaseController
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
        if ($hasil == true) {
            $data['title'] = 'Setup Menu';
            return view('backend/v_menu', $data);
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
    public function tabel_menu()
    {
        $sQuery1 = "SELECT * FROM tb_menu ";
        $sQuery2 = "SELECT COUNT(kd_menu) AS TOTFIL FROM tb_menu ";
        $sQuery3 = "SELECT COUNT(kd_menu) AS TOT FROM tb_menu ";
        $sIndexColumn = "kd_menu";

        // $where2 = " kd_unit_pks <>'100' ";
        $where2 = " kd_menu <>'abc' ";

        $aColumns = array(
            'id_menu', 'kd_menu', 'nama_menu', 'nama_view', 'status', 'icon_menu', 'routes'
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
            $sQuery = $sQuery1 . $sWhere . $where2 . ' order by kd_menu asc' . $sLimit;
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

        // echo json_encode($rResult);
        //while ( $aRow = mysql_fetch_array( $rResult ) )
        //$i = 1; 
        foreach ($rResult as $aRow) {

            $row = array();
            $row[] = ''; //0
            $row[] = $aRow->id_menu; //1
            $row[] = $aRow->kd_menu; //2
            $row[] = $aRow->nama_menu; //3
            $row[] = $aRow->nama_view; //4
            $row[] = $aRow->status; //5
            $row[] = $aRow->icon_menu; //6
            $row[] = $aRow->routes; //7
            // 8
            $row[] = '<button title="Edit" id="edit_menu" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_menu" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>' . '<button title="Tambah" id="tambah_menu2" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>'; //

            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
    }
    public function get_maping_detail_menu($kd_menu)
    {
        $sql = "SELECT * from tb_child_menu where fry_menu = '" . $kd_menu . "'  order by fry_menu asc";
        // $sql = "SELECT tb_addendum_dop.*, tb_berkas_umum.* from tb_addendum_dop left join tb_berkas_umum on tb_addendum_dop.kd_add = tb_berkas_umum.kd_pks_add_berkas where tb_addendum_dop.kd_pks_add = '".$kd_pks."' ";

        $data = $this->db->query($sql)->getResult();

        $output = array();

        foreach ($data as $aRow) {

            $row = array();
            $row[] = $aRow->id_menu; //0
            $row[] = $aRow->kd_menu; //1
            $row[] = $aRow->fry_menu; //2
            $row[] = $aRow->nama_menu; //3
            $row[] = $aRow->nama_view; //4
            $row[] = $aRow->status; //5
            $row[] = $aRow->icon_menu; //6
            $row[] = $aRow->routes; //7
            // 8
            $row[] = '<button title="Edit" id="edit_child" onclick="edit_child(\'' . $aRow->kd_menu . '\')" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_child" onclick="detail_child(\'' . $aRow->kd_menu . '\')" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6

            array_push($output, $row);
        }
        echo json_encode($output);
    }
    public function simpan_menu()
    {

        if (!$this->validate([

            'kd_menu_tambah' => [
                'rules' => 'required|is_unique[tb_menu.kd_menu]|is_unique[tb_child_menu.kd_menu]',
                'errors' => [
                    'required' => 'Kd Menu Harus diisi',
                    // 'is_unique' => 'Kd Menu Sudah Ada',
                ]
            ],
            'nama_view_tambah' => [
                'rules' => 'required|is_unique[tb_menu.nama_view]|is_unique[tb_child_menu.nama_view]',
                'errors' => [
                    'required' => 'Nama View Harus diisi',
                    // 'is_unique' => 'Nama View Sudah Ada',
                ]
            ],
            'routes_tambah' => [
                'rules' => 'required|is_unique[tb_menu.routes]|is_unique[tb_child_menu.routes]',
                'errors' => [
                    'required' => 'Routes Harus diisi',
                    // 'is_unique' => 'Routes Sudah Ada',
                ]
            ],

        ])) {
            echo $this->validator->listErrors();
        } else {
            // Proses penyimpanan data
            $data = [
                'kd_menu' => $this->request->getPost('kd_menu_tambah'),
                'nama_menu' => $this->request->getPost('nama_menu_tambah'),
                'nama_view' => $this->request->getPost('nama_view_tambah'),
                'status' => $this->request->getPost('status_tambah'),
                'icon_menu' => $this->request->getPost('icon_menu_tambah'),
                'routes' => $this->request->getPost('routes_tambah'),
                'controller' => $this->request->getPost('controller_tambah'),
            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $cek_kd_menu = $this->db->query("SELECT kd_menu from tb_menu where kd_menu = '" . $data['kd_menu'] . "' ")->getNumRows();
            if ($cek_kd_menu < 1) {

                $this->db->table('tb_menu')->insert($data);
                $pengaruh = $this->db->affectedRows();
                echo json_encode($pengaruh);
            } else {
                echo 'Simpan Menu Gagal';
            }
        }
    }
    public function get_tabel_menu_by_id($kd_menu)
    {
        $aRow = $this->db->query("SELECT * FROM tb_menu where kd_menu = '" . $kd_menu . "' ")->getRow();

        $row = array();
        $row['id_menu'] = $aRow->id_menu; //0
        $row['kd_menu'] = $aRow->kd_menu; //
        $row['nama_menu'] = $aRow->nama_menu; //
        $row['nama_view'] = $aRow->nama_view; //
        $row['status'] = $aRow->status; //
        if($aRow->status =='Aktif'){
            $row['status_warna'] = '<span class="label label-primary">' . $aRow->status . '</span>';
        }else{
            $row['status_warna'] = '<span class="label label-danger">' . $aRow->status . '</span>';
        }
        $row['icon_menu'] = $aRow->icon_menu; //
        $row['routes'] = $aRow->routes; //
        $row['controller'] = $aRow->controller; //

        $output['data'] = $row;

        echo json_encode($output);
    }
    public function edit_menu()
    {
        if (!$this->validate([

            'kd_menu_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kd Menu Harus diisi',
                ]
            ],

        ])) {
            echo $this->validator->listErrors();
        } else {
            // Proses penyimpanan data
            $data = [
                // 'kd_menu' => $this->request->getPost('kd_menu_edit'),
                'nama_menu' => $this->request->getPost('nama_menu_edit'),
                'nama_view' => $this->request->getPost('nama_view_edit'),
                'status' => $this->request->getPost('status_edit'),
                'icon_menu' => $this->request->getPost('icon_menu_edit'),
                'routes' => $this->request->getPost('routes_edit'),
                'controller' => $this->request->getPost('controller_edit'),
            ];
            $kd_menu = $this->request->getPost('kd_menu_edit');
            $hasil = 'false';
            $routes_db = $this->db->query("SELECT routes from tb_menu where kd_menu = '" . $kd_menu . "' ")->getRow()->routes;
            if ($routes_db == $data['routes']) {
                $hasil = 'true';
            } else {
                $cek_sama = $this->db->query("SELECT tb_menu.routes, tb_child_menu.routes from tb_menu, tb_child_menu where tb_menu.routes = '" . $data['routes'] . "' or tb_child_menu.routes = '" . $data['routes'] . "' ")->getNumRows();
                if ($cek_sama > 0) {
                    $hasil = 'false';
                } else {
                    $hasil = 'true';
                }
            }
            if ($hasil == 'true') {
                //pengecekan kd menu harus ada sebelum update
                $cek_kd_menu = $this->db->query("SELECT kd_menu from tb_menu where kd_menu = '" . $kd_menu . "' ")->getNumRows();
                if ($cek_kd_menu > 0) {
                    $this->db->table('tb_menu')->where('kd_menu', $kd_menu)->update($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Edit Menu Gagal';
                }
            } else {
                echo 'Routes sudah ada di tb_menu atau child_menu';
            }
        }
    }
    public function simpan_child_menu()
    {
        if (!$this->validate([

            'kd_menu_tambah2' => [
                'rules' => 'required|is_unique[tb_menu.kd_menu]|is_unique[tb_child_menu.kd_menu]',
                'errors' => [
                    'required' => 'Kd Menu Harus diisi',
                    // 'is_unique' => 'Kd Menu Sudah Ada',
                ]
            ],
            'nama_view_tambah2' => [
                'rules' => 'required|is_unique[tb_menu.nama_view]|is_unique[tb_child_menu.nama_view]',
                'errors' => [
                    'required' => 'Nama View Harus diisi',
                    // 'is_unique' => 'Nama View Sudah Ada',
                ]
            ],
            'routes_tambah2' => [
                'rules' => 'required|is_unique[tb_menu.routes]|is_unique[tb_child_menu.routes]',
                'errors' => [
                    'required' => 'Routes Harus diisi',
                    // 'is_unique' => 'Routes Sudah Ada',
                ]
            ],

        ])) {
            echo $this->validator->listErrors();
        } else {
            // Proses penyimpanan data
            $data = [
                'kd_menu' => $this->request->getPost('kd_menu_tambah2'),
                'fry_menu' => $this->request->getPost('fry_menu_tambah2'),
                'nama_menu' => $this->request->getPost('nama_menu_tambah2'),
                'nama_view' => $this->request->getPost('nama_view_tambah2'),
                'status' => $this->request->getPost('status_tambah2'),
                'icon_menu' => $this->request->getPost('icon_menu_tambah2'),
                'routes' => $this->request->getPost('routes_tambah2'),
                'controller' => $this->request->getPost('controller_tambah2'),
            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $cek_kd_menu = $this->db->query("SELECT kd_menu from tb_child_menu where kd_menu = '" . $data['kd_menu'] . "' ")->getNumRows();
            if ($cek_kd_menu < 1) {

                $this->db->table('tb_child_menu')->insert($data);
                $pengaruh = $this->db->affectedRows();
                echo json_encode($pengaruh);
            } else {
                echo 'Simpan Child Menu Gagal';
            }
        }
    }
    public function get_child_menu_by_id($kd_menu)
    {
        $aRow = $this->db->query("SELECT * FROM tb_child_menu where kd_menu = '" . $kd_menu . "' ")->getRow();

        $row = array();
        $row['id_menu'] = $aRow->id_menu; //0
        $row['fry_menu'] = $aRow->fry_menu; //
        $row['kd_menu'] = $aRow->kd_menu; //
        $row['nama_menu'] = $aRow->nama_menu; //
        $row['nama_view'] = $aRow->nama_view; //
        $row['status'] = $aRow->status; //
        if($aRow->status =='Aktif'){
            $row['status_warna'] = '<span class="label label-primary">' . $aRow->status . '</span>';
        }else{
            $row['status_warna'] = '<span class="label label-danger">' . $aRow->status . '</span>';
        }
        $row['icon_menu'] = $aRow->icon_menu; //
        $row['routes'] = $aRow->routes; //
        $row['controller'] = $aRow->controller; //

        $output['data'] = $row;

        echo json_encode($output);
    }
    public function get_kd_menu()
    {
        $hasil = $this->db->query("SELECT kd_menu, nama_menu FROM tb_menu where status = 'Aktif' ")->getResult();

        $data['menu'] = $hasil;
        echo json_encode($data);
    }
    public function edit_child_menu()
    {
        if (!$this->validate([

            'kd_menu_edit2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kd Menu Harus diisi',
                ]
            ],

        ])) {
            echo $this->validator->listErrors();
        } else {
            // Proses penyimpanan data
            $data = [
                'fry_menu' => $this->request->getPost('fry_menu_edit2'),
                'nama_menu' => $this->request->getPost('nama_menu_edit2'),
                'nama_view' => $this->request->getPost('nama_view_edit2'),
                'status' => $this->request->getPost('status_edit2'),
                'icon_menu' => $this->request->getPost('icon_menu_edit2'),
                'routes' => $this->request->getPost('routes_edit2'),
                'controller' => $this->request->getPost('controller_edit2'),
            ];
            //pengecekan kd menu harus ada sebelum update
            $kd_menu = $this->request->getPost('kd_menu_edit2');
            $hasil = 'false';
            $routes_db = $this->db->query("SELECT routes from tb_child_menu where kd_menu = '" . $kd_menu . "' ")->getRow()->routes;
            if ($routes_db == $data['routes']) {
                $hasil = 'true';
            } else {
                $cek_sama = $this->db->query("SELECT tb_menu.routes, tb_child_menu.routes from tb_menu, tb_child_menu where tb_menu.routes = '" . $data['routes'] . "' or tb_child_menu.routes = '" . $data['routes'] . "' ")->getNumRows();
                if ($cek_sama > 0) {
                    $hasil = 'false';
                } else {
                    $hasil = 'true';
                }
            }
            if ($hasil == 'true') {
                $cek_kd_menu = $this->db->query("SELECT kd_menu from tb_child_menu where kd_menu = '" . $kd_menu . "' ")->getNumRows();
                if ($cek_kd_menu > 0) {
                    $this->db->table('tb_child_menu')->where('kd_menu', $kd_menu)->update($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Edit Child Menu Gagal';
                }
            } else {
                echo 'Routes sudah ada di tb_menu atau tb_child_menu';
            }
        }
    }
}
