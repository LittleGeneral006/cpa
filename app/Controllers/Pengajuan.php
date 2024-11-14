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
use App\Models\TransaksionalModel;

class Pengajuan extends BaseController
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
        $this->TransaksionalModel = new TransaksionalModel();
        // $this->UsersModel = new UsersModel();
        $this->session = session();
    }

    public function v_pengajuan()
    {
        $hasil = $this->hak_akses();
        $permission = $this->permission();
        $tambah_pengajuan_kredit_transaksional = $this->permission2('Tambah Pengajuan Kredit Transaksional');
        if ($hasil == true) {
            $data['title'] = 'Pengajuan Kredit Transaksional';
            $data['permission'] = $permission;
            $data['tambah_pengajuan_kredit_transaksional'] = $tambah_pengajuan_kredit_transaksional;

            return view('backend/kredit_transaksional/pengajuan_kredit/v_pengajuan', $data);
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
    public function tabel_pengajuan()
    {
        $this->update_sla();
        $sQuery1 = "SELECT * FROM v_data_master ";
        $sQuery2 = "SELECT COUNT(kd_master) AS TOTFIL FROM v_data_master ";
        $sQuery3 = "SELECT COUNT(kd_master) AS TOT FROM v_data_master ";
        $sIndexColumn = "kd_master";

        $where2 = " kd_unit_kerja <>'abc' and status = 'Aktif' and reject ='Tidak' ";
        // $this->kd_cab = 001;
        if (session()->get('konsolidasi_user') == '1') {
            $where2 = " kd_unit_kerja <>'abc' and status = 'Aktif' and reject ='Tidak' ";
            // $where2 = " kd_unit_kerja <>'abc' ";
        }
        if (session()->get('konsolidasi_user') == '2') {
            $where2 = " kd_induk_unit = '" . session()->get('kd_induk_user') . "' and status = 'Aktif' and reject ='Tidak' ";
            // $where2 = " kd_induk_unit = '" . session()->get('kd_induk_user') . "' ";
        }
        if (session()->get('konsolidasi_user') == '3') {
            $where2 = " kd_unit_kerja = '" . session()->get('kd_unit_user') . "' and status = 'Aktif' and reject ='Tidak' ";
            // $where2 = " kd_unit_kerja = '" . session()->get('kd_unit_user') . "' ";
        }


        $aColumns = array(
            'nomor_aplikasi',
            'tanggal_isi',
            'nama_debitur',
            'posisi_progress',
            'progress',
            'scoring',
            'sla',
            'nama_unit',
            'status'
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
            $row[] = $aRow->nomor_aplikasi; //0
            // 1
            if (!empty($aRow->tanggal_isi)) {
                $row[] = date('d-m-Y', strtotime($aRow->tanggal_isi)); //
            } else {
                $row[] = $aRow->tanggal_isi; //
            }
            $row[] = $aRow->nama_debitur; //2
            $row[] = $aRow->posisi_progress; //3
            $row[] = $aRow->progress; //4
            $row[] = $aRow->scoring; //5
            $row[] = $aRow->sla . ' hari'; //6
            $row[] = $aRow->nama_unit; //7
            //8
            if ($aRow->status == 'Aktif') {
                $row[] = '<span class="label label-primary">' . $aRow->status . '</span>';
            } else if ($aRow->status == 'Tidak Aktif') {
                $row[] = '<span class="label label-danger">' . $aRow->status . '</span>';
            } else {
                $row[] = '<span class="label label-warning">' . $aRow->status . '</span>';
            }
            // $row[] = '<button title="Edit" id="edit_unit" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_unit" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>'; //6
            //
            $button_generate = '';
            if ($this->permission2('Generate Dokumen Pengajuan Kredit Transaksional')) {
                $button_generate = '<li><button title="Generate" class="btn btn-sm dropdown-item" onclick="generate_dok(\'' . $aRow->kd_data . '\')"><div class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Generate Data</div></button></li>';
            }
            // $row[] = '<a href="' . base_url() . 'edit-pengajuan-kredit-transaksional/' . sha1($aRow->kd_data) . '" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>' . $button_generate; //

            $row[] = '<a data-toggle="dropdown" class="" href="#">' .
                '<span class="text-dark text-xs block"><b>. . .</b></span>' .
                '</a>' .
                '<ul class="dropdown-menu animated fadeInRight m-t-xs">' .
                // '<li><a class="dropdown-item" href="profile.html">Profile</a></li>'.
                '<li><a href="' . base_url() . 'edit-pengajuan-kredit-transaksional/' . sha1($aRow->kd_data) . '" class="btn btn-sm dropdown-item" title="Edit"><div class="text-left"><i class="fa fa-pencil" aria-hidden="true"></i> Proses Pengajuan</div></a></li>' .
                $button_generate .
                '<li><button title="History Return" class="btn btn-sm dropdown-item" onclick="modal_return(\'' . $aRow->kd_data . '\')"><div class="text-left"><i class="fa fa-undo" aria-hidden="true"></i> History Return</div></button></li>' .

                '</ul>';

            // $row[] = $aRow->kd_unit; //
            // $row[] = $aRow->kd_induk_unit; //

            $output['aaData'][] = $row;
            // $i++;
        }
        echo json_encode($output);
    }
    public function edit_pengajuan($kd_data)
    {
        $hasil = $this->hak_akses();
        $permission = $this->permission();
        $data['datafcr'] = $this->TransaksionalModel->koordinator($kd_data);
        // $cek_agunan = $this->cek_agunan($kd_data);
        // dd($cek_agunan);
        if ($hasil == true) {
            $data['title'] = 'Edit Pengajuan Kredit Transaksional';
            $data['data_entry'] = $this->db->query("SELECT * FROM tb_data_entry WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
            $data['permission'] = $permission;
            // $data['cek_agunan'] = $cek_agunan;
            $data['edit_pengajuan_kredit_transaksional'] = $this->permission2('Edit Pengajuan Kredit Transaksional');
            $data['edit_pengajuan_kredit_transaksional_koordinator'] = $this->permission2('Edit Pengajuan Kredit Transaksional Koordinator');
            $data_master = $this->db->query("SELECT * FROM tb_data_master WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
            $data['data_master'] = $data_master;
            if ($data['edit_pengajuan_kredit_transaksional'] == true && $data_master->progress == 'Input') {
                $data['edit_data'] = 'boleh edit';
            } else {
                $data['edit_data'] = null;
            }
            if ($data['edit_pengajuan_kredit_transaksional_koordinator'] == true && $data_master->progress == 'Review') {
                $data['edit_data_koordinator'] = 'boleh edit';
            } else {
                $data['edit_data_koordinator'] = null;
            }

            $data['save_edit_pengajuan_kredit_transaksional'] = $this->permission2('Save Edit Pengajuan Kredit Transaksional');
            $data['tampil_fak_data'] = $this->permission2('Tampil FAK Data');
            $data['tampil_fak_modal'] = $this->permission2('Tampil FAK Modal');
            $data['tampil_fak_proyeksi_rl'] = $this->permission2('Tampil FAK Proyeksi RL');
            $data['tampil_upload_laporan_rl'] = $this->permission2('Tampil Upload Laporan RL');
            $data['tampil_cef'] = $this->permission2('Tampil CEF');
            $data['tampil_faa'] = $this->permission2('Tampil FAA');
            $data['tampil_mauk'] = $this->permission2('Tampil MAUK');
            $data['tampil_dcl_compliance'] = $this->permission2('Tampil DCL Compliance');
            return view('backend/kredit_transaksional/pengajuan_kredit/v_edit_pengajuan', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function checkDataRecap($tabel)
    {
        $kd_data = $this->request->getPost('kd_data');
        $transaksional = new TransaksionalModel();

        // Ambil data berdasarkan kd_data
        $recap = $transaksional->getDataFromTable($tabel, $kd_data);

        // Cek apakah ada data kosong di baris
        if ($recap) {
            foreach ($recap as $column) {
                if (empty($column)) {
                    return $this->response->setJSON(['status' => 'Not Oke']);
                }
            }
            return $this->response->setJSON(['status' => 'Oke']);
        } else {
            return $this->response->setJSON(['status' => 'Not Oke']);
        }
    }

    public function cek_agunan_kd_tepakai($kd_data)
    {
        $tanah = '';
        $barang_bergerak = '';
        $data2 = '';
        $tanah2 = '';
        $barang_bergerak2 = '';
        $data2 = '';
        $data3 = [];
        $data = $this->db->query("SELECT * FROM tb_data_entry WHERE SHA1(kd_data) = '" . $kd_data . "' ");
        if ($data->getNumRows() > 0) {
            if (!empty($data->getRow()->jenis_agunan)) {
                $data2 = $data->getRow()->jenis_agunan;
                $data3 = explode(';', $data2);
                $tanah_loop = '';
                $barang_bergerak_loop = '';
                foreach ($data3 as $list_agunan) {
                    // dd($list_agunan);
                    if ($list_agunan == 'Tanah/ Tanah dan Bangunan') {
                        $tanah_loop = true;
                        // $tanah .= $tanah_loop;
                    } else {
                        $tanah_loop = '';
                    }
                    if ($list_agunan == 'Barang Bergerak') {
                        $barang_bergerak_loop = true;
                        // $barang_bergerak .= $barang_bergerak_loop;
                    } else {
                        $barang_bergerak_loop = '';
                    }
                    $tanah2 .= $tanah_loop;
                    $barang_bergerak2 .= $barang_bergerak_loop;
                }
                $tanah = $tanah2;
                $barang_bergerak = $barang_bergerak2;

                // dd($data3);
                // if (strpos($data3, 'Tanah/ Tanah dan Bangunan') !== false) {
                //     $tanah = true;
                // } else {
                //     $tanah = false;
                // }
                // if (strpos($data3, 'Barang Bergerak') !== false) {
                //     $barang_bergerak = true;
                // } else {
                //     $barang_bergerak = false;
                // }
            }
        }
        $hasil = [
            'tanah' => $tanah,
            'barang_bergerak' => $barang_bergerak,
        ];
        return $hasil;
    }
    public function cek_agunan($kd_data)
    {
        $tanah1 = '';
        $tanah2 = '';
        $barang_bergerak1 = '';
        $barang_bergerak2 = '';

        $data = $this->db->query("SELECT * FROM tb_data_entry WHERE kd_data = '" . $kd_data . "' ");
        // $this->debug($data);
        if (!empty($data)) {
            $data2 = $data->getRow()->jenis_agunan;
        } else {
            $data2 = ';;';
        }
        //  $this->debug($data2);

        $data3 = explode(';', $data2);
        foreach ($data3 as $list) {
            if ($list == 'Tanah/ Tanah dan Bangunan') {
                $tanah1 .= 'boleh';
            }
            if ($list == 'Barang Bergerak') {
                $barang_bergerak1 .= 'boleh';
            }
        }
        $tanah2 = $tanah1;
        $barang_bergerak2 = $barang_bergerak1;

        $hasil = [
            'tanah' => $tanah2,
            'barang_bergerak' => $barang_bergerak2,
        ];
        // dd($data3);
        return json_encode($hasil);
    }
    public function simpan_pengajuan()
    {
        // $cek = $this->request->getPost('jenis_agunan_tambah[]');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $jenis_agunan = $this->jenis_agunan($this->request->getPost('jenis_agunan_tambah[]'));
        if ($jenis_agunan == true) {
            if (!$this->validate([

                'unit_kerja_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit Kerja Harus diisi',
                    ]
                ],
                'pemasar_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pemasar Harus diisi',
                    ]
                ],
                'koordinator_pemasar_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Koordinator Pemasar Harus diisi',
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
                'nama_debitur_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Debitur Harus diisi',
                    ]
                ],
                'bidang_usaha_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bidang Usaha Harus diisi',
                    ]
                ],
                'nama_direktur_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Direktur Harus diisi',
                    ]
                ],
                'key_person_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Key Person Harus diisi',
                    ]
                ],
                'alamat_kantor_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Kantor Harus diisi',
                    ]
                ],
                'alamat_gudang_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Gudang/ Pabrik/ Workshop Harus diisi',
                    ]
                ],
                'group_debitur_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Group Debitur Harus diisi',
                    ]
                ],
                'nama_proyek_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Proyek Harus diisi',
                    ]
                ],
                'nomor_spk_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor SPK/ SPPBJ/ Gunning/ Kontrak Harus diisi',
                    ]
                ],
                'tanggal_spk_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal SPK/ SPPBJ/ Gunning/ Kontrak Harus diisi',
                    ]
                ],
                'nilai_proyek_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai Proyek Harus diisi',
                    ]
                ],
                'alamat_proyek_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Proyek Harus diisi',
                    ]
                ],
                'pemberi_kerja_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pemberi Kerja Harus diisi',
                    ]
                ],
                'penandatangan_kontrak_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Penandatangan Kontrak Harus diisi',
                    ]
                ],
                'alamat_pemberi_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Pemberi Harus diisi',
                    ]
                ],
                'tanggal_permohonan_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Permohonan Harus diisi',
                    ]
                ],
                'plafond_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Plafond Harus diisi',
                    ]
                ],
                'tujuan_pengajuan_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tujuan Pengajuan Harus diisi',
                    ]
                ],
                'jumlah_agunan_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Agunan Harus diisi',
                    ]
                ],

                'upload_dokumen_tambah' => [
                    'rules' => 'uploaded[upload_dokumen_tambah]|max_size[upload_dokumen_tambah,2048]|ext_in[upload_dokumen_tambah,pdf]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File Yang Diupload',
                        'max_size' => 'File maksimal 2 mb',
                        'ext_in' => 'File harus berupa pdf',
                    ]
                ],


            ])) {
                echo $this->validator->listErrors();
                // var_dump($this->validator->listErrors()); die;

            } else {
                $file = $this->request->getFile('upload_dokumen_tambah');
                // Baca isi file dan konversi ke base64
                $pdfContent = base64_encode(file_get_contents($file->getTempName()));

                // Proses penyimpanan data
                $data = [
                    'kd_data' => 'DATA' . gmdate("dmYHis", time() + 60 * 60 * 8),

                    'kd_unit_kerja' => $this->request->getPost('unit_kerja_tambah'),
                    'pemasar' => $this->request->getPost('pemasar_tambah'),
                    'koordinator_pemasar' => $this->request->getPost('koordinator_pemasar_tambah'),
                    'kepala_cabang' => $this->request->getPost('kepala_cabang_tambah'),
                    'kepala_bagian' => $this->request->getPost('kepala_bagian_tambah'),
                    'kepala_divisi' => $this->request->getPost('kepala_divisi_tambah'),

                    'nama_debitur' => $this->request->getPost('nama_debitur_tambah'),
                    'bidang_usaha' => $this->request->getPost('bidang_usaha_tambah'),
                    'nama_direktur' => $this->request->getPost('nama_direktur_tambah'),
                    'key_person' => $this->request->getPost('key_person_tambah'),
                    'alamat_kantor' => $this->request->getPost('alamat_kantor_tambah'),
                    'alamat_gudang' => $this->request->getPost('alamat_gudang_tambah'),
                    'group_debitur' => $this->request->getPost('group_debitur_tambah'),

                    'nama_proyek' => $this->request->getPost('nama_proyek_tambah'),
                    'nomor_spk' => $this->request->getPost('nomor_spk_tambah'),
                    'tanggal_spk' => $this->request->getPost('tanggal_spk_tambah'),
                    'nilai_proyek' => $this->request->getPost('nilai_proyek_tambah'),
                    'alamat_proyek' => $this->request->getPost('alamat_proyek_tambah'),
                    'pemberi_kerja' => $this->request->getPost('pemberi_kerja_tambah'),
                    'penandatangan_kontrak' => $this->request->getPost('penandatangan_kontrak_tambah'),
                    'alamat_pemberi_kerja' => $this->request->getPost('alamat_pemberi_tambah'),

                    'tanggal_permohonan' => $this->request->getPost('tanggal_permohonan_tambah'),
                    'plafond' => $this->request->getPost('plafond_tambah'),
                    'tujuan_pengajuan' => $this->request->getPost('tujuan_pengajuan_tambah'),
                    'jumlah_agunan' => $this->request->getPost('jumlah_agunan_tambah'),
                    'jenis_agunan' => implode(";", $this->request->getPost('jenis_agunan_tambah')),

                    'upload_dokumen' => $pdfContent,

                    'pengubah' => session()->get('nama_user'),
                    'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                    'kd_unit_pengubah' => session()->get('kd_unit_user'),
                ];
                $tanggal_hari_ini = date("Y-m-d");
                $sla = $this->hitung_sla($tanggal_hari_ini);
                $data_master = [
                    'kd_master' => 'MASTER' . gmdate("dmYHis", time() + 60 * 60 * 8),
                    'kd_data' => $data['kd_data'],
                    // 'nomor_aplikasi' => $this->buat_nomor_kredit($data, $data_master),
                    'tanggal_isi' => gmdate("Y-m-d", time() + 60 * 60 * 8),
                    'posisi_progress' => 'Pemasar',
                    'progress' => 'Input',
                    'scoring' => 'No',
                    'sla' => $sla,
                    'kd_unit_kerja' => $data['kd_unit_kerja'],
                    'kd_induk_unit' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . $data['kd_unit_kerja'] . "' ")->getRow()->kd_induk_unit,
                    'status' => 'Aktif',
                    'reject' => 'Tidak',
                ];
                $data_master['nomor_aplikasi'] = $this->buat_nomor_kredit($data, $data_master);
                //pengecekan kd info tidak boleh sama sebelum insert
                $cek_kd_data = $this->db->query("SELECT kd_data from tb_data_entry where kd_data = '" . $data['kd_data'] . "' ")->getNumRows();
                if ($cek_kd_data < 1) {
                    $input_master = $this->insert_master($data_master);
                    if ($input_master == true) {
                        $insert_all = $this->insert_all($data['kd_data'], $data);
                        if ($insert_all == true) {
                            $this->db->table('tb_data_entry')->insert($data);
                            $pengaruh = $this->db->affectedRows();
                            echo json_encode($pengaruh);
                        } else {
                            echo 'Duplicate kd data. coba lagi beberapa saat';
                        }
                    } else {
                        echo 'Duplicate kd master. coba lagi beberapa saat';
                    }
                } else {
                    echo 'Simpan Data Gagal';
                }
            }
        } else {
            $html = 'Jenis Agunan hanya boleh berupa:<br>
            <ul>
            <li>Tanah/ Tanah dan Bangunan</li>
            <li>Barang Bergerak</li>
            <li>Tunai</li>
            <li>Penjaminan Lembaga Penjamin</li>
            </ul>';
            echo $html;
        }
    }
    public function jenis_agunan($jenis_agunan)
    {
        // var_dump(count($jenis_agunan)); die;
        $found = false;
        for ($i = 0; $i < count($jenis_agunan); $i++) {
            // $this->debug($jenis_agunan[$i]);
            // if ($jenis_agunan[$i] == 'Tanah/ Tanah dan Bangunan' || $jenis_agunan[$i] == 'Barang Bergerak' || $jenis_agunan[$i] == 'Tunai' || $jenis_agunan[$i] == 'Penjaminan Lembaga Penjamin') {
            //     $found = 'benar';
            //     break;
            // }else{
            //     $found = 'salah';
            //     break;
            // }
            if ($jenis_agunan[$i] == 'Tanah/ Tanah dan Bangunan') {
                $found = true;
            } else if ($jenis_agunan[$i] == 'Barang Bergerak') {
                $found = true;
            } else if ($jenis_agunan[$i] == 'Tunai') {
                $found = true;
            } else if ($jenis_agunan[$i] == 'Penjaminan Lembaga Penjamin') {
                $found = true;
            } else {
                $found = false;
                break;
            }
        }
        // $this->debug($found);

        return $found;
    }
    public function debug($param)
    {
        var_dump($param);
        die;
    }
    public function buat_nomor_kredit($data, $data_master)
    {
        $hasil = '';

        // $kd_nomor = 'NMR' . gmdate("dmYHis", time() + 60 * 60 * 8);
        // $kd_master = $data_master['kd_master'];
        // $kd_data = $data['kd_data'];
        $kd_cabang = $this->db->query("SELECT kode_cabang from tb_unit_kerja where kd_unit = '" . $data['kd_unit_kerja'] . "' ")->getRow()->kode_cabang;
        $kd_proses = 'A';
        // cek tahun
        $tahun_sekarang = date('Y');
        // $tahun_sekarang = 2025;
        $tahun_db = $this->db->query("SELECT max(tahun) as tahun_db from tb_nomor_aplikasi_kredit where kd_unit_kerja = '" . $data['kd_unit_kerja'] . "'")->getRow()->tahun_db;

        if ($tahun_db == $tahun_sekarang) {
            $tahun = true;
        } else {
            $tahun = false;
        }
        // var_dump($tahun);
        // die;
        // batas cek tahun

        $cek_nomor_urut_pendek = $this->db->query("SELECT max(nomor_urut_pendek) as nomor_urut_pendek_max from tb_nomor_aplikasi_kredit where kd_unit_kerja = '" . $data['kd_unit_kerja'] . "' and tahun = '" . $tahun_sekarang . "' ");
        if ($cek_nomor_urut_pendek->getNumRows() > 0) {
            $nomor_urut_pendek = $cek_nomor_urut_pendek->getRow()->nomor_urut_pendek_max;
        } else {
            $nomor_urut_pendek = 0;
        }
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

        if ($tahun == true) {
            $nomor_urut_pendek2 = $tambah_satu;
            $nomor_urut_panjang = $nomor_urut;
        } else {
            $nomor_urut_pendek2 = 1;
            $nomor_urut_panjang = '001';
        }
        // var_dump($nomor_urut_pendek2);
        // var_dump($nomor_urut_panjang);
        // die;

        $tanggal_pembuatan = gmdate("Ymd", time() + 60 * 60 * 8);
        $hasil_generate = $kd_cabang . '-' . $kd_proses . '-' . $nomor_urut_panjang . '-' . $tanggal_pembuatan;
        // $kd_unit_kerja = $data['kd_unit_kerja'];

        $result = [
            'kd_nomor' => 'NMR' . gmdate("dmYHis", time() + 60 * 60 * 8),
            'kd_master' => $data_master['kd_master'],
            'kd_data' => $data['kd_data'],
            'kd_cabang' => $kd_cabang,
            'kd_proses' => $kd_proses,
            'nomor_urut_pendek' => $nomor_urut_pendek2,
            'nomor_urut_panjang' => $nomor_urut_panjang,
            'tanggal_pembuatan' => $tanggal_pembuatan,
            'hasil_generate' => $hasil_generate,
            'kd_unit_kerja' => $data['kd_unit_kerja'],

            'pengubah' => session()->get('nama_user'),
            'tanggal_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'waktu_pengubah' => session()->get('kd_unit_user'),
            'tahun' => $tahun_sekarang,
        ];

        $duplicate = $this->db->query("SELECT hasil_generate from tb_nomor_aplikasi_kredit 
                                        where kd_unit_kerja = '" . $data['kd_unit_kerja'] . "' 
                                        and kd_nomor = '" . $result['kd_nomor'] . "' 
                                        or hasil_generate = '" . $hasil_generate . "'
                                    ")->getNumRows();
        $cek_master = $this->db->query("SELECT nomor_aplikasi from tb_data_master where nomor_aplikasi = '" . $hasil_generate . "'")->getNumRows();
        // $cek_master = 0;
        if ($duplicate < 1 && $cek_master < 1) {
            $insert = $this->db->table('tb_nomor_aplikasi_kredit')->insert($result);
            if ($insert) {
                $hasil = $hasil_generate;
            } else {
                $hasil = 'gagal insert';
            }
        } else {
            $hasil = 'duplicate no krd';
        }
        return $hasil;
    }
    public function buat_nomor_fcr($data, $kd_fcr)
    {
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
    public function buat_no_pak($data, $kd_scoring_param)
    {
        $hasil = '1';

        $kd_no = 'PAK' . gmdate("dmYHis", time() + 60 * 60 * 8);
        $kd_scoring = $kd_scoring_param;
        $kd_data = $data['kd_data'];

        $kata = 'Scor-Kons.Tran';

        $kd_unit_kerja = $data['kd_unit_kerja'];
        $singkatan_unit = $this->db->query("SELECT kode_cabang from tb_unit_kerja where kd_unit = '" . $kd_unit_kerja . "' ")->getRow()->kode_cabang;

        $kata2 = 'KP';

        $tahun_db = $this->db->query("SELECT max(tahun) as tahun_max from tb_no_pak where kd_unit_kerja = '" . $kd_unit_kerja . "' ")->getRow()->tahun_max;
        $tahun_sekarang = date('Y');
        // $tahun_sekarang = date('Y', strtotime('+1 year'));
        if ($tahun_db == $tahun_sekarang) {
            $tahun = $tahun_db;
            $no_urut_pendek = $this->db->query("SELECT max(no_urut_pendek) as no_urut_pendek_max from tb_no_pak where kd_unit_kerja = '" . $kd_unit_kerja . "' ")->getRow()->no_urut_pendek_max;
        } else {
            $tahun = $tahun_sekarang;
            $no_urut_pendek = 0;
        }
        // var_dump($tahun);
        // var_dump($no_urut_pendek);
        // die;

        $tambah_satu = $no_urut_pendek + 1;
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

        $no_urut_pendek2 = $tambah_satu;
        $no_urut_panjang = $nomor_urut;

        $no_fcr = $this->db->query("SELECT no_urut_panjang from tb_no_pak where kd_data = '" . $kd_data . "' ");
        if ($no_fcr->getNumRows() > 0) {
            $no_fcr2 = $no_fcr->getRow()->no_urut_panjang;
        } else {
            $no_fcr2 = $no_urut_panjang;
        }

        $hasil_generate = $no_fcr2 . '/' . $kata . '/' . $singkatan_unit . '/' .  $kata2 . '/' . $tahun;
        // var_dump($no_fcr2);die;

        $result = [
            'kd_no' => $kd_no,
            'kd_scoring' => $kd_scoring,
            'kd_data' => $kd_data,
            'no_urut_pendek' => $no_urut_pendek2,
            'no_urut_panjang' => $no_urut_panjang,
            'kata' => $kata,
            'kd_unit_kerja' => $kd_unit_kerja,
            'singkatan_unit' => $singkatan_unit,
            'kata2' => $kata2,
            'tahun' => $tahun,
            'hasil_generate' => $hasil_generate,

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        $duplicate = $this->db->query("SELECT hasil_generate from tb_no_pak 
                                        where kd_unit_kerja = '" . $kd_unit_kerja . "' 
                                        and (kd_no = '" . $kd_no . "' or hasil_generate = '" . $hasil_generate . "')
                                        ")->getNumRows();
        $cek_master = $this->db->query("SELECT no_pak from tb_scoring where no_pak = '" . $hasil_generate . "'")->getNumRows();
        if ($duplicate < 1 && $cek_master < 1) {
            $insert = $this->db->table('tb_no_pak')->insert($result);
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
    public function generate_nomor()
    {
        $kode_cabang = $this->db->query("SELECT * from tb_unit_kerja")->getResult();
        $hitung = 1;
        foreach ($kode_cabang as $daftar) {
            $result = [
                'kd_nomor' => $hitung . 'NMR' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'kd_master' => $hitung . 'MSR' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'kd_data' => $hitung . 'DATA' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'kd_cabang' => $daftar->kode_cabang,
                'kd_proses' => 'A', //blm di generate
                'nomor_urut_pendek' => '0', //blm di generate
                'nomor_urut_panjang' => '000', //blm di generate
                'tanggal_pembuatan' => gmdate("Ymd", time() + 60 * 60 * 8),
                'kd_unit_kerja' => $daftar->kd_unit,
                'pengubah' => session()->get('nama_user'),
                'tanggal_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'waktu_pengubah' => session()->get('kd_unit_user'),
                'tahun' => date('Y'),

            ];
            $result['hasil_generate'] = $result['kd_cabang'] . '-' . $result['kd_proses'] . '-' .  $result['nomor_urut_panjang'] . '-' .  $result['tanggal_pembuatan'];
            $hitung++;
            $insert = $this->db->table('tb_nomor_aplikasi_kredit')->insert($result);
        }
        if ($insert) {
            echo 'generate nomor kredit berhasil';
        } else {
            echo 'generate nomor kredit gagal';
        }
    }
    public function generate_nomor_fcr()
    {
        $kode_cabang = $this->db->query("SELECT * from tb_unit_kerja")->getResult();
        $hitung = 1;
        foreach ($kode_cabang as $daftar) {
            $result = [
                'kd_nomor' => $hitung . 'NMRFCR' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'kd_fcr' => $hitung . 'FCR' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'kd_data' => $hitung . 'DATA' . gmdate("dmYHis", time() + 60 * 60 * 8),

                'kd_cabang' => $daftar->kd_unit,
                'kata1' => 'FCR-Kons', //blm di generate
                'kata2' => 'Kmr-', //blm di generate
                'singkatan_cabang' => $daftar->kode_cabang,
                'kata3' => 'KP', //blm di generate
                'tahun' => date('Y'), //blm di generate
                // 'tahun' => '2023', //blm di generate

                'nomor_urut_pendek' => '0', //blm di generate
                'nomor_urut_panjang' => '000', //blm di generate
                'kd_unit_kerja' => $daftar->kd_unit,
                'pengubah' => session()->get('nama_user'),
                'tanggal_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'waktu_pengubah' => session()->get('kd_unit_user'),

            ];
            $result['hasil_generate'] = $result['nomor_urut_panjang'] . '/' . $result['kata1'] . '/' .  $result['kata2'] . $result['singkatan_cabang'] . '/' .  $result['kata3'] . '/' . $result['tahun'];
            $hitung++;
            $insert = $this->db->table('tb_nomor_fcr')->insert($result);
        }
        if ($insert) {
            echo 'generate nomor fcr berhasil';
        } else {
            echo 'generate nomor fcr gagal';
        }
    }
    public function generate_no_pak()
    {
        $kode_cabang = $this->db->query("SELECT * from tb_unit_kerja")->getResult();
        $hitung = 1;
        foreach ($kode_cabang as $daftar) {
            $result = [
                'kd_no' => $hitung . 'NMRPAK' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'kd_scoring' => $hitung . 'PAK' . gmdate("dmYHis", time() + 60 * 60 * 8),
                'kd_data' => $hitung . 'DATA' . gmdate("dmYHis", time() + 60 * 60 * 8),

                'no_urut_pendek' => '0', //blm di generate
                'no_urut_panjang' => '000', //blm di generate
                'kata' => 'Scor-Kons.Tran', //blm di generate
                'kd_unit_kerja' => $daftar->kd_unit,
                'singkatan_unit' => $daftar->kode_cabang,
                'kata2' => 'KP', //blm di generate
                'tahun' => date('Y'), //blm di generate

                'pengubah' => session()->get('nama_user'),
                'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),

            ];
            $result['hasil_generate'] = $result['no_urut_panjang'] . '/' . $result['kata'] . '/' .  $result['singkatan_unit'] . '/' . $result['kata2'] . '/' .  $result['tahun'];
            $hitung++;
            $insert = $this->db->table('tb_no_pak')->insert($result);
        }
        if ($insert) {
            echo 'generate no pak berhasil';
        } else {
            echo 'generate no pak gagal';
        }
    }
    public function update_nomor_fcr($nomor_input, $kd_data)
    {
        $hasil = false;
        $cek_sama = $this->db->query("SELECT nomor from tb_fcr where kd_data = '" . $kd_data . "' ");
        if ($cek_sama->getNumRows() > 0) {
            $nomor_db = $cek_sama->getRow()->nomor;
            if ($nomor_input == $nomor_db) {
                $hasil = true;
            } else {
                $ada_db = $this->db->query("SELECT nomor from tb_fcr where nomor = '" . $nomor_input . "' ");
                if ($ada_db->getNumRows() > 0) {
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
    public function hitung_sla($param)
    {
        // Tanggal pertama
        $tanggal1 = $param;

        // Tanggal kedua (misalnya tanggal hari ini)
        $tanggal2 = date("Y-m-d");

        // Konversi tanggal ke dalam format yang bisa dihitung
        $tanggal1_timestamp = strtotime($tanggal1);
        $tanggal2_timestamp = strtotime($tanggal2);

        // Hitung selisihnya
        $selisih_hari = abs($tanggal2_timestamp - $tanggal1_timestamp) / (60 * 60 * 24);

        // Tampilkan hasil
        // echo "Selisih hari: " . $selisih_hari;

        return $selisih_hari;
    }
    public function update_sla()
    {
        $sla = $this->db->query("SELECT kd_master, tanggal_isi, sla from tb_data_master where progress !='Approved'");
        if ($sla->getNumRows() > 0) {
            foreach ($sla->getResult() as $list_sla) {
                $hasil_sla = $this->hitung_sla($list_sla->tanggal_isi);

                $data = [
                    'sla' => $hasil_sla,
                ];
                if ($list_sla->sla != $hasil_sla) {
                    $this->db->table('tb_data_master')->where('kd_master', $list_sla->kd_master)->update($data);
                }
            }
        }
    }
    public function insert_master($data_master)
    {
        $hasil = false;
        $cek_kd_master = $this->db->query("SELECT kd_master from tb_data_master where kd_master = '" . $data_master['kd_master'] . "' ")->getNumRows();
        if ($cek_kd_master < 1) {
            $this->db->table('tb_data_master')->insert($data_master);
            $hasil = true;
        } else {
            $hasil = false;
        }
        return $hasil;
    }
    public function insert_all($kd_data, $data)
    {
        $hasil = false;
        $fcr = [
            'kd_data' => $kd_data,
            'kd_fcr' => 'FCR' . gmdate("dmYHis", time() + 60 * 60 * 8),
            // blm di generate
            'nomor' => $this->buat_nomor_fcr($data, 'FCR' . gmdate("dmYHis", time() + 60 * 60 * 8)),
            'tanggal' => gmdate("Y-m-d", time() + 60 * 60 * 8),
            'nama_debitur' => $data['nama_debitur'],
            'alamat_kantor' => $data['alamat_kantor'],
            'alamat_gudang' => $data['alamat_gudang'],
            'group_debitur' => $data['group_debitur'],
            'kunjungan_oleh' => $data['koordinator_pemasar'] . ';' . $data['pemasar'],
            'kd_unit_kerja' => $data['kd_unit_kerja']
        ];
        $fcr_usaha = [
            'kd_data' => $kd_data,
            'kd_fcr' => 'FCRU' . gmdate("dmYHis", time() + 60 * 60 * 8),
            'lokasi' => $data['alamat_proyek'],
            'lokasi_kantor' => $data['alamat_kantor'],
            'lokasi_workshop' => $data['alamat_gudang'],
        ];
        $fcr_agunan = [
            'kd_data' => $kd_data,
            'kd_fcr' => 'FCRA' . gmdate("dmYHis", time() + 60 * 60 * 8),
        ];
        $dok = [
            'kd_data' => $kd_data,
            'kd_dok' => 'DOK' . gmdate("dmYHis", time() + 60 * 60 * 8),
        ];
        $dok_cv = [
            'kd_data' => $kd_data,
            'kd_dok' => 'DOKCV' . gmdate("dmYHis", time() + 60 * 60 * 8),
        ];
        $dok_pt = [
            'kd_data' => $kd_data,
            'kd_dok' => 'DOKPT' . gmdate("dmYHis", time() + 60 * 60 * 8),
        ];
        $scoring = [
            'kd_data' => $kd_data,
            'kd_scoring' => 'SCORING' . gmdate("dmYHis", time() + 60 * 60 * 8),
            'no_pak' => $this->buat_no_pak($data, 'SCORING' . gmdate("dmYHis", time() + 60 * 60 * 8)),
            'nama_pemohon' => $data['nama_debitur'],
            'alamat' => $data['alamat_kantor'],
            'plafond' => $data['plafond'],
            'tujuan' => $data['tujuan_pengajuan'],
        ];
        $kirim = [
            'kd_data' => $kd_data,
            'kd_kirim' => 'KIRIM' . gmdate("dmYHis", time() + 60 * 60 * 8),
        ];
        // baru tabel angga
        $data_insert = [
            'kd_data' => $kd_data,
            // 'kd_kirim' => 'KIRIM' . gmdate("dmYHis", time() + 60 * 60 * 8),
        ];
        // batas baru tabel angga
        $fcr = $this->insert_satuan('kd_fcr', 'tb_fcr', $fcr['kd_fcr'], $fcr);
        if ($fcr == true) {
            $fcr_usaha = $this->insert_satuan('kd_fcr', 'tb_fcr_usaha', $fcr_usaha['kd_fcr'], $fcr_usaha);
            if ($fcr_usaha == true) {
                $fcr_agunan = $this->insert_satuan('kd_fcr', 'tb_fcr_agunan', $fcr_agunan['kd_fcr'], $fcr_agunan);
                if ($fcr_agunan == true) {
                    $dok = $this->insert_satuan('kd_dok', 'tb_dokumen', $dok['kd_dok'], $dok);
                    if ($dok == true) {
                        $dok_cv = $this->insert_satuan('kd_dok', 'tb_dokumen_cv', $dok_cv['kd_dok'], $dok_cv);
                        if ($dok_cv == true) {
                            $dok_pt = $this->insert_satuan('kd_dok', 'tb_dokumen_pt', $dok_pt['kd_dok'], $dok_pt);
                            if ($dok_pt == true) {
                                $scoring = $this->insert_satuan('kd_scoring', 'tb_scoring', $scoring['kd_scoring'], $scoring);
                                if ($scoring == true) {
                                    $kirim = $this->insert_satuan('kd_kirim', 'tb_kirim', $kirim['kd_kirim'], $kirim);
                                    if ($kirim == true) {
                                        // baru tb analisa
                                        $tb_ceftb = $this->insert_satuan('kd_data', 'tb_ceftb', $data_insert['kd_data'], $data_insert);
                                        if ($tb_ceftb == true) {
                                            $tb_fak_data = $this->insert_satuan('kd_data', 'tb_fak_data', $data_insert['kd_data'], $data_insert);
                                            if ($tb_fak_data == true) {
                                                $tb_fak_modal = $this->insert_satuan('kd_data', 'tb_fak_modal', $data_insert['kd_data'], $data_insert);
                                                if ($tb_fak_modal == true) {
                                                    $tb_fak_rl = $this->insert_satuan('kd_data', 'tb_fak_rl', $data_insert['kd_data'], $data_insert);
                                                    if ($tb_fak_rl == true) {
                                                        $tb_lap_rl = $this->insert_satuan('kd_data', 'tb_lap_rl', $data_insert['kd_data'], $data_insert);
                                                        if ($tb_lap_rl == true) {
                                                            $tb_mauk = $this->insert_satuan('kd_data', 'tb_mauk', $data_insert['kd_data'], $data_insert);
                                                            if ($tb_mauk == true) {
                                                                $tb_faa = $this->insert_satuan('kd_data', 'tb_faa', $data_insert['kd_data'], $data_insert);
                                                                if ($tb_faa == true) {
                                                                    $tb_dcl = $this->insert_satuan('kd_data', 'tb_dcl', $data_insert['kd_data'], $data_insert);
                                                                    if ($tb_dcl == true) {
                                                                        $tb_scoring_koor = $this->insert_satuan('kd_data', 'tb_scoring_koor', $data_insert['kd_data'], $data_insert);
                                                                        if ($tb_scoring_koor == true) {
                                                                            $hasil = true;
                                                                        } else {
                                                                            $hasil = false;
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
                                                        } else {
                                                            $hasil = false;
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
                                        } else {
                                            $hasil = false;
                                        }
                                        // batas baru tb analisa
                                    } else {
                                        $hasil = false;
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
                    } else {
                        $hasil = false;
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
    public function insert_satuan($nama_kolom, $nama_tabel, $kd_fcr, $data)
    {
        $hasil = false;
        $cek = $this->db->query("SELECT $nama_kolom from $nama_tabel where $nama_kolom = '" . $kd_fcr . "' ")->getNumRows();
        if ($cek < 1) {
            $this->db->table($nama_tabel)->insert($data);
            $hasil = true;
        } else {
            $hasil = false;
        }
        return $hasil;
    }
    public function lihat_dokumen($kd_data)
    {
        $dokumen = $this->db->query("SELECT upload_dokumen FROM tb_data_entry WHERE SHA1(kd_data) = '" . $kd_data . "' ");
        if ($dokumen->getNumRows() > 0 && !empty($dokumen->getRow()->upload_dokumen)) {
            $dok = $dokumen->getRow()->upload_dokumen;
            // Tampilkan dokumen PDF menggunakan iframe
            echo "<iframe src=\"data:application/pdf;base64,$dok\" width=\"100%\" height=\"600px\"></iframe>";
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('edit-pengajuan-kredit-transaksional/' . $kd_data) . '">Klik untuk kembali</a>';
        }
    }
    public function edit_data_entry()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'unit_kerja_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit Kerja Harus diisi',
                ]
            ],
            // 'pemasar_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pemasar Harus diisi',
            //     ]
            // ],
            // 'koordinator_pemasar_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Koordinator Pemasar Harus diisi',
            //     ]
            // ],
            // 'kepala_cabang_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kepala Cabang Harus diisi',
            //     ]
            // ],
            // 'kepala_bagian_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kepala Bagian Harus diisi',
            //     ]
            // ],
            // 'kepala_divisi_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kepala Divisi Harus diisi',
            //     ]
            // ],
            // 'nama_debitur_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama Debitur Harus diisi',
            //     ]
            // ],
            // 'bidang_usaha_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Bidang Usaha Harus diisi',
            //     ]
            // ],
            // 'nama_direktur_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama Direktur Harus diisi',
            //     ]
            // ],
            // 'key_person_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Key Person Harus diisi',
            //     ]
            // ],
            // 'alamat_kantor_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat Kantor Harus diisi',
            //     ]
            // ],
            // 'alamat_gudang_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat Gudang/ Pabrik/ Workshop Harus diisi',
            //     ]
            // ],
            // 'group_debitur_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Group Debitur Harus diisi',
            //     ]
            // ],
            // 'nama_proyek_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama Proyek Harus diisi',
            //     ]
            // ],
            // 'nomor_spk_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nomor SPK/ SPPBJ/ Gunning/ Kontrak Harus diisi',
            //     ]
            // ],
            // 'tanggal_spk_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal SPK/ SPPBJ/ Gunning/ Kontrak Harus diisi',
            //     ]
            // ],
            // 'nilai_proyek_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nilai Proyek Harus diisi',
            //     ]
            // ],
            // 'alamat_proyek_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat Proyek Harus diisi',
            //     ]
            // ],
            // 'pemberi_kerja_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pemberi Kerja Harus diisi',
            //     ]
            // ],
            // 'penandatangan_kontrak_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Penandatangan Kontrak Harus diisi',
            //     ]
            // ],
            // 'alamat_pemberi_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat Pemberi Harus diisi',
            //     ]
            // ],
            // 'tanggal_permohonan_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Permohonan Harus diisi',
            //     ]
            // ],
            // 'plafond_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Plafond Harus diisi',
            //     ]
            // ],
            // 'tujuan_pengajuan_tambah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tujuan Pengajuan Harus diisi',
            //     ]
            // ],
            'jumlah_agunan_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Agunan Harus diisi',
                ]
            ],
            'status_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Pengajuan Harus diisi',
                ]
            ],

            // 'upload_dokumen_tambah' => [
            //     // 'rules' => 'uploaded[upload_dokumen_tambah]|max_size[upload_dokumen_tambah,2048]|ext_in[upload_dokumen_tambah,pdf]',
            //     'rules' => 'max_size[upload_dokumen_tambah,2048]|ext_in[upload_dokumen_tambah,pdf]',
            //     'errors' => [
            //         // 'uploaded' => 'Harus Ada File Yang Diupload',
            //         'max_size' => 'File maksimal 2 mb',
            //         'ext_in' => 'File harus berupa pdf',
            //     ]
            // ],
        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            $hasil = $this->data_entry($hasil, 'edit_data_entry');
        }
        echo json_encode($hasil);
    }
    public function data_entry($hasil, $pemanggil)
    {

        $input = $this->request->getPost('jenis_agunan_tambah');
        $jenis_agunan = explode(";", $input);
        $jenis_agunan2 = $this->jenis_agunan($jenis_agunan);
        if ($jenis_agunan2 == true) {

            // Proses penyimpanan data
            $data = [
                'kd_unit_kerja' => $this->request->getPost('unit_kerja_tambah'),
                'pemasar' => $this->request->getPost('pemasar_tambah'),
                'koordinator_pemasar' => $this->request->getPost('koordinator_pemasar_tambah'),
                'kepala_cabang' => $this->request->getPost('kepala_cabang_tambah'),
                'kepala_bagian' => $this->request->getPost('kepala_bagian_tambah'),
                'kepala_divisi' => $this->request->getPost('kepala_divisi_tambah'),

                'nama_debitur' => $this->request->getPost('nama_debitur_tambah'),
                'bidang_usaha' => $this->request->getPost('bidang_usaha_tambah'),
                'nama_direktur' => $this->request->getPost('nama_direktur_tambah'),
                'key_person' => $this->request->getPost('key_person_tambah'),
                'alamat_kantor' => $this->request->getPost('alamat_kantor_tambah'),
                'alamat_gudang' => $this->request->getPost('alamat_gudang_tambah'),
                'group_debitur' => $this->request->getPost('group_debitur_tambah'),
                'npwp' => $this->request->getPost('npwp_tambah'),

                'nama_proyek' => $this->request->getPost('nama_proyek_tambah'),
                'nomor_spk' => $this->request->getPost('nomor_spk_tambah'),
                'tanggal_spk' => $this->request->getPost('tanggal_spk_tambah'),
                'nilai_proyek' => $this->request->getPost('nilai_proyek_tambah'),
                'alamat_proyek' => $this->request->getPost('alamat_proyek_tambah'),
                'pemberi_kerja' => $this->request->getPost('pemberi_kerja_tambah'),
                'penandatangan_kontrak' => $this->request->getPost('penandatangan_kontrak_tambah'),
                'alamat_pemberi_kerja' => $this->request->getPost('alamat_pemberi_tambah'),

                'tanggal_permohonan' => $this->request->getPost('tanggal_permohonan_tambah'),
                'plafond' => $this->request->getPost('plafond_tambah'),
                'tujuan_pengajuan' => $this->request->getPost('tujuan_pengajuan_tambah'),
                'jumlah_agunan' => $this->request->getPost('jumlah_agunan_tambah'),
                'jenis_agunan' => $this->request->getPost('jenis_agunan_tambah'),

                'pengubah' => session()->get('nama_user'),
                'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];
            // $this->debug($data);
            $data_master = [
                'kd_unit_kerja' => $data['kd_unit_kerja'],
                'kd_induk_unit' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . $data['kd_unit_kerja'] . "' ")->getRow()->kd_induk_unit,
                'status' => $this->request->getPost('status_tambah'),
            ];
            if ($pemanggil == 'edit_finish') {
                //pemasar => koord pemasar
                if (session()->get('kd_level_user') == 'LVL23072023135343') {
                    $data_master['posisi_progress'] = 'Koordinator Pemasar';
                    $data_master['progress'] = 'Review';
                }
                // koord pemasar => kepala cabang
                if (session()->get('kd_level_user') == 'LVL23072023133934' && $data['plafond'] < 2000000001) {
                    $data_master['posisi_progress'] = 'Kepala Cabang';
                    $data_master['progress'] = 'Approval';
                }
                if (session()->get('kd_level_user') == 'LVL23072023133934' && $data['plafond'] >= 2000000001 && $data['plafond'] < 5000000001) {
                    $data_master['posisi_progress'] = 'Kepala Cabang';
                    $data_master['progress'] = 'Rekomendasi';
                }
                if (session()->get('kd_level_user') == 'LVL23072023133934' && $data['plafond'] >= 5000000001) {
                    $data_master['posisi_progress'] = 'Kepala Cabang';
                    $data_master['progress'] = 'Rekomendasi';
                }
                // kepala cabang => analis kredit
                if (session()->get('kd_level_user') == 'LVL23072023131340' && $data['plafond'] < 2000000001) {
                    $data_master['posisi_progress'] = 'Kepala Cabang';
                    $data_master['progress'] = 'Approved';
                }
                if (session()->get('kd_level_user') == 'LVL23072023131340' && $data['plafond'] >= 2000000001 && $data['plafond'] < 5000000001) {
                    $data_master['posisi_progress'] = 'Analis Kredit';
                    $data_master['progress'] = 'Rekomendasi';
                }
                if (session()->get('kd_level_user') == 'LVL23072023131340' && $data['plafond'] >= 5000000001) {
                    $data_master['posisi_progress'] = 'Analis Kredit';
                    $data_master['progress'] = 'Rekomendasi';
                }
                // analis kredit => kepala bagian
                if (session()->get('kd_level_user') == 'LVL18092023101055' && $data['plafond'] < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah analis kredit
                    $data_master['posisi_progress'] = 'Kepala Cabang';
                    $data_master['progress'] = 'Approval/ Approved';
                }
                if (session()->get('kd_level_user') == 'LVL18092023101055' && $data['plafond'] >= 2000000001 && $data['plafond'] < 5000000001) {
                    $data_master['posisi_progress'] = 'Kepala Bagian';
                    $data_master['progress'] = 'Approval';
                }
                if (session()->get('kd_level_user') == 'LVL18092023101055' && $data['plafond'] >= 5000000001) {
                    $data_master['posisi_progress'] = 'Kepala Bagian';
                    $data_master['progress'] = 'Rekomendasi';
                }
                // kepala bagian => kepala divisi
                if (session()->get('kd_level_user') == 'LVL23072023134345' && $data['plafond'] < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala bagian
                    $data_master['posisi_progress'] = 'Kepala Cabang';
                    $data_master['progress'] = 'Approval/ Approved';
                }
                if (session()->get('kd_level_user') == 'LVL23072023134345' && $data['plafond'] >= 2000000001 && $data['plafond'] < 5000000001) {
                    $data_master['posisi_progress'] = 'Kepala Bagian';
                    $data_master['progress'] = 'Approved';
                }
                if (session()->get('kd_level_user') == 'LVL23072023134345' && $data['plafond'] >= 5000000001) {
                    $data_master['posisi_progress'] = 'Kepala Divisi';
                    $data_master['progress'] = 'Approval'; //baru ku ubah dari rekomendasi ke approval 11 8 24
                }

                // kepala divisi
                if (session()->get('kd_level_user') == 'LVL07112023100547' && $data['plafond'] < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala divisi
                    $data_master['posisi_progress'] = 'Kepala Cabang';
                    $data_master['progress'] = 'Approval/ Approved';
                }
                if (session()->get('kd_level_user') == 'LVL07112023100547' && $data['plafond'] >= 2000000001 && $data['plafond'] < 5000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala divisi
                    $data_master['posisi_progress'] = 'Kepala Bagian';
                    $data_master['progress'] = 'Approval/ Approved';
                }
                if (session()->get('kd_level_user') == 'LVL07112023100547' && $data['plafond'] >= 5000000001) {
                    $data_master['posisi_progress'] = 'Kepala Divisi';
                    $data_master['progress'] = 'Approved';
                }
                // jika yang login selain role di atas, maka hilangkan button finish
            }

            //pengecekan kd info tidak boleh sama sebelum insert
            $kd_data = $this->request->getPost('kd_data_tambah');
            $cek_kd_data = $this->db->query("SELECT kd_data from tb_data_entry where kd_data = '" . $kd_data . "' ")->getNumRows();
            if ($cek_kd_data > 0) {
                $edit_master = $this->edit_master($kd_data, $data_master);
                $ubah_fcr = $this->ubah_fcr($kd_data, $data);
                if ($edit_master == true && $ubah_fcr == true) {
                    $this->db->table('tb_data_entry')->where('kd_data', $kd_data)->update($data);
                    // $pengaruh = $this->db->affectedRows();
                    $hasil = [
                        'status' => 'success',
                    ];

                    if ($pemanggil == 'edit_data_entry') {
                        $hasil['message'] = 'Edit data entry berhasil';
                    } else {
                        $hasil['message'] = 'Edit data entry berhasil';
                    }
                } else {
                    $hasil = [
                        'status' => 'error',
                        'message' => 'Edit data master belum berhasil. coba lagi beberapa saat'
                    ];
                }
            } else {
                $hasil = [
                    'status' => 'error',
                    'message' => 'Edit Data Entry Gagal'
                ];
            }
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Jenis Agunan hanya boleh berupa:<br>
                                <ul>
                                    <li>Tanah/ Tanah dan Bangunan</li>
                                    <li>Barang Bergerak</li>
                                    <li>Tunai</li>
                                    <li>Penjaminan Lembaga Penjamin</li>
                                </ul>'
            ];
        }
        return $hasil;
    }
    public function tampil_btn_finish($kd_data)
    {

        $data_kirim = [
            'status' => 'success',
            'tampil_button' => 'hide',
            'judul_button' => 'Error',
        ];
        $cek_ada = $this->db->query("SELECT m.posisi_progress, m.progress, d.plafond from tb_data_master as m, tb_data_entry as d where m.kd_data = '" . $kd_data . "' and d.kd_data = '" . $kd_data . "' ");
        // $this->debug($cek_ada->getRow());
        if ($cek_ada->getNumRows() > 0) {
            $plafond_db = $cek_ada->getRow()->plafond;
            $posisi_progress_db = $cek_ada->getRow()->posisi_progress;
            $progress_db = $cek_ada->getRow()->progress;
            // $this->debug($plafond_db);
            //pemasar => koord pemasar
            if (session()->get('kd_level_user') == 'LVL23072023135343' && $posisi_progress_db == 'Pemasar' && $progress_db == 'Input') {
                // $data_master['posisi_progress'] = 'Koordinator Pemasar';
                // $data_master['progress'] = 'Review';
                $data_kirim = [
                    'status' => 'success',
                    'tampil_button' => 'show',
                    'judul_button' => 'Kirim ke Koord Pemasar',
                ];
            }
            // koord pemasar => kepala cabang
            if (session()->get('kd_level_user') == 'LVL23072023133934') {
                if ($plafond_db < 2000000001 && $posisi_progress_db == 'Koordinator Pemasar' && $progress_db == 'Review') {
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approval';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Kirim ke Kacab',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001 && $posisi_progress_db == 'Koordinator Pemasar' && $progress_db == 'Review') {
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Kirim ke Kacab',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Koordinator Pemasar' && $progress_db == 'Review') {
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Kirim ke Kacab',
                    ];
                }
            }
            // kepala cabang => analis kredit
            if (session()->get('kd_level_user') == 'LVL23072023131340') {
                if ($plafond_db < 2000000001 && $posisi_progress_db == 'Kepala Cabang' && $progress_db == 'Approval') {
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Setujui/ Approve',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001 && $posisi_progress_db == 'Kepala Cabang' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Analis Kredit';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Kirim ke Analis Kredit',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Kepala Cabang' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Analis Kredit';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Kirim ke Analis Kredit',
                    ];
                }
            }
            // analis kredit => kepala bagian
            if (session()->get('kd_level_user') == 'LVL18092023101055') {
                if ($plafond_db < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah analis kredit
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approval/ Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'hide',
                        'judul_button' => 'Kirim ke Kacab/ Error',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001 && $posisi_progress_db == 'Analis Kredit' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Kepala Bagian';
                    // $data_master['progress'] = 'Approval';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Kirim ke Kabag',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Analis Kredit' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Kepala Bagian';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Kirim ke Kabag',
                    ];
                }
            }
            // kepala bagian => kepala divisi
            if (session()->get('kd_level_user') == 'LVL23072023134345') {
                if ($plafond_db < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala bagian
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approval/ Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'hide',
                        'judul_button' => 'Kirim ke Kacab/  Error',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001 && $posisi_progress_db == 'Kepala Bagian' && $progress_db == 'Approval') {
                    // $data_master['posisi_progress'] = 'Kepala Bagian';
                    // $data_master['progress'] = 'Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Setujui/ Approve',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Kepala Bagian' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Kepala Divisi';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Kirim ke Kadiv',
                    ];
                }
            }

            // kepala divisi
            if (session()->get('kd_level_user') == 'LVL07112023100547') {
                if ($plafond_db < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala divisi
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approval/ Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'hide',
                        'judul_button' => 'Kirim ke Kacab/ Error',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala divisi
                    // $data_master['posisi_progress'] = 'Kepala Bagian';
                    // $data_master['progress'] = 'Approval/ Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'hide',
                        'judul_button' => 'Kirim ke Kabag/ Error',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Kepala Divisi' && $progress_db == 'Approval') {
                    // $data_master['posisi_progress'] = 'Kepala Divisi';
                    // $data_master['progress'] = 'Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'tampil_button' => 'show',
                        'judul_button' => 'Setujui/ Approve',
                    ];
                }
            }
        }
        // jika yang login selain role di atas, maka hilangkan button finish
        echo json_encode($data_kirim);
    }
    public function tampil_disposisi($kd_data)
    {

        $data_kirim = [
            'status' => 'success',
            'pemasar' => '0',
            'koor' => '0',
            'kacab' => '0',
            'analis' => '0',
            'kabag' => '0',
            'kadiv' => '0',
            'tampil_btn_return' => '0',
        ];
        $cek_ada = $this->db->query("SELECT m.posisi_progress, m.progress, d.plafond from tb_data_master as m, tb_data_entry as d where m.kd_data = '" . $kd_data . "' and d.kd_data = '" . $kd_data . "' ");
        // $this->debug($cek_ada->getRow());
        if ($cek_ada->getNumRows() > 0) {
            $plafond_db = $cek_ada->getRow()->plafond;
            $posisi_progress_db = $cek_ada->getRow()->posisi_progress;
            $progress_db = $cek_ada->getRow()->progress;
            // $this->debug($plafond_db);
            //pemasar => koord pemasar
            if (session()->get('kd_level_user') == 'LVL23072023135343') {
                if ($posisi_progress_db == 'Pemasar' && $progress_db == 'Input') {
                    // $data_master['posisi_progress'] = 'Koordinator Pemasar';
                    // $data_master['progress'] = 'Review';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '1',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '0',
                    ];
                }
            }
            // koord pemasar => kepala cabang
            if (session()->get('kd_level_user') == 'LVL23072023133934') {
                if ($plafond_db < 2000000001 && $posisi_progress_db == 'Koordinator Pemasar' && $progress_db == 'Review') {
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approval';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '1',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001 && $posisi_progress_db == 'Koordinator Pemasar' && $progress_db == 'Review') {
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '1',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Koordinator Pemasar' && $progress_db == 'Review') {
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '1',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
            }
            // kepala cabang => analis kredit
            if (session()->get('kd_level_user') == 'LVL23072023131340') {
                if ($plafond_db < 2000000001 && $posisi_progress_db == 'Kepala Cabang' && $progress_db == 'Approval') {
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '1',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001 && $posisi_progress_db == 'Kepala Cabang' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Analis Kredit';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '1',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Kepala Cabang' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Analis Kredit';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '1',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
            }
            // analis kredit => kepala bagian
            if (session()->get('kd_level_user') == 'LVL18092023101055') {
                if ($plafond_db < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah analis kredit
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approval/ Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '0',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001 && $posisi_progress_db == 'Analis Kredit' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Kepala Bagian';
                    // $data_master['progress'] = 'Approval';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '1',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Analis Kredit' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Kepala Bagian';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '1',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
            }
            // kepala bagian => kepala divisi
            if (session()->get('kd_level_user') == 'LVL23072023134345') {
                if ($plafond_db < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala bagian
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approval/ Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '0',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001 && $posisi_progress_db == 'Kepala Bagian' && $progress_db == 'Approval') {
                    // $data_master['posisi_progress'] = 'Kepala Bagian';
                    // $data_master['progress'] = 'Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '1',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Kepala Bagian' && $progress_db == 'Rekomendasi') {
                    // $data_master['posisi_progress'] = 'Kepala Divisi';
                    // $data_master['progress'] = 'Rekomendasi';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '1',
                        'kadiv' => '0',
                        'tampil_btn_return' => '1',
                    ];
                }
            }

            // kepala divisi
            if (session()->get('kd_level_user') == 'LVL07112023100547') {
                if ($plafond_db < 2000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala divisi
                    // $data_master['posisi_progress'] = 'Kepala Cabang';
                    // $data_master['progress'] = 'Approval/ Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '0',
                    ];
                }
                if ($plafond_db >= 2000000001 && $plafond_db < 5000000001) {
                    // harusnya button finishnya tidak muncul jika yang login adalah kepala divisi
                    // $data_master['posisi_progress'] = 'Kepala Bagian';
                    // $data_master['progress'] = 'Approval/ Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '0',
                        'tampil_btn_return' => '0',
                    ];
                }
                if ($plafond_db >= 5000000001 && $posisi_progress_db == 'Kepala Divisi' && $progress_db == 'Approval') {
                    // $data_master['posisi_progress'] = 'Kepala Divisi';
                    // $data_master['progress'] = 'Approved';
                    $data_kirim = [
                        'status' => 'success',
                        'pemasar' => '0',
                        'koor' => '0',
                        'kacab' => '0',
                        'analis' => '0',
                        'kabag' => '0',
                        'kadiv' => '1',
                        'tampil_btn_return' => '1',
                    ];
                }
            }
        }
        // jika yang login selain role di atas, maka hilangkan button finish
        echo json_encode($data_kirim);
    }
    public function edit_master($kd_data, $data_master)
    {
        $hasil = false;
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_data_master where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_data_master')->where('kd_data', $kd_data)->update($data_master);
            $hasil = true;
        } else {
            $hasil = false;
        }
        return $hasil;
    }
    public function get_data_entry($kd_data)
    {
        $hasil = [
            'status' => 'error',
            'message' => null,
        ];
        $data_entry = $this->db->query("SELECT * from tb_data_entry where kd_data = '" . $kd_data . "' ");
        if ($data_entry->getNumRows() > 0) {
            $hasil = [
                'status' => 'success',
                'message' => $data_entry->getRow(),
            ];
        }
        echo json_encode($hasil);
    }
    public function get_tabel_return($kd_data)
    {
        $hasil = [
            'status' => 'error',
            'message' => null,
        ];
        $tb_return = $this->db->query("SELECT * from tb_return where kd_data = '" . $kd_data . "' order by waktu_return desc");
        if ($tb_return->getNumRows() > 0) {
            $hasil = [
                'status' => 'success',
                'message' => $tb_return->getResult(),
            ];
        }
        echo json_encode($hasil);
    }
    public function edit_return()
    {
        if (!$this->validate([

            'catatan_return' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alasan Harus diisi',
                ]
            ],

        ])) {
            // session()->setFlashdata('error', $this->validator->listErrors());
            // return redirect()->back()->withInput();
            echo $this->validator->listErrors();
        } else {

            $kd_data = $this->request->getPost('kd_data_return');

            $nama_unit = session()->get('kd_unit_user');
            $unit = $this->db->query("SELECT * from tb_unit_kerja where kd_unit = '" . session()->get('kd_unit_user') . "' ");
            if ($unit->getNumRows() > 0) {
                $nama_unit = $unit->getRow()->nama_unit;
            }

            $nama_level = session()->get('kd_level_user');
            $level = $this->db->query("SELECT * from tb_level where kd_level = '" . session()->get('kd_level_user') . "' ");
            if ($level->getNumRows() > 0) {
                $nama_level = $level->getRow()->nama_level;
            }

            $progress = '';
            $posisi_progress = '';
            $data_entry = $this->db->query("SELECT * from tb_data_master where kd_data = '" . $kd_data . "' ");
            if ($data_entry->getNumRows() > 0) {
                $progress = $data_entry->getRow()->progress;
                $posisi_progress = $data_entry->getRow()->posisi_progress;
            }

            $data_master = [
                'posisi_progress' => 'Pemasar',
                'progress' => 'Input',
            ];

            $simpan_return = [
                'kd_return' => 'RETURN' . gmdate("YmdHis", time() + 60 * 60 * 8),
                'kd_data' => $this->request->getPost('kd_data_return'),
                'nama' => session()->get('nama_user'),
                'catatan' => $this->request->getPost('catatan_return'),
                'nama_unit' => $nama_unit,
                'nama_level' => $nama_level,
                'kd_unit_kerja' => session()->get('kd_unit_user'),
                'kd_level' => session()->get('kd_level_user'),

                'progress' => $progress,
                'posisi_progress' => $posisi_progress,

                'waktu_return' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),

            ];
            $edit_return = [
                // 'kd_return' => 'RETURN' . gmdate("YmdHis", time() + 60 * 60 * 8),
                // 'kd_data' => $this->request->getPost('kd_data_return'),
                'nama' => session()->get('nama_user'),
                'catatan' => $this->request->getPost('catatan_return'),
                'nama_unit' => $nama_unit,
                'nama_level' => $nama_level,
                'kd_unit_kerja' => session()->get('kd_unit_user'),
                'kd_level' => session()->get('kd_level_user'),

                'progress' => $progress,
                'posisi_progress' => $posisi_progress,

                'waktu_return' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),

            ];

            $ada_master = $this->db->query("SELECT * from tb_data_master where kd_data = '" . $kd_data . "' ")->getNumRows();
            if ($ada_master > 0) {
                $this->db->table('tb_data_master')->where('kd_data', $kd_data)->update($data_master);
                // echo json_encode(1);
            } else {
                echo 'Gagal edit data master';
                // die;
            }

            $ada_return = $this->db->query("SELECT * from tb_return where kd_data = '" . $kd_data . "' ")->getNumRows();
            if ($ada_return > 0) {
                // $this->db->table('tb_return')->where('kd_data', $kd_data)->update($edit_return);
                $this->db->table('tb_return')->insert($simpan_return);
                echo json_encode(1);
            } else if ($ada_return < 1) {
                $this->db->table('tb_return')->insert($simpan_return);
                echo json_encode(1);
            } else {
                echo 'Gagal simpan data return';
            }
        }
    }
    public function edit_reject($jenis = '1')
    {
        if (!$this->validate([

            'catatan_reject' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alasan Harus diisi',
                ]
            ],

        ])) {
            // session()->setFlashdata('error', $this->validator->listErrors());
            // return redirect()->back()->withInput();
            echo $this->validator->listErrors();
        } else {

            $kd_data = $this->request->getPost('kd_data_reject');

            $nama_unit = session()->get('kd_unit_user');
            $unit = $this->db->query("SELECT * from tb_unit_kerja where kd_unit = '" . session()->get('kd_unit_user') . "' ");
            if ($unit->getNumRows() > 0) {
                $nama_unit = $unit->getRow()->nama_unit;
            }

            $nama_level = session()->get('kd_level_user');
            $level = $this->db->query("SELECT * from tb_level where kd_level = '" . session()->get('kd_level_user') . "' ");
            if ($level->getNumRows() > 0) {
                $nama_level = $level->getRow()->nama_level;
            }

            $progress = '';
            $posisi_progress = '';
            $data_entry = $this->db->query("SELECT * from tb_data_master where kd_data = '" . $kd_data . "' ");
            if ($data_entry->getNumRows() > 0) {
                $progress = $data_entry->getRow()->progress;
                $posisi_progress = $data_entry->getRow()->posisi_progress;
            }

            $data_master = [
                'reject' => 'Ya',
            ];

            $simpan_reject = [
                'kd_reject' => 'REJECT' . gmdate("YmdHis", time() + 60 * 60 * 8),
                'kd_data' => $this->request->getPost('kd_data_reject'),
                'nama' => session()->get('nama_user'),
                'catatan' => $this->request->getPost('catatan_reject'),
                'nama_unit' => $nama_unit,
                'nama_level' => $nama_level,
                'kd_unit_kerja' => session()->get('kd_unit_user'),
                'kd_level' => session()->get('kd_level_user'),

                'progress' => $progress,
                'posisi_progress' => $posisi_progress,

                'waktu_reject' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),

            ];
            $edit_reject = [
                // 'kd_reject' => 'RETURN' . gmdate("YmdHis", time() + 60 * 60 * 8),
                // 'kd_data' => $this->request->getPost('kd_data_reject'),
                'nama' => session()->get('nama_user'),
                'catatan' => $this->request->getPost('catatan_reject'),
                'nama_unit' => $nama_unit,
                'nama_level' => $nama_level,
                'kd_unit_kerja' => session()->get('kd_unit_user'),
                'kd_level' => session()->get('kd_level_user'),

                'progress' => $progress,
                'posisi_progress' => $posisi_progress,

                'waktu_reject' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),

            ];
            if ($jenis == '1') {
                $simpan_reject['jenis_kredit'] = 'Pengajuan Kredit Transaksional';
                $edit_reject['jenis_kredit'] = 'Pengajuan Kredit Transaksional';
            }

            $ada_master = $this->db->query("SELECT * from tb_data_master where kd_data = '" . $kd_data . "' ")->getNumRows();
            if ($ada_master > 0) {
                $this->db->table('tb_data_master')->where('kd_data', $kd_data)->update($data_master);
                // echo json_encode(1);
            } else {
                echo 'Gagal edit data master';
                // die;
            }

            $ada_reject = $this->db->query("SELECT * from tb_reject where kd_data = '" . $kd_data . "' ")->getNumRows();
            if ($ada_reject > 0) {
                // $this->db->table('tb_reject')->where('kd_data', $kd_data)->update($edit_reject);
                $this->db->table('tb_reject')->insert($simpan_reject);
                echo json_encode(1);
            } else if ($ada_reject < 1) {
                $this->db->table('tb_reject')->insert($simpan_reject);
                echo json_encode(1);
            } else {
                echo 'Gagal simpan data return';
            }
        }
    }
    public function ubah_fcr($kd_data, $data)
    {
        $hasil = false;
        $fcr = [
            'nama_debitur' => $data['nama_debitur'],
            'alamat_kantor' => $data['alamat_kantor'],
            'alamat_gudang' => $data['alamat_gudang'],
            'group_debitur' => $data['group_debitur'],
            'kunjungan_oleh' => $data['koordinator_pemasar'] . ';' . $data['pemasar'],
            'kd_unit_kerja' => $data['kd_unit_kerja']
        ];
        $fcr_usaha = [
            'lokasi' => $data['alamat_proyek'],
            'lokasi_kantor' => $data['alamat_kantor'],
            'lokasi_workshop' => $data['alamat_gudang'],
        ];
        $scoring = [
            'nama_pemohon' => $data['nama_debitur'],
            'alamat' => $data['alamat_kantor'],
            'plafond' => $data['plafond'],
            'tujuan' => $data['tujuan_pengajuan'],
        ];
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fcr where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_fcr')->where('kd_data', $kd_data)->update($fcr);
            $pengaruh = $this->db->affectedRows();
            if ($this->db) {
                $cek_kd_data = $this->db->query("SELECT kd_data from tb_fcr_usaha where kd_data = '" . $kd_data . "' ")->getNumRows();
                if ($cek_kd_data > 0) {
                    $this->db->table('tb_fcr_usaha')->where('kd_data', $kd_data)->update($fcr_usaha);
                    // $hasil = true;
                    if ($this->db) {
                        $cek_kd_data = $this->db->query("SELECT kd_data from tb_scoring where kd_data = '" . $kd_data . "' ")->getNumRows();
                        if ($cek_kd_data > 0) {
                            $this->db->table('tb_scoring')->where('kd_data', $kd_data)->update($scoring);
                            $hasil = true;
                        } else {
                            $hasil = false;
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
        } else {
            $hasil = false;
        }
        return $hasil;
    }

    public function getGlobal()
    {
        $kd_data = $this->request->getPost('kd_data');
        $data['data_entry'] = $this->db->query("SELECT * FROM tb_data_entry WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['data_master'] = $this->db->query("SELECT * FROM tb_data_master WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['fcr'] = $this->db->query("SELECT * FROM tb_fcr WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['fcr_usaha'] = $this->db->query("SELECT * FROM tb_fcr_usaha WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['fcr_agunan'] = $this->db->query("SELECT * FROM tb_fcr_agunan WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['dok'] = $this->db->query("SELECT * FROM tb_dokumen WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['dok_cv'] = $this->db->query("SELECT * FROM tb_dokumen_cv WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['dok_pt'] = $this->db->query("SELECT * FROM tb_dokumen_pt WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['scoring'] = $this->db->query("SELECT * FROM tb_scoring WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['kirim'] = $this->db->query("SELECT * FROM tb_kirim WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();

        $data['fak_data'] = $this->db->query("SELECT * FROM tb_fak_data WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['fak_modal'] = $this->db->query("SELECT * FROM tb_fak_modal WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['fak_rl'] = $this->db->query("SELECT * FROM tb_fak_rl WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['faa'] = $this->db->query("SELECT * FROM tb_faa WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['ceftb'] = $this->db->query("SELECT * FROM tb_ceftb WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['mauk'] = $this->db->query("SELECT * FROM tb_mauk WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();
        $data['dcl'] = $this->db->query("SELECT * FROM tb_dcl WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow();

        $jenis_agunan = $this->db->query("SELECT jenis_agunan FROM tb_data_entry WHERE SHA1(kd_data) = '" . $kd_data . "' ")->getRow()->jenis_agunan;
        // Pecah string menjadi array berdasarkan delimiter ;
        $array = explode(";", $jenis_agunan);
        $data['jenis_agu'] = $array;

        // bukti kepemilikan di tb_fcr_agunan

        $detail_data = $this->db->query("SELECT * FROM tb_fcr_agunan WHERE SHA1(kd_data) = '" . $kd_data . "' ");
        if (!empty($detail_data->getRow()->bukti_kepemilikan)) {
            $array = explode(";", $detail_data->getRow()->bukti_kepemilikan);
            $data['bukti_kepemilikan'] = $array;
        } else {
            $data['bukti_kepemilikan'] = [];
        }
        if (!empty($detail_data->getRow()->imb)) {
            $array = explode(";", $detail_data->getRow()->imb);
            $data['imb'] = $array;
        } else {
            $data['imb'] = [];
        }

        if (!empty($detail_data->getRow()->warna)) {
            $array = explode(";", $detail_data->getRow()->warna);
            $data['warna'] = $array;
        } else {
            $data['warna'] = [];
        }

        // Pecah string menjadi array berdasarkan delimiter ;
        // $array = explode(";", $bukti_kepemilikan);
        // $data['jenis_agu'] = $array;

        echo json_encode($data);
    }
    public function get_perulangan()
    {
        $data = [];
        $kd_data = $this->request->getPost('kd_data');
        // $detail_fcr = $this->db->query("SELECT * FROM tb_fcr_agunan WHERE kd_data = '" . $kd_data . "' ");
        $detail_fcr = $this->db->query("SELECT d.nama_debitur, d.alamat_kantor, f.* 
                                        FROM tb_data_entry AS d, tb_fcr_agunan AS f 
                                        WHERE d.kd_data= '" . $kd_data . "'
                                        AND f.kd_data = '" . $kd_data . "'");
        if ($detail_fcr->getNumRows() > 0) {
            $data['jumlah'] = 1;
            $data['bukti_kepemilikan'] = explode(";", $detail_fcr->getRow()->bukti_kepemilikan);
            $data['jumlah_tanah'] = !empty($detail_fcr->getRow()->bukti_kepemilikan) ? count(explode(";", $detail_fcr->getRow()->bukti_kepemilikan)) : 0;
            $data['tanggal_kepemilikan'] = explode(";", $detail_fcr->getRow()->tanggal_kepemilikan);
            $data['surat_ukur'] = explode(";", $detail_fcr->getRow()->surat_ukur);
            $data['tanggal_surat_ukur'] = explode(";", $detail_fcr->getRow()->tanggal_surat_ukur);
            $data['nib'] = explode(";", $detail_fcr->getRow()->nib);
            $data['penunjuk'] = explode(";", $detail_fcr->getRow()->penunjuk);
            $data['kelurahan'] = explode(";", $detail_fcr->getRow()->kelurahan);
            $data['kecamatan'] = explode(";", $detail_fcr->getRow()->kecamatan);
            $data['kabupaten'] = explode(";", $detail_fcr->getRow()->kabupaten);
            $data['provinsi'] = explode(";", $detail_fcr->getRow()->provinsi);
            $data['utara'] = explode(";", $detail_fcr->getRow()->utara);
            $data['barat'] = explode(";", $detail_fcr->getRow()->barat);
            $data['selatan'] = explode(";", $detail_fcr->getRow()->selatan);
            $data['timur'] = explode(";", $detail_fcr->getRow()->timur);
            $data['luas_total'] = explode(";", $detail_fcr->getRow()->luas_total);
            $data['kanan'] = explode(";", $detail_fcr->getRow()->kanan);
            $data['kiri'] = explode(";", $detail_fcr->getRow()->kiri);
            $data['depan'] = explode(";", $detail_fcr->getRow()->depan);
            $data['belakang'] = explode(";", $detail_fcr->getRow()->belakang);
            $data['daerah_pemakaian'] = explode(";", $detail_fcr->getRow()->daerah_pemakaian);
            $data['kondisi_tanah'] = explode(";", $detail_fcr->getRow()->kondisi_tanah);
            $data['harga_tanah_buku'] = explode(";", $detail_fcr->getRow()->harga_tanah_buku);
            $data['harga_tanah_pasar'] = explode(";", $detail_fcr->getRow()->harga_tanah_pasar);
            $data['keterangan_lain'] = explode(";", $detail_fcr->getRow()->keterangan_lain);
            // bangunan
            $data['jumlah_imb'] = !empty($detail_fcr->getRow()->imb) ? count(explode(";", $detail_fcr->getRow()->imb)) : 0;

            $data['imb'] = explode(";", $detail_fcr->getRow()->imb);
            $data['pondasi'] = explode(";", $detail_fcr->getRow()->pondasi);
            $data['lantai'] = explode(";", $detail_fcr->getRow()->lantai);
            $data['tinggi_lantai_thd_jalan'] = explode(";", $detail_fcr->getRow()->tinggi_lantai_thd_jalan);
            $data['rangka'] = explode(";", $detail_fcr->getRow()->rangka);
            $data['dinding'] = explode(";", $detail_fcr->getRow()->dinding);
            $data['langit_plafon'] = explode(";", $detail_fcr->getRow()->langit_plafon);
            $data['atap'] = explode(";", $detail_fcr->getRow()->atap);
            $data['tahun_pembangunan'] = explode(";", $detail_fcr->getRow()->tahun_pembangunan);
            $data['rehab'] = explode(";", $detail_fcr->getRow()->rehab);
            $data['biaya_beli_tanah'] = explode(";", $detail_fcr->getRow()->biaya_beli_tanah);
            $data['biaya_pembangunan'] = explode(";", $detail_fcr->getRow()->biaya_pembangunan);
            $data['biaya_rehab'] = explode(";", $detail_fcr->getRow()->biaya_rehab);
            $data['air'] = explode(";", $detail_fcr->getRow()->air);
            $data['telepon'] = explode(";", $detail_fcr->getRow()->telepon);
            $data['listrik'] = explode(";", $detail_fcr->getRow()->listrik);
            $data['pagar'] = explode(";", $detail_fcr->getRow()->pagar);
            $data['taman'] = explode(";", $detail_fcr->getRow()->taman);
            $data['lainnya'] = explode(";", $detail_fcr->getRow()->lainnya);
            $data['luas_bangunan_lantai1'] = explode(";", $detail_fcr->getRow()->luas_bangunan_lantai1);
            $data['luas_bangunan_lantai2'] = explode(";", $detail_fcr->getRow()->luas_bangunan_lantai2);
            $data['total_bangunan'] = explode(";", $detail_fcr->getRow()->total_bangunan);
            $data['kondisi_bangunan'] = explode(";", $detail_fcr->getRow()->kondisi_bangunan);
            $data['harga_bangunan_perolehan'] = explode(";", $detail_fcr->getRow()->harga_bangunan_perolehan);
            $data['harga_bangunan_pasar'] = explode(";", $detail_fcr->getRow()->harga_bangunan_pasar);
            $data['keterangan_lain_bangunan'] = explode(";", $detail_fcr->getRow()->keterangan_lain_bangunan);

            $data['sarana'] = explode(";", $detail_fcr->getRow()->sarana);
            $data['sarana_prasarana'] = explode(";", $detail_fcr->getRow()->sarana_prasarana);
            $data['lebar_jalan'] = explode(";", $detail_fcr->getRow()->lebar_jalan);

            // barang bergerak
            $data['jumlah_bb'] = !empty($detail_fcr->getRow()->warna) ? count(explode(";", $detail_fcr->getRow()->warna)) : 0;

            $data['nama_debitur'] = $detail_fcr->getRow()->nama_debitur;
            $data['alamat_kantor'] = $detail_fcr->getRow()->alamat_kantor;

            $data['jenis_dokumen'] = explode(";", $detail_fcr->getRow()->jenis_dokumen);
            $data['jenis'] = explode(";", $detail_fcr->getRow()->jenis);
            $data['model_tipe'] = explode(";", $detail_fcr->getRow()->model_tipe);
            $data['merek_cc'] = explode(";", $detail_fcr->getRow()->merek_cc);
            $data['tahun_pembuatan'] = explode(";", $detail_fcr->getRow()->tahun_pembuatan);
            $data['tahun_pembeliaan'] = explode(";", $detail_fcr->getRow()->tahun_pembeliaan);
            $data['serial_number'] = explode(";", $detail_fcr->getRow()->serial_number);
            $data['nomor_mesin'] = explode(";", $detail_fcr->getRow()->nomor_mesin);
            $data['warna'] = explode(";", $detail_fcr->getRow()->warna);
            $data['bahan_bakar'] = explode(";", $detail_fcr->getRow()->bahan_bakar);
            $data['kondisi_keadaan'] = explode(";", $detail_fcr->getRow()->kondisi_keadaan);
            $data['nomor_polisi'] = explode(";", $detail_fcr->getRow()->nomor_polisi);
            $data['bukti_kepemilikan_agb'] = explode(";", $detail_fcr->getRow()->bukti_kepemilikan_agb);
            $data['invoice_no'] = explode(";", $detail_fcr->getRow()->invoice_no);
            $data['invoice_tanggal'] = explode(";", $detail_fcr->getRow()->invoice_tanggal);
            $data['perubahan_hak_terakhir'] = explode(";", $detail_fcr->getRow()->perubahan_hak_terakhir);
            $data['tercatat_atas_nama'] = explode(";", $detail_fcr->getRow()->tercatat_atas_nama);
            $data['alamat_pemilik_saat_ini'] = explode(";", $detail_fcr->getRow()->alamat_pemilik_saat_ini);
            $data['umur_teknis'] = explode(";", $detail_fcr->getRow()->umur_teknis);
            $data['perkiraan_umur_ekonomis'] = explode(";", $detail_fcr->getRow()->perkiraan_umur_ekonomis);
            $data['tempat_penyimpanan'] = explode(";", $detail_fcr->getRow()->tempat_penyimpanan);
            $data['route'] = explode(";", $detail_fcr->getRow()->route);
            $data['jarak_rata_rata_tempuh'] = explode(";", $detail_fcr->getRow()->jarak_rata_rata_tempuh);
        } else {
            $data['jumlah'] = 0;
        }
        // $data['jenis_agu'] = $array;

        echo json_encode($data);
    }
    public function edit_file()
    {
        if (!$this->validate([
            'upload_dokumen_edit' => [
                'rules' => 'uploaded[upload_dokumen_edit]|max_size[upload_dokumen_edit,2048]|ext_in[upload_dokumen_edit,pdf]',
                'errors' => [
                    'uploaded' => 'Harus Ada File Yang Diupload',
                    'max_size' => 'File maksimal 2 mb',
                    'ext_in' => 'File harus berupa pdf',
                ]
            ],


        ])) {

            echo $this->validator->listErrors();
        } else {
            $file = $this->request->getFile('upload_dokumen_edit');
            // Baca isi file dan konversi ke base64
            $pdfContent = base64_encode(file_get_contents($file->getTempName()));

            // Proses penyimpanan data
            $data = [
                'upload_dokumen' => $pdfContent,

                'pengubah' => session()->get('nama_user'),
                'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];

            //pengecekan kd info tidak boleh sama sebelum insert
            $kd_data = $this->request->getPost('kd_data_edit');
            $cek_kd_data = $this->db->query("SELECT kd_data from tb_data_entry where kd_data = '" . $kd_data . "' ")->getNumRows();
            if ($cek_kd_data > 0) {
                $this->db->table('tb_data_entry')->where('kd_data', $kd_data)->update($data);
                $pengaruh = $this->db->affectedRows();
                echo json_encode($pengaruh);
            } else {
                echo 'Edit Data Gagal';
            }
        }
    }
    public function edit_fcr()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            // 'nomor_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nomor Harus diisi',
            //     ]
            // ],
            // 'tanggal_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Harus diisi',
            //     ]
            // ],
            // 'nama_debitur_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama Debitur Harus diisi',
            //     ]
            // ],
            // 'alamat_kantor_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat kantor Harus diisi',
            //     ]
            // ],
            // 'alamat_gudang_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat Gudang Harus diisi',
            //     ]
            // ],
            // 'group_debitur_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Group Debitur Harus diisi',
            //     ]
            // ],
            // 'contact_person_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Contact Person Harus diisi',
            //     ]
            // ],
            // 'kunjungan_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kunjungan Harus diisi',
            //     ]
            // ],
            'kd_unit_kerja_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit Kerja Harus diisi',
                ]
            ],
            // 'tanggal_kunjungan_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Kunjungan Harus diisi',
            //     ]
            // ],
            // 'lokasi_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lokasi Harus diisi',
            //     ]
            // ],
            // 'tujuan_kunjungan_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tujuan Kunjungan Harus diisi',
            //     ]
            // ],
            // 'hasil_kunjungan_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Hasil Kunjungan Harus diisi',
            //     ]
            // ],
            // 'tindak_lanjut_edit' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tindak Lanjut Harus diisi',
            //     ]
            // ],



        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            // Proses penyimpanan data
            $hasil = $this->data_fcr($hasil);
        }
        echo json_encode($hasil);
    }
    public function data_fcr($hasil)
    {
        $data = [
            'nomor' => $this->request->getPost('nomor_edit'),
            'tanggal' => $this->request->getPost('tanggal_edit'),
            'nama_debitur' => $this->request->getPost('nama_debitur_edit'),
            'alamat_kantor' => $this->request->getPost('alamat_kantor_edit'),
            'alamat_gudang' => $this->request->getPost('alamat_gudang_edit'),
            'group_debitur' => $this->request->getPost('group_debitur_edit'),
            'contact_person' => $this->request->getPost('contact_person_edit'),
            'kunjungan_oleh' => $this->request->getPost('kunjungan_edit'),
            'kd_unit_kerja' => $this->request->getPost('kd_unit_kerja_edit'),
            'tanggal_kunjungan' => $this->request->getPost('tanggal_kunjungan_edit'),
            'lokasi_yang_dikunjungi' => $this->request->getPost('lokasi_edit'),
            'tujuan_kunjungan' => $this->request->getPost('tujuan_kunjungan_edit'),
            'hasil_kunjungan' => $this->request->getPost('hasil_kunjungan_edit'),
            'tindak_lanjut' => $this->request->getPost('tindak_lanjut_edit'),

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data_tambah');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fcr where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $cek_kd_unit = $this->kd_unit_fcr($kd_data, $data['kd_unit_kerja']);
            if ($cek_kd_unit == true) {
                $this->db->table('tb_fcr')->where('kd_data', $kd_data)->update($data);
                // $pengaruh = $this->db->affectedRows();
                $hasil = [
                    'status' => 'success',
                    'message' => 'Edit fcr berhasil'
                ];
            } else {
                $hasil = [
                    'status' => 'error',
                    'message' => 'Unit kerja harus sesuai dengan unit kerja yang ada di tab data entry'
                ];
            }
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit fcr Gagal'
            ];
        }
        return $hasil;
    }
    public function finish_fcr()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'nomor_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Harus diisi',
                ]
            ],
            'tanggal_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi',
                ]
            ],
            'nama_debitur_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Debitur Harus diisi',
                ]
            ],
            'alamat_kantor_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat kantor Harus diisi',
                ]
            ],
            'alamat_gudang_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Gudang Harus diisi',
                ]
            ],
            'group_debitur_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Group Debitur Harus diisi',
                ]
            ],
            'contact_person_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Contact Person Harus diisi',
                ]
            ],
            'kunjungan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kunjungan Harus diisi',
                ]
            ],
            'kd_unit_kerja_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit Kerja Harus diisi',
                ]
            ],
            'tanggal_kunjungan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kunjungan Harus diisi',
                ]
            ],
            'lokasi_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Harus diisi',
                ]
            ],
            'tujuan_kunjungan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Kunjungan Harus diisi',
                ]
            ],
            'hasil_kunjungan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hasil Kunjungan Harus diisi',
                ]
            ],
            'tindak_lanjut_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tindak Lanjut Harus diisi',
                ]
            ],

        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            // Proses penyimpanan data
            $hasil = $this->data_fcr($hasil);
        }
        echo json_encode($hasil);
    }
    public function edit_fcr_usaha()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'kondisi_fisik_kantor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Fisik Kantor Harus diisi',
                ]
            ],
            // 'luas_tanah_kantor' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Luas Tanah Kantor Harus diisi',
            //     ]
            // ],
            // 'luas_bangunan_kantor' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Luas Bangunan Kantor Harus diisi',
            //     ]
            // ],
            // 'fasilitas_kantor' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Fasilitas Kantor Harus diisi',
            //     ]
            // ],
            // 'lokasi_kantor' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lokasi Kantor Harus diisi',
            //     ]
            // ],

            // 'kondisi_fisik_workshop' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kondisi Fisik Workshop Harus diisi',
            //     ]
            // ],
            // 'luas_tanah_workshop' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Luas Tanah Workshop Harus diisi',
            //     ]
            // ],
            // 'luas_bangunan_workshop' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Luas Bangunan Workshop Harus diisi',
            //     ]
            // ],
            // 'fasilitas_workshop' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Fasilitas Workshop Harus diisi',
            //     ]
            // ],
            // 'lokasi_workshop' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lokasi Workshop Harus diisi',
            //     ]
            // ],

            // 'mesin_utama_m' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Mesin Utama Harus diisi',
            //     ]
            // ],
            // 'mesin_penunjang_m' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Mesin Penunjang Harus diisi',
            //     ]
            // ],
            // 'kondisi_m' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kondisi Mesin Harus diisi',
            //     ]
            // ],

            // 'kapasitas_mesin_m' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kapasitas Mesin Harus diisi',
            //     ]
            // ],

            // 'peralatan_utama_p' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Peralatan Utama Harus diisi',
            //     ]
            // ],
            // 'peralatan_penunjang_p' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Peralatan Penunjang Harus diisi',
            //     ]
            // ],
            // 'kondisi_p' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kondisi Harus diisi',
            //     ]
            // ],
            // 'lainnya_p' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lainnya Harus diisi',
            //     ]
            // ],

            // 'fungsi_b' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Fungsi Harus diisi',
            //     ]
            // ],
            // 'merk_b' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Merk Harus diisi',
            //     ]
            // ],
            // 'kondisi_b' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kondisi Harus diisi',
            //     ]
            // ],
            // 'lainnya_b' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lainnya Harus diisi',
            //     ]
            // ],


            // 'fungsi_k' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Fungsi Harus diisi',
            //     ]
            // ],
            // 'merk_k' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Merk Harus diisi',
            //     ]
            // ],
            // 'kondisi_k' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kondisi Harus diisi',
            //     ]
            // ],
            // 'lainnya_k' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lainnya Harus diisi',
            //     ]
            // ],


            // 'lokasi_sk' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lokasi Harus diisi',
            //     ]
            // ],
            // 'luas_lokasi_sk' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Luas Lokasi Harus diisi',
            //     ]
            // ],
            // 'kondisi_fisik_sk' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kondisi Fisik Harus diisi',
            //     ]
            // ],


            // 'bahan_baku' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Bahan Baku Harus diisi',
            //     ]
            // ],
            // 'bahan_setengah_jadi' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Bahan Setengah Jadi Harus diisi',
            //     ]
            // ],
            // 'persediaan_material' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Persediaan Material Harus diisi',
            //     ]
            // ],
        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            // Proses penyimpanan data
            $hasil = $this->data_fcr_usaha($hasil);
        }
        echo json_encode($hasil);
    }
    public function data_fcr_usaha($hasil)
    {
        $data = [
            'kondisi_fisik_kantor' => $this->request->getPost('kondisi_fisik_kantor'),
            'luas_tanah_kantor' => $this->request->getPost('luas_tanah_kantor'),
            'luas_bangunan_kantor' => $this->request->getPost('luas_bangunan_kantor'),
            'fasilitas_kantor' => $this->request->getPost('fasilitas_kantor'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),

            'kondisi_fisik_workshop' => $this->request->getPost('kondisi_fisik_workshop'),
            'luas_tanah_workshop' => $this->request->getPost('luas_tanah_workshop'),
            'luas_bangunan_workshop' => $this->request->getPost('luas_bangunan_workshop'),
            'fasilitas_workshop' => $this->request->getPost('fasilitas_workshop'),
            'lokasi_workshop' => $this->request->getPost('lokasi_workshop'),

            'fungsi_mesin_utama' => $this->request->getPost('mesin_utama_m'),
            'fungsi_mesin_penunjang' => $this->request->getPost('mesin_penunjang_m'),
            'kondisi' => $this->request->getPost('kondisi_m'),
            'kapasitas_mesin' => $this->request->getPost('kapasitas_mesin_m'),

            'peralatan_utama' => $this->request->getPost('peralatan_utama_p'),
            'peralatan_penunjang' => $this->request->getPost('peralatan_penunjang_p'),
            'kondisi_merk' => $this->request->getPost('kondisi_p'),
            'lainnya' => $this->request->getPost('lainnya_p'),

            'fungsi_aab' => $this->request->getPost('fungsi_b'),
            'merk_aab' => $this->request->getPost('merk_b'),
            'kondisi_aab' => $this->request->getPost('kondisi_b'),
            'lain_lain_aab' => $this->request->getPost('lainnya_b'),

            'fungsi_kend' => $this->request->getPost('fungsi_k'),
            'merk_kend' => $this->request->getPost('merk_k'),
            'kondisi_kend' => $this->request->getPost('kondisi_k'),
            'lain_lain_kend' => $this->request->getPost('lainnya_k'),

            'lokasi' => $this->request->getPost('lokasi_sk'),
            'luas_lokasi' => $this->request->getPost('luas_lokasi_sk'),
            'kondisi_fisik' => $this->request->getPost('kondisi_fisik_sk'),

            'bahan_baku' => $this->request->getPost('bahan_baku'),
            'bahan_setengah_jadi' => $this->request->getPost('bahan_setengah_jadi'),
            'persediaan_material' => $this->request->getPost('persediaan_material'),

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data_tambah');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fcr_usaha where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_fcr_usaha')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit fcr usaha berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit fcr usaha gagal'
            ];
        }
        return $hasil;
    }
    public function finish_fcr_usaha()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'kondisi_fisik_kantor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Fisik Kantor Harus diisi',
                ]
            ],
            'luas_tanah_kantor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Luas Tanah Kantor Harus diisi',
                ]
            ],
            'luas_bangunan_kantor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Luas Bangunan Kantor Harus diisi',
                ]
            ],
            'fasilitas_kantor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fasilitas Kantor Harus diisi',
                ]
            ],
            'lokasi_kantor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Kantor Harus diisi',
                ]
            ],

            'kondisi_fisik_workshop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Fisik Workshop Harus diisi',
                ]
            ],
            'luas_tanah_workshop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Luas Tanah Workshop Harus diisi',
                ]
            ],
            'luas_bangunan_workshop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Luas Bangunan Workshop Harus diisi',
                ]
            ],
            'fasilitas_workshop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fasilitas Workshop Harus diisi',
                ]
            ],
            'lokasi_workshop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Workshop Harus diisi',
                ]
            ],

            'mesin_utama_m' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mesin Utama Harus diisi',
                ]
            ],
            'mesin_penunjang_m' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mesin Penunjang Harus diisi',
                ]
            ],
            'kondisi_m' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Mesin Harus diisi',
                ]
            ],

            'kapasitas_mesin_m' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kapasitas Mesin Harus diisi',
                ]
            ],

            'peralatan_utama_p' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Peralatan Utama Harus diisi',
                ]
            ],
            'peralatan_penunjang_p' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Peralatan Penunjang Harus diisi',
                ]
            ],
            'kondisi_p' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Harus diisi',
                ]
            ],
            'lainnya_p' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lainnya Harus diisi',
                ]
            ],

            'fungsi_b' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fungsi Harus diisi',
                ]
            ],
            'merk_b' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Merk Harus diisi',
                ]
            ],
            'kondisi_b' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Harus diisi',
                ]
            ],
            'lainnya_b' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lainnya Harus diisi',
                ]
            ],


            'fungsi_k' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fungsi Harus diisi',
                ]
            ],
            'merk_k' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Merk Harus diisi',
                ]
            ],
            'kondisi_k' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Harus diisi',
                ]
            ],
            'lainnya_k' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lainnya Harus diisi',
                ]
            ],


            'lokasi_sk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Harus diisi',
                ]
            ],
            'luas_lokasi_sk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Luas Lokasi Harus diisi',
                ]
            ],
            'kondisi_fisik_sk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Fisik Harus diisi',
                ]
            ],


            'bahan_baku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahan Baku Harus diisi',
                ]
            ],
            'bahan_setengah_jadi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahan Setengah Jadi Harus diisi',
                ]
            ],
            'persediaan_material' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Persediaan Material Harus diisi',
                ]
            ],
        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            // Proses penyimpanan data
            $hasil = $this->data_fcr_usaha($hasil);
        }
        echo json_encode($hasil);
    }
    public function kd_unit_fcr($kd_data_input, $kd_unit_input)
    {
        $hasil = false;
        $kd_unit_data_entry = $this->db->query("SELECT * from tb_data_entry where kd_data = '" . $kd_data_input . "' ");
        if ($kd_unit_data_entry->getNumRows() > 0) {
            $kd_unit_db = $kd_unit_data_entry->getRow()->kd_unit_kerja;
            if ($kd_unit_db == $kd_unit_input) {
                $hasil = true;
            } else {
                $hasil = false;
            }
        } else {
            $hasil = false;
        }
        return $hasil;
    }
    public function edit_fcr_agunan_kd_tepakai()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $this->debug(($this->request->getPost()));

        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'bukti_kepemilikan[0]' => [
                // 'rules' => 'max_length[1000000000]',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bukti Kepemilikan Harus diisi',
                    // 'max_length' => 'Maksimal 1 milyar karakter',
                ]
            ],
            // 'tanggal_bukti_kepemilikan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Bukti Kepemilikan Harus diisi',
            //     ]
            // ],
            // 'surat_ukur' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Surat Ukur Harus diisi',
            //     ]
            // ],
            // 'tanggal_surat_ukur' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tangal Surat Ukur Harus diisi',
            //     ]
            // ],
            // 'nib' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nib Harus diisi',
            //     ]
            // ],

            // 'penunjuk' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Penunjuk Harus diisi',
            //     ]
            // ],
            // 'kelurahan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kelurahan Harus diisi',
            //     ]
            // ],
            // 'kecamatan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kecamatan Harus diisi',
            //     ]
            // ],
            // 'kabupaten' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kabupaten Harus diisi',
            //     ]
            // ],
            // 'provinsi' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Provinsi Harus diisi',
            //     ]
            // ],

            // 'utara' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Utara Harus diisi',
            //     ]
            // ],
            // 'barat' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Barat Harus diisi',
            //     ]
            // ],
            // 'selatan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Selatan Harus diisi',
            //     ]
            // ],

            // 'timur' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Timur Harus diisi',
            //     ]
            // ],

            // 'luas' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Luas Harus diisi',
            //     ]
            // ],
            // 'kanan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kanan Harus diisi',
            //     ]
            // ],
            // 'kiri' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kiri Harus diisi',
            //     ]
            // ],
            // 'depan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Depan Harus diisi',
            //     ]
            // ],

            // 'belakang' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Belakang Harus diisi',
            //     ]
            // ],
            // 'daerah_pemakaian' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Daerah Pemakaian Harus diisi',
            //     ]
            // ],
            // 'kondisi_tanah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kondisi Tanah Harus diisi',
            //     ]
            // ],
            // 'buku_tanah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Buku Tanah Harus diisi',
            //     ]
            // ],


            // 'menurut_pasar' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Menurut Pasar Harus diisi',
            //     ]
            // ],
            // 'keterangan_lain' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Keterangan Lain Harus diisi',
            //     ]
            // ],
            // 'imb' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'IMB Harus diisi',
            //     ]
            // ],
            // 'pondasi' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pondasi Harus diisi',
            //     ]
            // ],


            // 'lantai' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lantai Harus diisi',
            //     ]
            // ],
            // 'tinggi_lantai_terhadap_jalan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tinggi Lantai Terhadap Jalan Harus diisi',
            //     ]
            // ],
            // 'rangka' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Rangka Harus diisi',
            //     ]
            // ],


            // 'dinding' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Dinding Harus diisi',
            //     ]
            // ],
            // 'langit_plafond' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Langit Plafond Harus diisi',
            //     ]
            // ],
            // 'atap' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Atap Harus diisi',
            //     ]
            // ],
            // 'tahun_pembangunan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tahun Pembangunan Harus diisi',
            //     ]
            // ],
            // 'rehap_perbaikan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Rehab Perbaikan Harus diisi',
            //     ]
            // ],
            // 'saat_pembelian_tanah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Saat Pembelian Tanah Harus diisi',
            //     ]
            // ],
            // 'saat_pembangunan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Saat Pembangunan Harus diisi',
            //     ]
            // ],
            // 'saat_rehab_perbaikan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Saat Rehab Perbaikan Harus diisi',
            //     ]
            // ],
            // 'air' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Air Harus diisi',
            //     ]
            // ],
            // 'telepon' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Telepon Harus diisi',
            //     ]
            // ],
            // 'listrik' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Listrik Harus diisi',
            //     ]
            // ],
            // 'pagar' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pagar Harus diisi',
            //     ]
            // ],
            // 'taman' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Taman Harus diisi',
            //     ]
            // ],
            // 'lainnya_fag' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lainnya Harus diisi',
            //     ]
            // ],
            // 'lantai1' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'lantai 1 diisi',
            //     ]
            // ],
            // 'lantai2' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'lantai 2 Harus diisi',
            //     ]
            // ],
            // 'total_bangunan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Total Bangunan Harus diisi',
            //     ]
            // ],
            // 'kondisi_bangunan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kondisi Bangunan Harus diisi',
            //     ]
            // ],
            // 'menurut_harga_perolehan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Menurut Harga Perolehan Harus diisi',
            //     ]
            // ],
            // 'menurut_pasar_fag' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Menurut Pasar Harus diisi',
            //     ]
            // ],
            // 'keterangan_lain_fag' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'keterangan Lain Harus diisi',
            //     ]
            // ],
            // 'sarana' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Sarana Harus diisi',
            //     ]
            // ],
            // 'sarana_prasarana_fag' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Sarana Prasarana Harus diisi',
            //     ]
            // ],
            // 'kelas' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Kelas Harus diisi',
            //     ]
            // ],

        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            $hasil = $this->data_fcr_agunan($hasil);
        }
        echo json_encode($hasil);
    }
    public function edit_fcr_agunan()
    {

        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Mengambil semua data POST
        $postData = $this->request->getPost();

        // Mengambil array bukti_kepemilikan
        $bukti_kepemilikan = $postData['bukti_kepemilikan'] ?? [];
        $tanggal_bukti_kepemilikan = $postData['tanggal_bukti_kepemilikan'] ?? [];

        $surat_ukur = $postData['surat_ukur'] ?? [];
        $tanggal_surat_ukur = $postData['tanggal_surat_ukur'] ?? [];
        // $this->debug($bukti_kepemilikan);
        $nib = $postData['nib'] ?? [];
        $penunjuk = $postData['penunjuk'] ?? [];
        $kelurahan = $postData['kelurahan'] ?? [];
        $kecamatan = $postData['kecamatan'] ?? [];
        $kabupaten = $postData['kabupaten'] ?? [];
        $provinsi = $postData['provinsi'] ?? [];
        $utara = $postData['utara'] ?? [];
        $barat = $postData['barat'] ?? [];
        $selatan = $postData['selatan'] ?? [];
        $timur = $postData['timur'] ?? [];
        $luas = $postData['luas'] ?? [];
        $kanan = $postData['kanan'] ?? [];
        $kiri = $postData['kiri'] ?? [];
        $depan = $postData['depan'] ?? [];
        $belakang = $postData['belakang'] ?? [];
        $daerah_pemakaian = $postData['daerah_pemakaian'] ?? [];
        $kondisi_tanah = $postData['kondisi_tanah'] ?? [];
        $buku_tanah = $postData['buku_tanah'] ?? [];
        $menurut_pasar = $postData['menurut_pasar'] ?? [];
        $keterangan_lain = $postData['keterangan_lain'] ?? [];
        // $this->debug($bukti_kepemilikan);

        // Validasi input dinamis

        $validationRules = [];

        // $validationRules = $this->val_foreach($bukti_kepemilikan, 'bukti_kepemilikan', 'bukti kepemilikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //         // 'message' => 'haii'
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tanggal_bukti_kepemilikan, 'tanggal_bukti_kepemilikan', 'tanggal bukti kepemilikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($surat_ukur, 'surat_ukur', 'surat ukur');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tanggal_surat_ukur, 'tanggal_surat_ukur', 'tanggal surat ukur');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($nib, 'nib', 'nib');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($penunjuk, 'penunjuk', 'penunjuk');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kelurahan, 'kelurahan', 'kelurahan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kecamatan, 'kecamatan', 'kecamatan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kabupaten, 'kabupaten', 'kabupaten');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($provinsi, 'provinsi', 'provinsi');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($utara, 'utara', 'utara');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($barat, 'barat', 'barat');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($selatan, 'selatan', 'selatan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($timur, 'timur', 'timur');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($luas, 'luas', 'luas');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kanan, 'kanan', 'kanan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kiri, 'kiri', 'kiri');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($depan, 'depan', 'depan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($belakang, 'belakang', 'belakang');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($daerah_pemakaian, 'daerah_pemakaian', 'daerah pemakaian');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kondisi_tanah, 'kondisi_tanah', 'kondisi tanah');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($buku_tanah, 'buku_tanah', 'buku tanah');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($menurut_pasar, 'menurut_pasar', 'menurut pasar');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($keterangan_lain, 'keterangan_lain', 'keterangan lain');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }

        $hasil = $this->data_fcr_agunan($hasil);
        echo json_encode($hasil);
    }
    public function val_foreach($bukti_kepemilikan, $nama_validasi, $pesan)
    {
        // $this->debug($bukti_kepemilikan);
        $validationRules = [];
        foreach ($bukti_kepemilikan as $index => $value) {
            $validationRules["{$nama_validasi}.{$index}"] = [
                'rules' => 'required',
                'errors' => [
                    'required' => $pesan . ' yang ke - ' . $index + 1 . ' harus diisi'
                ]
            ];
        }
        // $this->debug($validationRules);
        return $validationRules;
    }
    public function finish_fcr_agunan_tanah()
    {

        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Mengambil semua data POST
        $postData = $this->request->getPost();

        // Mengambil array bukti_kepemilikan
        $bukti_kepemilikan = $postData['bukti_kepemilikan'] ?? [];
        $tanggal_bukti_kepemilikan = $postData['tanggal_bukti_kepemilikan'] ?? [];

        $surat_ukur = $postData['surat_ukur'] ?? [];
        $tanggal_surat_ukur = $postData['tanggal_surat_ukur'] ?? [];
        // $this->debug($bukti_kepemilikan);
        $nib = $postData['nib'] ?? [];
        $penunjuk = $postData['penunjuk'] ?? [];
        $kelurahan = $postData['kelurahan'] ?? [];
        $kecamatan = $postData['kecamatan'] ?? [];
        $kabupaten = $postData['kabupaten'] ?? [];
        $provinsi = $postData['provinsi'] ?? [];
        $utara = $postData['utara'] ?? [];
        $barat = $postData['barat'] ?? [];
        $selatan = $postData['selatan'] ?? [];
        $timur = $postData['timur'] ?? [];
        $luas = $postData['luas'] ?? [];
        $kanan = $postData['kanan'] ?? [];
        $kiri = $postData['kiri'] ?? [];
        $depan = $postData['depan'] ?? [];
        $belakang = $postData['belakang'] ?? [];
        $daerah_pemakaian = $postData['daerah_pemakaian'] ?? [];
        $kondisi_tanah = $postData['kondisi_tanah'] ?? [];
        $buku_tanah = $postData['buku_tanah'] ?? [];
        $menurut_pasar = $postData['menurut_pasar'] ?? [];
        $keterangan_lain = $postData['keterangan_lain'] ?? [];
        // $this->debug($bukti_kepemilikan);

        // Validasi input dinamis
        $validationRules = [];

        // $validationRules = $this->val_foreach($bukti_kepemilikan, 'bukti_kepemilikan', 'bukti kepemilikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tanggal_bukti_kepemilikan, 'tanggal_bukti_kepemilikan', 'tanggal bukti kepemilikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($surat_ukur, 'surat_ukur', 'surat ukur');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tanggal_surat_ukur, 'tanggal_surat_ukur', 'tanggal surat ukur');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($nib, 'nib', 'nib');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($penunjuk, 'penunjuk', 'penunjuk');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kelurahan, 'kelurahan', 'kelurahan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kecamatan, 'kecamatan', 'kecamatan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kabupaten, 'kabupaten', 'kabupaten');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($provinsi, 'provinsi', 'provinsi');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($utara, 'utara', 'utara');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($barat, 'barat', 'barat');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($selatan, 'selatan', 'selatan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($timur, 'timur', 'timur');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($luas, 'luas', 'luas');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kanan, 'kanan', 'kanan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kiri, 'kiri', 'kiri');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($depan, 'depan', 'depan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($belakang, 'belakang', 'belakang');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($daerah_pemakaian, 'daerah_pemakaian', 'daerah pemakaian');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kondisi_tanah, 'kondisi_tanah', 'kondisi tanah');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($buku_tanah, 'buku_tanah', 'buku tanah');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($menurut_pasar, 'menurut_pasar', 'menurut pasar');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($keterangan_lain, 'keterangan_lain', 'keterangan lain');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }

        $hasil = $this->data_fcr_agunan($hasil);
        echo json_encode($hasil);
    }

    public function data_fcr_agunan($hasil)
    {
        // Proses penyimpanan data
        // $this->debug($this->request->getPost('bukti_kepemilikan'));
        // $jenis_agunan = explode(";", $input);

        // $bukti = $this->request->getPost('bukti_kepemilikan');
        // $this->debug($bukti);
        $data = [
            'bukti_kepemilikan' => !empty($this->request->getPost('bukti_kepemilikan')) ? implode(";", $this->request->getPost('bukti_kepemilikan')) : '',
            'tanggal_kepemilikan' => !empty($this->request->getPost('tanggal_bukti_kepemilikan')) ? implode(";", $this->request->getPost('tanggal_bukti_kepemilikan')) : '',
            'surat_ukur' => !empty($this->request->getPost('surat_ukur')) ? implode(";", $this->request->getPost('surat_ukur')) : '',
            'tanggal_surat_ukur' => !empty($this->request->getPost('tanggal_surat_ukur')) ? implode(";", $this->request->getPost('tanggal_surat_ukur')) : '',
            'nib' => !empty($this->request->getPost('nib')) ? implode(";", $this->request->getPost('nib')) : '',
            'penunjuk' => !empty($this->request->getPost('penunjuk')) ? implode(";", $this->request->getPost('penunjuk')) : '',
            'kelurahan' => !empty($this->request->getPost('kelurahan')) ? implode(";", $this->request->getPost('kelurahan')) : '',
            'kecamatan' => !empty($this->request->getPost('kecamatan')) ? implode(";", $this->request->getPost('kecamatan')) : '',
            'kabupaten' => !empty($this->request->getPost('kabupaten')) ? implode(";", $this->request->getPost('kabupaten')) : '',
            'provinsi' => !empty($this->request->getPost('provinsi')) ? implode(";", $this->request->getPost('provinsi')) : '',

            'utara' => !empty($this->request->getPost('utara')) ? implode(";", $this->request->getPost('utara')) : '',
            'barat' => !empty($this->request->getPost('barat')) ? implode(";", $this->request->getPost('barat')) : '',
            'selatan' => !empty($this->request->getPost('selatan')) ? implode(";", $this->request->getPost('selatan')) : '',
            'timur' => !empty($this->request->getPost('timur')) ? implode(";", $this->request->getPost('timur')) : '',
            'luas_total' => !empty($this->request->getPost('luas')) ? implode(";", $this->request->getPost('luas')) : '',

            'kanan' => !empty($this->request->getPost('kanan')) ? implode(";", $this->request->getPost('kanan')) : '',
            'kiri' => !empty($this->request->getPost('kiri')) ? implode(";", $this->request->getPost('kiri')) : '',
            'depan' => !empty($this->request->getPost('depan')) ? implode(";", $this->request->getPost('depan')) : '',
            'belakang' => !empty($this->request->getPost('belakang')) ? implode(";", $this->request->getPost('belakang')) : '',

            'daerah_pemakaian' => !empty($this->request->getPost('daerah_pemakaian')) ? implode(";", $this->request->getPost('daerah_pemakaian')) : '',
            'kondisi_tanah' => !empty($this->request->getPost('kondisi_tanah')) ? implode(";", $this->request->getPost('kondisi_tanah')) : '',
            'harga_tanah_buku' => !empty($this->request->getPost('buku_tanah')) ? implode(";", $this->request->getPost('buku_tanah')) : '',
            'harga_tanah_pasar' => !empty($this->request->getPost('menurut_pasar')) ? implode(";", $this->request->getPost('menurut_pasar')) : '',
            'keterangan_lain' => !empty($this->request->getPost('keterangan_lain')) ? implode(";", $this->request->getPost('keterangan_lain')) : '',

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        // if (!empty($this->request->getPost('luas'))) {
        //     $data['luas_total'] = $this->request->getPost('luas');
        // } else {
        //     $data['luas_total'] = $data['utara'] + $data['selatan'] + $data['barat'] + $data['timur'];
        // }

        // var_dump($this->request->getPost('luas'));
        // var_dump($data['luas_total']);
        // die;

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data_tambah');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fcr_agunan where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_fcr_agunan')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit tanah berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit fcr agunan gagal'
            ];
        }
        return $hasil;
    }
    // bangunan
    public function edit_fcr_agunan_bangunan()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Mengambil semua data POST
        $postData = $this->request->getPost();
        // $files = $this->request->getFiles()[''];
        // Mengambil array bukti_kepemilikan
        // $imb = $this->request->getPost()['imb'] ?? [];
        // $imb = $this->request->getPost()['edit_gambar'] ?? [];
        // $files = $this->request->getPost()['edit_gambar'] ?? [];
        // $pondasi = $this->request->getPost()['pondasi'] ?? [];
        // foreach($imb as $file){
        //     $data = base64_encode(file_get_contents($file));
        //     $this->debug($data);
        //     // echo "<iframe src=\"data:application/pdf;base64,$data\" width=\"100%\" height=\"600px\"></iframe>";
        //     die;
        // }
        // var_dump($postData);die;

        $imb = $postData['imb'] ?? [];
        $pondasi = $postData['pondasi'] ?? [];
        $lantai = $postData['lantai'] ?? [];
        // $this->debug($bukti_kepemilikan);
        $tinggi_lantai_terhadap_jalan = $postData['tinggi_lantai_terhadap_jalan'] ?? [];
        $rangka = $postData['rangka'] ?? [];
        $dinding = $postData['dinding'] ?? [];
        $langit_plafond = $postData['langit_plafond'] ?? [];
        $atap = $postData['atap'] ?? [];
        $tahun_pembangunan = $postData['tahun_pembangunan'] ?? [];
        $rehap_perbaikan = $postData['rehap_perbaikan'] ?? [];
        $saat_pembelian_tanah = $postData['saat_pembelian_tanah'] ?? [];
        $saat_pembangunan = $postData['saat_pembangunan'] ?? [];
        $saat_rehab_perbaikan = $postData['saat_rehab_perbaikan'] ?? [];
        $air = $postData['air'] ?? [];
        $telepon = $postData['telepon'] ?? [];
        $listrik = $postData['listrik'] ?? [];
        $pagar = $postData['pagar'] ?? [];
        $taman = $postData['taman'] ?? [];
        $lainnya_fag = $postData['lainnya_fag'] ?? [];
        $lantai1 = $postData['lantai1'] ?? [];
        $lantai2 = $postData['lantai2'] ?? [];
        $total_bangunan = $postData['total_bangunan'] ?? [];
        $kondisi_bangunan = $postData['kondisi_bangunan'] ?? [];
        $menurut_harga_perolehan = $postData['menurut_harga_perolehan'] ?? [];
        $menurut_pasar_fag = $postData['menurut_pasar_fag'] ?? [];
        $keterangan_lain_fag = $postData['keterangan_lain_fag'] ?? [];
        // sarana: [],
        // sarana_prasarana_fag: [],
        // kelas: [],
        $sarana = $postData['sarana'] ?? [];
        $sarana_prasarana_fag = $postData['sarana_prasarana_fag'] ?? [];
        $kelas = $postData['kelas'] ?? [];

        // if ($this->request->getFiles()) {
        //     // Ambil semua file
        //     $files = $this->request->getFiles();

        //     foreach ($files['edit_gambar'] as $file) {
        //         // Periksa apakah file valid dan sudah diunggah
        //         if ($file->isValid() && !$file->hasMoved()) {
        //             // Lakukan sesuatu dengan file, misalnya pindahkan ke direktori tujuan
        //             // $file->move(WRITEPATH . 'uploads', $file->getName());
        //             $pdfContent = base64_encode(file_get_contents($file->getTempName()));
        //             $this->debug($file->getTempName());
        //         }
        //     }
        // }
        // Baca isi file dan konversi ke base64
        // $pdfContent = base64_encode(file_get_contents($file->getTempName()));
        // $this->debug($edit_gambar);

        // Validasi input dinamis
        $validationRules = [];

        // $validationRules = $this->val_foreach($imb, 'imb', 'imb');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($pondasi, 'pondasi', 'pondasi');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($lantai, 'lantai', 'lantai');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tinggi_lantai_terhadap_jalan, 'tinggi_lantai_terhadap_jalan', 'tinggi lantai terhadap jalan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($rangka, 'rangka', 'rangka');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($dinding, 'dinding', 'dinding');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($langit_plafond, 'langit_plafond', 'langit plafond');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($atap, 'atap', 'atap');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tahun_pembangunan, 'tahun_pembangunan', 'tahun pembangunan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($rehap_perbaikan, 'rehap_perbaikan', 'rehap perbaikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($saat_pembelian_tanah, 'saat_pembelian_tanah', 'saat pembelian tanah');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($saat_pembangunan, 'saat_pembangunan', 'saat pembangunan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($saat_rehab_perbaikan, 'saat_rehab_perbaikan', 'saat rehab perbaikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($air, 'air', 'air');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($telepon, 'telepon', 'telepon');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($listrik, 'listrik', 'listrik');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($pagar, 'pagar', 'pagar');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($taman, 'taman', 'taman');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($lainnya_fag, 'lainnya_fag', 'lainnya_fag');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($lantai1, 'lantai1', 'lantai 1');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($lantai2, 'lantai2', 'lantai 2');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($total_bangunan, 'total_bangunan', 'total bangunan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kondisi_bangunan, 'kondisi_bangunan', 'kondisi bangunan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($menurut_harga_perolehan, 'menurut_harga_perolehan', 'menurut harga perolehan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($menurut_pasar_fag, 'menurut_pasar_fag', 'menurut pasar fag');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($keterangan_lain_fag, 'keterangan_lain_fag', 'keterangan lain fag');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($sarana, 'sarana', 'sarana');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($sarana_prasarana_fag, 'sarana_prasarana_fag', 'sarana prasarana fag');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kelas, 'kelas', 'kelas');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }

        $hasil = $this->data_fcr_agunan_bangunan($hasil);
        echo json_encode($hasil);
    }
    public function finish_fcr_agunan_bangunan()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Mengambil semua data POST
        $postData = $this->request->getPost();
        // $files = $this->request->getFiles()[''];
        // Mengambil array bukti_kepemilikan
        // $imb = $this->request->getPost()['imb'] ?? [];
        // $imb = $this->request->getPost()['edit_gambar'] ?? [];
        // $files = $this->request->getPost()['edit_gambar'] ?? [];
        // $pondasi = $this->request->getPost()['pondasi'] ?? [];
        // foreach($imb as $file){
        //     $data = base64_encode(file_get_contents($file));
        //     $this->debug($data);
        //     // echo "<iframe src=\"data:application/pdf;base64,$data\" width=\"100%\" height=\"600px\"></iframe>";
        //     die;
        // }
        // var_dump($postData);die;

        $imb = $postData['imb'] ?? [];
        $pondasi = $postData['pondasi'] ?? [];
        $lantai = $postData['lantai'] ?? [];
        // $this->debug($bukti_kepemilikan);
        $tinggi_lantai_terhadap_jalan = $postData['tinggi_lantai_terhadap_jalan'] ?? [];
        $rangka = $postData['rangka'] ?? [];
        $dinding = $postData['dinding'] ?? [];
        $langit_plafond = $postData['langit_plafond'] ?? [];
        $atap = $postData['atap'] ?? [];
        $tahun_pembangunan = $postData['tahun_pembangunan'] ?? [];
        $rehap_perbaikan = $postData['rehap_perbaikan'] ?? [];
        $saat_pembelian_tanah = $postData['saat_pembelian_tanah'] ?? [];
        $saat_pembangunan = $postData['saat_pembangunan'] ?? [];
        $saat_rehab_perbaikan = $postData['saat_rehab_perbaikan'] ?? [];
        $air = $postData['air'] ?? [];
        $telepon = $postData['telepon'] ?? [];
        $listrik = $postData['listrik'] ?? [];
        $pagar = $postData['pagar'] ?? [];
        $taman = $postData['taman'] ?? [];
        $lainnya_fag = $postData['lainnya_fag'] ?? [];
        $lantai1 = $postData['lantai1'] ?? [];
        $lantai2 = $postData['lantai2'] ?? [];
        $total_bangunan = $postData['total_bangunan'] ?? [];
        $kondisi_bangunan = $postData['kondisi_bangunan'] ?? [];
        $menurut_harga_perolehan = $postData['menurut_harga_perolehan'] ?? [];
        $menurut_pasar_fag = $postData['menurut_pasar_fag'] ?? [];
        $keterangan_lain_fag = $postData['keterangan_lain_fag'] ?? [];
        // sarana: [],
        // sarana_prasarana_fag: [],
        // kelas: [],
        $sarana = $postData['sarana'] ?? [];
        $sarana_prasarana_fag = $postData['sarana_prasarana_fag'] ?? [];
        $kelas = $postData['kelas'] ?? [];

        // if ($this->request->getFiles()) {
        //     // Ambil semua file
        //     $files = $this->request->getFiles();

        //     foreach ($files['edit_gambar'] as $file) {
        //         // Periksa apakah file valid dan sudah diunggah
        //         if ($file->isValid() && !$file->hasMoved()) {
        //             // Lakukan sesuatu dengan file, misalnya pindahkan ke direktori tujuan
        //             // $file->move(WRITEPATH . 'uploads', $file->getName());
        //             $pdfContent = base64_encode(file_get_contents($file->getTempName()));
        //             $this->debug($file->getTempName());
        //         }
        //     }
        // }
        // Baca isi file dan konversi ke base64
        // $pdfContent = base64_encode(file_get_contents($file->getTempName()));
        // $this->debug($edit_gambar);

        // Validasi input dinamis
        $validationRules = [];
        // foreach ($bukti_kepemilikan as $index => $value) {
        //     $validationRules["bukti_kepemilikan.{$index}"] = [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Bukti Kepemilikan urutan ke- ' . $index + 1 . ' harus diisi'
        //         ]
        //     ];
        // }

        // $validationRules = $this->val_foreach($imb, 'imb', 'imb');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($pondasi, 'pondasi', 'pondasi');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($lantai, 'lantai', 'lantai');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tinggi_lantai_terhadap_jalan, 'tinggi_lantai_terhadap_jalan', 'tinggi lantai terhadap jalan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($rangka, 'rangka', 'rangka');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($dinding, 'dinding', 'dinding');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($langit_plafond, 'langit_plafond', 'langit plafond');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($atap, 'atap', 'atap');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tahun_pembangunan, 'tahun_pembangunan', 'tahun pembangunan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($rehap_perbaikan, 'rehap_perbaikan', 'rehap perbaikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($saat_pembelian_tanah, 'saat_pembelian_tanah', 'saat pembelian tanah');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($saat_pembangunan, 'saat_pembangunan', 'saat pembangunan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($saat_rehab_perbaikan, 'saat_rehab_perbaikan', 'saat rehab perbaikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($air, 'air', 'air');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($telepon, 'telepon', 'telepon');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($listrik, 'listrik', 'listrik');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($pagar, 'pagar', 'pagar');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($taman, 'taman', 'taman');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($lainnya_fag, 'lainnya_fag', 'lainnya_fag');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($lantai1, 'lantai1', 'lantai 1');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($lantai2, 'lantai2', 'lantai 2');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($total_bangunan, 'total_bangunan', 'total bangunan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kondisi_bangunan, 'kondisi_bangunan', 'kondisi bangunan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($menurut_harga_perolehan, 'menurut_harga_perolehan', 'menurut harga perolehan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($menurut_pasar_fag, 'menurut_pasar_fag', 'menurut pasar fag');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($keterangan_lain_fag, 'keterangan_lain_fag', 'keterangan lain fag');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($sarana, 'sarana', 'sarana');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($sarana_prasarana_fag, 'sarana_prasarana_fag', 'sarana prasarana fag');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kelas, 'kelas', 'kelas');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }

        $hasil = $this->data_fcr_agunan_bangunan($hasil);
        echo json_encode($hasil);
    }
    public function data_fcr_agunan_bangunan($hasil)
    {
        // Proses penyimpanan data
        // $this->debug($this->request->getPost('imb'));
        // $jenis_agunan = explode(";", $input);
        $data = [
            // 'bukti_kepemilikan' => implode(";", $this->request->getPost('bukti_kepemilikan')),

            'imb' => !empty($this->request->getPost('imb')) ? implode(";", $this->request->getPost('imb')) : '',
            'pondasi' => !empty($this->request->getPost('pondasi')) ? implode(";", $this->request->getPost('pondasi')) : '',
            'lantai' => !empty($this->request->getPost('lantai')) ? implode(";", $this->request->getPost('lantai')) : '',
            'tinggi_lantai_thd_jalan' => !empty($this->request->getPost('tinggi_lantai_terhadap_jalan')) ? implode(";", $this->request->getPost('tinggi_lantai_terhadap_jalan')) : '',
            'rangka' => !empty($this->request->getPost('rangka')) ? implode(";", $this->request->getPost('rangka')) : '',
            'dinding' => !empty($this->request->getPost('dinding')) ? implode(";", $this->request->getPost('dinding')) : '',
            'langit_plafon' => !empty($this->request->getPost('langit_plafond')) ? implode(";", $this->request->getPost('langit_plafond')) : '',
            'atap' => !empty($this->request->getPost('atap')) ? implode(";", $this->request->getPost('atap')) : '',
            'tahun_pembangunan' => !empty($this->request->getPost('tahun_pembangunan')) ? implode(";", $this->request->getPost('tahun_pembangunan')) : '',
            'rehab' => !empty($this->request->getPost('rehap_perbaikan')) ? implode(";", $this->request->getPost('rehap_perbaikan')) : '',
            'biaya_beli_tanah' => !empty($this->request->getPost('saat_pembelian_tanah')) ? implode(";", $this->request->getPost('saat_pembelian_tanah')) : '',
            'biaya_pembangunan' => !empty($this->request->getPost('saat_pembangunan')) ? implode(";", $this->request->getPost('saat_pembangunan')) : '',
            'biaya_rehab' => !empty($this->request->getPost('saat_rehab_perbaikan')) ? implode(";", $this->request->getPost('saat_rehab_perbaikan')) : '',
            'air' => !empty($this->request->getPost('air')) ? implode(";", $this->request->getPost('air')) : '',
            'telepon' => !empty($this->request->getPost('telepon')) ? implode(";", $this->request->getPost('telepon')) : '',
            'listrik' => !empty($this->request->getPost('listrik')) ? implode(";", $this->request->getPost('listrik')) : '',
            'pagar' => !empty($this->request->getPost('pagar')) ? implode(";", $this->request->getPost('pagar')) : '',
            'taman' => !empty($this->request->getPost('taman')) ? implode(";", $this->request->getPost('taman')) : '',
            'lainnya' => !empty($this->request->getPost('lainnya_fag')) ? implode(";", $this->request->getPost('lainnya_fag')) : '',
            'luas_bangunan_lantai1' => !empty($this->request->getPost('lantai1')) ? implode(";", $this->request->getPost('lantai1')) : '',
            'luas_bangunan_lantai2' => !empty($this->request->getPost('lantai2')) ? implode(";", $this->request->getPost('lantai2')) : '',
            'total_bangunan' => !empty($this->request->getPost('total_bangunan')) ? implode(";", $this->request->getPost('total_bangunan')) : '',
            'kondisi_bangunan' => !empty($this->request->getPost('kondisi_bangunan')) ? implode(";", $this->request->getPost('kondisi_bangunan')) : '',
            'harga_bangunan_perolehan' => !empty($this->request->getPost('menurut_harga_perolehan')) ? implode(";", $this->request->getPost('menurut_harga_perolehan')) : '',
            // 'menurut_harga_pasar' => !empty($this->request->getPost('menurut_harga_pasar')) ? implode(";", $this->request->getPost('menurut_harga_pasar')) : '',
            'harga_bangunan_pasar' => !empty($this->request->getPost('menurut_pasar_fag')) ? implode(";", $this->request->getPost('menurut_pasar_fag')) : '',
            'keterangan_lain_bangunan' => !empty($this->request->getPost('keterangan_lain_fag')) ? implode(";", $this->request->getPost('keterangan_lain_fag')) : '',

            'sarana' => !empty($this->request->getPost('sarana')) ? implode(";", $this->request->getPost('sarana')) : '',
            'sarana_prasarana' => !empty($this->request->getPost('sarana_prasarana_fag')) ? implode(";", $this->request->getPost('sarana_prasarana_fag')) : '',
            'lebar_jalan' => !empty($this->request->getPost('kelas')) ? implode(";", $this->request->getPost('kelas')) : '',

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        // if (!empty($this->request->getPost('luas'))) {
        //     $data['luas_total'] = $this->request->getPost('luas');
        // } else {
        //     $data['luas_total'] = $data['utara'] + $data['selatan'] + $data['barat'] + $data['timur'];
        // }
        // var_dump($this->request->getPost('luas'));

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data_tambah');

        $index = !empty($this->request->getPost('imb')) ? count($this->request->getPost('imb')) : 0;
        // var_dump($kd_data);
        // die;
        $this->edit_status_gambar($kd_data, $index);

        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fcr_agunan where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_fcr_agunan')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit bangunan berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit fcr agunan gagal'
            ];
        }
        return $hasil;
    }

    public function edit_status_gambar($kd_data, $index)
    {
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_gambar_situasi where kd_data = '" . $kd_data . "' and index_plus_satu > '" . $index . "' AND STATUS = 'Aktif'")->getNumRows();
        if ($cek_kd_data > 0) {
            $data = [
                'status' => 'Tidak Aktif',

                'pengubah' => session()->get('nama_user'),
                'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];
            $this->db->table('tb_gambar_situasi')
                ->where('kd_data', $kd_data)
                ->where('index_plus_satu > ', $index)
                ->where('status', 'Aktif')
                ->update($data);
        }
    }
    public function edit_fcr_agunan_bb()
    {

        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Mengambil semua data POST
        $postData = $this->request->getPost();

        // Mengambil array bukti_kepemilikan
        $jenis_dokumen_bb = $postData['jenis_dokumen_bb'] ?? [];
        $jenis_bb = $postData['jenis_bb'] ?? [];
        $model_tipe_bb = $postData['model_tipe_bb'] ?? [];
        $merek_cc_bb = $postData['merek_cc_bb'] ?? [];
        $tahun_pembuatan_bb = $postData['tahun_pembuatan_bb'] ?? [];
        $tahun_pembeliaan_bb = $postData['tahun_pembeliaan_bb'] ?? [];
        $serial_number_bb = $postData['serial_number_bb'] ?? [];
        $nomor_mesin_bb = $postData['nomor_mesin_bb'] ?? [];
        $warna_bb = $postData['warna_bb'] ?? [];
        $bahan_bakar_bb = $postData['bahan_bakar_bb'] ?? [];
        $kondisi_keadaan_bb = $postData['kondisi_keadaan_bb'] ?? [];
        $nomor_polisi_bb = $postData['nomor_polisi_bb'] ?? [];
        $bukti_kepemilikan_agb_bb = $postData['bukti_kepemilikan_agb_bb'] ?? [];
        $invoice_no_bb = $postData['invoice_no_bb'] ?? [];
        $invoice_tanggal_bb = $postData['invoice_tanggal_bb'] ?? [];
        $perubahan_hak_terakhir_bb = $postData['perubahan_hak_terakhir_bb'] ?? [];
        $tercatat_atas_nama_bb = $postData['tercatat_atas_nama_bb'] ?? [];
        $alamat_pemilik_saat_ini_bb = $postData['alamat_pemilik_saat_ini_bb'] ?? [];
        $umur_teknis_bb = $postData['umur_teknis_bb'] ?? [];
        $perkiraan_umur_ekonomis_bb = $postData['perkiraan_umur_ekonomis_bb'] ?? [];
        $tempat_penyimpanan_bb = $postData['tempat_penyimpanan_bb'] ?? [];
        $route_bb = $postData['route_bb'] ?? [];
        $jarak_rata_rata_tempuh_bb = $postData['jarak_rata_rata_tempuh_bb'] ?? [];

        // $this->debug($bukti_kepemilikan);

        // Validasi input dinamis
        $validationRules = [];

        // $validationRules = $this->val_foreach($jenis_dokumen_bb, 'jenis_dokumen_bb', 'jenis dokumen');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($jenis_bb, 'jenis_bb', 'jenis');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($model_tipe_bb, 'model_tipe_bb', 'model tipe');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($merek_cc_bb, 'merek_cc_bb', 'merek/ cc');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tahun_pembuatan_bb, 'tahun_pembuatan_bb', 'tahun pembuatan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tahun_pembeliaan_bb, 'tahun_pembeliaan_bb', 'tahun pembelian');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($serial_number_bb, 'serial_number_bb', 'serial number');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($nomor_mesin_bb, 'nomor_mesin_bb', 'nomor mesin');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($warna_bb, 'warna_bb', 'warna');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($bahan_bakar_bb, 'bahan_bakar_bb', 'bahan bakar');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kondisi_keadaan_bb, 'kondisi_keadaan_bb', 'kondisi keadaan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($nomor_polisi_bb, 'nomor_polisi_bb', 'nomor polisi');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($bukti_kepemilikan_agb_bb, 'bukti_kepemilikan_agb_bb', 'bukti kepemilikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($invoice_no_bb, 'invoice_no_bb', 'nomor invoice');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($invoice_tanggal_bb, 'invoice_tanggal_bb', 'tanggal invoice');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($perubahan_hak_terakhir_bb, 'perubahan_hak_terakhir_bb', 'perubahan hak terakhir');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tercatat_atas_nama_bb, 'tercatat_atas_nama_bb', 'tercatat atas nama');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($alamat_pemilik_saat_ini_bb, 'alamat_pemilik_saat_ini_bb', 'alamat pemilik saat ini');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($umur_teknis_bb, 'umur_teknis_bb', 'umur teknis');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($perkiraan_umur_ekonomis_bb, 'perkiraan_umur_ekonomis_bb', 'perkiraan umur ekonomis');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tempat_penyimpanan_bb, 'tempat_penyimpanan_bb', 'tempat penyimpanan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($route_bb, 'route_bb', 'route');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($jarak_rata_rata_tempuh_bb, 'jarak_rata_rata_tempuh_bb', 'jarak rata-rata tempuh');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }

        $hasil = $this->data_fcr_agunan_bb($hasil);
        echo json_encode($hasil);
    }
    public function finish_fcr_agunan_bb()
    {

        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Mengambil semua data POST
        $postData = $this->request->getPost();

        // Mengambil array bukti_kepemilikan
        $jenis_dokumen_bb = $postData['jenis_dokumen_bb'] ?? [];
        $jenis_bb = $postData['jenis_bb'] ?? [];
        $model_tipe_bb = $postData['model_tipe_bb'] ?? [];
        $merek_cc_bb = $postData['merek_cc_bb'] ?? [];
        $tahun_pembuatan_bb = $postData['tahun_pembuatan_bb'] ?? [];
        $tahun_pembeliaan_bb = $postData['tahun_pembeliaan_bb'] ?? [];
        $serial_number_bb = $postData['serial_number_bb'] ?? [];
        $nomor_mesin_bb = $postData['nomor_mesin_bb'] ?? [];
        $warna_bb = $postData['warna_bb'] ?? [];
        $bahan_bakar_bb = $postData['bahan_bakar_bb'] ?? [];
        $kondisi_keadaan_bb = $postData['kondisi_keadaan_bb'] ?? [];
        $nomor_polisi_bb = $postData['nomor_polisi_bb'] ?? [];
        $bukti_kepemilikan_agb_bb = $postData['bukti_kepemilikan_agb_bb'] ?? [];
        $invoice_no_bb = $postData['invoice_no_bb'] ?? [];
        $invoice_tanggal_bb = $postData['invoice_tanggal_bb'] ?? [];
        $perubahan_hak_terakhir_bb = $postData['perubahan_hak_terakhir_bb'] ?? [];
        $tercatat_atas_nama_bb = $postData['tercatat_atas_nama_bb'] ?? [];
        $alamat_pemilik_saat_ini_bb = $postData['alamat_pemilik_saat_ini_bb'] ?? [];
        $umur_teknis_bb = $postData['umur_teknis_bb'] ?? [];
        $perkiraan_umur_ekonomis_bb = $postData['perkiraan_umur_ekonomis_bb'] ?? [];
        $tempat_penyimpanan_bb = $postData['tempat_penyimpanan_bb'] ?? [];
        $route_bb = $postData['route_bb'] ?? [];
        $jarak_rata_rata_tempuh_bb = $postData['jarak_rata_rata_tempuh_bb'] ?? [];

        // $this->debug($bukti_kepemilikan);

        // Validasi input dinamis
        $validationRules = [];

        // $validationRules = $this->val_foreach($jenis_dokumen_bb, 'jenis_dokumen_bb', 'jenis dokumen');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($jenis_bb, 'jenis_bb', 'jenis');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($model_tipe_bb, 'model_tipe_bb', 'model tipe');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($merek_cc_bb, 'merek_cc_bb', 'merek/ cc');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tahun_pembuatan_bb, 'tahun_pembuatan_bb', 'tahun pembuatan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tahun_pembeliaan_bb, 'tahun_pembeliaan_bb', 'tahun pembelian');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($serial_number_bb, 'serial_number_bb', 'serial number');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($nomor_mesin_bb, 'nomor_mesin_bb', 'nomor mesin');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($warna_bb, 'warna_bb', 'warna');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($bahan_bakar_bb, 'bahan_bakar_bb', 'bahan bakar');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($kondisi_keadaan_bb, 'kondisi_keadaan_bb', 'kondisi keadaan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($nomor_polisi_bb, 'nomor_polisi_bb', 'nomor polisi');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($bukti_kepemilikan_agb_bb, 'bukti_kepemilikan_agb_bb', 'bukti kepemilikan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($invoice_no_bb, 'invoice_no_bb', 'nomor invoice');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($invoice_tanggal_bb, 'invoice_tanggal_bb', 'tanggal invoice');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($perubahan_hak_terakhir_bb, 'perubahan_hak_terakhir_bb', 'perubahan hak terakhir');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tercatat_atas_nama_bb, 'tercatat_atas_nama_bb', 'tercatat atas nama');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($alamat_pemilik_saat_ini_bb, 'alamat_pemilik_saat_ini_bb', 'alamat pemilik saat ini');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($umur_teknis_bb, 'umur_teknis_bb', 'umur teknis');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($perkiraan_umur_ekonomis_bb, 'perkiraan_umur_ekonomis_bb', 'perkiraan umur ekonomis');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($tempat_penyimpanan_bb, 'tempat_penyimpanan_bb', 'tempat penyimpanan');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($route_bb, 'route_bb', 'route');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }
        // $validationRules = $this->val_foreach($jarak_rata_rata_tempuh_bb, 'jarak_rata_rata_tempuh_bb', 'jarak rata-rata tempuh');
        // if (!$this->validate($validationRules)) {
        //     $hasil = [
        //         'status' => 'error',
        //         'message' => $this->validator->listErrors()
        //     ];
        //     // die;
        //     echo json_encode($hasil);
        //     die;
        // }

        $hasil = $this->data_fcr_agunan_bb($hasil);
        echo json_encode($hasil);
    }
    public function data_fcr_agunan_bb($hasil)
    {
        // Proses penyimpanan data
        // $this->debug($this->request->getPost('bukti_kepemilikan'));
        // $jenis_agunan = explode(";", $input);
        $data = [
            'jenis_dokumen' => !empty($this->request->getPost('jenis_dokumen_bb')) ? implode(";", $this->request->getPost('jenis_dokumen_bb')) : '',
            'jenis' => !empty($this->request->getPost('jenis_bb')) ? implode(";", $this->request->getPost('jenis_bb')) : '',
            'model_tipe' => !empty($this->request->getPost('model_tipe_bb')) ? implode(";", $this->request->getPost('model_tipe_bb')) : '',
            'merek_cc' => !empty($this->request->getPost('merek_cc_bb')) ? implode(";", $this->request->getPost('merek_cc_bb')) : '',
            'tahun_pembuatan' => !empty($this->request->getPost('tahun_pembuatan_bb')) ? implode(";", $this->request->getPost('tahun_pembuatan_bb')) : '',
            'tahun_pembeliaan' => !empty($this->request->getPost('tahun_pembeliaan_bb')) ? implode(";", $this->request->getPost('tahun_pembeliaan_bb')) : '',
            'serial_number' => !empty($this->request->getPost('serial_number_bb')) ? implode(";", $this->request->getPost('serial_number_bb')) : '',
            'nomor_mesin' => !empty($this->request->getPost('nomor_mesin_bb')) ? implode(";", $this->request->getPost('nomor_mesin_bb')) : '',
            'warna' => !empty($this->request->getPost('warna_bb')) ? implode(";", $this->request->getPost('warna_bb')) : '',
            'bahan_bakar' => !empty($this->request->getPost('bahan_bakar_bb')) ? implode(";", $this->request->getPost('bahan_bakar_bb')) : '',
            'kondisi_keadaan' => !empty($this->request->getPost('kondisi_keadaan_bb')) ? implode(";", $this->request->getPost('kondisi_keadaan_bb')) : '',
            'nomor_polisi' => !empty($this->request->getPost('nomor_polisi_bb')) ? implode(";", $this->request->getPost('nomor_polisi_bb')) : '',
            'bukti_kepemilikan_agb' => !empty($this->request->getPost('bukti_kepemilikan_agb_bb')) ? implode(";", $this->request->getPost('bukti_kepemilikan_agb_bb')) : '',
            'invoice_no' => !empty($this->request->getPost('invoice_no_bb')) ? implode(";", $this->request->getPost('invoice_no_bb')) : '',
            'invoice_tanggal' => !empty($this->request->getPost('invoice_tanggal_bb')) ? implode(";", $this->request->getPost('invoice_tanggal_bb')) : '',
            'perubahan_hak_terakhir' => !empty($this->request->getPost('perubahan_hak_terakhir_bb')) ? implode(";", $this->request->getPost('perubahan_hak_terakhir_bb')) : '',
            'tercatat_atas_nama' => !empty($this->request->getPost('tercatat_atas_nama_bb')) ? implode(";", $this->request->getPost('tercatat_atas_nama_bb')) : '',
            'alamat_pemilik_saat_ini' => !empty($this->request->getPost('alamat_pemilik_saat_ini_bb')) ? implode(";", $this->request->getPost('alamat_pemilik_saat_ini_bb')) : '',
            'umur_teknis' => !empty($this->request->getPost('umur_teknis_bb')) ? implode(";", $this->request->getPost('umur_teknis_bb')) : '',
            'perkiraan_umur_ekonomis' => !empty($this->request->getPost('perkiraan_umur_ekonomis_bb')) ? implode(";", $this->request->getPost('perkiraan_umur_ekonomis_bb')) : '',
            'tempat_penyimpanan' => !empty($this->request->getPost('tempat_penyimpanan_bb')) ? implode(";", $this->request->getPost('tempat_penyimpanan_bb')) : '',
            'route' => !empty($this->request->getPost('route_bb')) ? implode(";", $this->request->getPost('route_bb')) : '',
            'jarak_rata_rata_tempuh' => !empty($this->request->getPost('jarak_rata_rata_tempuh_bb')) ? implode(";", $this->request->getPost('jarak_rata_rata_tempuh_bb')) : '',

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data_tambah');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fcr_agunan where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_fcr_agunan')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit barang bergerak berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit fcr agunan gagal'
            ];
        }
        return $hasil;
    }
    public function finish_fcr_agunan()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'bukti_kepemilikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bukti Kepemilikan Harus diisi',
                ]
            ],
            'tanggal_bukti_kepemilikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Bukti Kepemilikan Harus diisi',
                ]
            ],
            'surat_ukur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Surat Ukur Harus diisi',
                ]
            ],
            'tanggal_surat_ukur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tangal Surat Ukur Harus diisi',
                ]
            ],
            'nib' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nib Harus diisi',
                ]
            ],

            'penunjuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penunjuk Harus diisi',
                ]
            ],
            'kelurahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelurahan Harus diisi',
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan Harus diisi',
                ]
            ],
            'kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kabupaten Harus diisi',
                ]
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Provinsi Harus diisi',
                ]
            ],

            'utara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Utara Harus diisi',
                ]
            ],
            'barat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Barat Harus diisi',
                ]
            ],
            'selatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Selatan Harus diisi',
                ]
            ],

            'timur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Timur Harus diisi',
                ]
            ],

            'luas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Luas Harus diisi',
                ]
            ],
            'kanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kanan Harus diisi',
                ]
            ],
            'kiri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kiri Harus diisi',
                ]
            ],
            'depan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Depan Harus diisi',
                ]
            ],

            'belakang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Belakang Harus diisi',
                ]
            ],
            'daerah_pemakaian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Daerah Pemakaian Harus diisi',
                ]
            ],
            'kondisi_tanah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Tanah Harus diisi',
                ]
            ],
            'buku_tanah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Buku Tanah Harus diisi',
                ]
            ],


            'menurut_pasar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Menurut Pasar Harus diisi',
                ]
            ],
            'keterangan_lain' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Lain Harus diisi',
                ]
            ],
            'imb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'IMB Harus diisi',
                ]
            ],
            'pondasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pondasi Harus diisi',
                ]
            ],


            'lantai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lantai Harus diisi',
                ]
            ],
            'tinggi_lantai_terhadap_jalan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tinggi Lantai Terhadap Jalan Harus diisi',
                ]
            ],
            'rangka' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Rangka Harus diisi',
                ]
            ],


            'dinding' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dinding Harus diisi',
                ]
            ],
            'langit_plafond' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Langit Plafond Harus diisi',
                ]
            ],
            'atap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Atap Harus diisi',
                ]
            ],
            'tahun_pembangunan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Pembangunan Harus diisi',
                ]
            ],
            'rehap_perbaikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Rehab Perbaikan Harus diisi',
                ]
            ],
            'saat_pembelian_tanah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Saat Pembelian Tanah Harus diisi',
                ]
            ],
            'saat_pembangunan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Saat Pembangunan Harus diisi',
                ]
            ],
            'saat_rehab_perbaikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Saat Rehab Perbaikan Harus diisi',
                ]
            ],
            'air' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Air Harus diisi',
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon Harus diisi',
                ]
            ],
            'listrik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Listrik Harus diisi',
                ]
            ],
            'pagar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pagar Harus diisi',
                ]
            ],
            'taman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Taman Harus diisi',
                ]
            ],
            'lainnya_fag' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lainnya Harus diisi',
                ]
            ],
            'lantai1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'lantai 1 diisi',
                ]
            ],
            'lantai2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'lantai 2 Harus diisi',
                ]
            ],
            'total_bangunan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Total Bangunan Harus diisi',
                ]
            ],
            'kondisi_bangunan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi Bangunan Harus diisi',
                ]
            ],
            'menurut_harga_perolehan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Menurut Harga Perolehan Harus diisi',
                ]
            ],
            'menurut_pasar_fag' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Menurut Pasar Harus diisi',
                ]
            ],
            'keterangan_lain_fag' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'keterangan Lain Harus diisi',
                ]
            ],
            'sarana' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sarana Harus diisi',
                ]
            ],
            'sarana_prasarana_fag' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sarana Prasarana Harus diisi',
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas Harus diisi',
                ]
            ],

        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            $hasil = $this->data_fcr_agunan($hasil);
        }
        echo json_encode($hasil);
    }
    public function convert_base64($file)
    {
        $convert = base64_encode(file_get_contents($file));
        return $convert;
    }
    public function lihat_gambar($kd_data, $data_id)
    {
        // $this->debug($data_id);
        $dokumen = $this->db->query("SELECT file_gambar FROM tb_gambar_situasi WHERE SHA1(kd_data) = '" . $kd_data . "' and index_plus_satu = '" . $data_id . "' and status='Aktif' ");
        if ($dokumen->getNumRows() > 0 && !empty($dokumen->getRow()->file_gambar)) {
            $dok = $dokumen->getRow()->file_gambar;
            // Tampilkan dokumen PDF menggunakan iframe
            echo "<iframe src=\"data:application/pdf;base64,$dok\" width=\"100%\" height=\"100%\"></iframe>";
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('edit-pengajuan-kredit-transaksional/' . $kd_data) . '">Klik untuk kembali</a>';
        }
    }
    public function lihat_gambar_kd_tepakai($kd_data, $data_id)
    {
        // $this->debug($data_id);
        $dokumen = $this->db->query("SELECT gambar_situasi FROM tb_fcr_agunan WHERE SHA1(kd_data) = '" . $kd_data . "' ");
        if ($dokumen->getNumRows() > 0 && !empty($dokumen->getRow()->gambar_situasi)) {
            $dok = $dokumen->getRow()->gambar_situasi;

            $array = explode(";", $dok);
            // $dokumen = $array[$data_id];
            // $this->debug($array);
            // echo $data_id;
            // Tampilkan dokumen PDF menggunakan iframe
            echo "<iframe src=\"data:application/pdf;base64,$dok\" width=\"100%\" height=\"100%\"></iframe>";
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('edit-pengajuan-kredit-transaksional/' . $kd_data) . '">Klik untuk kembali</a>';
        }
    }
    public function edit_gambar($id_bangunan)
    {

        if (!$this->validate([
            'upload_gambar_edit' . $id_bangunan => [
                'rules' => 'uploaded[upload_gambar_edit' . $id_bangunan . ']|max_size[upload_gambar_edit' . $id_bangunan . ',2048]|ext_in[upload_gambar_edit' . $id_bangunan . ',pdf]',
                'errors' => [
                    'uploaded' => 'Gambar Situasi yang ke- ' . $id_bangunan,
                    'max_size' => 'Gambar Situasi yang ke- ' . $id_bangunan . ' maksimal ukuran filenya 2 mb',
                    'ext_in' => 'Gambar Situasi yang ke- ' . $id_bangunan . ' harus berupa pdf',
                ]
            ],


        ])) {

            echo $this->validator->listErrors();
        } else {
            $kd_data = $this->request->getPost('kd_data_edit2' . $id_bangunan);
            $file = $this->request->getFile('upload_gambar_edit' . $id_bangunan);
            // Baca isi file dan konversi ke base64
            $pdfContent = base64_encode(file_get_contents($file->getTempName()));

            // Proses penyimpanan data
            $simpan = [
                'kd_gambar' => 'GMB' . gmdate("YmdHis", time() + 60 * 60 * 8),
                'kd_data' => $kd_data,
                'kd_fcr_agunan' => '',
                'file_gambar' => $pdfContent,
                'index_gambar' => $id_bangunan - 1,
                'index_plus_satu' => $id_bangunan,
                'status' => 'Aktif',

                'pengubah' => session()->get('nama_user'),
                'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];
            $update = [
                // 'kd_gambar' => 'GMB'.gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                // 'kd_data' => $kd_data,
                // 'kd_fcr_agunan' => '',
                'file_gambar' => $pdfContent,
                // 'index_gambar' => $id_bangunan - 1,
                // 'index_plus_satu' => $id_bangunan,
                'status' => 'Aktif',

                'pengubah' => session()->get('nama_user'),
                'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];

            //pengecekan kd info tidak boleh sama sebelum insert

            $cek_kd_data = $this->db->query("SELECT kd_data from tb_gambar_situasi where kd_data = '" . $kd_data . "' and index_plus_satu = '" . $id_bangunan . "' ")->getNumRows();
            if ($cek_kd_data > 0) {
                $this->db->table('tb_gambar_situasi')->where('kd_data', $kd_data)->where('index_plus_satu', $id_bangunan)->update($update);
                $pengaruh = $this->db->affectedRows();
                echo json_encode(1);
            } else if ($cek_kd_data < 1) {
                $this->db->table('tb_gambar_situasi')->insert($simpan);
                $pengaruh = $this->db->affectedRows();
                echo json_encode(1);
            } else {
                echo 'simpan/ update gambar situasi gagal';
            }
        }
    }
    public function edit_gambar_kd_tepakai()
    {

        if (!$this->validate([
            'upload_gambar_edit1' => [
                'rules' => 'uploaded[upload_gambar_edit1]|max_size[upload_gambar_edit1,2048]|ext_in[upload_gambar_edit1,pdf]',
                'errors' => [
                    'uploaded' => 'Harus Ada File Yang Diupload',
                    'max_size' => 'File maksimal 2 mb',
                    'ext_in' => 'File harus berupa pdf',
                ]
            ],


        ])) {

            echo $this->validator->listErrors();
        } else {
            $file = $this->request->getFile('upload_gambar_edit1');
            // Baca isi file dan konversi ke base64
            $pdfContent = base64_encode(file_get_contents($file->getTempName()));

            // Proses penyimpanan data
            $data = [
                'gambar_situasi' => $pdfContent,

                'pengubah' => session()->get('nama_user'),
                'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];

            //pengecekan kd info tidak boleh sama sebelum insert
            $kd_data = $this->request->getPost('kd_data_edit21');
            $cek_kd_data = $this->db->query("SELECT kd_data from tb_fcr_agunan where kd_data = '" . $kd_data . "' ")->getNumRows();
            if ($cek_kd_data > 0) {
                $this->db->table('tb_fcr_agunan')->where('kd_data', $kd_data)->update($data);
                $pengaruh = $this->db->affectedRows();
                echo json_encode($pengaruh);
            } else {
                echo 'Edit Data Gagal';
            }
        }
    }
    public function dokumen_pendukung($kd_data, $id_input)
    {
        $dok = false;
        $orang = $this->db->query("SELECT * FROM tb_dokumen WHERE SHA1(kd_data) = '" . $kd_data . "' ");
        $cv = $this->db->query("SELECT * FROM tb_dokumen_cv WHERE SHA1(kd_data) = '" . $kd_data . "' ");
        $pt = $this->db->query("SELECT * FROM tb_dokumen_pt WHERE SHA1(kd_data) = '" . $kd_data . "' ");
        if ($orang->getNumRows() > 0 && $cv->getNumRows() > 0 && $pt->getNumRows() > 0) {
            // PERORANGAN
            if ($id_input == sha1('pengajuan_kredit1')) {
                $dok = $orang->getRow()->pengajuan_kredit;
            } else if ($id_input == sha1('pendirian_perseroan1')) {
                $dok = $orang->getRow()->pendirian_perseroan;
            } else if ($id_input == sha1('pendaftaran_perseroan1')) {
                $dok = $orang->getRow()->pendaftaran_perseroan;
            } else if ($id_input == sha1('npwp1')) {
                $dok = $orang->getRow()->npwp_perorangan;
            } else if ($id_input == sha1('ktp_persero1')) {
                $dok = $orang->getRow()->ktp_persero;
            } else if ($id_input == sha1('npwp_persero1')) {
                $dok = $orang->getRow()->npwp_persero;
            } else if ($id_input == sha1('perijinan_usaha1')) {
                $dok = $orang->getRow()->perijinan_usaha;
            } else if ($id_input == sha1('pengalaman_kerja1')) {
                $dok = $orang->getRow()->pengalaman_kerja;
            } else if ($id_input == sha1('laporan_keuangan1')) {
                $dok = $orang->getRow()->laporan_keuangan;
            } else if ($id_input == sha1('copy_dok_agunan1')) {
                $dok = $orang->getRow()->copy_dok_agunan;
            } else if ($id_input == sha1('ideb_slik1')) {
                $dok = $orang->getRow()->ideb_slik_agunan;
            } else if ($id_input == sha1('ktp_istri1')) {
                $dok = $orang->getRow()->ktp_istri;
            } else if ($id_input == sha1('kk_pemilik_agunan1')) {
                $dok = $orang->getRow()->kk_pemilik_agunan;
            } else if ($id_input == sha1('buku_nikah1')) {
                $dok = $orang->getRow()->buku_nikah;
            } else if ($id_input == sha1('dhn1')) {
                $dok = $orang->getRow()->dhn;
            } else if ($id_input == sha1('ideb_slik_tr1')) {
                $dok = $orang->getRow()->ideb_slik;
            }
            // CV
            else if ($id_input == sha1('pengajuan_kredit2')) {
                $dok = $cv->getRow()->pengajuan_kredit;
            } else if ($id_input == sha1('akta_pendirian2')) {
                $dok = $cv->getRow()->akta_pendirian;
            } else if ($id_input == sha1('ahu2')) {
                $dok = $cv->getRow()->ahu;
            } else if ($id_input == sha1('npwp_perseroan2')) {
                $dok = $cv->getRow()->npwp_perseroan;
            } else if ($id_input == sha1('ktp_pengurus2')) {
                $dok = $cv->getRow()->ktp_pengurus;
            } else if ($id_input == sha1('ktp_komanditer2')) {
                $dok = $cv->getRow()->ktp_komanditer;
            } else if ($id_input == sha1('perijinan_usaha2')) {
                $dok = $cv->getRow()->perijinan_usaha;
            } else if ($id_input == sha1('pengalaman_kerja2')) {
                $dok = $cv->getRow()->pengalaman_kerja;
            } else if ($id_input == sha1('laporan_keuangan2')) {
                $dok = $cv->getRow()->laporan_keuangan;
            } else if ($id_input == sha1('copy_dok_agunan2')) {
                $dok = $cv->getRow()->copy_dok_agunan;
            } else if ($id_input == sha1('ideb_slik_agunan2')) {
                $dok = $cv->getRow()->ideb_slik_agunan;
            } else if ($id_input == sha1('ktp_pemilik_agunan2')) {
                $dok = $cv->getRow()->ktp_pemilik_agunan;
            } else if ($id_input == sha1('kk_pemilik_agunan2')) {
                $dok = $cv->getRow()->kk_pemilik_agunan;
            } else if ($id_input == sha1('buku_nikah2')) {
                $dok = $cv->getRow()->buku_nikah;
            } else if ($id_input == sha1('dhn2')) {
                $dok = $cv->getRow()->dhn;
            } else if ($id_input == sha1('ideb_slik2')) {
                $dok = $cv->getRow()->ideb_slik;
            }
            // PT
            else if ($id_input == sha1('pengajuan_kredit3')) {
                $dok = $pt->getRow()->pengajuan_kredit;
            } else if ($id_input == sha1('akta_pendirian3')) {
                $dok = $pt->getRow()->akta_pendirian;
            } else if ($id_input == sha1('ahu3')) {
                $dok = $pt->getRow()->ahu;
            } else if ($id_input == sha1('npwp_perseroan3')) {
                $dok = $pt->getRow()->npwp_perseroan;
            } else if ($id_input == sha1('ktp_direksi3')) {
                $dok = $pt->getRow()->ktp_direksi;
            } else if ($id_input == sha1('ktp_komisaris3')) {
                $dok = $pt->getRow()->ktp_komisaris;
            } else if ($id_input == sha1('pemegang_saham3')) {
                $dok = $pt->getRow()->pemegang_saham;
            } else if ($id_input == sha1('perijinan_usaha3')) {
                $dok = $pt->getRow()->perijinan_usaha;
            } else if ($id_input == sha1('pengalaman_kerja3')) {
                $dok = $pt->getRow()->pengalaman_kerja;
            } else if ($id_input == sha1('laporan_keuangan3')) {
                $dok = $pt->getRow()->laporan_keuangan;
            } else if ($id_input == sha1('ideb_slik_agunan3')) {
                $dok = $pt->getRow()->ideb_slik_agunan;
            } else if ($id_input == sha1('ktp_pemilik_agunan3')) {
                $dok = $pt->getRow()->ktp_pemilik_agunan;
            } else if ($id_input == sha1('ktp_istri3')) {
                $dok = $pt->getRow()->ktp_istri;
            } else if ($id_input == sha1('kk_pemilik_agunan3')) {
                $dok = $pt->getRow()->kk_pemilik_agunan;
            } else if ($id_input == sha1('buku_nikah3')) {
                $dok = $pt->getRow()->buku_nikah;
            } else if ($id_input == sha1('dhn3')) {
                $dok = $pt->getRow()->dhn;
            } else if ($id_input == sha1('ideb_slik3')) {
                $dok = $pt->getRow()->ideb_slik;
            } else {
                $dok = false;
            }
        } else {
            $dok = false;
        }
        if ($dok == false) {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('edit-pengajuan-kredit-transaksional/' . $kd_data) . '">Klik untuk kembali</a>';
        } else {
            echo "<iframe src=\"data:application/pdf;base64,$dok\" width=\"100%\" height=\"600px\"></iframe>";
        }
    }
    public function edit_dokumen()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal edit data'
        ];
        if (!$this->validate([
            'nama_nasabah_dp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama nasabah harus diisi',
                ]
            ],
            'alamat_dp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus diisi',
                ]
            ],
            'usaha_dp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'usaha harus diisi',
                ]
            ],
            'jenis_badan_usaha_dp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jenis badan usaha harus diisi',
                ]
            ],


        ])) {

            // echo $this->validator->listErrors();
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
            echo json_encode($hasil);
            exit;
        } else {
            // var_dump($file);
            // die;
            $jenis_badan_usaha = $this->request->getPost('jenis_badan_usaha_dp');
            $kd_data = $this->request->getPost('kd_data_tambah');
            $kirim = [
                'nama_nasabah' => $this->request->getPost('nama_nasabah_dp'),
                'alamat' => $this->request->getPost('alamat_dp'),
                'usaha' => $this->request->getPost('usaha_dp'),
                'jenis_badan_usaha' => $this->request->getPost('jenis_badan_usaha_dp'),
            ];
            // perseorangan
            $null_perseorangan = [
                'nama_nasabah' => null,
                'alamat' => null,
                'usaha' => null,
                'jenis_badan_usaha' => null,

                'pengajuan_kredit' => null,
                'pendirian_perseroan' => null,
                'pendaftaran_perseroan' => null,
                'npwp_perorangan' => null,
                'ktp_persero' => null,
                'npwp_persero' => null,
                'perijinan_usaha' => null,
                'pengalaman_kerja' => null,
                'laporan_keuangan' => null,
                'copy_dok_agunan' => null,
                'ideb_slik_agunan' => null,
                'ktp_istri' => null,
                'kk_pemilik_agunan' => null,
                'buku_nikah' => null,
                'dhn' => null,
                'ideb_slik' => null,

                'pengubah' => null,
                'waktu_pengubah' => null,
                'kd_unit_pengubah' => null,
            ];
            // cv
            $null_cv = [
                'nama_nasabah' => null,
                'alamat' => null,
                'usaha' => null,
                'jenis_badan_usaha' => null,

                'pengajuan_kredit' => null,
                'akta_pendirian' => null,
                'ahu' => null,
                'npwp_perseroan' => null,
                'ktp_pengurus' => null,
                'ktp_komanditer' => null,
                'perijinan_usaha' => null,
                'pengalaman_kerja' => null,
                'laporan_keuangan' => null,
                'copy_dok_agunan' => null,
                'ideb_slik_agunan' => null,
                'ktp_pemilik_agunan' => null,
                'kk_pemilik_agunan' => null,
                'buku_nikah' => null,
                'dhn' => null,
                'ideb_slik' => null,

                'pengubah' => null,
                'waktu_pengubah' => null,
                'kd_unit_pengubah' => null,
            ];
            // pt
            $null_pt = [
                'nama_nasabah' => null,
                'alamat' => null,
                'usaha' => null,
                'jenis_badan_usaha' => null,

                'pengajuan_kredit' => null,
                'akta_pendirian' => null,
                'ahu' => null,
                'npwp_perseroan' => null,
                'ktp_direksi' => null,
                'ktp_komisaris' => null,
                'pemegang_saham' => null,
                'perijinan_usaha' => null,
                'pengalaman_kerja' => null,
                'laporan_keuangan' => null,
                'ideb_slik_agunan' => null,
                'ktp_pemilik_agunan' => null,
                'ktp_istri' => null,
                'kk_pemilik_agunan' => null,
                'buku_nikah' => null,
                'dhn' => null,
                'ideb_slik' => null,

                'pengubah' => null,
                'waktu_pengubah' => null,
                'kd_unit_pengubah' => null,
            ];

            if ($jenis_badan_usaha == 'Perseroan Perseorangan') {
                $edit = $this->edit_perseorangan($jenis_badan_usaha, $kd_data, $kirim, $null_cv, $null_pt);
                echo json_encode($edit);
                exit;
            } else if ($jenis_badan_usaha == 'Commanditaire Vennootschap') {
                $edit = $this->edit_cv($jenis_badan_usaha, $kd_data, $kirim, $null_perseorangan, $null_pt);
                echo json_encode($edit);
                exit;
            } else if ($jenis_badan_usaha == 'Perseroan Terbatas') {
                $edit = $this->edit_pt($jenis_badan_usaha, $kd_data, $kirim, $null_perseorangan, $null_cv);
                echo json_encode($edit);
                exit;
            } else {
                $edit = $this->edit_perseorangan($jenis_badan_usaha, $kd_data, $kirim, $null_cv, $null_pt);
                echo json_encode($edit);
                exit;
            }
        }
    }

    public function validateFile($inputName, $kalimat, $nama_kolom_db, $nama_tabel, $kd_data)
    {
        $file = $this->request->getFile($inputName);

        // $fileName = pathinfo($file->getName(), PATHINFO_FILENAME);
        // var_dump($fileName);
        // die;
        $hasil = [
            'status' => 'error',
            'message' => 'default error message',
        ];
        if ($file == null || empty($file) || $file == '') {
            // pengecekan di db dulu, apabila tidak null, jgn di null kan db nya
            $cek_ada = $this->db->query("SELECT " . $nama_kolom_db . " FROM " . $nama_tabel . " WHERE kd_data = '" . $kd_data . "' AND (" . $nama_kolom_db . " IS NOT NULL OR " . $nama_kolom_db . " != '')")->getNumRows();
            if ($cek_ada > 0) {
                $nama_file_row = $this->db->query("SELECT " . $nama_kolom_db . " FROM " . $nama_tabel . " WHERE kd_data = '" . $kd_data . "'")->getRow();
                $nama_file = $nama_file_row->$nama_kolom_db;
                $hasil = [
                    'status' => 'success',
                    'message' => $nama_file
                ];
            } else {
                // return null;
                $hasil = [
                    'status' => 'success',
                    'message' => null
                ];
            }
            return $hasil;
        } else {
            if ($file->isValid()) {
                // Validasi bahwa file harus di-upload
                // if (!$file->hasMoved()) {
                //     return [
                //         'error' => 'File harus di-upload.'
                //     ];
                // }

                // Validasi bahwa file harus berupa PDF
                if ($file->getExtension() != 'pdf') {
                    // return [
                    //     'error' => 'File harus berupa PDF.'
                    // ];
                    $hasil = [
                        'status' => 'error',
                        'message' => $kalimat . ' harus berupa PDF',
                    ];
                    return $hasil;
                }

                // Validasi bahwa file maksimal 2 MB
                if ($file->getSize() > 2 * 1024 * 1024) {
                    // return [
                    //     'error' => 'File maksimal 2 MB.'
                    // ];
                    $hasil = [
                        'status' => 'error',
                        'message' => $kalimat . ' maksimal 2 MB',
                    ];
                    return $hasil;
                }

                // Jika semua validasi berhasil, kembalikan file
                $pdfContent = base64_encode(file_get_contents($file->getTempName()));
                // return $pdfContent;
                $hasil = [
                    'status' => 'success',
                    'message' => $pdfContent,
                ];
                return $hasil;
            } else {
                // Jika file tidak diisi, kembalikan nilai null
                // return null;
                $hasil = [
                    'status' => 'success',
                    'message' => null
                ];
                return $hasil;
            }
        }
        // Cek apakah file diisi atau tidak

    }
    public function edit_perseorangan($jenis_badan_usaha, $kd_data, $kirim, $null_cv, $null_pt)
    {
        $result = [
            'status' => 'error',
            'message' => 'edit dokumen gagal',
        ];
        // PERSEORANGAN
        $pengajuan_kredit1 = $this->validateFile('pengajuan_kredit1', 'pengajuan kredit', 'pengajuan_kredit', 'tb_dokumen', $kd_data);
        if ($pengajuan_kredit1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pengajuan_kredit1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $pendirian_perseroan1 = $this->validateFile('pendirian_perseroan1', 'pendirian perseroan', 'pendirian_perseroan', 'tb_dokumen', $kd_data);
        if ($pendirian_perseroan1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pendirian_perseroan1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $pendaftaran_perseroan1 = $this->validateFile('pendaftaran_perseroan1', 'pendaftaran perseroan', 'pendaftaran_perseroan', 'tb_dokumen', $kd_data);
        if ($pendaftaran_perseroan1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pendaftaran_perseroan1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $npwp1 = $this->validateFile('npwp1', 'npwp', 'npwp_perorangan', 'tb_dokumen', $kd_data);
        if ($npwp1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $npwp1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_persero1 = $this->validateFile('ktp_persero1', 'ktp persero', 'ktp_persero', 'tb_dokumen', $kd_data);
        if ($ktp_persero1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_persero1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $npwp_persero1 = $this->validateFile('npwp_persero1', 'npwp persero', 'npwp_persero', 'tb_dokumen', $kd_data);
        if ($npwp_persero1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $npwp_persero1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $perijinan_usaha1 = $this->validateFile('perijinan_usaha1', 'perijinan usaha', 'perijinan_usaha', 'tb_dokumen', $kd_data);
        if ($perijinan_usaha1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $perijinan_usaha1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $pengalaman_kerja1 = $this->validateFile('pengalaman_kerja1', 'pengalaman kerja', 'pengalaman_kerja', 'tb_dokumen', $kd_data);
        if ($pengalaman_kerja1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pengalaman_kerja1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $laporan_keuangan1 = $this->validateFile('laporan_keuangan1', 'laporan keuangan', 'laporan_keuangan', 'tb_dokumen', $kd_data);
        if ($laporan_keuangan1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $laporan_keuangan1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $copy_dok_agunan1 = $this->validateFile('copy_dok_agunan1', 'copy dokumen agunan', 'copy_dok_agunan', 'tb_dokumen', $kd_data);
        if ($copy_dok_agunan1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $copy_dok_agunan1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ideb_slik1 = $this->validateFile('ideb_slik1', 'ideb slik', 'ideb_slik_agunan', 'tb_dokumen', $kd_data);
        if ($ideb_slik1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ideb_slik1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_istri1 = $this->validateFile('ktp_istri1', 'ktp suami/ istri', 'ktp_istri', 'tb_dokumen', $kd_data);
        if ($ktp_istri1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_istri1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $kk_pemilik_agunan1 = $this->validateFile('kk_pemilik_agunan1', 'kk pemilik agunan', 'kk_pemilik_agunan', 'tb_dokumen', $kd_data);
        if ($kk_pemilik_agunan1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $kk_pemilik_agunan1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $buku_nikah1 = $this->validateFile('buku_nikah1', 'buku nikah', 'buku_nikah', 'tb_dokumen', $kd_data);
        if ($buku_nikah1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $buku_nikah1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $dhn1 = $this->validateFile('dhn1', 'dhn', 'dhn', 'tb_dokumen', $kd_data);
        if ($dhn1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $dhn1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ideb_slik_tr1 = $this->validateFile('ideb_slik_tr1', 'ideb slik', 'ideb_slik', 'tb_dokumen', $kd_data);
        if ($ideb_slik_tr1['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ideb_slik_tr1['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        // Proses penyimpanan data
        $data = [
            'nama_nasabah' => $kirim['nama_nasabah'],
            'alamat' => $kirim['alamat'],
            'usaha' => $kirim['usaha'],
            'jenis_badan_usaha' => $kirim['jenis_badan_usaha'],

            'pengajuan_kredit' => $pengajuan_kredit1['message'],
            'pendirian_perseroan' => $pendirian_perseroan1['message'],
            'pendaftaran_perseroan' => $pendaftaran_perseroan1['message'],
            'npwp_perorangan' => $npwp1['message'],
            'ktp_persero' => $ktp_persero1['message'],
            'npwp_persero' => $npwp_persero1['message'],
            'perijinan_usaha' => $perijinan_usaha1['message'],
            'pengalaman_kerja' => $pengalaman_kerja1['message'],
            'laporan_keuangan' => $laporan_keuangan1['message'],
            'copy_dok_agunan' => $copy_dok_agunan1['message'],
            'ideb_slik_agunan' => $ideb_slik1['message'],
            'ktp_istri' => $ktp_istri1['message'],
            'kk_pemilik_agunan' => $kk_pemilik_agunan1['message'],
            'buku_nikah' => $buku_nikah1['message'],
            'dhn' => $dhn1['message'],
            'ideb_slik' => $ideb_slik_tr1['message'],

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        //pengecekan kd info tidak boleh sama sebelum insert
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_dokumen where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_dokumen')->where('kd_data', $kd_data)->update($data);
            $this->db->table('tb_dokumen_cv')->where('kd_data', $kd_data)->update($null_cv);
            $this->db->table('tb_dokumen_pt')->where('kd_data', $kd_data)->update($null_pt);
            $result = [
                'status' => 'success',
                'message' => 'edit dokumen berhasil',
            ];
        } else {
            $result = [
                'status' => 'error',
                'message' => 'edit dokumen belum berhasil',
            ];
        }
        return $result;
    }
    public function edit_cv($jenis_badan_usaha, $kd_data, $kirim, $null_perseorangan, $null_pt)
    {
        $result = [
            'status' => 'error',
            'message' => 'edit dokumen gagal',
        ];
        // CV
        $pengajuan_kredit2 = $this->validateFile('pengajuan_kredit2', 'pengajuan kredit', 'pengajuan_kredit', 'tb_dokumen_cv', $kd_data);
        if ($pengajuan_kredit2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pengajuan_kredit2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $akta_pendirian2 = $this->validateFile('akta_pendirian2', 'akta pendirian', 'akta_pendirian', 'tb_dokumen_cv', $kd_data);
        if ($akta_pendirian2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $akta_pendirian2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ahu2 = $this->validateFile('ahu2', 'ahu', 'ahu', 'tb_dokumen_cv', $kd_data);
        if ($ahu2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ahu2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $npwp_perseroan2 = $this->validateFile('npwp_perseroan2', 'npwp perseroan', 'npwp_perseroan', 'tb_dokumen_cv', $kd_data);
        if ($npwp_perseroan2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $npwp_perseroan2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_pengurus2 = $this->validateFile('ktp_pengurus2', 'ktp pengurus', 'ktp_pengurus', 'tb_dokumen_cv', $kd_data);
        if ($ktp_pengurus2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_pengurus2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_komanditer2 = $this->validateFile('ktp_komanditer2', 'ktp komanditer', 'ktp_komanditer', 'tb_dokumen_cv', $kd_data);
        if ($ktp_komanditer2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_komanditer2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $perijinan_usaha2 = $this->validateFile('perijinan_usaha2', 'perijinan usaha', 'perijinan_usaha', 'tb_dokumen_cv', $kd_data);
        if ($perijinan_usaha2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $perijinan_usaha2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $pengalaman_kerja2 = $this->validateFile('pengalaman_kerja2', 'pengalaman kerja', 'pengalaman_kerja', 'tb_dokumen_cv', $kd_data);
        if ($pengalaman_kerja2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pengalaman_kerja2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $laporan_keuangan2 = $this->validateFile('laporan_keuangan2', 'laporan keuangan', 'laporan_keuangan', 'tb_dokumen_cv', $kd_data);
        if ($laporan_keuangan2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $laporan_keuangan2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $copy_dok_agunan2 = $this->validateFile('copy_dok_agunan2', 'copy dokumen agunan', 'copy_dok_agunan', 'tb_dokumen_cv', $kd_data);
        if ($copy_dok_agunan2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $copy_dok_agunan2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ideb_slik_agunan2 = $this->validateFile('ideb_slik_agunan2', 'ideb slik', 'ideb_slik_agunan', 'tb_dokumen_cv', $kd_data);
        if ($ideb_slik_agunan2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ideb_slik_agunan2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_pemilik_agunan2 = $this->validateFile('ktp_pemilik_agunan2', 'ktp pemilik agunan', 'ktp_pemilik_agunan', 'tb_dokumen_cv', $kd_data);
        if ($ktp_pemilik_agunan2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_pemilik_agunan2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $kk_pemilik_agunan2 = $this->validateFile('kk_pemilik_agunan2', 'kk pemilik agunan', 'kk_pemilik_agunan', 'tb_dokumen_cv', $kd_data);
        if ($kk_pemilik_agunan2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $kk_pemilik_agunan2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $buku_nikah2 = $this->validateFile('buku_nikah2', 'buku nikah', 'buku_nikah', 'tb_dokumen_cv', $kd_data);
        if ($buku_nikah2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $buku_nikah2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $dhn2 = $this->validateFile('dhn2', 'dhn', 'dhn', 'tb_dokumen_cv', $kd_data);
        if ($dhn2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $dhn2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ideb_slik2 = $this->validateFile('ideb_slik2', 'ideb slik', 'ideb_slik', 'tb_dokumen_cv', $kd_data);
        if ($ideb_slik2['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ideb_slik2['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        // Proses penyimpanan data
        $data = [
            'nama_nasabah' => $kirim['nama_nasabah'],
            'alamat' => $kirim['alamat'],
            'usaha' => $kirim['usaha'],
            'jenis_badan_usaha' => $kirim['jenis_badan_usaha'],

            'pengajuan_kredit' => $pengajuan_kredit2['message'],
            'akta_pendirian' => $akta_pendirian2['message'],
            'ahu' => $ahu2['message'],
            'npwp_perseroan' => $npwp_perseroan2['message'],
            'ktp_pengurus' => $ktp_pengurus2['message'],
            'ktp_komanditer' => $ktp_komanditer2['message'],
            'perijinan_usaha' => $perijinan_usaha2['message'],
            'pengalaman_kerja' => $pengalaman_kerja2['message'],
            'laporan_keuangan' => $laporan_keuangan2['message'],
            'copy_dok_agunan' => $copy_dok_agunan2['message'],
            'ideb_slik_agunan' => $ideb_slik_agunan2['message'],
            'ktp_pemilik_agunan' => $ktp_pemilik_agunan2['message'],
            'kk_pemilik_agunan' => $kk_pemilik_agunan2['message'],
            'buku_nikah' => $buku_nikah2['message'],
            'dhn' => $dhn2['message'],
            'ideb_slik' => $ideb_slik2['message'],

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        //pengecekan kd info tidak boleh sama sebelum insert
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_dokumen_cv where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_dokumen_cv')->where('kd_data', $kd_data)->update($data);
            $this->db->table('tb_dokumen')->where('kd_data', $kd_data)->update($null_perseorangan);
            $this->db->table('tb_dokumen_pt')->where('kd_data', $kd_data)->update($null_pt);
            $result = [
                'status' => 'success',
                'message' => 'edit dokumen berhasil',
            ];
        } else {
            $result = [
                'status' => 'error',
                'message' => 'edit dokumen belum berhasil',
            ];
        }
        return $result;
    }
    public function edit_pt($jenis_badan_usaha, $kd_data, $kirim, $null_perseorangan, $null_cv)
    {
        $result = [
            'status' => 'error',
            'message' => 'edit dokumen gagal',
        ];
        // PT
        $pengajuan_kredit3 = $this->validateFile('pengajuan_kredit3', 'pengajuan kredit', 'pengajuan_kredit', 'tb_dokumen_pt', $kd_data);
        if ($pengajuan_kredit3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pengajuan_kredit3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $akta_pendirian3 = $this->validateFile('akta_pendirian3', 'akta pendirian', 'akta_pendirian', 'tb_dokumen_pt', $kd_data);
        if ($akta_pendirian3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $akta_pendirian3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ahu3 = $this->validateFile('ahu3', 'ahu', 'ahu', 'tb_dokumen_pt', $kd_data);
        if ($ahu3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ahu3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $npwp_perseroan3 = $this->validateFile('npwp_perseroan3', 'npwp perseroan', 'npwp_perseroan', 'tb_dokumen_pt', $kd_data);
        if ($npwp_perseroan3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $npwp_perseroan3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_direksi3 = $this->validateFile('ktp_direksi3', 'ktp direksi', 'ktp_direksi', 'tb_dokumen_pt', $kd_data);
        if ($ktp_direksi3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_direksi3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_komisaris3 = $this->validateFile('ktp_komisaris3', 'ktp komisaris', 'ktp_komisaris', 'tb_dokumen_pt', $kd_data);
        if ($ktp_komisaris3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_komisaris3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $pemegang_saham3 = $this->validateFile('pemegang_saham3', 'pemegang saham', 'pemegang_saham', 'tb_dokumen_pt', $kd_data);
        if ($pemegang_saham3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pemegang_saham3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $perijinan_usaha3 = $this->validateFile('perijinan_usaha3', 'perijinan usaha', 'perijinan_usaha', 'tb_dokumen_pt', $kd_data);
        if ($perijinan_usaha3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $perijinan_usaha3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $pengalaman_kerja3 = $this->validateFile('pengalaman_kerja3', 'pengalaman kerja', 'pengalaman_kerja', 'tb_dokumen_pt', $kd_data);
        if ($pengalaman_kerja3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $pengalaman_kerja3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $laporan_keuangan3 = $this->validateFile('laporan_keuangan3', 'laporan keuangan', 'laporan_keuangan', 'tb_dokumen_pt', $kd_data);
        if ($laporan_keuangan3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $laporan_keuangan3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ideb_slik_agunan3 = $this->validateFile('ideb_slik_agunan3', 'ideb slik', 'ideb_slik_agunan', 'tb_dokumen_pt', $kd_data);
        if ($ideb_slik_agunan3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ideb_slik_agunan3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_pemilik_agunan3 = $this->validateFile('ktp_pemilik_agunan3', 'ktp pemilik agunan', 'ktp_pemilik_agunan', 'tb_dokumen_pt', $kd_data);
        if ($ktp_pemilik_agunan3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_pemilik_agunan3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ktp_istri3 = $this->validateFile('ktp_istri3', 'ktp suami/ istri', 'ktp_istri', 'tb_dokumen_pt', $kd_data);
        if ($ktp_istri3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ktp_istri3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $kk_pemilik_agunan3 = $this->validateFile('kk_pemilik_agunan3', 'kk pemilik agunan', 'kk_pemilik_agunan', 'tb_dokumen_pt', $kd_data);
        if ($kk_pemilik_agunan3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $kk_pemilik_agunan3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $buku_nikah3 = $this->validateFile('buku_nikah3', 'buku nikah', 'buku_nikah', 'tb_dokumen_pt', $kd_data);
        if ($buku_nikah3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $buku_nikah3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $dhn3 = $this->validateFile('dhn3', 'dhn', 'dhn', 'tb_dokumen_pt', $kd_data);
        if ($dhn3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $dhn3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $ideb_slik3 = $this->validateFile('ideb_slik3', 'ideb slik', 'ideb_slik', 'tb_dokumen_pt', $kd_data);
        if ($ideb_slik3['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $ideb_slik3['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        // Proses penyimpanan data
        $data = [
            'nama_nasabah' => $kirim['nama_nasabah'],
            'alamat' => $kirim['alamat'],
            'usaha' => $kirim['usaha'],
            'jenis_badan_usaha' => $kirim['jenis_badan_usaha'],

            'pengajuan_kredit' => $pengajuan_kredit3['message'],
            'akta_pendirian' => $akta_pendirian3['message'],
            'ahu' => $ahu3['message'],
            'npwp_perseroan' => $npwp_perseroan3['message'],
            'ktp_direksi' => $ktp_direksi3['message'],
            'ktp_komisaris' => $ktp_komisaris3['message'],
            'pemegang_saham' => $pemegang_saham3['message'],
            'perijinan_usaha' => $perijinan_usaha3['message'],
            'pengalaman_kerja' => $pengalaman_kerja3['message'],
            'laporan_keuangan' => $laporan_keuangan3['message'],
            'ideb_slik_agunan' => $ideb_slik_agunan3['message'],
            'ktp_pemilik_agunan' => $ktp_pemilik_agunan3['message'],
            'ktp_istri' => $ktp_istri3['message'],
            'kk_pemilik_agunan' => $kk_pemilik_agunan3['message'],
            'buku_nikah' => $buku_nikah3['message'],
            'dhn' => $dhn3['message'],
            'ideb_slik' => $ideb_slik3['message'],

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        //pengecekan kd info tidak boleh sama sebelum insert
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_dokumen_pt where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_dokumen_pt')->where('kd_data', $kd_data)->update($data);
            $this->db->table('tb_dokumen')->where('kd_data', $kd_data)->update($null_perseorangan);
            $this->db->table('tb_dokumen_cv')->where('kd_data', $kd_data)->update($null_cv);
            $result = [
                'status' => 'success',
                'message' => 'edit dokumen berhasil',
            ];
        } else {
            $result = [
                'status' => 'error',
                'message' => 'edit dokumen belum berhasil',
            ];
        }
        return $result;
    }
    public function edit_scoring()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'nama_pemohon_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pemohon Harus diisi',
                ]
            ],
            // 'alamat_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat Harus diisi',
            //     ]
            // ],
            // 'plafond_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Plafond Harus diisi',
            //     ]
            // ],
            // 'tujuan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tujuan Harus diisi',
            //     ]
            // ],
            'no_pak_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No PAK Harus diisi',
                ]
            ],

            // 'pendirian_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pendirian Harus diisi',
            //     ]
            // ],
            // 'legalitas_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Legalitas Harus diisi',
            //     ]
            // ],
            // 'hubungan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Hubungan Harus diisi',
            //     ]
            // ],

            // 'pengelolaan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pengelolaan Harus diisi',
            //     ]
            // ],
            // 'jenis_agunan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Jenis Agunan Harus diisi',
            //     ]
            // ],
            // 'bukti_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Bukti Harus diisi',
            //     ]
            // ],
            // 'status_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Status Harus diisi',
            //     ]
            // ],
            // 'marketable_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Marketable Harus diisi',
            //     ]
            // ],
            // 'lending_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lending Harus diisi',
            //     ]
            // ],
            // 'pengalaman_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pengalaman Harus diisi',
            //     ]
            // ],
            // 'sumber_dana_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Sumber Dana Harus diisi',
            //     ]
            // ],
            // 'lokasi_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lokasi Harus diisi',
            //     ]
            // ],
            // 'jenis_proyek_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Jenis Proyek Harus diisi',
            //     ]
            // ],
            // 'bahan_baku_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Bahan Baku Harus diisi',
            //     ]
            // ],
            // 'peralatan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Peralatan Harus diisi',
            //     ]
            // ],
            // 'pembayaran_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pembayaran Harus diisi',
            //     ]
            // ],
            // 'dasar_penunjukan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Dasar Penunjukan Harus diisi',
            //     ]
            // ],
            // 'prosentase_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Prosentase Harus diisi',
            //     ]
            // ],
            // 'jangka_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Jangka Waktu Harus diisi',
            //     ]
            // ],
            // 'agunan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Agunan Harus diisi',
            //     ]
            // ],
            // 'penjaminan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Penjaminan Harus diisi',
            //     ]
            // ],



        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            // Proses penyimpanan data
            $hasil = $this->data_scoring($hasil);
        }
        echo json_encode($hasil);
    }
    public function edit_scoring_koor()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'nama_pemohon_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pemohon Harus diisi',
                ]
            ],
            // 'alamat_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Alamat Harus diisi',
            //     ]
            // ],
            // 'plafond_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Plafond Harus diisi',
            //     ]
            // ],
            // 'tujuan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tujuan Harus diisi',
            //     ]
            // ],
            'no_pak_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No PAK Harus diisi',
                ]
            ],

            // 'pendirian_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pendirian Harus diisi',
            //     ]
            // ],
            // 'legalitas_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Legalitas Harus diisi',
            //     ]
            // ],
            // 'hubungan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Hubungan Harus diisi',
            //     ]
            // ],

            // 'pengelolaan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pengelolaan Harus diisi',
            //     ]
            // ],
            // 'jenis_agunan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Jenis Agunan Harus diisi',
            //     ]
            // ],
            // 'bukti_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Bukti Harus diisi',
            //     ]
            // ],
            // 'status_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Status Harus diisi',
            //     ]
            // ],
            // 'marketable_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Marketable Harus diisi',
            //     ]
            // ],
            // 'lending_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lending Harus diisi',
            //     ]
            // ],
            // 'pengalaman_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pengalaman Harus diisi',
            //     ]
            // ],
            // 'sumber_dana_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Sumber Dana Harus diisi',
            //     ]
            // ],
            // 'lokasi_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Lokasi Harus diisi',
            //     ]
            // ],
            // 'jenis_proyek_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Jenis Proyek Harus diisi',
            //     ]
            // ],
            // 'bahan_baku_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Bahan Baku Harus diisi',
            //     ]
            // ],
            // 'peralatan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Peralatan Harus diisi',
            //     ]
            // ],
            // 'pembayaran_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Pembayaran Harus diisi',
            //     ]
            // ],
            // 'dasar_penunjukan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Dasar Penunjukan Harus diisi',
            //     ]
            // ],
            // 'prosentase_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Prosentase Harus diisi',
            //     ]
            // ],
            // 'jangka_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Jangka Waktu Harus diisi',
            //     ]
            // ],
            // 'agunan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Agunan Harus diisi',
            //     ]
            // ],
            // 'penjaminan_sc' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Penjaminan Harus diisi',
            //     ]
            // ],



        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            // Proses penyimpanan data
            $hasil = $this->data_scoring_koor($hasil);
        }
        echo json_encode($hasil);
    }
    public function data_scoring($hasil)
    {
        $data = [
            'nama_pemohon' => $this->request->getPost('nama_pemohon_sc'),
            'alamat' => $this->request->getPost('alamat_sc'),
            'plafond' => $this->request->getPost('plafond_sc'),
            'tujuan' => $this->request->getPost('tujuan_sc'),
            'no_pak' => $this->request->getPost('no_pak_sc'),

            // 'pendirian_bu' => $this->request->getPost('pendirian_sc'),
            // 'legalitas' => $this->request->getPost('legalitas_sc'),
            // 'hubungan_funding' => $this->request->getPost('hubungan_sc'),
            // 'manajemen_usaha' => $this->request->getPost('pengelolaan_sc'),
            // 'jenis_agunan' => $this->request->getPost('jenis_agunan_sc'),
            // 'bukti_kepemilikan_agunan' => $this->request->getPost('bukti_sc'),
            // 'status_kepemilikan' => $this->request->getPost('status_sc'),
            // 'marketable_agunan' => $this->request->getPost('marketable_sc'),
            // 'hubungan_landing' => $this->request->getPost('lending_sc'),
            // 'pengalaman' => $this->request->getPost('pengalaman_sc'),
            // 'sumber_dana' => $this->request->getPost('sumber_dana_sc'),
            // 'lokasi_proyek' => $this->request->getPost('lokasi_sc'),
            // 'jenis_proyek' => $this->request->getPost('jenis_proyek_sc'),
            // 'bahan_baku' => $this->request->getPost('bahan_baku_sc'),
            // 'peralatan' => $this->request->getPost('peralatan_sc'),
            // 'pembayaran_termijn' => $this->request->getPost('pembayaran_sc'),
            // 'dasar_penunjukan' => $this->request->getPost('dasar_penunjukan_sc'),
            // 'persentase_plafond' => $this->request->getPost('prosentase_sc'),
            // 'jangka_waktu' => $this->request->getPost('jangka_sc'),
            // 'persentase_agunan' => $this->request->getPost('agunan_sc'),
            // 'penjaminan_maskapai' => $this->request->getPost('penjaminan_sc'),

            'pendirian_bu' => $this->request->getPost('pendirian_sc') ? $this->request->getPost('pendirian_sc') : 0,
            'legalitas' => $this->request->getPost('legalitas_sc') ? $this->request->getPost('legalitas_sc') : 0,
            'hubungan_funding' => $this->request->getPost('hubungan_sc') ? $this->request->getPost('hubungan_sc') : 0,
            'manajemen_usaha' => $this->request->getPost('pengelolaan_sc') ? $this->request->getPost('pengelolaan_sc') : 0,
            'jenis_agunan' => $this->request->getPost('jenis_agunan_sc') ? $this->request->getPost('jenis_agunan_sc') : 0,
            'bukti_kepemilikan_agunan' => $this->request->getPost('bukti_sc') ? $this->request->getPost('bukti_sc') : 0,
            'status_kepemilikan' => $this->request->getPost('status_sc') ? $this->request->getPost('status_sc') : 0,
            'marketable_agunan' => $this->request->getPost('marketable_sc') ? $this->request->getPost('marketable_sc') : 0,
            'hubungan_landing' => $this->request->getPost('lending_sc') ? $this->request->getPost('lending_sc') : 0,
            'pengalaman' => $this->request->getPost('pengalaman_sc') ? $this->request->getPost('pengalaman_sc') : 0,
            'sumber_dana' => $this->request->getPost('sumber_dana_sc') ? $this->request->getPost('sumber_dana_sc') : 0,
            'lokasi_proyek' => $this->request->getPost('lokasi_sc') ? $this->request->getPost('lokasi_sc') : 0,
            'jenis_proyek' => $this->request->getPost('jenis_proyek_sc') ? $this->request->getPost('jenis_proyek_sc') : 0,
            'bahan_baku' => $this->request->getPost('bahan_baku_sc') ? $this->request->getPost('bahan_baku_sc') : 0,
            'peralatan' => $this->request->getPost('peralatan_sc') ? $this->request->getPost('peralatan_sc') : 0,
            'pembayaran_termijn' => $this->request->getPost('pembayaran_sc') ? $this->request->getPost('pembayaran_sc') : 0,
            'dasar_penunjukan' => $this->request->getPost('dasar_penunjukan_sc') ? $this->request->getPost('dasar_penunjukan_sc') : 0,
            'persentase_plafond' => $this->request->getPost('prosentase_sc') ? $this->request->getPost('prosentase_sc') : 0,
            'jangka_waktu' => $this->request->getPost('jangka_sc') ? $this->request->getPost('jangka_sc') : 0,
            'persentase_agunan' => $this->request->getPost('agunan_sc') ? $this->request->getPost('agunan_sc') : 0,
            'penjaminan_maskapai' => $this->request->getPost('penjaminan_sc') ? $this->request->getPost('penjaminan_sc') : 0,

            // 'hasil_skoring' => '0',
            // 'keterangan' => 'Belum dihitung',

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];
        $jumlah = $data['pendirian_bu'] + $data['legalitas'] + $data['hubungan_funding'] + $data['manajemen_usaha']
            + $data['jenis_agunan'] + $data['bukti_kepemilikan_agunan'] + $data['status_kepemilikan'] + $data['marketable_agunan']
            + $data['hubungan_landing'] + $data['pengalaman'] + $data['sumber_dana'] + $data['lokasi_proyek']
            + $data['jenis_proyek'] + $data['bahan_baku'] + $data['peralatan'] + $data['pembayaran_termijn']
            + $data['dasar_penunjukan'] + $data['persentase_plafond'] + $data['jangka_waktu'] + $data['persentase_agunan']
            + $data['penjaminan_maskapai'];
        if ($jumlah >= 325) {
            $ket = 'Approv';
        } else {
            $ket = 'Reject';
        }
        $data['hasil_skoring'] = $jumlah;
        $data['keterangan'] = $ket;
        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data_tambah');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_scoring where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->edit_scoring_master($kd_data, $data['hasil_skoring']);
            $this->db->table('tb_scoring')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit scoring berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit scoring Gagal'
            ];
        }
        return $hasil;
    }
    public function data_scoring_koor($hasil)
    {
        $data = [
            'nama_pemohon' => $this->request->getPost('nama_pemohon_sc_koor'),
            'alamat' => $this->request->getPost('alamat_sc_koor'),
            'plafond' => $this->request->getPost('plafond_sc_koor'),
            'tujuan' => $this->request->getPost('tujuan_sc_koor'),
            'no_pak' => $this->request->getPost('no_pak_sc_koor'),

            // 'pendirian_bu' => $this->request->getPost('pendirian_sc_koor'),
            // 'legalitas' => $this->request->getPost('legalitas_sc_koor'),
            // 'hubungan_funding' => $this->request->getPost('hubungan_sc_koor'),
            // 'manajemen_usaha' => $this->request->getPost('pengelolaan_sc_koor'),
            // 'jenis_agunan' => $this->request->getPost('jenis_agunan_sc_koor'),
            // 'bukti_kepemilikan_agunan' => $this->request->getPost('bukti_sc_koor'),
            // 'status_kepemilikan' => $this->request->getPost('status_sc_koor'),
            // 'marketable_agunan' => $this->request->getPost('marketable_sc_koor'),
            // 'hubungan_landing' => $this->request->getPost('lending_sc_koor'),
            // 'pengalaman' => $this->request->getPost('pengalaman_sc_koor'),
            // 'sumber_dana' => $this->request->getPost('sumber_dana_sc_koor'),
            // 'lokasi_proyek' => $this->request->getPost('lokasi_sc_koor'),
            // 'jenis_proyek' => $this->request->getPost('jenis_proyek_sc_koor'),
            // 'bahan_baku' => $this->request->getPost('bahan_baku_sc_koor'),
            // 'peralatan' => $this->request->getPost('peralatan_sc_koor'),
            // 'pembayaran_termijn' => $this->request->getPost('pembayaran_sc_koor'),
            // 'dasar_penunjukan' => $this->request->getPost('dasar_penunjukan_sc_koor'),
            // 'persentase_plafond' => $this->request->getPost('prosentase_sc_koor'),
            // 'jangka_waktu' => $this->request->getPost('jangka_sc_koor'),
            // 'persentase_agunan' => $this->request->getPost('agunan_sc_koor'),
            // 'penjaminan_maskapai' => $this->request->getPost('penjaminan_sc_koor'),

            'pendirian_bu' => $this->request->getPost('pendirian_sc_koor') ? $this->request->getPost('pendirian_sc_koor') : 0,
            'legalitas' => $this->request->getPost('legalitas_sc_koor') ? $this->request->getPost('legalitas_sc_koor') : 0,
            'hubungan_funding' => $this->request->getPost('hubungan_sc_koor') ? $this->request->getPost('hubungan_sc_koor') : 0,
            'manajemen_usaha' => $this->request->getPost('pengelolaan_sc_koor') ? $this->request->getPost('pengelolaan_sc_koor') : 0,
            'jenis_agunan' => $this->request->getPost('jenis_agunan_sc_koor') ? $this->request->getPost('jenis_agunan_sc_koor') : 0,
            'bukti_kepemilikan_agunan' => $this->request->getPost('bukti_sc_koor') ? $this->request->getPost('bukti_sc_koor') : 0,
            'status_kepemilikan' => $this->request->getPost('status_sc_koor') ? $this->request->getPost('status_sc_koor') : 0,
            'marketable_agunan' => $this->request->getPost('marketable_sc_koor') ? $this->request->getPost('marketable_sc_koor') : 0,
            'hubungan_landing' => $this->request->getPost('lending_sc_koor') ? $this->request->getPost('lending_sc_koor') : 0,
            'pengalaman' => $this->request->getPost('pengalaman_sc_koor') ? $this->request->getPost('pengalaman_sc_koor') : 0,
            'sumber_dana' => $this->request->getPost('sumber_dana_sc_koor') ? $this->request->getPost('sumber_dana_sc_koor') : 0,
            'lokasi_proyek' => $this->request->getPost('lokasi_sc_koor') ? $this->request->getPost('lokasi_sc_koor') : 0,
            'jenis_proyek' => $this->request->getPost('jenis_proyek_sc_koor') ? $this->request->getPost('jenis_proyek_sc_koor') : 0,
            'bahan_baku' => $this->request->getPost('bahan_baku_sc_koor') ? $this->request->getPost('bahan_baku_sc_koor') : 0,
            'peralatan' => $this->request->getPost('peralatan_sc_koor') ? $this->request->getPost('peralatan_sc_koor') : 0,
            'pembayaran_termijn' => $this->request->getPost('pembayaran_sc_koor') ? $this->request->getPost('pembayaran_sc_koor') : 0,
            'dasar_penunjukan' => $this->request->getPost('dasar_penunjukan_sc_koor') ? $this->request->getPost('dasar_penunjukan_sc_koor') : 0,
            'persentase_plafond' => $this->request->getPost('prosentase_sc_koor') ? $this->request->getPost('prosentase_sc_koor') : 0,
            'jangka_waktu' => $this->request->getPost('jangka_sc_koor') ? $this->request->getPost('jangka_sc_koor') : 0,
            'persentase_agunan' => $this->request->getPost('agunan_sc_koor') ? $this->request->getPost('agunan_sc_koor') : 0,
            'penjaminan_maskapai' => $this->request->getPost('penjaminan_sc_koor') ? $this->request->getPost('penjaminan_sc_koor') : 0,

            // 'hasil_skoring' => '0',
            // 'keterangan' => 'Belum dihitung',

            'pengubah' => session()->get('nama_user'),
            'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];
        $jumlah = $data['pendirian_bu'] + $data['legalitas'] + $data['hubungan_funding'] + $data['manajemen_usaha']
            + $data['jenis_agunan'] + $data['bukti_kepemilikan_agunan'] + $data['status_kepemilikan'] + $data['marketable_agunan']
            + $data['hubungan_landing'] + $data['pengalaman'] + $data['sumber_dana'] + $data['lokasi_proyek']
            + $data['jenis_proyek'] + $data['bahan_baku'] + $data['peralatan'] + $data['pembayaran_termijn']
            + $data['dasar_penunjukan'] + $data['persentase_plafond'] + $data['jangka_waktu'] + $data['persentase_agunan']
            + $data['penjaminan_maskapai'];
        if ($jumlah >= 325) {
            $ket = 'Approv';
        } else {
            $ket = 'Reject';
        }
        $data['hasil_skoring'] = $jumlah;
        $data['keterangan'] = $ket;
        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data_tambah');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_scoring_koordinator where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->edit_scoring_master($kd_data, $data['hasil_skoring']);
            $this->db->table('tb_scoring_koordinator')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit scoring koordinator berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit scoring koordinator Gagal'
            ];
        }
        return $hasil;
    }
    public function finish_scoring()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'nama_pemohon_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pemohon Harus diisi',
                ]
            ],
            'alamat_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus diisi',
                ]
            ],
            'plafond_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Plafond Harus diisi',
                ]
            ],
            'tujuan_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Harus diisi',
                ]
            ],
            'no_pak_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No PAK Harus diisi',
                ]
            ],

            'pendirian_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendirian Harus diisi',
                ]
            ],
            'legalitas_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Legalitas Harus diisi',
                ]
            ],
            'hubungan_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hubungan Harus diisi',
                ]
            ],

            'pengelolaan_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pengelolaan Harus diisi',
                ]
            ],
            'jenis_agunan_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Agunan Harus diisi',
                ]
            ],
            'bukti_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bukti Harus diisi',
                ]
            ],
            'status_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Harus diisi',
                ]
            ],
            'marketable_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Marketable Harus diisi',
                ]
            ],
            'lending_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lending Harus diisi',
                ]
            ],
            'pengalaman_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pengalaman Harus diisi',
                ]
            ],
            'sumber_dana_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sumber Dana Harus diisi',
                ]
            ],
            'lokasi_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Harus diisi',
                ]
            ],
            'jenis_proyek_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Proyek Harus diisi',
                ]
            ],
            'bahan_baku_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahan Baku Harus diisi',
                ]
            ],
            'peralatan_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Peralatan Harus diisi',
                ]
            ],
            'pembayaran_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembayaran Harus diisi',
                ]
            ],
            'dasar_penunjukan_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dasar Penunjukan Harus diisi',
                ]
            ],
            'prosentase_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prosentase Harus diisi',
                ]
            ],
            'jangka_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jangka Waktu Harus diisi',
                ]
            ],
            'agunan_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agunan Harus diisi',
                ]
            ],
            'penjaminan_sc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penjaminan Harus diisi',
                ]
            ],

        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            // Proses penyimpanan data
            $hasil = $this->data_scoring($hasil);
        }
        echo json_encode($hasil);
    }
    public function edit_scoring_master($kd_data, $hasil_scoring)
    {
        if ($hasil_scoring >= 325) {
            $ket = 'Yes';
        } else {
            $ket = 'No';
        }
        $data['scoring'] = $ket;
        //pengecekan kd info tidak boleh sama sebelum insert
        $cek_kd_data = $this->db->query("SELECT * from tb_data_master where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_data_master')->where('kd_data', $kd_data)->update($data);
        }
    }
    public function edit_recap()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([

            'disposisi_sc' => [
                // 'rules' => 'required|min_length[3]',
                'rules' => 'max_length[100000]',
                'errors' => [
                    // 'required' => 'Disposisi Pemasar Harus diisi',
                    'max_length' => 'Disposisi Pemasar Maksimal 100 Ribu Karakter',
                ]
            ],
            'disposisi_koordinator_pemasar_sc' => [
                // 'rules' => 'required|min_length[3]',
                'rules' => 'max_length[100000]',
                'errors' => [
                    // 'required' => 'Disposisi Pemasar Harus diisi',
                    'max_length' => 'Disposisi Koordinator Pemasar Maksimal 100 Ribu Karakter',
                ]
            ],
            'disposisi_kepala_cabang_sc' => [
                // 'rules' => 'required|min_length[3]',
                'rules' => 'max_length[100000]',
                'errors' => [
                    // 'required' => 'Disposisi Pemasar Harus diisi',
                    'max_length' => 'Disposisi Kepala Cabang Maksimal 100 Ribu Karakter',
                ]
            ],
            'disposisi_analis_kredit_sc' => [
                // 'rules' => 'required|min_length[3]',
                'rules' => 'max_length[100000]',
                'errors' => [
                    // 'required' => 'Disposisi Pemasar Harus diisi',
                    'max_length' => 'Disposisi Analis Kredit Maksimal 100 Ribu Karakter',
                ]
            ],
            'disposisi_kepala_bagian_sc' => [
                // 'rules' => 'required|min_length[3]',
                'rules' => 'max_length[100000]',
                'errors' => [
                    // 'required' => 'Disposisi Pemasar Harus diisi',
                    'max_length' => 'Disposisi Kepala Bagian Maksimal 100 Ribu Karakter',
                ]
            ],
            'disposisi_kepala_divisi_sc' => [
                // 'rules' => 'required|min_length[3]',
                'rules' => 'max_length[100000]',
                'errors' => [
                    // 'required' => 'Disposisi Pemasar Harus diisi',
                    'max_length' => 'Disposisi Kepala Divisi Maksimal 100 Ribu Karakter',
                ]
            ],


        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            // Proses penyimpanan data
            $data = [
                'rekomendasi_pemasar' => $this->request->getPost('disposisi_sc'),
                'rekomendasi_koor' => $this->request->getPost('disposisi_koordinator_pemasar_sc'),
                'rekomendasi_kacab' => $this->request->getPost('disposisi_kepala_cabang_sc'),
                'rekomendasi_analis' => $this->request->getPost('disposisi_analis_kredit_sc'),
                'rekomendasi_kabag' => $this->request->getPost('disposisi_kepala_bagian_sc'),
                'rekomendasi_kadiv' => $this->request->getPost('disposisi_kepala_divisi_sc'),

                'pengubah' => session()->get('nama_user'),
                'waktu_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                'kd_unit_pengubah' => session()->get('kd_unit_user'),
            ];

            //pengecekan kd info tidak boleh sama sebelum insert
            $kd_data = $this->request->getPost('kd_data_tambah');
            $cek_kd_data = $this->db->query("SELECT kd_data from tb_kirim where kd_data = '" . $kd_data . "' ")->getNumRows();
            if ($cek_kd_data > 0) {

                $this->db->table('tb_kirim')->where('kd_data', $kd_data)->update($data);
                // $pengaruh = $this->db->affectedRows();
                $hasil = [
                    'status' => 'success',
                    'message' => 'Edit recap berhasil'
                ];
            } else {
                $hasil = [
                    'status' => 'error',
                    'message' => 'Edit recap Gagal'
                ];
            }
        }
        echo json_encode($hasil);
    }
    public function edit_finish()
    {
        // $cek = $this->request->getFile('upload_dokumen_tambah');
        // var_dump($cek);
        // die;
        // echo json_encode($cek);
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        if (!$this->validate([
            'unit_kerja_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit Kerja Harus diisi',
                ]
            ],
            'pemasar_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemasar Harus diisi',
                ]
            ],
            'koordinator_pemasar_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Koordinator Pemasar Harus diisi',
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
            'nama_debitur_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Debitur Harus diisi',
                ]
            ],
            'bidang_usaha_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bidang Usaha Harus diisi',
                ]
            ],
            'nama_direktur_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Direktur Harus diisi',
                ]
            ],
            'key_person_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Key Person Harus diisi',
                ]
            ],
            'alamat_kantor_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Kantor Harus diisi',
                ]
            ],
            'alamat_gudang_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Gudang/ Pabrik/ Workshop Harus diisi',
                ]
            ],
            'group_debitur_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Group Debitur Harus diisi',
                ]
            ],
            'nama_proyek_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Proyek Harus diisi',
                ]
            ],
            'nomor_spk_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor SPK/ SPPBJ/ Gunning/ Kontrak Harus diisi',
                ]
            ],
            'tanggal_spk_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal SPK/ SPPBJ/ Gunning/ Kontrak Harus diisi',
                ]
            ],
            'nilai_proyek_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Proyek Harus diisi',
                ]
            ],
            'alamat_proyek_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Proyek Harus diisi',
                ]
            ],
            'pemberi_kerja_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemberi Kerja Harus diisi',
                ]
            ],
            'penandatangan_kontrak_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penandatangan Kontrak Harus diisi',
                ]
            ],
            'alamat_pemberi_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Pemberi Harus diisi',
                ]
            ],
            'tanggal_permohonan_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Permohonan Harus diisi',
                ]
            ],
            'plafond_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Plafond Harus diisi',
                ]
            ],
            'tujuan_pengajuan_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Pengajuan Harus diisi',
                ]
            ],
            'jumlah_agunan_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Agunan Harus diisi',
                ]
            ],
            'status_tambah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Pengajuan Harus diisi',
                ]
            ],
        ])) {
            $hasil = [
                'status' => 'error',
                'message' => $this->validator->listErrors()
            ];
        } else {
            $hasil = $this->data_entry($hasil, 'edit_finish');
        }
        echo json_encode($hasil);
    }

    public function cetak_dokumen($kd_data, $id_dok)
    {
        // Cetak Dokumen Pengajuan
        if ($id_dok == sha1('fcr_gen')) {
            $this->generate_fcr($kd_data, $id_dok);
        } else if ($id_dok == sha1('fcr_usaha_gen')) {
            $this->generate_fcr_usaha($kd_data, $id_dok);
        } else if ($id_dok == sha1('fcr_agunan_gen')) {
        } else if ($id_dok == sha1('fcr_dok_ceklist_gen')) {
            $this->generate_dokumen_ceklis($kd_data, $id_dok);
        } else if ($id_dok == sha1('fak_gen')) {
        } else if ($id_dok == sha1('faa_gen')) {
        } else if ($id_dok == sha1('mauk_gen')) {
        } else if ($id_dok == sha1('dcc_gen')) {
        } else if ($id_dok == sha1('scoring_gen')) {
        } else if ($id_dok == sha1('fkk_gen')) {
            $this->generate_fkk($kd_data, $id_dok);
        } else if ($id_dok == sha1('mkk_gen')) {
            $this->generate_mkk($kd_data, $id_dok);
        } else if ($id_dok == sha1('sp2k_gen')) {
        } else if ($id_dok == sha1('pk_gen')) {
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('pengajuan-kredit-transaksional') . '">Klik untuk kembali</a>';
        }
    }
    public function generate_fcr($kd_data, $id_dok)
    {
        $cek_ada = $this->db->query("SELECT * FROM tb_fcr where SHA1(kd_data) = '" . $kd_data . "' ");
        $ada_data_entry = $this->db->query("SELECT * FROM tb_data_entry where SHA1(kd_data) = '" . $kd_data . "' ");
        $ada_data_master = $this->db->query("SELECT * FROM tb_data_master where SHA1(kd_data) = '" . $kd_data . "' ");

        if ($cek_ada->getNumRows() > 0 && $ada_data_entry->getNumRows() > 0 && $ada_data_master->getNumRows() > 0) {
            $data = $cek_ada->getRow();
            $data_entry = $ada_data_entry->getRow();
            // $this->debug($data->kondisi_fisik_kantor);
            $data_master = $ada_data_master->getRow();

            $ada_nama_unit = $this->db->query("SELECT nama_unit FROM tb_unit_kerja where kd_unit = '" . $data_master->kd_unit_kerja . "' ");
            if ($ada_nama_unit->getNumRows() > 0) {
                $nama_unit = $ada_nama_unit->getRow()->nama_unit;
            }

            // $row = array();
            // $nomor = $data->nomor; //
            $tanggal = $this->atur_tanggal($data->tanggal); //

            $kunjungan_oleh = $this->pisah_koma($data->kunjungan_oleh);
            // $this->debug($kunjungan_oleh);
            $kunjungan_oleh2 = '';
            foreach ($kunjungan_oleh as $list) {
                $kunjungan_oleh3 = "- {$list}\line";
                $kunjungan_oleh2 .= $kunjungan_oleh3;
            }
            $kunjungan_oleh4 = $kunjungan_oleh2 ? $kunjungan_oleh2 : '?kunjungan_oleh';
            // $this->debug($kunjungan_oleh4);

            $tanggal_kunjungan = $this->atur_tanggal($data->tanggal_kunjungan); //
            // $this->debug($tanggal_kunjungan);

            $lokasi_yang_dikunjungi = $this->pisah_koma($data->lokasi_yang_dikunjungi);
            // $this->debug($lokasi_yang_dikunjungi);
            $lokasi_yang_dikunjungi2 = '';
            foreach ($lokasi_yang_dikunjungi as $list) {
                $lokasi_yang_dikunjungi3 = "- {$list}\line";
                $lokasi_yang_dikunjungi2 .= $lokasi_yang_dikunjungi3;
            }
            $lokasi_yang_dikunjungi4 = $lokasi_yang_dikunjungi2 ? $lokasi_yang_dikunjungi2 : '?lokasi_yang_dikunjungi';

            $contact_person = $this->pisah_koma($data->contact_person);
            // $this->debug($contact_person);
            $contact_person2 = '';
            foreach ($contact_person as $list) {
                $contact_person3 = "- {$list}\line";
                $contact_person2 .= $contact_person3;
            }
            $contact_person4 = $contact_person2 ? $contact_person2 : '?contact_person';

            $clientIP = $this->request->getIPAddress(); // Mendapatkan IP pengunjung

            // Cek jika diakses dari localhost atau IP lokal (127.0.0.1)
            // if ($clientIP == '172.20.102.142') {
            //     // memanggil dan membaca template dokumen yang telah kita buat
            //     $document = file_get_contents("http://172.20.102.142/public/assets/doc/fcr.rtf");
            // }else{
            //     $document = file_get_contents(ROOTPATH . "public/assets/doc/fcr.rtf");

            // }
            $document = file_get_contents(ROOTPATH . "public/assets/doc/fcr.rtf");

            // isi dokumen dinyatakan dalam bentuk string
            $document = str_replace("?nomor", $data->nomor, $document);
            $document = str_replace("?tanggal", $tanggal, $document);
            $document = str_replace("?nama_debitur", $data_entry->nama_debitur, $document);
            $document = str_replace("?kunjungan_oleh", $kunjungan_oleh4, $document);
            $document = str_replace("?alamat_kantor", $data->alamat_kantor, $document);
            $document = str_replace("?nama_unit", $nama_unit ? $nama_unit : '?nama_unit', $document);
            $document = str_replace("?alamat_gudang", $data->alamat_gudang, $document);
            $document = str_replace("?tgl_kunjungan", $tanggal_kunjungan, $document);
            $document = str_replace("?group_debitur", $data->group_debitur, $document);
            $document = str_replace("?lokasi_yang_dikunjungi", $lokasi_yang_dikunjungi4, $document);
            $document = str_replace("?contact_person", $contact_person4, $document);
            $document = str_replace("?tujuan_kunjungan", $data->tujuan_kunjungan, $document);
            $document = str_replace("?hasil_kunjungan", $data->hasil_kunjungan, $document);
            $document = str_replace("?pemasar", $data_entry->pemasar, $document);
            $document = str_replace("?koordinator_pemasar", $data_entry->koordinator_pemasar, $document);

            $nama_file = 'FCR ' . $data_entry->nama_debitur . ' ' . gmdate("d-m-Y H:i:s", time() + 60 * 60 * 8);
            header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            header("Content-disposition: attachment; filename=$nama_file.docx");
            header("Content-length: " . strlen($document));

            // Tampilkan isi dokumen untuk di-download
            echo $document;
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('pengajuan-kredit-transaksional') . '">Klik untuk kembali</a>';
        }
    }
    public function generate_fcr_usaha($kd_data, $id_dok)
    {
        $cek_ada = $this->db->query("SELECT * FROM tb_fcr_usaha where SHA1(kd_data) = '" . $kd_data . "' ");
        $ada_data_entry = $this->db->query("SELECT * FROM tb_data_entry where SHA1(kd_data) = '" . $kd_data . "' ");
        $ada_data_master = $this->db->query("SELECT * FROM tb_data_master where SHA1(kd_data) = '" . $kd_data . "' ");
        if ($cek_ada->getNumRows() > 0 && $ada_data_entry->getNumRows() > 0 && $ada_data_master->getNumRows() > 0) {
            $data = $cek_ada->getRow();

            $data_entry = $ada_data_entry->getRow();
            // $this->debug($data->kondisi_fisik_kantor);

            $data_master = $ada_data_master->getRow();

            $fcr = $this->db->query("SELECT * FROM tb_fcr where SHA1(kd_data) = '" . $kd_data . "' ");
            $tanggal_fcr = !empty($fcr->getRow()->tanggal) ? $this->atur_tanggal($fcr->getRow()->tanggal) : '?tanggal_fcr';

            $ada_nama_unit = $this->db->query("SELECT nama_unit FROM tb_unit_kerja where kd_unit = '" . $data_master->kd_unit_kerja . "' ");
            if ($ada_nama_unit->getNumRows() > 0) {
                $nama_unit = $ada_nama_unit->getRow()->nama_unit;
            }

            // $row = array();
            // $kondisi_fisik_kantor = $data->kondisi_fisik_kantor; //
            // $tanggal = $this->atur_tanggal($data->tanggal); //
            // $kunjungan_oleh = $this->pisah_koma($data->kunjungan_oleh);
            // $kd_unit_kerja = $this->nama_unit($data->kd_unit_kerja); //
            // $tanggal_kunjungan = $this->atur_tanggal($data->tanggal_kunjungan); //

            // memanggil dan membaca template dokumen yang telah kita buat
            $document = file_get_contents(ROOTPATH . "public/assets/doc/fcr_usaha.rtf");

            // isi dokumen dinyatakan dalam bentuk string
            $document = str_replace("?kondisi_fisik_kantor", $data->kondisi_fisik_kantor, $document);
            $document = str_replace("?luas_tanah_kantor", $data->luas_tanah_kantor, $document);
            $document = str_replace("?luas_bangunan_kantor", $data->luas_bangunan_kantor, $document);
            $document = str_replace("?fasilitas_kantor", $data->fasilitas_kantor, $document);
            $document = str_replace("?lokasi_kantor", $data->lokasi_kantor, $document);
            $document = str_replace("?kondisi_fisik_workshop", $data->kondisi_fisik_workshop, $document);
            $document = str_replace("?luas_tanah_workshop", $data->luas_tanah_workshop, $document);
            $document = str_replace("?luas_bangunan_workshop", $data->luas_bangunan_workshop, $document);
            $document = str_replace("?fasilitas_workshop", $data->fasilitas_workshop, $document);
            $document = str_replace("?lokasi_workshop", $data->lokasi_workshop, $document);
            $document = str_replace("?fungsi_mesin_utama", $data->fungsi_mesin_utama, $document);
            $document = str_replace("?fungsi_mesin_penunjang", $data->fungsi_mesin_penunjang, $document);
            $document = str_replace("?kondisi", $data->kondisi, $document);
            $document = str_replace("?kapasitas_mesin", $data->kapasitas_mesin, $document);
            $document = str_replace("?peralatan_utama", $data->peralatan_utama, $document);
            $document = str_replace("?peralatan_penunjang", $data->peralatan_penunjang, $document);
            $document = str_replace("?kondisi_merk", $data->kondisi_merk, $document);
            $document = str_replace("?lainnya", $data->lainnya, $document);
            $document = str_replace("?fungsi_aab", $data->fungsi_aab, $document);
            $document = str_replace("?merk_aab", $data->merk_aab, $document);
            $document = str_replace("?kondisi_aab", $data->kondisi_aab, $document);
            $document = str_replace("?lain_lain_aab", $data->lain_lain_aab, $document);
            $document = str_replace("?fungsi_kend", $data->fungsi_kend, $document);
            $document = str_replace("?merk_kend", $data->merk_kend, $document);
            $document = str_replace("?kondisi_kend", $data->kondisi_kend, $document);
            $document = str_replace("?lain_lain_kend", $data->lain_lain_kend, $document);
            $document = str_replace("?lokasi", $data->lokasi, $document);
            $document = str_replace("?luas_lokasi", $data->luas_lokasi, $document);
            $document = str_replace("?kondisi_fisik", $data->kondisi_fisik, $document);
            $document = str_replace("?bahan_baku", $data->bahan_baku, $document);
            $document = str_replace("?bahan_setengah_jadi", $data->bahan_setengah_jadi, $document);
            $document = str_replace("?persediaan_material", $data->persediaan_material, $document);

            $document = str_replace("?nama_unit", $nama_unit ? $nama_unit : '?nama_unit', $document);
            $document = str_replace("?pemasar", $data_entry->pemasar, $document);
            $document = str_replace("?koordinator_pemasar", $data_entry->koordinator_pemasar, $document);
            $document = str_replace("?tanggal_cetak", $tanggal_fcr, $document);

            $nama_file = 'FCR Usaha ' . $data_entry->nama_debitur . ' ' . gmdate("d-m-Y H:i:s", time() + 60 * 60 * 8);
            header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            header("Content-disposition: attachment; filename=$nama_file.docx");
            header("Content-length: " . strlen($document));

            // Tampilkan isi dokumen untuk di-download
            echo $document;
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('pengajuan-kredit-transaksional') . '">Klik untuk kembali</a>';
        }
    }
    public function generate_dokumen_ceklis($kd_data, $id_dok)
    {
        $ada_data_entry = $this->db->query("SELECT * FROM tb_data_entry where SHA1(kd_data) = '" . $kd_data . "' ");

        if ($ada_data_entry->getNumRows() > 0) {
            $data_entry = $ada_data_entry->getRow();
            // $this->debug($data->kondisi_fisik_kantor);
            $tb_dokumen = $this->db->query("SELECT jenis_badan_usaha FROM tb_dokumen where SHA1(kd_data) = '" . $kd_data . "' ");
            $tb_dokumen_cv = $this->db->query("SELECT jenis_badan_usaha FROM tb_dokumen_cv where SHA1(kd_data) = '" . $kd_data . "' ");
            $tb_dokumen_pt = $this->db->query("SELECT jenis_badan_usaha FROM tb_dokumen_pt where SHA1(kd_data) = '" . $kd_data . "' ");
            if (!empty($tb_dokumen->getRow()->jenis_badan_usaha)) {
                $jenis_badan_usaha = $tb_dokumen->getRow()->jenis_badan_usaha;
            } else if (!empty($tb_dokumen_cv->getRow()->jenis_badan_usaha)) {
                $jenis_badan_usaha = $tb_dokumen_cv->getRow()->jenis_badan_usaha;
            } else if (!empty($tb_dokumen_pt->getRow()->jenis_badan_usaha)) {
                $jenis_badan_usaha = $tb_dokumen_pt->getRow()->jenis_badan_usaha;
            } else {
                $jenis_badan_usaha = '?jenis_badan_usaha';
            }
            // $nomor = $data->nomor; //
            $tanggal = $this->atur_tanggal(date('d-m-Y')); //

            // memanggil dan membaca template dokumen yang telah kita buat
            $document = file_get_contents(ROOTPATH . "public/assets/doc/dokumen_ceklis.rtf");

            // isi dokumen dinyatakan dalam bentuk string
            $document = str_replace("?nama_debitur", $data_entry->nama_debitur, $document);
            $document = str_replace("?alamat_kantor", $data_entry->alamat_kantor, $document);
            $document = str_replace("?bidang_usaha", $data_entry->bidang_usaha, $document);
            $document = str_replace("?jenis_badan_usaha", $jenis_badan_usaha, $document);
            $document = str_replace("?tanggal", $tanggal, $document);
            $document = str_replace("?pemasar", $data_entry->pemasar, $document);

            $nama_file = 'Dokumen Checklist ' . $data_entry->nama_debitur . ' ' . gmdate("d-m-Y H:i:s", time() + 60 * 60 * 8);
            header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            header("Content-disposition: attachment; filename=$nama_file.docx");
            header("Content-length: " . strlen($document));

            // Tampilkan isi dokumen untuk di-download
            echo $document;
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('pengajuan-kredit-transaksional') . '">Klik untuk kembali</a>';
        }
    }
    public function generate_fkk($kd_data, $id_dok)
    {
        $ada_data_entry = $this->db->query("SELECT * FROM tb_data_entry where SHA1(kd_data) = '" . $kd_data . "' ");
        $ada_data_master = $this->db->query("SELECT * FROM tb_data_master where SHA1(kd_data) = '" . $kd_data . "' ");
        $kirim = $this->db->query("SELECT * FROM tb_kirim where SHA1(kd_data) = '" . $kd_data . "' ");

        if ($ada_data_entry->getNumRows() > 0 && $ada_data_master->getNumRows() > 0 && $kirim->getNumRows() > 0) {
            $data_entry = $ada_data_entry->getRow();
            // $this->debug($data->kondisi_fisik_kantor);
            $data_master = $ada_data_master->getRow();

            $ada_nama_unit = $this->db->query("SELECT nama_unit FROM tb_unit_kerja where kd_unit = '" . $data_master->kd_unit_kerja . "' ");
            if ($ada_nama_unit->getNumRows() > 0) {
                $nama_unit = $ada_nama_unit->getRow()->nama_unit;
            }
            $hari = !empty(date('Y-m-d')) ? $this->getHariIndonesia(date('Y-m-d')) : '?hari'; //
            $tanggal = !empty(date('Y-m-d')) ? $this->atur_tanggal(date('Y-m-d')) : date('Y-m-d'); //

            // memanggil dan membaca template dokumen yang telah kita buat
            $document = file_get_contents(ROOTPATH . "public/assets/doc/fkk.rtf");

            // isi dokumen dinyatakan dalam bentuk string
            $document = str_replace("?nama_debitur", $data_entry->nama_debitur, $document);
            $document = str_replace("?hari", $hari, $document);
            $document = str_replace("?tanggal", $tanggal, $document);
            $document = str_replace("?pemasar", $data_entry->pemasar, $document);
            $document = str_replace("?koordinator_pemasar", $data_entry->koordinator_pemasar, $document);
            $document = str_replace("?kepala_cabang", $data_entry->kepala_cabang, $document);
            $document = str_replace("?kepala_bagian", $data_entry->kepala_bagian, $document);
            $document = str_replace("?kepala_divisi", $data_entry->kepala_divisi, $document);
            $document = str_replace("?relation_manager", '?relation_manager', $document);

            $document = str_replace("?rekomendasi_pemasar", $kirim->getRow()->rekomendasi_pemasar, $document);
            $document = str_replace("?rekomendasi_koor", $kirim->getRow()->rekomendasi_koor, $document);
            $document = str_replace("?rekomendasi_kacab", $kirim->getRow()->rekomendasi_kacab, $document);
            $document = str_replace("?rekomendasi_analis", $kirim->getRow()->rekomendasi_analis, $document);
            $document = str_replace("?rekomendasi_kabag", $kirim->getRow()->rekomendasi_kabag, $document);
            $document = str_replace("?rekomendasi_kadiv", $kirim->getRow()->rekomendasi_kadiv, $document);

            $nama_file = 'FKK ' . $data_entry->nama_debitur . ' ' . gmdate("d-m-Y H:i:s", time() + 60 * 60 * 8);
            header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            header("Content-disposition: attachment; filename=$nama_file.docx");
            header("Content-length: " . strlen($document));

            // Tampilkan isi dokumen untuk di-download
            echo $document;
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('pengajuan-kredit-transaksional') . '">Klik untuk kembali</a>';
        }
    }
    public function generate_mkk($kd_data, $id_dok)
    {
        $ada_data_entry = $this->db->query("SELECT * FROM tb_data_entry where SHA1(kd_data) = '" . $kd_data . "' ");
        $ada_data_master = $this->db->query("SELECT * FROM tb_data_master where SHA1(kd_data) = '" . $kd_data . "' ");

        if ($ada_data_entry->getNumRows() > 0 && $ada_data_master->getNumRows() > 0) {
            $data_entry = $ada_data_entry->getRow();
            // $this->debug($data->kondisi_fisik_kantor);
            $data_master = $ada_data_master->getRow();

            $ada_nama_unit = $this->db->query("SELECT nama_unit FROM tb_unit_kerja where kd_unit = '" . $data_master->kd_unit_kerja . "' ");
            $nama_unit = !empty($ada_nama_unit->getRow()->nama_unit) ? $ada_nama_unit->getRow()->nama_unit : '?nama_unit';
            $tanggal = !empty(date('Y-m-d')) ? $this->atur_tanggal(date('Y-m-d')) : date('Y-m-d'); //
            $plafond = !empty($data_entry->plafond) ? $this->formatting_angka($data_entry->plafond, 2) : $data_entry->plafond;

            // memanggil dan membaca template dokumen yang telah kita buat
            $document = file_get_contents(ROOTPATH . "public/assets/doc/mkk.rtf");

            // isi dokumen dinyatakan dalam bentuk string
            $document = str_replace("?nama_unit", $nama_unit, $document);
            $document = str_replace("?nama_debitur", $data_entry->nama_debitur, $document);
            $document = str_replace("?key_person", $data_entry->key_person, $document);
            $document = str_replace("?group_usaha", $data_entry->group_debitur, $document);
            $document = str_replace("?alamat_kantor", $data_entry->alamat_kantor, $document);
            $document = str_replace("?bidang_usaha", $data_entry->bidang_usaha, $document);
            $document = str_replace("?plafond", $plafond, $document);
            $document = str_replace("?tujuan_pengajuan", $data_entry->tujuan_pengajuan, $document);
            $document = str_replace("?tanggal", $tanggal, $document);
            $document = str_replace("?kepala_cabang", $data_entry->kepala_cabang, $document);

            $nama_file = 'MKK ' . $data_entry->nama_debitur . ' ' . gmdate("d-m-Y H:i:s", time() + 60 * 60 * 8);
            header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            header("Content-disposition: attachment; filename=$nama_file.docx");
            header("Content-length: " . strlen($document));

            // Tampilkan isi dokumen untuk di-download
            echo $document;
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('pengajuan-kredit-transaksional') . '">Klik untuk kembali</a>';
        }
    }
    public function formatting_angka($angka, $jumlah)
    {
        if (!empty($angka)) {
            return number_format($angka, $jumlah, ',', '.');
        } else {
            return $angka;
        }
    }
    public function getHariIndonesia($tanggal)
    {
        // Array hari dalam bahasa Indonesia
        $namaHari = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];

        // Mengubah format tanggal menjadi nama hari
        $hariInggris = date('l', strtotime($tanggal));

        // Mengembalikan nama hari dalam bahasa Indonesia
        return $namaHari[$hariInggris];
    }
    public function cek_kosong($input)
    {
        if (!empty($input)) {
            return $input;
        } else {
            return '';
        }
    }
    public function atur_tanggal($input)
    {
        if (!empty($input)) {
            $tanggal = date('d-m-Y', strtotime($input));
            return $tanggal;
        } else {
            return $input;
        }
    }
    public function nama_unit($kd_unit)
    {
        if (!empty($kd_unit)) {
            $cek_unit = $this->db->query("SELECT nama_unit FROM tb_unit_kerja where kd_unit = '" . $kd_unit . "' ");
            if ($cek_unit->getNumRows() > 0) {
                $nama_unit = $cek_unit->getRow()->nama_unit;
            } else {
                $nama_unit = $kd_unit;
            }
            return $nama_unit;
        } else {
            return $kd_unit;
        }
    }
    public function pisah_koma($input)
    {
        if (!empty($input)) {
            $array = explode(";", $input);
            // var_dump($array); die;
            return $array;
        } else {
            return $input;
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


    public function edit_fak_data()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Proses penyimpanan data
        $hasil = $this->data_fak_data($hasil);
        // $hasil = $this->data_fak_modal($hasil);
        // $hasil = $this->data_fak_rl($hasil);
        // $hasil = $this->data_lap_rl($hasil);
        // $hasil = $this->data_ceftb($hasil);
        // $hasil = $this->data_mauk($hasil);
        // $hasil = $this->data_dcl($hasil);
        // $hasil = $this->data_faa($hasil);
        echo json_encode($hasil);
    }
    public function edit_fak_modal()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Proses penyimpanan data
        $hasil = $this->data_fak_modal($hasil);
        echo json_encode($hasil);
    }

    public function edit_fak_rl()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Proses penyimpanan data
        $hasil = $this->data_fak_rl($hasil);
        echo json_encode($hasil);
    }

    public function edit_lap_rl()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Proses penyimpanan data
        $hasil = $this->data_lap_rl($hasil);
        echo json_encode($hasil);
    }

    public function edit_ceftb()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Proses penyimpanan data
        $hasil = $this->data_ceftb($hasil);
        echo json_encode($hasil);
    }

    public function edit_faa()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Proses penyimpanan data
        $hasil = $this->data_faa($hasil);
        echo json_encode($hasil);
    }
    public function edit_mauk()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Proses penyimpanan data
        $hasil = $this->data_mauk($hasil);
        echo json_encode($hasil);
    }
    public function edit_dcl()
    {
        $hasil = [
            'status' => 'error',
            'message' => 'gagal input data'
        ];
        // Proses penyimpanan data
        $hasil = $this->data_dcl($hasil);
        echo json_encode($hasil);
    }

    public function data_fak_data($hasil)
    {
        $data = [
            'kegiatan' => $this->request->getPost("kegiatan_fak_data"),
            'pekerjaan' => $this->request->getPost("pekerjaan_fak_data"),
            'no_kontrak' => $this->request->getPost("no_kontrak_fak_data"),
            'lokasi' => $this->request->getPost("lokasi_fak_data"),
            'kontraktor' => $this->request->getPost("kontraktor_fak_data"),
            'sumber_dana' => $this->request->getPost("sumber_dana_fak_data"),
            'nilai_kontrak_setelah_ppn' => $this->request->getPost("nilai_kontrak_setelah_ppn_fak_data"),
            'ppn' => $this->request->getPost("ppn_fak_data"),
            'pph' => $this->request->getPost("pph_fak_data"),
            'tgl_kontrak' => $this->request->getPost("tgl_kontrak_fak_data"),
            'tgl_pelaksanaan' => $this->request->getPost("tgl_pelaksanaan_fak_data"),
            'lama_pelaksanaan' => $this->request->getPost("lama_pelaksanaan_fak_data"),
            'lama_pemeliharaan' => $this->request->getPost("lama_pemeliharaan_fak_data"),
            'tgl_pencairan' => $this->request->getPost("tgl_pencairan_fak_data"),
            'persen_uang_muka' => $this->request->getPost("persen_uang_muka_fak_data"),
            'bunga_kredit' => $this->request->getPost("bunga_kredit_fak_data"),
            'profit_kontraktor' => $this->request->getPost("profit_kontraktor_fak_data"),
            'biaya_pemeliharaan' => $this->request->getPost("biaya_pemeliharaan_fak_data"),
            'biaya_provisi' => $this->request->getPost("biaya_provisi_fak_data"),
            'item_pp' => $this->request->getPost("item_pp_fak_data"),
            'ppn_pp' => $this->request->getPost("ppn_pp_fak_data"),
            'nilai_sebelum_ppn_pp' => $this->request->getPost("nilai_sebelum_ppn_pp_fak_data"),
            'nilai_sesudah_ppn_pp' => $this->request->getPost("nilai_sesudah_ppn_pp_fak_data"),
            'pembulatan_nilai_sebelum_ppn_total_pp' => $this->request->getPost(
                "pembulatan_nilai_sebelum_ppn_total_pp_fak_data"
            ),
            'pembulatan_nilai_sesudah_ppn_total_pp' => $this->request->getPost(
                "pembulatan_nilai_sesudah_ppn_total_pp_fak_data"
            ),
            'jumlah_nilai_sebelum_ppn_total_pp' => $this->request->getPost(
                "jumlah_nilai_sebelum_ppn_total_pp_fak_data"
            ),
            'jumlah_nilai_sesudah_ppn_total_pp' => $this->request->getPost(
                "jumlah_nilai_sesudah_ppn_total_pp_fak_data"
            ),
            'gaji_direktur' => $this->request->getPost("gaji_direktur_fak_data"),
            'gaji_pengawas' => $this->request->getPost("gaji_pengawas_fak_data"),
            'gaji_staf' => $this->request->getPost("gaji_staf_fak_data"),
            'biaya_umum' => $this->request->getPost("biaya_umum_fak_data"),
            'termijn' => $this->request->getPost("termijn_fak_data"),
            'progress_termijn' => $this->request->getPost("progress_termijn_fak_data"),
            'persentase_termijn' => $this->request->getPost("persentase_termijn_fak_data"),
            'prakiraan_tgl_termijn' => $this->request->getPost("prakiraan_tgl_termijn_fak_data"),
            'setelah_masa_pemeliharaan_termijn' => $this->request->getPost("setelah_masa_pemeliharaan_fak_data"),
            'total_termijn' => $this->request->getPost("total_termijn_fak_data"),
            'jumlah_termijn' => $this->request->getPost("jumlah_termijn_fak_data"),

            'pengubah' => session()->get('nama_user'),
            'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];
        // var_dump($data);
        // die;

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fak_data where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_fak_data')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit FAK Data berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit FAK Data gagal'
            ];
        }
        return $hasil;
    }
    public function data_fak_modal($hasil)
    {
        $data = [
            'proyek_fak_modal' => $this->request->getPost("proyek_fak_modal"),
            'profit_fak_modal' => $this->request->getPost("profit_fak_modal"),
            'ppn_fak_modal' => $this->request->getPost("ppn_fak_modal"),
            'pemeliharaan_fak_modal' => $this->request->getPost("pemeliharaan_fak_modal"),
            'persentase_proyek_fak_modal' => $this->request->getPost("persentase_proyek_fak_modal"),
            'nilai_proyek_fak_modal' => $this->request->getPost("nilai_proyek_fak_modal"),
            'item_pp_fak_modal' => $this->request->getPost("item_pp_fak_modal"),
            'nilai_pp_fak_modal' => $this->request->getPost("nilai_pp_fak_modal"),
            'koreksi_biaya_fak_modal' => $this->request->getPost("koreksi_biaya_fak_modal"),
            'jumlah_fak_modal' => $this->request->getPost("jumlah_fak_modal"),
            'gaji_direktur_fak_modal' => $this->request->getPost("gaji_direktur_fak_modal"),
            'gaji_pengawas_fak_modal' => $this->request->getPost("gaji_pengawas_fak_modal"),
            'gaji_staf_fak_modal' => $this->request->getPost("gaji_staf_fak_modal"),
            'biaya_umum_fak_modal' => $this->request->getPost("biaya_umum_fak_modal"),
            'total_biaya_umum_fak_modal' => $this->request->getPost("total_biaya_umum_fak_modal"),
            'jumlah_total_biaya_umum_fak_modal' => $this->request->getPost("jumlah_total_biaya_umum_fak_modal"),
            'persentase_pekerjaan_fak_modal' => $this->request->getPost("persentase_pekerjaan_fak_modal"),
            'persiapan_pekerjaan_fak_modal' => $this->request->getPost("persiapan_pekerjaan_fak_modal"),
            'biaya_umum_adm_fak_modal' => $this->request->getPost("biaya_umum_adm_fak_modal"),
            'jumlah_kebutuhan_modal_kerja_fak_modal' => $this->request->getPost("jumlah_kebutuhan_modal_kerja_fak_modal"),
            'penerimaan_uang_muka_fak_modal' => $this->request->getPost("penerimaan_uang_muka_fak_modal"),
            'jumlah_penerimaan_uang_muka_fak_modal' => $this->request->getPost("jumlah_penerimaan_uang_muka_fak_modal"),
            'persentase_penerimaan_uang_muka_fak_modal' => $this->request->getPost("persentase_penerimaan_uang_muka_fak_modal"),
            'pembiayaan_sendiri_fak_modal' => $this->request->getPost("pembiayaan_sendiri_fak_modal"),
            'jumlah_pembiayaan_sendiri_fak_modal' => $this->request->getPost("jumlah_pembiayaan_sendiri_fak_modal"),
            'persentase_pembiayaan_sendiri_fak_modal' => $this->request->getPost("persentase_pembiayaan_sendiri_fak_modal"),
            'kredit_bank_fak_modal' => $this->request->getPost("kredit_bank_fak_modal"),
            'jumlah_kredit_bank_fak_modal' => $this->request->getPost("jumlah_kredit_bank_fak_modal"),
            'persentase_kredit_bank_fak_modal' => $this->request->getPost("persentase_kredit_bank_fak_modal"),
            'sumber_pembiayaan_fak_modal' => $this->request->getPost("sumber_pembiayaan_fak_modal"),
            'jumlah_bulat_sumber_pembiayaan_fak_modal' => $this->request->getPost("jumlah_bulat_sumber_pembiayaan_fak_modal"),
            'persentase_jumlah_sumber_pembiayaan_fak_modal' => $this->request->getPost("persentase_jumlah_sumber_pembiayaan_fak_modal"),

            'pengubah' => session()->get('nama_user'),
            'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];
        // var_dump($data);
        // die;

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fak_modal where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_fak_modal')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit FAK Modal berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit FAK Modal gagal'
            ];
        }
        return $hasil;
    }
    public function data_mauk($hasil)
    {
        $data = [
            'nama_nasabah_mauk' => $this->request->getPost("nama_nasabah_mauk"),
            'npwp_mauk' => $this->request->getPost("npwp_mauk"),
            'direktur_mauk' => $this->request->getPost("direktur_mauk"),
            'key_person_mauk' => $this->request->getPost("key_person_mauk"),
            'alamat_kantor_mauk' => $this->request->getPost("alamat_kantor_mauk"),
            'klasifikasi_mauk' => $this->request->getPost("klasifikasi_mauk"),
            'bidang_usaha_mauk' => $this->request->getPost("bidang_usaha_mauk"),
            'jenis_fasilitas_mauk' => $this->request->getPost("jenis_fasilitas_mauk"),
            'bentuk_fasilitas_mauk' => $this->request->getPost("bentuk_fasilitas_mauk"),
            'maksimum_fasilitas_mauk' => $this->request->getPost("maksimum_fasilitas_mauk"),
            'plafond_fasilitas_mauk' => $this->request->getPost("plafond_fasilitas_mauk"),
            'jangka_waktu_mauk' => $this->request->getPost("jangka_waktu_mauk"),
            'tujuan_penggunaan_mauk' => $this->request->getPost("tujuan_penggunaan_mauk"),
            'pemilik_perseroan_mauk' => $this->request->getPost("pemilik_perseroan_mauk"),
            'pemilikan_saham_permodalan_mauk' => $this->request->getPost("pemilikan_saham_permodalan_mauk"),
            'kewenangan_direksi_mauk' => $this->request->getPost("kewenangan_direksi_mauk"),
            'informasi_riwayat_perbankan_mauk' => $this->request->getPost("informasi_riwayat_perbankan_mauk"),
            'legalitas_pendirian_usaha_mauk' => $this->request->getPost("legalitas_pendirian_usaha_mauk"),
            'legalitas_perizinan_usaha_mauk' => $this->request->getPost("legalitas_perizinan_usaha_mauk"),
            'legalitas_pelaksanaan_proyek_mauk' => $this->request->getPost("legalitas_pelaksanaan_proyek_mauk"),
            'legalitas_personal_pemohon_pemilik_agunan_mauk' => $this->request->getPost("legalitas_personal_pemohon_pemilik_agunan_mauk"),
            'kesimpulan_analisa_aspek_legalitas_mauk' => $this->request->getPost("kesimpulan_analisa_aspek_legalitas_mauk"),
            'analisa_aspek_manajemen_mauk' => $this->request->getPost("analisa_aspek_manajemen_mauk"),
            'analisa_aspek_teknis_mauk' => $this->request->getPost("analisa_aspek_teknis_mauk"),
            'analisa_aspek_pemasaran_mauk' => $this->request->getPost("analisa_aspek_pemasaran_mauk"),
            'analisa_aspek_keuangan_mauk' => $this->request->getPost("analisa_aspek_keuangan_mauk"),
            'perhitungan_kebutuhan_kredit_mauk' => $this->request->getPost("perhitungan_kebutuhan_kredit_mauk"),
            'kesimpulan_jaminan_agunan_mauk' => $this->request->getPost("kesimpulan_jaminan_agunan_mauk"),
            'jenis_kredit_fasilitas_usul_mauk' => $this->request->getPost("jenis_kredit_fasilitas_usul_mauk"),
            'max_kredit_ini_usul_mauk' => $this->request->getPost("max_kredit_ini_usul_mauk"),
            'perubahan_usul_mauk' => $this->request->getPost("perubahan_usul_mauk"),
            'max_kredit_usul_mauk' => $this->request->getPost("max_kredit_usul_mauk"),
            'jenis_kredit_fasilitas_pal_mauk' => $this->request->getPost("jenis_kredit_fasilitas_pal_mauk"),
            'max_kredit_ini_pal_mauk' => $this->request->getPost("max_kredit_ini_pal_mauk"),
            'perubahan_pal_mauk' => $this->request->getPost("perubahan_pal_mauk"),
            'max_kredit_pal_mauk' => $this->request->getPost("max_kredit_pal_mauk"),
            'jenis_macam_fasilitas_mauk' => $this->request->getPost("jenis_macam_fasilitas_mauk"),
            'maksimum_kredit_mauk' => $this->request->getPost("maksimum_kredit_mauk"),
            'plafond_kredit_mauk' => $this->request->getPost("plafond_kredit_mauk"),
            'kriteria_usaha_mauk' => $this->request->getPost("kriteria_usaha_mauk"),
            'pendanaan_sendiri_mauk' => $this->request->getPost("pendanaan_sendiri_mauk"),
            'kesimpulan_tujuan_penggunaan_mauk' => $this->request->getPost("kesimpulan_tujuan_penggunaan_mauk"),
            'kesimpulan_jangka_waktu_mauk' => $this->request->getPost("kesimpulan_jangka_waktu_mauk"),
            'cara_penarikan_mauk' => $this->request->getPost("cara_penarikan_mauk"),
            'pelunasan_angsuran_mauk' => $this->request->getPost("pelunasan_angsuran_mauk"),
            'bunga_mauk' => $this->request->getPost("bunga_mauk"),
            'provisi_fee_mauk' => $this->request->getPost("provisi_fee_mauk"),
            'hitung_provisi_fee_mauk' => $this->request->getPost("hitung_provisi_fee_mauk"),
            'akad_kredit_mauk' => $this->request->getPost("akad_kredit_mauk"),
            'agunan_mauk' => $this->request->getPost("agunan_mauk"),
            'macam_jenis_mauk' => $this->request->getPost("macam_jenis_mauk"),
            'nilai_agunan_mauk' => $this->request->getPost("nilai_agunan_mauk"),
            'bentuk_pengikatan_mauk' => $this->request->getPost("bentuk_pengikatan_mauk"),
            'dokumentasi_kredit_mauk' => $this->request->getPost("dokumentasi_kredit_mauk"),
            'pengikatan_agunan_mauk' => $this->request->getPost("pengikatan_agunan_mauk"),
            'asuransi_kredit_mauk' => $this->request->getPost("asuransi_kredit_mauk"),
            'asuransi_agunan_mauk' => $this->request->getPost("asuransi_agunan_mauk"),
            'syarat_ttd_pk_mauk' => $this->request->getPost("syarat_ttd_pk_mauk"),
            'syarat_realisasi_penarikan_mauk' => $this->request->getPost("syarat_realisasi_penarikan_mauk"),
            'affirmatives_mauk' => $this->request->getPost("affirmatives_mauk"),
            'negatives_mauk' => $this->request->getPost("negatives_mauk"),
            'syarat_lain_mauk' => $this->request->getPost("syarat_lain_mauk"),

            'pengubah' => session()->get('nama_user'),
            'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];
        // var_dump($data);
        // die;

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_mauk where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_mauk')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit MAUK berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit MAUK gagal'
            ];
        }
        return $hasil;
    }
    public function data_faa($hasil)
    {
        $data = [
            'nama_nasabah_bb' => $this->request->getPost("namanasabahbb"),
            'jenis_dokumen_bb' => $this->request->getPost("jenis_dokumen_bb"),
            'alamat_bb' => $this->request->getPost("alamat_bb"),
            'jenis_bb' => $this->request->getPost("jenis_bb"),
            'model_tipe_bb' => $this->request->getPost("model_tipe_bb"),
            'merek_cc_bb' => $this->request->getPost("merek_cc_bb"),
            'tahun_pembuatan_bb' => $this->request->getPost("tahun_pembuatan_bb"),
            'serial_number_bb' => $this->request->getPost("serial_number_bb"),
            'nomor_mesin_bb' => $this->request->getPost("nomor_mesin_bb"),
            'warna_bb' => $this->request->getPost("warna_bb"),
            'bahan_bakar_bb' => $this->request->getPost("bahan_bakar_bb"),
            'kondisi_keadaan_bb' => $this->request->getPost("kondisi_keadaan_bb"),
            'nomor_polisi_bb' => $this->request->getPost("nomor_polisi_bb"),
            'bukti_kepemilikan_agb_bb' => $this->request->getPost("bukti_kepemilikan_agb_bb"),
            'invoice_no_bb' => $this->request->getPost("invoice_no_bb"),
            'invoice_tanggal_bb' => $this->request->getPost("invoice_tanggal_bb"),
            'perubahan_hak_terakhir_bb' => $this->request->getPost("perubahan_hak_terakhir_bb"),
            'tercatat_atas_nama_bb' => $this->request->getPost("tercatat_atas_nama_bb"),
            'alamat_pemilik_saat_ini_bb' => $this->request->getPost("alamat_pemilik_saat_ini_bb"),
            'umur_teknis_bb' => $this->request->getPost("umur_teknis_bb"),
            'perkiraan_umur_ekonomis_bb' => $this->request->getPost("perkiraan_umur_ekonomis_bb"),
            'tempat_penyimpanan_bb' => $this->request->getPost("tempat_penyimpanan_bb"),
            'route_bb' => $this->request->getPost("route_bb"),
            'jarak_rata_rata_tempuh_bb' => $this->request->getPost("jarak_rata_rata_tempuh_bb"),
            'nama_nasabah_faa_tb' => $this->request->getPost("nama_nasabah_faa_tb"),
            'nomor_shm_faa_tb' => $this->request->getPost("nomor_shm_faa_tb"),
            'tanggal_shm_faa_tb' => $this->request->getPost("tanggal_shm_faa_tb"),
            'nama_pemilik_shm_faa_tb' => $this->request->getPost("nama_pemilik_shm_faa_tb"),
            'alamat_agunan_faa_tb' => $this->request->getPost("alamat_agunan_faa_tb"),
            'harga_pasar_tanah_faa_tb' => $this->request->getPost("harga_pasar_tanah_faa_tb"),
            'harga_buku_tanah_faa_tb' => $this->request->getPost("harga_buku_tanah_faa_tb"),
            'harga_menurut_pejabat_bank_tanah_faa_tb' => $this->request->getPost("harga_menurut_pejabat_bank_tanah_faa_tb"),
            'harga_tanah_tanah_faa_tb' => $this->request->getPost("harga_tanah_tanah_faa_tb"),
            'luas_persegi_tanah_tanah_faa_tb' => $this->request->getPost("luas_persegi_tanah_tanah_faa_tb"),
            'hasil_perhitungan_penilaian_tanah_faa_tb' => $this->request->getPost("hasil_perhitungan_penilaian_tanah_faa_tb"),

            'pengubah' => session()->get('nama_user'),
            'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data_tambah');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_faa where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_faa')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit FAA berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit FAA gagal'
            ];
        }
        return $hasil;
    }
    public function data_fak_rl($hasil)
    {
        $data = [
            'nilai_kontrak_fak_rl' => $this->request->getPost("nilai_kontrak_fak_rl"),
            'pekerjaan_persiapan_konstruksi_fak_rl' => $this->request->getPost("pekerjaan_persiapan_konstruksi_fak_rl"),
            'laba_kotor_fak_rl' => $this->request->getPost("laba_kotor_fak_rl"),
            'biaya_umum_adm_fak_rl' => $this->request->getPost("biaya_umum_adm_fak_rl"),
            'laba_usaha_fak_rl' => $this->request->getPost("laba_usaha_fak_rl"),
            'bunga_provisi_bank_fak_rl' => $this->request->getPost("bunga_provisi_bank_fak_rl"),
            'laba_sebelum_pajak_fak_rl' => $this->request->getPost("laba_sebelum_pajak_fak_rl"),
            'pajak_pph_ppn_fak_rl' => $this->request->getPost("pajak_pph_ppn_fak_rl"),
            'laba_bersih_fak_rl' => $this->request->getPost("laba_bersih_fak_rl"),
            'gross_profit_margin_fak_rl' => $this->request->getPost("gross_profit_margin_fak_rl"),
            'gross_operating_margin_fak_rl' => $this->request->getPost("gross_operating_margin_fak_rl"),
            'return_of_sale_fak_rl' => $this->request->getPost("return_of_sale_fak_rl"),
            'return_of_equity_fak_rl' => $this->request->getPost("return_of_equity_fak_rl"),
            'harga_borongan_fak_rl' => $this->request->getPost("harga_borongan_fak_rl"),
            'persentase_penerimaan_uang_muka_fak_rl' => $this->request->getPost("persentase_penerimaan_uang_muka_fak_rl"),
            'penerimaan_uang_muka_fak_rl' => $this->request->getPost("penerimaan_uang_muka_fak_rl"),
            'persentase_penerimaan_termijn_fak_rl' => $this->request->getPost("persentase_penerimaan_termijn_fak_rl"),
            'penerimaan_termijn_fak_rl' => $this->request->getPost("penerimaan_termijn_fak_rl"),
            'persentase_penerimaan_termijn_pemeliharaan_fak_rl' => $this->request->getPost("persentase_penerimaan_termijn_pemeliharaan_fak_rl"),
            'penerimaan_termijn_pemeliharaan_fak_rl' => $this->request->getPost("penerimaan_termijn_pemeliharaan_fak_rl"),
            'persentase_penerimaan_bersih_fak_rl' => $this->request->getPost("persentase_penerimaan_bersih_fak_rl"),
            'penerimaan_bersih_fak_rl' => $this->request->getPost("penerimaan_bersih_fak_rl"),
            'pajak_ppn_pph_fak_rl' => $this->request->getPost("pajak_ppn_pph_fak_rl"),
            'kosong_bersih_fak_rl' => $this->request->getPost("kosong_bersih_fak_rl"),
            'kredit_bank_fak_rl' => $this->request->getPost("kredit_bank_fak_rl"),
            'persentase_pemotongan_kredit_bank_fak_rl' => $this->request->getPost("persentase_pemotongan_kredit_bank_fak_rl"),
            'dibulatkan_fak_rl' => $this->request->getPost("dibulatkan_fak_rl"),

            'pengubah' => session()->get('nama_user'),
            'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];
        // var_dump($data);
        // die;

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_fak_rl where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_fak_rl')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit FAK RL berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit FAK RL gagal'
            ];
        }
        return $hasil;
    }

    public function data_lap_rl($hasil)
    {
        $kd_data = $this->request->getPost('kd_data');

        $laporan_rugi_laba_upload_lap_rl = $this->validateFile('laporan_rugi_laba_upload_lap_rl', 'Laporan Laba Rugi', 'laporan_rugi_laba_upload_lap_rl', 'tb_lap_rl', $kd_data);
        if ($laporan_rugi_laba_upload_lap_rl['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $laporan_rugi_laba_upload_lap_rl['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $neraca_upload_lap_rl = $this->validateFile('neraca_upload_lap_rl', 'Laporan Neraca', 'neraca_upload_lap_rl', 'tb_lap_rl', $kd_data);
        if ($neraca_upload_lap_rl['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $neraca_upload_lap_rl['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $depresiasi_upload_lap_rl = $this->validateFile('depresiasi_upload_lap_rl', 'Laporan Depresiasi', 'depresiasi_upload_lap_rl', 'tb_lap_rl', $kd_data);
        if ($depresiasi_upload_lap_rl['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $depresiasi_upload_lap_rl['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $rasio_lap_keuangan_upload_lap_rl = $this->validateFile('rasio_lap_keuangan_upload_lap_rl', 'Laporan Laba Rugi', 'rasio_lap_keuangan_upload_lap_rl', 'tb_lap_rl', $kd_data);
        if ($rasio_lap_keuangan_upload_lap_rl['status'] == 'error') {
            $hasil = [
                'status' => 'error',
                'message' => $rasio_lap_keuangan_upload_lap_rl['message']
            ];
            echo json_encode($hasil);
            exit;
        }
        $data = [
            'laporan_rugi_laba_upload_lap_rl' => $laporan_rugi_laba_upload_lap_rl['message'],
            'neraca_upload_lap_rl' => $neraca_upload_lap_rl['message'],
            'depresiasi_upload_lap_rl' => $depresiasi_upload_lap_rl['message'],
            'rasio_lap_keuangan_upload_lap_rl' => $rasio_lap_keuangan_upload_lap_rl['message']
        ];
        // var_dump($data);
        // die;

        //pengecekan kd info tidak boleh sama sebelum insert
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_lap_rl where kd_data = '" . $kd_data . "' ")->getNumRows();
        // var_dump($kd_data);
        if ($cek_kd_data > 0) {
            $this->db->table('tb_lap_rl')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit Laporan Proyeksi Laba Rugi berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit Laporan Proyeksi Laba Rugi gagal'
            ];
        }
        return $hasil;
    }

    public function lihat_file_proyeksi_rl($kd_data)
    {
        $dokumen = $this->db->query("SELECT gambar_situasi FROM tb_lap_rl WHERE SHA1(kd_data) = '" . $kd_data . "' ");
        if ($dokumen->getNumRows() > 0 && !empty($dokumen->getRow()->gambar_situasi)) {
            $dok = $dokumen->getRow()->gambar_situasi;
            // Tampilkan dokumen PDF menggunakan iframe
            echo "<iframe src=\"data:application/pdf;base64,$dok\" width=\"100%\" height=\"600px\"></iframe>";
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('edit-pengajuan-kredit-transaksional/' . $kd_data) . '">Klik untuk kembali</a>';
        }
    }

    public function data_ceftb($hasil)
    {
        $data = [
            'checkboxceft' => $this->request->getPost("nilaicheckboxceft"),
            'hasilceft' => $this->request->getPost("hasilcheckboxceft"),
            'totalceft' => $this->request->getPost("hasiltotalCEFT"),
            'checkboxcefb' => $this->request->getPost("nilaicheckboxcefb"),
            'hasilcefb' => $this->request->getPost("hasilcheckboxcefb"),
            'totalcefb' => $this->request->getPost("hasiltotalCEFB"),

            'pengubah' => session()->get('nama_user'),
            'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];
        // var_dump($data);
        // die;

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_ceftb where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_ceftb')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit CEF Tanah/Bangunan berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit CEF Tanah/Bangunan gagal'
            ];
        }
        return $hasil;
    }

    public function data_dcl($hasil)
    {
        $data = [
            'pengelola_dcl' => $this->request->getPost("pengelola_dcl"),
            'tanggal_dcl' => $this->request->getPost("tanggal_dcl"),
            'tanggal_berkas_dcl' => $this->request->getPost("tanggal_berkas_dcl"),
            'nama_pemohon_dcl' => $this->request->getPost("nama_pemohon_dcl"),
            'jenis_usaha_dcl' => $this->request->getPost("jenis_usaha_dcl"),
            'nama_perusahaan_pemohon_dcl' => $this->request->getPost("nama_perusahaan_pemohon_dcl"),
            'nama_pemilik_perusahaan_dcl' => $this->request->getPost("nama_pemilik_perusahaan_dcl"),
            'persentase_saham_dcl' => $this->request->getPost("persentase_saham_dcl"),
            'jabatan_pengurus_perusahaan_dcl' => $this->request->getPost("jabatan_pengurus_perusahaan_dcl"),
            'nama_pengurus_perusahaan_dcl' => $this->request->getPost("nama_pengurus_perusahaan_dcl"),
            'ktp_dcl' => $this->request->getPost("ktp_dcl"),
            'jenis_usaha_perusahaan_dcl' => $this->request->getPost("jenis_usaha_perusahaan_dcl"),
            'fasilitas_kredit_dcl' => $this->request->getPost("fasilitas_kredit_dcl"),
            'plafond_dcl' => $this->request->getPost("plafond_dcl"),
            'jangka_waktu_dcl' => $this->request->getPost("jangka_waktu_dcl"),
            'tujuan_penggunaan_dcl' => $this->request->getPost("tujuan_penggunaan_dcl"),
            'permohonan_diterima_dcl' => $this->request->getPost("permohonan_diterima_dcl"),
            'bukti_kepemilikan_dcl' => $this->request->getPost("bukti_kepemilikan_dcl"),
            'jenis_agunan_dcl' => $this->request->getPost("jenis_agunan_dcl"),
            'tanggal_agunan_dcl' => $this->request->getPost("tanggal_agunan_dcl"),
            'avalist_dcl' => $this->request->getPost("avalist_dcl"),
            'nominal_dcl' => $this->request->getPost("nominal_dcl"),
            'fasilitas_dcl' => $this->request->getPost("fasilitas_dcl"),
            'jatuh_tempo_dcl' => $this->request->getPost("jatuh_tempo_dcl"),
            'plafond_existing_dcl' => $this->request->getPost("plafond_existing_dcl"),
            'outstanding_dcl' => $this->request->getPost("outstanding_dcl"),
            'kolektibilitas_dcl' => $this->request->getPost("kolektibilitas_dcl"),
            'fasilitas_kredit_grup_dcl' => $this->request->getPost("fasilitas_kredit_grup_dcl"),
            'nama_debitur_kredit_grup_dcl' => $this->request->getPost("nama_debitur_kredit_grup_dcl"),
            'jatuh_tempo_kredit_grup_dcl' => $this->request->getPost("jatuh_tempo_kredit_grup_dcl"),
            'plafond_existing_kredit_grup_dcl' => $this->request->getPost("plafond_existing_kredit_grup_dcl"),
            'outstanding_kredit_grup_dcl' => $this->request->getPost("outstanding_kredit_grup_dcl"),
            'kolektibilitas_kredit_grup_dcl' => $this->request->getPost("kolektibilitas_kredit_grup_dcl"),
            'fasilitas_bank_lain_dcl' => $this->request->getPost("fasilitas_bank_lain_dcl"),
            'bank_ljk_bank_lain_dcl' => $this->request->getPost("bank_ljk_bank_lain_dcl"),
            'jatuh_tempo_bank_lain_dcl' => $this->request->getPost("jatuh_tempo_bank_lain_dcl"),
            'plafond_existing_bank_lain_dcl' => $this->request->getPost("plafond_existing_bank_lain_dcl"),
            'outstanding_bank_lain_dcl' => $this->request->getPost("outstanding_bank_lain_dcl"),
            'kolektibilitas_bank_lain_dcl' => $this->request->getPost("kolektibilitas_bank_lain_dcl"),
            'pengujian_ojk_dcl1' => $this->request->getPost("pengujian_ojk_dcl1"),
            'dasar_pengujian_ojk_dcl1' => $this->request->getPost("dasar_pengujian_ojk_dcl1"),
            'checklist_pengujian_ojk_dcl1' => $this->request->getPost("checklist_pengujian_ojk_dcl1"),
            'pengujian_ojk_dcl2' => $this->request->getPost("pengujian_ojk_dcl2"),
            'dasar_pengujian_ojk_dcl2' => $this->request->getPost("dasar_pengujian_ojk_dcl2"),
            'checklist_pengujian_ojk_dcl2' => $this->request->getPost("checklist_pengujian_ojk_dcl2"),
            'pengujian_ojk_dcl3' => $this->request->getPost("pengujian_ojk_dcl3"),
            'dasar_pengujian_ojk_dcl3' => $this->request->getPost("dasar_pengujian_ojk_dcl3"),
            'checklist_pengujian_ojk_dcl3' => $this->request->getPost("checklist_pengujian_ojk_dcl3"),
            'pengujian_internal_dcl1' => $this->request->getPost("pengujian_internal_dcl1"),
            'dasar_pengujian_internal_dcl1' => $this->request->getPost("dasar_pengujian_internal_dcl1"),
            'checklist_pengujian_internal_dcl1' => $this->request->getPost("checklist_pengujian_internal_dcl1"),
            'pengujian_internal_dcl2' => $this->request->getPost("pengujian_internal_dcl2"),
            'dasar_pengujian_internal_dcl2' => $this->request->getPost("dasar_pengujian_internal_dcl2"),
            'checklist_pengujian_internal_dcl2' => $this->request->getPost("checklist_pengujian_internal_dcl2"),
            'pengujian_internal_dcl3' => $this->request->getPost("pengujian_internal_dcl3"),
            'dasar_pengujian_internal_dcl3' => $this->request->getPost("dasar_pengujian_internal_dcl3"),
            'checklist_pengujian_internal_dcl3' => $this->request->getPost("checklist_pengujian_internal_dcl3"),
            'pengujian_internal_dcl4' => $this->request->getPost("pengujian_internal_dcl4"),
            'dasar_pengujian_internal_dcl4' => $this->request->getPost("dasar_pengujian_internal_dcl4"),
            'checklist_pengujian_internal_dcl4' => $this->request->getPost("checklist_pengujian_internal_dcl4"),
            'pengujian_internal_dcl5' => $this->request->getPost("pengujian_internal_dcl5"),
            'dasar_pengujian_internal_dcl5' => $this->request->getPost("dasar_pengujian_internal_dcl5"),
            'checklist_pengujian_internal_dcl5' => $this->request->getPost("checklist_pengujian_internal_dcl5"),
            'pengujian_internal_dcl6' => $this->request->getPost("pengujian_internal_dcl6"),
            'dasar_pengujian_internal_dcl6' => $this->request->getPost("dasar_pengujian_internal_dcl6"),
            'checklist_pengujian_internal_dcl6' => $this->request->getPost("checklist_pengujian_internal_dcl6"),
            'pengujian_lainnya_dcl' => $this->request->getPost("pengujian_lainnya_dcl"),
            'dasar_pengujian_lainnya_dcl' => $this->request->getPost("dasar_pengujian_lainnya_dcl"),
            'checklist_pengujian_lainnya_dcl' => $this->request->getPost("checklist_pengujian_lainnya_dcl"),
            'kesimpulan_dcl' => $this->request->getPost("kesimpulan_dcl"),
            'komentar_dcl' => $this->request->getPost("komentar_dcl"),

            'pengubah' => session()->get('nama_user'),
            'waktu_ubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
            'kd_unit_pengubah' => session()->get('kd_unit_user'),
        ];
        // var_dump($data);
        // die;

        //pengecekan kd info tidak boleh sama sebelum insert
        $kd_data = $this->request->getPost('kd_data');
        $cek_kd_data = $this->db->query("SELECT kd_data from tb_dcl where kd_data = '" . $kd_data . "' ")->getNumRows();
        if ($cek_kd_data > 0) {
            $this->db->table('tb_dcl')->where('kd_data', $kd_data)->update($data);
            // $pengaruh = $this->db->affectedRows();
            $hasil = [
                'status' => 'success',
                'message' => 'Edit DCL Compliance berhasil'
            ];
        } else {
            $hasil = [
                'status' => 'error',
                'message' => 'Edit DCL Compliance gagal'
            ];
        }
        return $hasil;
    }
}
