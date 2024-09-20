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

class Pemroses extends BaseController
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
    public function v_pemroses()
    {
        $hasil = $this->hak_akses();
        if ($hasil == true) {
            $data['title'] = 'Pemroses';
            return view('backend/v_pemroses', $data);
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
    public function tabel_pemroses()
    {
        $sQuery1 = "SELECT * FROM v_pemroses ";
        $sQuery2 = "SELECT COUNT(kd_proses) AS TOTFIL FROM v_pemroses ";
        $sQuery3 = "SELECT COUNT(kd_proses) AS TOT FROM v_pemroses ";
        $sIndexColumn = "kd_proses";

        $where2 = " kd_unit_kerja <>'abc' ";
        // $this->kd_cab = 001;
        if (session()->get('konsolidasi_user') == '1') {
            $where2 = " kd_unit_kerja <>'abc' ";
        }
        if (session()->get('konsolidasi_user') == '2') {
            $where2 = " kd_induk_unit = '" . session()->get('kd_induk_user') . "' ";
            // $where2 = " kd_unit_kerja <>'abc' ";
        }
        if (session()->get('konsolidasi_user') == '3') {
            $where2 = " kd_unit_kerja = '" . session()->get('kd_unit_user') . "' ";
            // $where2 = " kd_unit_kerja <>'abc' ";
        }


        $aColumns = array(
            'koordinator_pemasar', 'kepala_cabang', 'kepala_bagian', 'kepala_divisi', 'nama_unit', 'status'
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
            $row[] = $aRow->koordinator_pemasar; //0
            $row[] = $aRow->kepala_cabang; //1
            $row[] = $aRow->kepala_bagian; //2
            $row[] = $aRow->kepala_divisi; //3
            $row[] = $aRow->nama_unit; //4
            //5
            if ($aRow->status == 'Aktif') {
                $row[] = '<span class="label label-primary">' . $aRow->status . '</span>';
            } else if ($aRow->status == 'Tidak Aktif') {
                $row[] = '<span class="label label-danger">' . $aRow->status . '</span>';
            } else {
                $row[] = '<span class="label label-warning">' . $aRow->status . '</span>';
            }
            //6
            $row[] = '<button title="Edit" id="edit_pemroses" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_pemroses" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6

            $row[] = $aRow->kd_proses; //7
            // $row[] = $aRow->kd_unit_kerja; //8

            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
    }

    public function simpan_pemroses()
    {
        if (!$this->validate([

            'unit_kerja_tambah' => [
                'rules' => 'required|is_unique[tb_pemroses.unit_kerja]',
                'errors' => [
                    'required' => 'Unit Kerja Harus diisi',
                    'is_unique' => 'Unit Kerja Sudah Ada',

                ]
            ],
            'koordinator_pemasar_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Koordinator Pemasar Harus diisi'
                ]
            ],
            'kepala_cabang_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepala Cabang Harus diisi',

                ]
            ],
            'kepala_bagian_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepala Bagian Harus diisi',

                ]
            ],
            'kepala_divisi_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepala Divisi Harus diisi',
                ]
            ],
            'status_tambah' => [
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

                'kd_proses' => 'PRS' . gmdate("dmYHis", time() + 60 * 60 * 8),

                'unit_kerja' => $this->request->getPost('unit_kerja_tambah'),
                'koordinator_pemasar' => $this->request->getPost('koordinator_pemasar_tambah'),
                'kepala_cabang' => $this->request->getPost('kepala_cabang_tambah'),
                'kepala_bagian' => $this->request->getPost('kepala_bagian_tambah'),
                'kepala_divisi' => $this->request->getPost('kepala_divisi_tambah'),
                'status' => $this->request->getPost('status_tambah'),

                'kd_unit_kerja' => $this->request->getPost('unit_kerja_tambah'),
                'kd_induk_unit' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . $this->request->getPost('unit_kerja_tambah') . "' ")->getRow()->kd_induk_unit,

                'pengubah' => session()->get('nama_user'),
                'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $cek_kd_proses = $this->db->query("SELECT kd_proses from tb_pemroses where kd_proses = '" . $data['kd_proses'] . "' ")->getNumRows();
            if ($cek_kd_proses < 1) {
                $this->db->table('tb_pemroses')->insert($data);
                $pengaruh = $this->db->affectedRows();
                echo json_encode($pengaruh);
            } else {
                echo 'Simpan Data Gagal';
            }
        }
    }
    public function get_tabel_pemroses_by_id($kd_proses)
    {
        $aRow = $this->db->query("SELECT * FROM v_pemroses where kd_proses = '" . $kd_proses . "' ")->getRow();
        $row = array();
        $row['kd_proses'] = $aRow->kd_proses; //0
        $row['unit_kerja'] = $aRow->unit_kerja; //1
        $row['koordinator_pemasar'] = $aRow->koordinator_pemasar; //2
        $row['kepala_cabang'] = $aRow->kepala_cabang; //2
        $row['kepala_bagian'] = $aRow->kepala_bagian; //2
        $row['kepala_divisi'] = $aRow->kepala_divisi; //2
        $row['status'] = $aRow->status; //2
        $row['kd_unit_kerja'] = $aRow->kd_unit_kerja; //2
        $row['kd_induk_unit'] = $aRow->kd_induk_unit; //2
        $row['pengubah'] = $aRow->pengubah; //2
        $row['waktu_pengubah'] = $aRow->waktu_pengubah; //2
        $row['kd_unit_pengubah'] = $aRow->kd_unit_pengubah; //2
        $row['nama_unit'] = $aRow->nama_unit; //2
        //3
        if ($aRow->status == 'Aktif') {
            $row['status_label'] = '<span class="label label-primary">' . $aRow->status . '</span>';
        } else if ($aRow->status == 'Tidak Aktif') {
            $row['status_label'] = '<span class="label label-danger">' . $aRow->status . '</span>';
        } else {
            $row['status_label'] = '<span class="label label-warning">' . $aRow->status . '</span>';
        }
        //
        if (!empty($aRow->kd_unit_kerja)) {
            $row['kd_unit_kerja_label'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_kerja . "'")->getRow()->nama_unit;
        } else {
            $row['kd_unit_kerja_label'] = $aRow->kd_unit_kerja;
        }
        if (!empty($aRow->kd_induk_unit)) {
            $row['kd_induk_unit_label'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_induk_unit . "'")->getRow()->nama_unit;
        } else {
            $row['kd_unit_kerja_label'] = $aRow->kd_induk_unit;
        }
        //12
        if (empty($aRow->waktu_pengubah)) {

            $row['waktu_pengubah_label'] = $aRow->waktu_pengubah;
        } else {

            $dateArr = explode(' ', $aRow->waktu_pengubah);
            $row['waktu_pengubah_label'] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
        }
        if (!empty($aRow->kd_unit_pengubah)) {
            $row['kd_unit_pengubah_label'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_pengubah . "'")->getRow()->nama_unit;
        } else {
            $row['kd_unit_kerja_label'] = $aRow->kd_unit_pengubah;
        }
        $output['data'] = $row;
        echo json_encode($output);
    }
    public function edit_pemroses()
    {
        if (!$this->validate([

            'unit_kerja_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit Kerja Harus diisi',
                ]
            ],
            'koordinator_pemasar_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Koordinator Pemasar Harus diisi'
                ]
            ],
            'kepala_cabang_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepala Cabang Harus diisi',

                ]
            ],
            'kepala_bagian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepala Bagian Harus diisi',

                ]
            ],
            'kepala_divisi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kepala Divisi Harus diisi',
                ]
            ],
            'status_edit' => [
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
                // 'kd_proses' => 'PRS' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'unit_kerja' => $this->request->getPost('unit_kerja_edit'),
                'koordinator_pemasar' => $this->request->getPost('koordinator_pemasar_edit'),
                'kepala_cabang' => $this->request->getPost('kepala_cabang_edit'),
                'kepala_bagian' => $this->request->getPost('kepala_bagian_edit'),
                'kepala_divisi' => $this->request->getPost('kepala_divisi_edit'),
                'status' => $this->request->getPost('status_edit'),

                'kd_unit_kerja' => $this->request->getPost('unit_kerja_edit'),
                'kd_induk_unit' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . $this->request->getPost('unit_kerja_edit') . "' ")->getRow()->kd_induk_unit,

                'pengubah' => session()->get('nama_user'),
                'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];
            //pengecekan kd info tidak boleh sama sebelum insert
            $kd_proses = $this->request->getPost('kd_proses_edit');
            $unit_kerja_sama = $this->unit_sama($kd_proses, $data['unit_kerja']);
            if ($unit_kerja_sama == true) {
                $cek_kd_proses = $this->db->query("SELECT kd_proses from tb_pemroses where kd_proses = '" . $kd_proses . "' ")->getNumRows();
                if ($cek_kd_proses > 0) {
                    $this->db->table('tb_pemroses')->where('kd_proses', $kd_proses)->update($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Edit Data Gagal';
                }
            } else {
                echo 'Unit kerja sudah ada';
            }
        }
    }
    public function unit_sama($kd_proses_input, $unit_kerja_input)
    {
        $hasil = false;
        $unit_kerja_db = $this->db->query("SELECT * from tb_pemroses where kd_proses = '" . $kd_proses_input . "' ");
        if ($unit_kerja_db->getNumRows() > 0) {
            $unit_kerja_db = $unit_kerja_db->getRow()->unit_kerja;
            if ($unit_kerja_input == $unit_kerja_db) {
                $hasil = true;
            } else {
                $unit_kerja_sama = $this->db->query("SELECT * from tb_pemroses where unit_kerja = '" . $unit_kerja_input . "' ")->getNumRows();
                if ($unit_kerja_sama > 0) {
                    $hasil = false;
                } else {
                    $hasil = true;
                }
            }
        } else {
            $hasil = false;
        }
        return $hasil;
    }
    public function get_tabel_pemroses_by_unit()
    {
        $aRow = $this->db->query("SELECT * FROM v_pemroses where unit_kerja = '" . session()->get('kd_unit_user') . "' and status = 'Aktif' ");
        if ($aRow->getNumRows() > 0) {
            $aRow = $aRow->getRow();
            $row = array();
            $row['kd_proses'] = $aRow->kd_proses; //0
            $row['unit_kerja'] = $aRow->unit_kerja; //1
            $row['koordinator_pemasar'] = $aRow->koordinator_pemasar; //2
            $row['kepala_cabang'] = $aRow->kepala_cabang; //2
            $row['kepala_bagian'] = $aRow->kepala_bagian; //2
            $row['kepala_divisi'] = $aRow->kepala_divisi; //2
            $row['status'] = $aRow->status; //2
            $row['kd_unit_kerja'] = $aRow->kd_unit_kerja; //2
            $row['kd_induk_unit'] = $aRow->kd_induk_unit; //2
            $row['pengubah'] = $aRow->pengubah; //2
            $row['waktu_pengubah'] = $aRow->waktu_pengubah; //2
            $row['kd_unit_pengubah'] = $aRow->kd_unit_pengubah; //2
            $row['nama_unit'] = $aRow->nama_unit; //2
            //3
            if ($aRow->status == 'Aktif') {
                $row['status_label'] = '<span class="label label-primary">' . $aRow->status . '</span>';
            } else if ($aRow->status == 'Tidak Aktif') {
                $row['status_label'] = '<span class="label label-danger">' . $aRow->status . '</span>';
            } else {
                $row['status_label'] = '<span class="label label-warning">' . $aRow->status . '</span>';
            }
            //
            if (!empty($aRow->kd_unit_kerja)) {
                $row['kd_unit_kerja_label'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_kerja . "'")->getRow()->nama_unit;
            } else {
                $row['kd_unit_kerja_label'] = $aRow->kd_unit_kerja;
            }
            if (!empty($aRow->kd_induk_unit)) {
                $row['kd_induk_unit_label'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_induk_unit . "'")->getRow()->nama_unit;
            } else {
                $row['kd_unit_kerja_label'] = $aRow->kd_induk_unit;
            }
            //12
            if (empty($aRow->waktu_pengubah)) {

                $row['waktu_pengubah_label'] = $aRow->waktu_pengubah;
            } else {

                $dateArr = explode(' ', $aRow->waktu_pengubah);
                $row['waktu_pengubah_label'] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
            }
            if (!empty($aRow->kd_unit_pengubah)) {
                $row['kd_unit_pengubah_label'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_pengubah . "'")->getRow()->nama_unit;
            } else {
                $row['kd_unit_kerja_label'] = $aRow->kd_unit_pengubah;
            }
            $output['status'] = 'success';
            $output['data'] = $row;
        } else {
            $output['status'] = 'error';
            $output['data'] = 'Parameter Pemroses belum di atur atau statusnya tidak aktif untuk cabang terkait';
        }

        echo json_encode($output);
    }
}
