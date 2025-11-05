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

class Penarikan extends BaseController
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

    public function v_penarikan()
    {
        $hasil = $this->hak_akses();
        if ($hasil == true) {
            $data['title'] = 'Penarikan Kredit Transaksional';
            return view('backend/kredit_transaksional/penarikan_kredit/v_penarikan', $data);
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

    public function tabel_penarikan()
    {
        $sQuery1 = "SELECT * FROM tb_penarikan ";
        $sQuery2 = "SELECT COUNT(kd_data) AS TOTFIL FROM tb_penarikan ";
        $sQuery3 = "SELECT COUNT(kd_data) AS TOT FROM tb_penarikan ";
        $sIndexColumn = "kd_data";

        $where2 = " kd_unit_kerja <>'abc'  ";
        // $this->kd_cab = 001;
        if (session()->get('konsolidasi_user') == '1') {
            $where2 = " kd_unit_kerja <>'abc'  ";
        }
        if (session()->get('konsolidasi_user') == '2') {
            $where2 = " kd_induk_unit = '" . session()->get('kd_induk_user') . "' ";
            // $where2 = " kd_unit_kerja <>'abc' and status = 'Aktif' ";
        }
        if (session()->get('konsolidasi_user') == '3') {
            $where2 = " kd_unit_kerja = '" . session()->get('kd_unit_user') . "' ";
            // $where2 = " kd_unit_kerja <>'abc' and status = 'Aktif' ";
        }


        $aColumns = array(
            'nama',
            'tanggal',
            'termin',
            'status',
            'jumlah_penarikan'
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
            $row[] = $aRow->nama; //0
            // 1
            if (!empty($aRow->tanggal)) {
                $row[] = date('d-m-Y', strtotime($aRow->tanggal)); //
            } else {
                $row[] = $aRow->tanggal; //
            }
            $row[] = $aRow->termin; //2
            $row[] = $aRow->jumlah_penarikan; //3
            // $row[] = $aRow->status; //4
            //4
            if ($aRow->status == 'Aktif') {
                $row[] = '<span class="label label-primary">' . $aRow->status . '</span>';
            } else if ($aRow->status == 'Tidak Aktif') {
                $row[] = '<span class="label label-danger">' . $aRow->status . '</span>';
            } else {
                $row[] = '<span class="label label-warning">' . $aRow->status . '</span>';
            }
            // $row[] = '<button title="Edit" id="edit_unit" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_unit" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6
            // $button_generate = '';
            // if ($this->permission2('Generate Dokumen penarikan Kredit Transaksional')) {
            //     $button_generate = '<li><button title="Generate" class="btn btn-sm dropdown-item" onclick="generate_dok(\'' . $aRow->kd_data . '\')"><div class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Generate Data</div></button></li>';
            // }
            //8
            // $row[] = '<button title="Edit" id="edit_penarikan" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>'; //6
            $row[] = '<a data-toggle="dropdown" class="" href="#">' .
                '<span class="text-dark text-xs block"><b>. . .</b></span>' .
                '</a>' .
                '<ul class="dropdown-menu animated fadeInRight m-t-xs">' .
                // '<li><a class="dropdown-item" href="profile.html">Profile</a></li>'.
                '<li><a href="' . base_url() . 'edit-penarikan-kredit-transaksional/' . sha1($aRow->kd_data) . '/'. sha1($aRow->termin) . '" class="btn btn-sm dropdown-item" title="Edit"><div class="text-left"><i class="fa fa-pencil" aria-hidden="true"></i> Proses Penarikan</div></a></li>' .
                // $button_generate .
                '<li><button title="History Return" class="btn btn-sm dropdown-item" onclick="modal_return(\'' . $aRow->kd_data . '\')"><div class="text-left"><i class="fa fa-undo" aria-hidden="true"></i> History Return</div></button></li>' .

                '</ul>';
            // $row[] = $aRow->kd_unit; //
            // $row[] = $aRow->kd_induk_unit; //

            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
    }

    public function get_nasabah_by_unit()
    {
        $kd_unit_kerja = session()->get('kd_induk_user');

        $builder = $this->db->table('tb_data_entry')
            ->select('id_data,kd_data, kd_unit_kerja,nama_debitur')
            ->where('kd_unit_kerja', $kd_unit_kerja)
            ->orderBy('nama_debitur', 'ASC')
            ->get();

        $result = $builder->getResultArray();

        // kirim response JSON ke jQuery
        return $this->response->setJSON($result);
    }
    public function tambah_penarikan()
    {
        $hasil = $this->hak_akses();
        if ($hasil == true) {
            $data['title'] = 'Tambah penarikan Kredit Transaksional';
            return view('backend/kredit_transaksional/penarikan_kredit/v_tambah_penarikan', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    //     public function edit_penarikan($kd_data){
    //     $hasil = $this->hak_akses();
    //     $permission = $this->permission();
    //     // $data['datafcr'] = $this->TransaksionalModel->koordinator($kd_data);
    //     // $cek_agunan = $this->cek_agunan($kd_data);
    //     // dd($cek_agunan);
    //     // if ($hasil == true) {
    //         $data['title'] = 'Edit Penarikan Kredit Transaksional';
    //         $data['data_entry'] = $this->db->query("SELECT * FROM tb_data_entry WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
    //         // $data['paraf'] = $this->db->query("SELECT * FROM tb_paraf WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
    //         // $data['permission'] = $permission;
    //         // // $data['cek_agunan'] = $cek_agunan;
    //         // $data['edit_penarikan_kredit_transaksional'] = $this->permission2('Edit penarikan Kredit Transaksional');
    //         // $data['edit_penarikan_kredit_transaksional_koordinator'] = $this->permission2('Edit penarikan Kredit Transaksional Koordinator');
    //         // $data['edit_penarikan_kredit_transaksional_kepala_cabang'] = $this->permission2('Edit penarikan Kredit Transaksional Kepala Cabang');
    //         // $data['edit_penarikan_kredit_transaksional_analis_kredit'] = $this->permission2('Edit penarikan Kredit Transaksional Analis Kredit');
    //         // $data['edit_penarikan_kredit_transaksional_kepala_bagian'] = $this->permission2('Edit penarikan Kredit Transaksional Kepala Bagian');
    //         // $data['edit_penarikan_kredit_transaksional_kepala_divisi'] = $this->permission2('Edit penarikan Kredit Transaksional Kepala Divisi');
    //         // $data_master = $this->db->query("SELECT * FROM tb_data_master WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
    //         // $data['data_master'] = $data_master;
    //         // if ($data['edit_penarikan_kredit_transaksional'] == true && $data_master->progress == 'Input') {
    //         //     $data['edit_data'] = 'boleh edit';
    //         // } else {
    //         //     $data['edit_data'] = null;
    //         // }
    //         // if ($data['edit_penarikan_kredit_transaksional_koordinator'] == true && $data_master->progress == 'Review') {
    //         //     $data['edit_data_koordinator'] = 'boleh edit';
    //         // } else {
    //         //     $data['edit_data_koordinator'] = null;
    //         // }
    //         // if ($data['edit_penarikan_kredit_transaksional_kepala_cabang'] == true && ($data_master->progress == 'Rekomendasi' || $data_master->progress == 'Approval')) {
    //         //     $data['edit_data_kepala_cabang'] = 'boleh edit';
    //         // } else {
    //         //     $data['edit_data_kepala_cabang'] = null;
    //         // }
    //         // if ($data['edit_penarikan_kredit_transaksional_analis_kredit'] == true && ($data_master->progress == 'Review' || $data_master->progress == 'Rekomendasi')) {
    //         //     $data['edit_data_analis_kredit'] = 'boleh edit';
    //         // } else {
    //         //     $data['edit_data_analis_kredit'] = null;
    //         // }
    //         // if ($data['edit_penarikan_kredit_transaksional_kepala_bagian'] == true && ($data_master->progress == 'Rekomendasi' || $data_master->progress == 'Approval')) {
    //         //     $data['edit_data_kepala_bagian'] = 'boleh edit';
    //         // } else {
    //         //     $data['edit_data_kepala_bagian'] = null;
    //         // }
    //         // if ($data['edit_penarikan_kredit_transaksional_kepala_divisi'] == true && $data_master->progress == 'Approval') {
    //         //     $data['edit_data_kepala_divisi'] = 'boleh edit';
    //         // } else {
    //         //     $data['edit_data_kepala_divisi'] = null;
    //         // }

    //         // $data['save_edit_penarikan_kredit_transaksional'] = $this->permission2('Save Edit penarikan Kredit Transaksional');
    //         // $data['tampil_fak_data'] = $this->permission2('Tampil FAK Data');
    //         // $data['tampil_fak_modal'] = $this->permission2('Tampil FAK Modal');
    //         // $data['tampil_fak_proyeksi_rl'] = $this->permission2('Tampil FAK Proyeksi RL');
    //         // $data['tampil_upload_laporan_rl'] = $this->permission2('Tampil Upload Laporan RL');
    //         // $data['tampil_cef'] = $this->permission2('Tampil CEF');
    //         // $data['tampil_faa'] = $this->permission2('Tampil FAA');
    //         // $data['tampil_mauk'] = $this->permission2('Tampil MAUK');
    //         // $data['tampil_dcl_compliance'] = $this->permission2('Tampil DCL Compliance');
    //         return view('backend/kredit_transaksional/penarikan_kredit/v_edit_penarikan', $data);
    //     // } else {
    //     //     return redirect()->to('/login');
    //     // }
    // }
    // public function penarikan_simpan()
    // {
    //     $kd_data       = $this->request->getPost('kd_data');
    //     $nama          = $this->request->getPost('nama');
    //     $kd_unit_kerja = $this->request->getPost('kd_unit_kerja');

    //     if (!$kd_data || !$nama || !$kd_unit_kerja) {
    //         return $this->response->setJSON([
    //             'status'  => 'error',
    //             'message' => 'Parameter tidak lengkap.'
    //         ]);
    //     }

    //     $db = \Config\Database::connect();
    //     $db->transBegin();

    //     try {
    //         // 1) Ambil jumlah_termin dari tb_fak_data berdasarkan kd_data
    //         $row = $db->table('tb_fak_data')
    //             ->select('jumlah_termin')
    //             ->where('kd_data', $kd_data)
    //             ->get()
    //             ->getRowArray();

    //         if (!$row) {
    //             throw new \RuntimeException('Data di tb_fak_data tidak ditemukan untuk kd_data: ' . $kd_data);
    //         }

    //         $jumlahTermin = (int)($row['jumlah_termin'] ?? 0);
    //         if ($jumlahTermin <= 0) {
    //             throw new \RuntimeException('jumlah_termin tidak valid (<= 0).');
    //         }

    //         // OPSIONAL: hapus dulu baris lama agar tidak dobel jika user simpan ulang
    //         // (Jika kamu ingin idempotent)
    //         $db->table('tb_penarikan')->where('kd_data', $kd_data)->delete();

    //         // 2) Siapkan batch insert ke tb_penarikan
    //         $now  = date('Y-m-d H:i:s');
    //         $rows = [];
    //         for ($i = 1; $i <= $jumlahTermin; $i++) {
    //             $rows[] = [
    //                 'kd_data'       => $kd_data,
    //                 'termin'     => $i,
    //                 'nama'          => $nama,
    //                 'kd_unit_kerja' => $kd_unit_kerja,
    //                 'status'        => 'draft',       // opsional
    //                 'created_at'    => $now,          // opsional
    //                 'updated_at'    => $now           // opsional
    //             ];
    //         }

    //         // 3) Insert batch
    //         if (!empty($rows)) {
    //             $db->table('tb_penarikan')->insertBatch($rows);
    //         }

    //         $db->transCommit();

    //         return $this->response->setJSON([
    //             'status'         => 'ok',
    //             'jumlah_termin'  => $jumlahTermin
    //         ]);
    //     } catch (\Throwable $e) {
    //         $db->transRollback();
    //         return $this->response->setJSON([
    //             'status'  => 'error',
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }
//     public function penarikan_simpan()
// {
//     $kd_data       = $this->request->getPost('kd_data');
//     $nama          = $this->request->getPost('nama');
//     $kd_unit_kerja = $this->request->getPost('kd_unit_kerja');

//     if (!$kd_data || !$nama || !$kd_unit_kerja) {
//         return $this->response->setJSON(['status'=>'error','message'=>'Parameter tidak lengkap.']);
//     }

//     $db = \Config\Database::connect(); // pastikan group ini yang benar
//     $db->transBegin();

//     try {
//         // 1) Ambil jumlah_termin
//         $row = $db->table('tb_fak_data')
//                   ->select('jumlah_termin')
//                   ->where('kd_data', $kd_data)
//                   ->get()
//                   ->getRowArray();

//         if (!$row) {
//             throw new \RuntimeException("tb_fak_data tidak ditemukan untuk kd_data: {$kd_data}");
//         }

//         // Waspada: jika string kosong/NULL → (int) jadi 0
//         $jumlahTermin = (int) preg_replace('/\D+/', '', (string)($row['jumlah_termin'] ?? '0'));
//         if ($jumlahTermin <= 0) {
//             throw new \RuntimeException("jumlah_termin tidak valid: ".json_encode($row['jumlah_termin']));
//         }

//         // OPSIONAL: idempotent — hapus dulu supaya tidak dobel
//         $db->table('tb_penarikan')->where('kd_data', $kd_data)->delete();

//         // 2) Siapkan batch
//         $now  = date('Y-m-d H:i:s');
//         $rows = [];
//         for ($i = 1; $i <= $jumlahTermin; $i++) {
//             $rows[] = [
//                 'kd_data'       => $kd_data,
//                 'termin'     => $i,
//                 'nama'          => $nama,
//                 'kd_unit_kerja' => $kd_unit_kerja,
//                 'status'        => 'draft',
//                 'created_at'    => $now,
//                 'updated_at'    => $now,
//             ];
//         }

//         // 3) Insert batch + cek hasil
//         $builder = $db->table('tb_penarikan');
//         $ok = $builder->insertBatch($rows); // bisa tambah chunk size: , null, 200

//         // Cek error DB
//         $dbErr = $db->error(); // ['code'=>..., 'message'=>...]
//         if ($ok === false || !empty($dbErr['code'])) {
//             $last = method_exists($db, 'showLastQuery') ? (string)$db->showLastQuery() : 'n/a';
//             throw new \RuntimeException("Insert batch gagal. DB error: {$dbErr['code']} {$dbErr['message']}. Last: {$last}");
//         }

//         // Cek baris terpengaruh
//         if ($db->affectedRows() < 1) {
//             $last = method_exists($db, 'showLastQuery') ? (string)$db->showLastQuery() : 'n/a';
//             throw new \RuntimeException("Tidak ada baris tersimpan (affectedRows=0). Last: {$last}");
//         }

//         $db->transCommit();
//         return $this->response->setJSON(['status'=>'ok','jumlah_termin'=>$jumlahTermin]);

//     } catch (\Throwable $e) {
//         $db->transRollback();
//         // Saat debug: kirim pesan lengkap agar cepat ketahuan
//         return $this->response->setJSON(['status'=>'error','message'=>$e->getMessage()]);
//     }
// }
public function penarikan_simpan()
{
    $kd_data       = $this->request->getPost('kd_data');
    $nama          = $this->request->getPost('nama');
    $kd_unit_kerja = $this->request->getPost('kd_unit_kerja');

    if (!$kd_data || !$nama || !$kd_unit_kerja) {
        return $this->response->setJSON(['status'=>'error','message'=>'Parameter tidak lengkap.']);
    }

    $db = \Config\Database::connect();
    $db->transBegin();

    try {
        // 1) Ambil jumlah termin
        $row = $db->table('tb_fak_data')->select('jumlah_termin')->where('kd_data', $kd_data)->get()->getRowArray();
        if (!$row) throw new \RuntimeException("tb_fak_data tidak ditemukan untuk kd_data: {$kd_data}");

        $jumlahTermin = (int) preg_replace('/\D+/', '', (string)($row['jumlah_termin'] ?? '0'));
        if ($jumlahTermin <= 0) throw new \RuntimeException("jumlah_termin tidak valid: ".json_encode($row['jumlah_termin']));

        // 2) Idempotent: kosongkan dulu
        $db->table('tb_penarikan')->where('kd_data', $kd_data)->delete();
        $db->table('tb_fcr')->where('kd_data', $kd_data)->delete();
        $db->table('tb_dokumen_penarikan')->where('kd_data', $kd_data)->delete();
        $db->table('tb_mpdkk')->where('kd_data', $kd_data)->delete();

        // 3) Siapkan rows
        $now = date('Y-m-d H:i:s');

        $rowsPenarikan = [];
        $rowsFcr = [];
        $rowsDok = [];
        $rowsMpdkk = [];

        for ($i = 1; $i <= $jumlahTermin; $i++) {
            $rowsPenarikan[] = [
                'kd_data'       => $kd_data,
                'termin'     => $i,
                'nama'          => $nama,
                'kd_unit_kerja' => $kd_unit_kerja,
                'status'        => 'draft',
                'created_at'    => $now,
                'updated_at'    => $now,
            ];
            $rowsFcr[]   = ['kd_data' => $kd_data, 'termin' => $i];
            $rowsDok[]   = ['kd_data' => $kd_data, 'termin' => $i];
            $rowsMpdkk[] = ['kd_data' => $kd_data, 'termin' => $i];
        }

        // 4) Insert + cek error per tabel
        $totalPlanned = count($rowsPenarikan) + count($rowsFcr) + count($rowsDok) + count($rowsMpdkk);
        $totalInserted = 0;

        if (!empty($rowsPenarikan)) {
            $ok = $db->table('tb_penarikan')->insertBatch($rowsPenarikan);
            $err = $db->error();
            if (!$ok || !empty($err['code'])) {
                throw new \RuntimeException("Insert tb_penarikan gagal: {$err['code']} {$err['message']}");
            }
            $totalInserted += count($rowsPenarikan);
        }

        if (!empty($rowsFcr)) {
            $ok = $db->table('tb_fcr_copy')->insertBatch($rowsFcr);
            $err = $db->error();
            if (!$ok || !empty($err['code'])) {
                throw new \RuntimeException("Insert tb_fcr_copy gagal: {$err['code']} {$err['message']}");
            }
            $totalInserted += count($rowsFcr);
        }

        if (!empty($rowsDok)) {
            $ok = $db->table('tb_dokumen_penarikan')->insertBatch($rowsDok);
            $err = $db->error();
            if (!$ok || !empty($err['code'])) {
                throw new \RuntimeException("Insert tb_dokumen_penarikan gagal: {$err['code']} {$err['message']}");
            }
            $totalInserted += count($rowsDok);
        }

        if (!empty($rowsMpdkk)) {
            $ok = $db->table('tb_mpdkk')->insertBatch($rowsMpdkk);
            $err = $db->error();
            if (!$ok || !empty($err['code'])) {
                throw new \RuntimeException("Insert tb_mpdkk gagal: {$err['code']} {$err['message']}");
            }
            $totalInserted += count($rowsMpdkk);
        }

        // 5) Validasi total
        if ($totalInserted < $totalPlanned) {
            // Ini bukan fatal, tapi beri info kalau mau
            // throw new \RuntimeException("Sebagian data tidak tersimpan. Planned={$totalPlanned}, Inserted={$totalInserted}");
        }

        $db->transCommit();
        return $this->response->setJSON([
            'status'        => 'ok',
            'message'       => 'Berhasil membuat baris penarikan dan tabel terkait.',
            'jumlah_termin' => $jumlahTermin,
            'planned_rows'  => $totalPlanned,
            'inserted_rows' => $totalInserted,
        ]);

    } catch (\Throwable $e) {
        $db->transRollback();
        return $this->response->setJSON(['status'=>'error','message'=>$e->getMessage()]);
    }
}





    // public function simpan_progress()
    // {
    //     $kd_data = $this->request->getPost('kd_data');
    //     $termin = $this->request->getPost('termin');
    //     $table = $this->request->getPost('target_table');
    //     $data = $this->request->getPost();

    //     unset($data['kd_data'], $data['target_table']);

    //     if (!$kd_data || !$table) {
    //         return "Parameter tidak lengkap.";
    //     }

    //     $builder = $this->db->table($table);
    //     $cek = $builder->where('kd_data', $kd_data)->where('termin', $termin)->get()->getRow();

    //     $data = array_filter($data, fn($v) => $v !== null && $v !== '');

    //     // if ($cek) {
    //     //     $update = $builder->where('kd_data', $kd_data)->update($data);
    //     //     return $update ? 1 : "Gagal update data.";
    //     // } else {
    //     //     $data['kd_data'] = $kd_data;
    //     //     $insert = $builder->insert($data);
    //     //     return $insert ? 1 : "Gagal insert data.";
    //     // }
    //     if ($cek) {
    //     $ok = $builder->where('kd_data', $kd_data)->where('termin', $termin)->update($data);
    //     if ($ok) return $this->response->setJSON(['status'=>'ok','message'=>'Update berhasil']);
    //     return $this->response->setJSON(['status'=>'error','message'=>'Gagal update data.']);
    // } else {
    //     $data['kd_data'] = $kd_data;
    //     $ok = $builder->insert($data);
    //     if ($ok) return $this->response->setJSON(['status'=>'ok','message'=>'Insert berhasil']);
    //     return $this->response->setJSON(['status'=>'error','message'=>'Gagal insert data.']);
    // }
    // }
    public function simpan_progress()
{
    $kd_data = trim((string) $this->request->getPost('kd_data'));
    $table   = trim((string) $this->request->getPost('target_table'));
    // termin boleh kosong -> default 1
    $termin  = $this->request->getPost('termin');
    // $termin  = is_numeric($termin) ? (int) $termin : 1;

    // Ambil semua payload POST sebagai data kolom
    $data = $this->request->getPost();

    // Bersihkan key kontrol agar tidak ikut ter-update sebagai kolom
    unset($data['target_table']);

    // Validasi dasar
    if ($kd_data === '' || $table === '') {
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Parameter tidak lengkap (kd_data / target_table).'
        ]);
    }

    // Filter data: buang null dan string kosong, tetapi JANGAN buang angka 0
    $data = array_filter($data, static function ($v) {
        if ($v === null) return false;
        if (is_string($v) && $v === '') return false;
        return true;
    });

    // Pastikan kd_data & termin selalu ikut (menjadi kunci)
    $data['kd_data'] = $kd_data;
    $data['termin']  = $termin;

    try {
        $builder = $this->db->table($table);

        // Cek keberadaan baris (berdasarkan kd_data & termin)
        $exists = $builder
            ->select('kd_data') // cukup minimal
            ->where('kd_data', $kd_data)
            ->where('termin', $termin)
            ->get()
            ->getRow();

        if ($exists) {
            // UPDATE
            $ok = $builder
                ->where('kd_data', $kd_data)
                ->where('termin', $termin)
                ->update($data);

            if ($ok) {
                return $this->response->setJSON([
                    'status'  => 'ok',
                    'message' => 'Update berhasil',
                ]);
            }

            $err = $this->db->error();
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Gagal update data.',
                'db_error'=> $err
            ]);
        }

        // INSERT
        $ok = $builder->insert($data);
        if ($ok) {
            return $this->response->setJSON([
                'status'  => 'ok',
                'message' => 'Insert berhasil',
            ]);
        }

        $err = $this->db->error();
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Gagal insert data.',
            'db_error'=> $err
        ]);

    } catch (\Throwable $e) {
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => $e->getMessage(),
        ]);
    }
}


   public function simpan_progress_file()
{
    $kd_data = trim((string) $this->request->getPost('kd_data'));
    $terminRaw = $this->request->getPost('termin');
    $termin = is_numeric($terminRaw) ? (int) $terminRaw : null;

    if ($kd_data === '' || $termin === null) {
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Parameter tidak lengkap (kd_data/termin).'
        ]);
    }

    $table   = 'tb_dokumen_penarikan';
    $builder = $this->db->table($table);

    // Key baris
    $where = ['kd_data' => $kd_data, 'termin' => $termin];

    // Ambil baris lama (jika ada)
    $old = $builder->where($where)->get()->getRowArray();

    // Kolom file yang kita dukung
    $fileCols = [
        'permohonan_penarikan',
        'dokumen_kebutuhan_penarikan',
        'dokumen_progres',
        'dokumen_lainnya'
    ];

    $files = $this->request->getFiles();
    $updates = [];

    // Konversi tiap file → Base64 data URI
    foreach ($fileCols as $col) {
        if (!isset($files[$col])) {
            continue;
        }
        $file = $files[$col];

        if ($file->isValid() && !$file->hasMoved()) {
            $binary = @file_get_contents($file->getTempName());
            if ($binary === false) {
                // Jika gagal baca, lewati kolom ini
                continue;
            }

            $mime    = $file->getClientMimeType(); // atau getMimeType()
            $b64     = base64_encode($binary);
            $dataUri = "data:{$mime};base64,{$b64}";
            $updates[$col] = $dataUri;
        }
    }

    if (empty($updates)) {
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Tidak ada file valid untuk disimpan.'
        ]);
    }

    // Timestamp
    $now = date('Y-m-d H:i:s');

    try {
        if ($old) {
            // UPDATE: hanya kolom yang di-upload yang diupdate (tidak menimpa kolom lain dengan NULL)
            $updates['updated_at'] = $now;
            $ok = $builder->where($where)->update($updates);

            if ($ok) {
                return $this->response->setJSON([
                    'status'  => 'ok',
                    'message' => 'Dokumen berhasil diperbarui (base64).'
                ]);
            }
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Gagal update dokumen.',
                'db_error'=> $this->db->error()
            ]);
        } else {
            // INSERT: set kunci & created_at
            $insertData = array_merge($where, $updates, ['created_at' => $now, 'updated_at' => $now]);
            $ok = $builder->insert($insertData);

            if ($ok) {
                return $this->response->setJSON([
                    'status'  => 'ok',
                    'message' => 'Dokumen berhasil disimpan (base64).'
                ]);
            }
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Gagal insert dokumen.',
                'db_error'=> $this->db->error()
            ]);
        }
    } catch (\Throwable $e) {
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => $e->getMessage()
        ]);
    }
}



    public function edit_penarikan($kd_data, $termin = null)
    {
        $this->hak_akses();
        $this->permission();

        $builder = $this->db->table('tb_penarikan');
        $builder->select('kd_data, termin');
        $builder->where("SHA1(kd_data) = '{$kd_data}'");
        if ($termin !== null) {
            $builder->where("SHA1(termin) = '{$termin}'");
        }
        $row = $builder->get()->getRow();

        $data['title'] = 'Edit Penarikan Kredit Transaksional';
        $data['kd_data'] = $row ? $row->kd_data : null;
        $data['termin'] = $row ? $row->termin : null;

        return view('backend/kredit_transaksional/penarikan_kredit/v_edit_penarikan', $data);
    }

    public function buat_nomor_fcr($data, $kd_fcr){
        $hasil = '1';

        $kd_nomor = 'NMRFCR' . gmdate("dmYHis", time() + 60 * 60 * 8);
        $kd_fcr = $kd_fcr;
        $kd_data = $data['kd_data'];

        $kd_cabang = $data['kd_unit_kerja'];
        $kata1 = 'FCR-Kons';
        $kata2 = 'Kmr-';
        $singkatan_cabang = $this->db->query("SELECT kode_cabang from tb_unit_kerja where kd_unit = '" . $data['kd_unit_kerja'] . "' ")->getRow()->kode_cabang;
        $kata3 = 'KP';

        $tahun_db = $this->db->query("SELECT max(tahun) as tahun_max from tb_nomor_fcr where kd_unit_kerja = '" . $data['kd_unit_kerja'] . "' ")->getRow()->tahun_max;
        $tahun_sekarang = date('Y');
        // $tahun_sekarang = date('Y', strtotime('+1 year'));
        if ($tahun_db == $tahun_sekarang) {
            $tahun = $tahun_db;
            $nomor_urut_pendek = $this->db->query("SELECT max(nomor_urut_pendek) as nomor_urut_pendek_max from tb_nomor_fcr where kd_unit_kerja = '" . $data['kd_unit_kerja'] . "' ")->getRow()->nomor_urut_pendek_max;
        }
        if ($tahun_sekarang > $tahun_db) {
            $tahun = $tahun_sekarang;
            $nomor_urut_pendek = 0;
        }
        // var_dump($tahun);
        // var_dump($nomor_urut_pendek);
        // die;

        $tambah_satu = $nomor_urut_pendek + 1;
        $hitung_pendek = strlen($tambah_satu);
        if ($hitung_pendek == '1') {
            $nomor_urut = '00' . $tambah_satu;
        } else if ($hitung_pendek == '2') {
            $nomor_urut = '0' . $tambah_satu;
        } else if ($hitung_pendek == '3') {
            $nomor_urut = $tambah_satu;
        } else {
            $nomor_urut = $tambah_satu;
        }

        $nomor_urut_pendek2 = $tambah_satu;
        $nomor_urut_panjang = $nomor_urut;
        $hasil_generate = $nomor_urut_panjang . '/' . $kata1 . '/' .  $kata2 . $singkatan_cabang . '/' .  $kata3 . '/' . $tahun;
        // var_dump($hasil_generate);die;
        $kd_unit_kerja = $data['kd_unit_kerja'];

        $result = [
            'kd_nomor' => $kd_nomor,
            'kd_fcr' => $kd_fcr,
            'kd_data' => $kd_data,

            'kd_cabang' => $kd_cabang,
            'kata1' => $kata1,
            'kata2' => $kata2,
            'singkatan_cabang' => $singkatan_cabang,
            'kata3' => $kata3,
            'tahun' => $tahun,

            'nomor_urut_pendek' => $nomor_urut_pendek2,
            'nomor_urut_panjang' => $nomor_urut_panjang,
            'hasil_generate' => $hasil_generate,
            'kd_unit_kerja' => $kd_unit_kerja,

            'pengubah' => session()->get('nama_user'),
            'tanggal_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'waktu_pengubah' => session()->get('kd_unit_user'),
        ];

        $duplicate = $this->db->query("SELECT hasil_generate from tb_nomor_fcr where 
                                        kd_unit_kerja = '" . $kd_unit_kerja . "' 
                                        and 
                                        (kd_nomor = '" . $kd_nomor . "'  
                                        or hasil_generate = '" . $hasil_generate . "')
                                        ")->getNumRows();
        $cek_master = $this->db->query("SELECT nomor from tb_fcr where nomor = '" . $hasil_generate . "'")->getNumRows();
        if ($duplicate < 1 && $cek_master < 1) {
            $insert = $this->db->table('tb_nomor_fcr')->insert($result);
            if ($insert) {
                $hasil = $hasil_generate;
            } else {
                $hasil = '2';
            }
        } else {
            $hasil = '3';
        }
        // var_dump($hasil);
        // die;
        return $hasil;
    }

    // public function get_jumlah_termin_dropdown()
    // {
    //     $kd_data = $this->request->getGet('kd_data');
    //     log_message('debug', 'kd_data dari ajax: ' . $kd_data);

    //     $query = $this->db->query(
    //         "SELECT jumlah_termin FROM tb_fak_data WHERE kd_data = ?",
    //         [$kd_data]
    //     );

    //     $row = $query->getRow();

    //     if ($row) {
    //         $jumlah_termin = (int)$row->jumlah_termin;
    //         $dropdown = range(1, $jumlah_termin);
    //         return $this->response->setJSON($dropdown);
    //     } else {
    //         return $this->response->setJSON([]);
    //     }
    // }

   public function get_data()
    {
        $kd_unit_user = session()->get('kd_unit_user');
        
        $kd_data = $this->request->getGet('kd_data');
        $termin = $this->request->getGet('termin');

        // Ambil data dari tb_data_entry (detail eform)
        $dataEntry = $this->db->table('tb_data_entry')
            ->where('kd_data', $kd_data)
            ->get()
            ->getRowArray();
        
        $dataFCR = $this->db->table('tb_fcr')
            ->where('kd_data', $kd_data)
            ->get()
            ->getRowArray();
        $dataFAKdata = $this->db->table('tb_fak_data')
            ->where('kd_data', $kd_data)
            ->get()
            ->getRowArray();
        $dataFAKRL = $this->db->table('tb_fak_rl')
            ->where('kd_data', $kd_data)
            ->get()
            ->getRowArray();
        $dataDokPenarikan = $this->db->table('tb_dokumen_penarikan')
            ->where('kd_data', $kd_data)
            ->where('termin', $termin)
            ->get()
            ->getRowArray();

        $NomorFCR = $this->db->table('tb_nomor_fcr')
            ->where('kd_cabang', $kd_unit_user)
            ->get()
            ->getResultArray();

        $mpdkk = $this->db->table('tb_mpdkk')
            ->where('kd_data', $kd_data)
            ->get()
            ->getResultArray();

        // === Hitung jumlah termin dan total penarikan ===
        // $count = count($penarikan);
        // $nextTermin = $count + 1;

        $totalPenarikanMpdkk = 0;
        if (!empty($mpdkk)) {
            foreach ($mpdkk as $row) {
                $totalPenarikanMpdkk += floatval($row['jumlah_penarikan_disetujui'] ?? 0);
            }
        }


        // Gabungkan hasil
        $result = [
            'data_entry'   => $dataEntry,   // detail dari tb_data_entry
            'fcr'   => $dataFCR,   // detail dari tb_data_entry
            'fak_data'   => $dataFAKdata,   // detail dari tb_data_entry
            'fak_rl'   => $dataFAKRL,   // detail dari tb_data_entry
            // 'penarikan'    => $penarikan,   // daftar penarikan yang sudah ada
            // 'next_termin'  => $nextTermin,  // termin berikutnya
            'nomor_fcr'  => $NomorFCR,  // termin berikutnya
            'dok_penarikan'  => $dataDokPenarikan,  // termin berikutnya
            'mpdkk'        => [
                'detail' => $mpdkk,
                'total_penarikan' => $totalPenarikanMpdkk
            ]
        ];

        return $this->response->setJSON($result);   
    }


    public function get_jumlah_termin_dropdown()
    {
        $kd_data = $this->request->getGet('kd_data');

        // Hitung jumlah data yang sudah ada di tb_penarikan untuk kd_data ini
        $count = $this->db->table('tb_penarikan')
            ->where('kd_data', $kd_data)
            ->countAllResults();

        // Nilai yang dikirim = jumlah data + 1
        $nextTermin = $count + 1;

        return $this->response->setJSON($nextTermin);
    }

    public function cek($kd_data)
    {
        $hasil = [
            'data_induk' => $this->cekTable('tb_data_induk_tb', $kd_data),
            'fcr'        => $this->cekTable('tb_fcr', $kd_data),
            'ceklist'    => $this->cekTable('tb_dok_ceklis', $kd_data),
            'mpdkk'      => $this->cekTable('tb_mpdkk', $kd_data),
            'fak_data'      => $this->cekTable('tb_fak_data', $kd_data),
            'fak_rl'      => $this->cekTable('tb_fak_rl', $kd_data),
        ];

        return $this->response->setJSON($hasil);
    }

    private function cekTable($table, $kd_data)
    {
        $row = $this->db->table($table)
            ->where('kd_data', $kd_data)
            ->get()
            ->getRowArray();

        if (!$row) {
            return false; // tidak ada record → not oke
        }

        foreach ($row as $kolom => $nilai) {
            if ($kolom === 'kd_data') continue; // skip kolom kunci
            if ($nilai === null || $nilai === '') {
                return false; // ada kolom kosong
            }
        }
        return true; // semua kolom terisi
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
