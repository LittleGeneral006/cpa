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

class Permission extends BaseController
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
            $data['title'] = 'Setup Permission';
            return view('backend/v_permission', $data);
        } else {
            return redirect()->to('/login');
        }
    }
    public function hak_akses()
    {
        $param_kd_menu = '100';
        $controller = service('request')->uri->getSegment(1);
        // echo $controller;
        // var_dump($controller); die;
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
    public function tabel_permission()
    {
        $sQuery1 = "SELECT * FROM tb_permission ";
        $sQuery2 = "SELECT COUNT(kd_permission) AS TOTFIL FROM tb_permission ";
        $sQuery3 = "SELECT COUNT(kd_permission) AS TOT FROM tb_permission ";
        $sIndexColumn = "kd_permission";

        $where2 = " aktif_permission <>'abc' ";

        $aColumns = array(
            'id_permission', 'kd_permission', 'nama_permission', 'aktif_permission'
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
            $row[] = $aRow->id_permission; //0
            $row[] = $aRow->kd_permission; //1
            $row[] = $aRow->nama_permission; //2
            //3
            if ($aRow->aktif_permission == 'Aktif') {
                $row[] = '<span class="label label-primary">' . $aRow->aktif_permission . '</span>';
            } else {
                $row[] = '<span class="label label-danger">' . $aRow->aktif_permission . '</span>';
            }
            //4
            $row[] = '<button title="Edit" id="edit_permission" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>'; //6

            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
    }
    public function simpan_permission()
    {

        if (!$this->validate([
            'nama_permission_tambah' => [
                'rules' => 'required|min_length[3]|max_length[100]|is_unique[tb_permission.nama_permission]',
                'errors' => [
                    'required' => 'Nama Permission Harus diisi',
                    'min_length' => 'Nama Permission Minimal 3 Karakter',
                    'max_length' => 'Nama Permission Maksimal 100 Karakter',
                    // 'alpha_space' => 'Nama Permission Hanya Memuat Huruf atau Spasi',
                    'is_unique' => 'Nama Permission Sudah Ada',

                ]
            ],


        ])) {
            echo $this->validator->listErrors();
        } else {

            // Proses penyimpanan data
            $data = [
                'kd_permission' => 'PRM' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'nama_permission' => $this->request->getVar('nama_permission_tambah'),
                'aktif_permission' => 'Aktif',
            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $cek_kd_permission = $this->db->query("SELECT kd_permission from tb_permission where kd_permission = '" . $data['kd_permission'] . "' ")->getNumRows();
            if ($cek_kd_permission < 1) {

                $this->db->table('tb_permission')->insert($data);
                $pengaruh = $this->db->affectedRows();
                echo json_encode($pengaruh);
            } else {
                echo 'Simpan Data Gagal';
            }
        }
    }
    public function get_tabel_permission_by_id($kd_permission)
    {
        $aRow = $this->db->query("SELECT * FROM tb_permission where kd_permission = '" . $kd_permission . "' ")->getRow();
        //foreach ($rResult as $aRow) {
        $row = array();
        $row['permission'] = $aRow; //0


        $output['data'] = $row;

        echo json_encode($output);
    }
    public function edit_permission()
    {

        if (!$this->validate([
            'nama_permission_edit' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama Permission Harus diisi',
                    'min_length' => 'Nama Permission Minimal 3 Karakter',
                    'max_length' => 'Nama Permission Maksimal 100 Karakter',

                ]
            ],


        ])) {
            echo $this->validator->listErrors();
        } else {

            // Proses penyimpanan data
            $data = [
                // 'kd_permission' => 'PRM' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'nama_permission' => $this->request->getVar('nama_permission_edit'),
                'aktif_permission' => $this->request->getVar('aktif_permission_edit')
            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $hasil = false;
            $kd_permission = $this->request->getVar('kd_permission_edit');
            $nama_input = $this->request->getVar('nama_permission_edit');
            $nama_db = $this->db->query("SELECT nama_permission from tb_permission where kd_permission = '" . $kd_permission . "' ")->getRow()->nama_permission;
            if ($nama_input == $nama_db) {
                $hasil = true;
            } else {
                $cek_ada = $this->db->query("SELECT nama_permission from tb_permission where nama_permission = '" . $nama_input . "' ")->getNumRows();
                if ($cek_ada > 0) {
                    $hasil = false;
                } else {
                    $hasil = true;
                }
            }
            if ($hasil == true) {
                $cek_kd_permission = $this->db->query("SELECT kd_permission from tb_permission where kd_permission = '" . $kd_permission . "' ")->getNumRows();
                if ($cek_kd_permission > 0) {

                    $this->db->table('tb_permission')->where('kd_permission', $kd_permission)->update($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Edit Data Gagal';
                }
            } else {
                echo 'Duplicate nama permission';
            }
        }
    }
}
