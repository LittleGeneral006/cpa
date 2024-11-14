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

class Rejected extends BaseController
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

    public function v_data_rejected()
    {
        $hasil = $this->hak_akses();
        $lihat_data_rejected = $this->permission2('Lihat Data Rejected');
        if ($hasil == true && $lihat_data_rejected == true) {
            $data['title'] = 'Data Rejected';
            return view('backend/data_rejected/v_data_rejected', $data);
        } else {
            return redirect()->to('/login');
        }
    }
    
    public function tabel_rejected()
    {
        $sQuery1 = "SELECT * FROM v_reject2 ";
        $sQuery2 = "SELECT COUNT(kd_reject) AS TOTFIL FROM v_reject2 ";
        $sQuery3 = "SELECT COUNT(kd_reject) AS TOT FROM v_reject2 ";
        $sIndexColumn = "kd_reject";

        $where2 = " kd_unit_kerja <>'abc' ";

        $aColumns = array(
            'nama_debitur',
            'npwp',
            'jenis_kredit',
            'waktu_reject',
            'catatan',
            'nama',
            'nama_level_tb_level',
            'progress',
            'posisi_progress',
            'nama_unit2'
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
        // if(!empty($sOrder)){
        //     $sQuery = $sQuery1 . $sWhere . $where2 . $sOrder  . $sLimit;
        // }else{
        //     $sQuery = $sQuery1 . $sWhere . $where2 . ' order by tanggal_isi desc' . $sLimit;
        // }

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
            $row[] = $aRow->nama_debitur; //
            $row[] = $aRow->npwp; //
            $row[] = $aRow->jenis_kredit; //
            // 1
            if (!empty($aRow->waktu_reject)) {
                $row[] = date('d-m-Y H:i:s', strtotime($aRow->waktu_reject)); //
            } else {
                $row[] = $aRow->waktu_reject; //
            }
            $row[] = $aRow->catatan; //
            $row[] = $aRow->nama; //
            $row[] = $aRow->nama_level_tb_level; //
            $row[] = $aRow->progress; //
            $row[] = $aRow->posisi_progress; //
            $row[] = $aRow->nama_unit2; //
            
            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
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
                AND nama_permission = '" . $nama_permission . "'
                AND aktif_assign = 'Aktif'"
            )->getNumRows();
            // foreach($permission as $nama_permission){
            //     // echo json_encode($nama_permission->nama_permission);

            // }
            // var_dump($permission); die;
            // echo json_encode($permission);
            if ($permission > 0) {
                $hasil = true;
            } else {
                $hasil = false;
            }
            return $hasil;
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
}
