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
        $sQuery = $sQuery1 . $sWhere . $where2 . $sOrder . $sLimit;
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


        // ambil level user dari session
        // ambil level user dari session
        $kdLevel = (string) session()->get('kd_level_user');

        // ini mapping level -> field-field disposisi LEVEL YANG LEBIH TINGGI
        // begitu ada salah satu yang terisi, level sekarang TIDAK BOLEH EDIT
        $levelNextDisposisiMap = [
            // Pemasar: tidak boleh edit jika Koor Pemasar / Kacab / Analis / Kabag / Kadiv sudah isi
            'LVL23072023135343' => [
                'disposisi_koor_pemasar',
                'disposisi_kacab',
                'disposisi_analis',
                'disposisi_kabag',
                'disposisi_kadiv',
            ],
            // Koor Pemasar: tidak boleh edit jika Kacab / Analis / Kabag / Kadiv sudah isi
            'LVL23072023133934' => [
                'disposisi_kacab',
                'disposisi_analis',
                'disposisi_kabag',
                'disposisi_kadiv',
            ],
            // Admin / Analis Kredit (sesuaikan kalau kodenya untuk analis lain)
            'LVL23072023131340' => [
                'disposisi_kacab',
                'disposisi_analis',
                'disposisi_kabag',
            ],
            'LVL18092023101055' => [
                'disposisi_kabag',
                'disposisi_kadiv',
            ],
            'LVL23072023134345' => [
                'disposisi_kabag',
                'disposisi_kadiv',
            ],
            // misal nanti ada level Kabag:
            // 'KODE_KABAG' => ['disposisi_kadiv'],

            // Kadiv: level tertinggi, tidak punya role di atasnya,
            // jadi bisa edit sepanjang status belum DISETUJUI
            'LEVEL20230510141317' => [
                // kosong
            ],
        ];

        foreach ($rResult as $aRow) {

            $row = array();
            $row[] = $aRow->nama; //0

            // 1: tanggal
            if (!empty($aRow->tanggal)) {
                $row[] = date('d-m-Y', strtotime($aRow->tanggal));
            } else {
                $row[] = $aRow->tanggal;
            }

            // 2: termin
            $row[] = $aRow->termin;

            // 3: jumlah penarikan
            $row[] = $aRow->jumlah_penarikan;

            // 4: status (label)
            // ================= STATUS + POSISI PROGRESS =================
            $progressText = 'Belum Diproses';
            $labelClass = 'label-default';

            // tentukan progress berdasarkan disposisi yang terisi
            if (!empty($aRow->disposisi_kadiv)) {
                $progressText = 'Selesai / Disetujui';
                $labelClass = 'label-success';
            } elseif (!empty($aRow->disposisi_kabag)) {
                $progressText = 'Di Kepala Bagian';
                $labelClass = 'label-primary';
            } elseif (!empty($aRow->disposisi_analis)) {
                $progressText = 'Di Analis Kredit';
                $labelClass = 'label-info';
            } elseif (!empty($aRow->disposisi_kacab)) {
                $progressText = 'Di Kepala Cabang';
                $labelClass = 'label-primary';
            } elseif (!empty($aRow->disposisi_koor_pemasar)) {
                $progressText = 'Di Koordinator Pemasar';
                $labelClass = 'label-warning';
            } elseif (!empty($aRow->disposisi_pemasar)) {
                $progressText = 'Di Pemasar';
                $labelClass = 'label-warning';
            }

            // kalau mau tetap perhatikan status utama (Aktif/Tidak Aktif/DISETUJUI)
            if (!empty($aRow->status)) {
                $statusUpper = strtoupper($aRow->status);

                if ($statusUpper === 'DISETUJUI') {
                    // override biar jelas
                    $progressText = 'Selesai / Disetujui';
                    $labelClass = 'label-success';
                } elseif ($statusUpper === 'TIDAK AKTIF') {
                    $labelClass = 'label-danger';
                }
            }

            // tampilkan di kolom STATUS
            $row[] = '<span class="label ' . $labelClass . '">' . $progressText . '</span>'
                . '<br><small>Status: ' . ($aRow->status ?: '-') . '</small>';

            // ==============================
            // 5: ACTION (dropdown) dengan rule:
            //    - kalau status DISETUJUI -> tidak bisa proses lagi
            //    - kalau role di atas (next level) SUDAH isi disposisi -> tidak bisa proses lagi
            // ==============================

            $canEditThisRow = true;

            // kalau status final sudah DISETUJUI, semua role tidak perlu proses lagi
            if (!empty($aRow->status) && strtoupper($aRow->status) === 'DISETUJUI') {
                $canEditThisRow = true;
            } else {
                // cek apakah level user punya daftar "next roles"
                if (isset($levelNextDisposisiMap[$kdLevel])) {
                    $nextFields = $levelNextDisposisiMap[$kdLevel];

                    foreach ($nextFields as $fld) {
                        if (!property_exists($aRow, $fld)) {
                            continue;
                        }
                        $val = $aRow->{$fld};
                        if (!empty($val)) {
                            // role di atas sudah isi disposisi → tidak boleh edit
                            $canEditThisRow = false;
                            break;
                        }
                    }
                } else {
                    // kalau level user tidak dikenali dalam mapping,
                    // bisa diputuskan: default tidak boleh edit
                    $canEditThisRow = false;
                }
            }
            $button_generate = '<li><button title="Generate" class="btn btn-sm dropdown-item" onclick="generate_dok(\'' . $aRow->kd_data . '\',\'' . $aRow->termin . '\')"><div class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Generate Data</div></button></li>';
            // bangun HTML dropdown
            $actionMenu = '<a data-toggle="dropdown" class="" href="#">'
                . '<span class="text-dark text-xs block"><b>. . .</b></span>'
                . '</a>'
                . '<ul class="dropdown-menu animated fadeInRight m-t-xs">';

            // TOMBOL "Proses Penarikan" hanya muncul kalau $canEditThisRow = true
            if ($canEditThisRow) {
                $actionMenu .=
                    '<li>' .
                    '<a href="' . base_url() . 'edit-penarikan-kredit-transaksional/' . sha1($aRow->kd_data) . '/' . sha1($aRow->termin) . '" ' .
                    'class="btn btn-sm dropdown-item" title="Proses Penarikan">' .
                    '<div class="text-left">' .
                    '<i class="fa fa-pencil" aria-hidden="true"></i> Proses Penarikan' .
                    '</div>' .
                    '</a>' .
                    '</li>';
            } else {
                // optional: kalau mau kasih info kenapa tidak bisa edit, tinggal buka komentar
                // $actionMenu .=
                //     '<li class="dropdown-item text-muted">' .
                //         '<div class="text-left"><i class="fa fa-info-circle"></i> Tidak dapat diproses: sudah dilanjutkan ke level berikutnya</div>' .
                //     '</li>';
            }

            // Tombol History Return tetap selalu ada
            $actionMenu .=
                '<li>'.
                '<button title="Generate" class="btn btn-sm dropdown-item" onclick="generate_dok(\'' . $aRow->kd_data . '\',\'' . $aRow->termin . '\')">'.
                '<div class="text-left">'.
                '<i class="fa fa-download" aria-hidden="true">'.
                '</i> Generate Data'.
                '</div>'.
                '</button>'.
                '</li>'.
                '<li>' .
                '<button title="History Return" class="btn btn-sm dropdown-item" onclick="modal_return(\'' . $aRow->kd_data . '\')">' .
                '<div class="text-left">' .
                '<i class="fa fa-undo" aria-hidden="true"></i> History Return' .
                '</div>' .
                '</button>' .
                '</li>';

            $actionMenu .= '</ul>';

            // masukkan ke kolom action
            $row[] = $actionMenu;

            $output['aaData'][] = $row;
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

        return $this->response->setJSON($result);
    }

    /**
     * Mengambil info plafon penarikan per kd_data:
     * - plafond_total  : tb_fak_rl.kredit_bank_fak_rl
     * - total_penarikan: SUM(tb_penarikan.jumlah_penarikan)
     * - sisa_plafond   : plafond_total - total_penarikan
     */
    public function get_plafond_penarikan()
    {
        $kd_data = $this->request->getGet('kd_data');

        if (!$kd_data) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Parameter kd_data tidak boleh kosong.'
            ]);
        }

        // Ambil plafond dari tb_fak_rl
        $rowFak = $this->db->table('tb_fak_rl')
            ->select('kredit_bank_fak_rl')
            ->where('kd_data', $kd_data)
            ->get()
            ->getRowArray();

        if (!$rowFak) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Data FAK_RL tidak ditemukan untuk kd_data: {$kd_data}"
            ]);
        }

        $plafondTotal = (float) ($rowFak['kredit_bank_fak_rl'] ?? 0);

        // Hitung total penarikan dari tb_penarikan
        $rowSum = $this->db->table('tb_penarikan')
            ->select('SUM(jumlah_penarikan) AS total_penarikan', false)
            ->where('kd_data', $kd_data)
            ->get()
            ->getRowArray();

        $totalPenarikan = (float) ($rowSum['total_penarikan'] ?? 0);

        $sisaPlafond = $plafondTotal - $totalPenarikan;

        return $this->response->setJSON([
            'status' => 'ok',
            'kd_data' => $kd_data,
            'plafond_total' => $plafondTotal,
            'total_penarikan' => $totalPenarikan,
            'sisa_plafond' => $sisaPlafond,
            // opsional: versi sudah diformat rupiah
            'plafond_total_rp' => number_format($plafondTotal, 0, ',', '.'),
            'total_penarikan_rp' => number_format($totalPenarikan, 0, ',', '.'),
            'sisa_plafond_rp' => number_format($sisaPlafond, 0, ',', '.'),
        ]);
    }

    public function tambah_penarikan()
    {
        $hasil = $this->hak_akses();
        if ($hasil == true) {
            $data['title'] = 'Tambah penarikan Kredit Transaksional';
            $levelUser = strtolower((string) session()->get('kd_level_user'));
            $data['edit_data'] = ($levelUser === 'pemasar');
            return view('backend/kredit_transaksional/penarikan_kredit/v_tambah_penarikan', $data);
        } else {
            return redirect()->to('/login');
        }
    }
    public function penarikan_simpan()
    {
        $kd_data = $this->request->getPost('kd_data');
        $nama = $this->request->getPost('nama');
        $kd_unit_kerja = $this->request->getPost('kd_unit_kerja');

        if (!$kd_data || !$nama || !$kd_unit_kerja) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Parameter tidak lengkap.']);
        }

        $db = \Config\Database::connect();

        // 🔴 CEK DULU: masih ada penarikan yang BELUM disetujui Kadiv?
        // Asumsi: status final = 'DISETUJUI'. Selain itu dianggap masih proses.
        $pending = $db->table('tb_penarikan')
            ->where('kd_data', $kd_data)
            ->groupStart()
            ->where('status IS NULL', null, false)
            ->orWhere('status !=', 'DISETUJUI')
            ->groupEnd()
            ->countAllResults();

        if ($pending > 0) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Masih ada pengajuan penarikan untuk debitur ini yang belum disetujui Kadiv. Selesaikan dulu sebelum menambah pengajuan baru.'
            ]);
        }

        $db->transBegin();

        try {
            // 1) Ambil jumlah termin asli dari tb_fak_data
            $rowFak = $db->table('tb_fak_data')
                ->select('jumlah_termin')
                ->where('kd_data', $kd_data)
                ->get()
                ->getRowArray();

            if (!$rowFak) {
                throw new \RuntimeException("tb_fak_data tidak ditemukan untuk kd_data: {$kd_data}");
            }

            $terminAsli = (int) preg_replace('/\D+/', '', (string) ($rowFak['jumlah_termin'] ?? '0'));
            if ($terminAsli < 0)
                $terminAsli = 0;

            // Total slot termin: Uang Muka (1) + Termin Asli (M) + Retensi (1)
            $totalTermin = $terminAsli + 2;
            if ($totalTermin < 2) {
                throw new \RuntimeException("jumlah_termin tidak valid: " . json_encode($rowFak['jumlah_termin']));
            }

            // 2) Cari termin terakhir yang sudah ada
            $rowMax = $db->table('tb_penarikan')
                ->select('MAX(termin) AS max_termin', false)
                ->where('kd_data', $kd_data)
                ->get()
                ->getRowArray();

            $maxTerminExisting = (int) ($rowMax['max_termin'] ?? 0);
            $nextTermin = $maxTerminExisting + 1;

            if ($nextTermin > $totalTermin) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => "Jumlah termin sudah mencapai maksimum ({$totalTermin} slot: Uang Muka, {$terminAsli} Termin, dan Retensi)."
                ]);
            }

            // 3) Tentukan jenis_termin & keterangan
            if ($nextTermin === 1) {
                $jenis = 'uang_muka';
                $keterangan = 'Uang Muka';
                $terminNoAsli = 0;
            } elseif ($nextTermin === $totalTermin) {
                $jenis = 'retensi';
                $keterangan = 'Setelah Masa Pemeliharaan';
                $terminNoAsli = 0;
            } else {
                $jenis = 'termin';
                $terminNoAsli = $nextTermin - 1;
                $keterangan = 'Termin ' . $terminNoAsli;
            }

            $now = date('Y-m-d H:i:s');

            // 4) Insert 1 baris ke tiap tabel
            $rowP = [
                'kd_data' => $kd_data,
                'termin' => $nextTermin,
                'jenis_termin' => $jenis,
                'termin_no_asli' => $terminNoAsli,
                'keterangan' => $keterangan,
                'nama' => $nama,
                'kd_unit_kerja' => $kd_unit_kerja,
                'status' => 'draft',
                'created_at' => $now,
                'updated_at' => $now,
            ];

            $ok = $db->table('tb_penarikan')->insert($rowP);
            $err = $db->error();
            if (!$ok || !empty($err['code'])) {
                throw new \RuntimeException("Insert tb_penarikan gagal: {$err['code']} {$err['message']}");
            }

            $rowFcr = [
                'kd_data' => $kd_data,
                'termin' => $nextTermin,
                'jenis_termin' => $jenis,
                'termin_no_asli' => $terminNoAsli,
                'keterangan' => $keterangan,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $ok = $db->table('tb_fcr_penarikan')->insert($rowFcr);
            $err = $db->error();
            if (!$ok || !empty($err['code'])) {
                throw new \RuntimeException("Insert tb_fcr_penarikan gagal: {$err['code']} {$err['message']}");
            }

            $rowDok = [
                'kd_data' => $kd_data,
                'termin' => $nextTermin,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $ok = $db->table('tb_dokumen_penarikan')->insert($rowDok);
            $err = $db->error();
            if (!$ok || !empty($err['code'])) {
                throw new \RuntimeException("Insert tb_dokumen_penarikan gagal: {$err['code']} {$err['message']}");
            }

            $rowMpdkk = [
                'kd_data' => $kd_data,
                'termin' => $nextTermin,
                'jenis_termin' => $jenis,
                'termin_no_asli' => $terminNoAsli,
                'keterangan' => $keterangan,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $ok = $db->table('tb_mpdkk')->insert($rowMpdkk);
            $err = $db->error();
            if (!$ok || !empty($err['code'])) {
                throw new \RuntimeException("Insert tb_mpdkk gagal: {$err['code']} {$err['message']}");
            }

            $db->transCommit();

            return $this->response->setJSON([
                'status' => 'ok',
                'message' => "Berhasil menambahkan termin {$keterangan} (ke-{$nextTermin}) untuk nasabah {$nama}.",
                'next_termin' => $nextTermin,
                'total_termin' => $totalTermin,
                'jenis_termin' => $jenis,
                'termin_no_asli' => $terminNoAsli,
            ]);

        } catch (\Throwable $e) {
            $db->transRollback();
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function simpan_progress()
    {
        $kd_data = trim((string) $this->request->getPost('kd_data'));
        $table = trim((string) $this->request->getPost('target_table'));

        $terminRaw = $this->request->getPost('termin');
        $termin = is_numeric($terminRaw) ? (int) $terminRaw : 1;

        $data = $this->request->getPost();
        unset($data['target_table']);

        if ($kd_data === '' || $table === '') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Parameter tidak lengkap (kd_data / target_table).'
            ]);
        }

        // filter kosong tapi jangan buang 0
        $data = array_filter($data, static function ($v) {
            if ($v === null)
                return false;
            if (is_string($v) && $v === '')
                return false;
            return true;
        });

        $data['kd_data'] = $kd_data;
        $data['termin'] = $termin;

        try {
            // =========================
            // VALIDASI KHUSUS STEP FCR
            // =========================
            $isFcr = ($table === 'tb_fcr_penarikan');
            $parsedFcr = null;

            if ($isFcr) {
                $errors = [];
                $nomor = isset($data['nomor']) ? trim((string) $data['nomor']) : '';
                $tanggal = isset($data['tanggal']) ? trim((string) $data['tanggal']) : '';

                if ($nomor === '') {
                    $errors['nomor'] = 'Nomor FCR wajib diisi.';
                }
                if ($tanggal === '') {
                    $errors['tanggal'] = 'Tanggal wajib diisi.';
                }

                // pola: 003/FCR-Kons/Kmr-BJM/KP/2025
                $pattern = '/^(\d{3})\/([^\/]+)\/([^\/]+)\/([^\/]+)\/(\d{4})$/';
                if ($nomor !== '' && !preg_match($pattern, $nomor, $m)) {
                    $errors['nomor'] = 'Format nomor tidak sesuai. Contoh: 003/FCR-Kons/Kmr-BJM/KP/2025';
                }

                // validasi tanggal
                if ($tanggal !== '') {
                    $dt = \DateTime::createFromFormat('Y-m-d', $tanggal);
                    $validFormat = $dt && $dt->format('Y-m-d') === $tanggal;
                    if (!$validFormat) {
                        $errors['tanggal'] = 'Format tanggal harus Y-m-d.';
                    } else {
                        $today = new \DateTime('today');
                        if ($dt > $today) {
                            $errors['tanggal'] = 'Tanggal tidak boleh di masa depan.';
                        }
                    }
                }

                // duplikasi di tb_fcr (unik global, kecuali baris ini)
                if ($nomor !== '') {
                    $dup = $this->db->table('tb_fcr_penarikan')
                        ->select('nomor')
                        ->where('nomor', $nomor)
                        ->groupStart()
                        ->where('kd_data <>', $kd_data)
                        ->orWhere('termin <>', $termin)
                        ->groupEnd()
                        ->get()->getRowArray();
                    if ($dup) {
                        $errors['nomor'] = 'Nomor FCR sudah digunakan.';
                    }
                }

                if (!empty($errors)) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Validasi FCR gagal.',
                        'errors' => $errors
                    ]);
                }

                // siapkan parsing nomor untuk tb_nomor_fcr
                // match groups: [1]=NNN, [2]=kata1, [3]=Kmr-<CAB>, [4]=kata3, [5]=tahun
                preg_match($pattern, $nomor, $m);
                $nomor_urut_panjang = $m[1] ?? '';
                $kata1 = $m[2] ?? '';
                $kata2_full = $m[3] ?? '';          // contoh: Kmr-BJM
                $kata3 = $m[4] ?? '';
                $tahun = (int) ($m[5] ?? date('Y'));

                // ambil kode cabang setelah "Kmr-"
                $singkatan_cabang = $kata2_full;
                if (stripos($kata2_full, 'Kmr-') === 0) {
                    $singkatan_cabang = substr($kata2_full, 4);
                }
                $nomor_urut_pendek = (int) $nomor_urut_panjang;

                // kd_unit_kerja ambil dari session (sesuai pola sebelumnya)
                $kd_unit_kerja = session()->get('kd_unit_user');
                $pengubah = session()->get('nama_user');
                $waktu_pengubah = session()->get('kd_unit_user');

                $parsedFcr = [
                    'hasil_generate' => $nomor,
                    'nomor_urut_panjang' => $nomor_urut_panjang,
                    'nomor_urut_pendek' => $nomor_urut_pendek,
                    'kata1' => $kata1,
                    'kata2' => 'Kmr-',
                    'singkatan_cabang' => $singkatan_cabang,
                    'kata3' => $kata3,
                    'tahun' => $tahun,
                    'kd_unit_kerja' => $kd_unit_kerja,
                    'kd_data' => $kd_data,
                    'pengubah' => $pengubah,
                    'tanggal_pengubah' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                    'waktu_pengubah' => $waktu_pengubah,
                ];
            }
            // ============== END VALIDASI FCR ==============

            $db = \Config\Database::connect();

            // Jika FCR, jalankan dalam transaksi (tb_fcr + tb_nomor_fcr)
            if ($isFcr) {
                $db->transBegin();
            }

            $builder = $this->db->table($table);

            // cek keberadaan baris (kd_data + termin)
            $exists = $builder
                ->select('kd_data')
                ->where('kd_data', $kd_data)
                ->where('termin', $termin)
                ->get()
                ->getRow();

            if ($exists) {
                // UPDATE target table (tb_fcr)
                $ok = $builder
                    ->where('kd_data', $kd_data)
                    ->where('termin', $termin)
                    ->update($data);

                if (!$ok) {
                    $err = $this->db->error();
                    if ($isFcr)
                        $db->transRollback();
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Gagal update data.',
                        'db_error' => $err
                    ]);
                }
            } else {
                // INSERT target table (tb_fcr)
                $ok = $builder->insert($data);
                if (!$ok) {
                    $err = $this->db->error();
                    if ($isFcr)
                        $db->transRollback();
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Gagal insert data.',
                        'db_error' => $err
                    ]);
                }
            }

            // Setelah tb_fcr sukses → catat nomor ke tb_nomor_fcr
            if ($isFcr && $parsedFcr) {
                $nomor = $parsedFcr['hasil_generate'];
                $unit = $parsedFcr['kd_unit_kerja'];

                // cek apakah nomor ini sudah ada tercatat di tb_nomor_fcr
                $existsNomor = $db->table('tb_nomor_fcr')
                    ->select('hasil_generate')
                    ->where('hasil_generate', $nomor)
                    ->where('kd_unit_kerja', $unit)
                    ->get()->getRowArray();

                if (!$existsNomor) {
                    // siapkan row untuk insert
                    $rowNomor = [
                        'kd_nomor' => 'NMRFCR' . gmdate("dmYHis", time() + 60 * 60 * 8),
                        'kd_fcr' => 'FCR' . gmdate("dmYHis", time() + 60 * 60 * 8), // kalau nanti ada kd_fcr, isi di sini
                        'kd_data' => $parsedFcr['kd_data'],
                        'kd_cabang' => $unit, // kompatibel dengan kode sebelumnya (kd_cabang dari data)
                        'keperluan' => 'penarikan',
                        'kata1' => $parsedFcr['kata1'],
                        'kata2' => 'Kmr-',
                        'singkatan_cabang' => $parsedFcr['singkatan_cabang'],
                        'kata3' => $parsedFcr['kata3'],
                        'tahun' => $parsedFcr['tahun'],
                        'nomor_urut_pendek' => $parsedFcr['nomor_urut_pendek'],
                        'nomor_urut_panjang' => $parsedFcr['nomor_urut_panjang'],
                        'hasil_generate' => $parsedFcr['hasil_generate'],
                        'kd_unit_kerja' => $parsedFcr['kd_unit_kerja'],
                        'pengubah' => $parsedFcr['pengubah'],
                        'tanggal_pengubah' => $parsedFcr['tanggal_pengubah'],
                        'waktu_pengubah' => $parsedFcr['waktu_pengubah'],
                    ];

                    $okNomor = $db->table('tb_nomor_fcr')->insert($rowNomor);
                    if (!$okNomor) {
                        $err = $db->error();
                        if ($isFcr)
                            $db->transRollback();
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Gagal mencatat nomor FCR.',
                            'db_error' => $err
                        ]);
                    }
                }
            }

            if ($isFcr) {
                $db->transCommit();
            }

            return $this->response->setJSON([
                'status' => 'ok',
                'message' => ($exists ? 'Update berhasil' : 'Insert berhasil')
            ]);

        } catch (\Throwable $e) {
            // pastikan rollback kalau transaksi FCR gagal
            if (isset($isFcr) && $isFcr && isset($db) && $db->transStatus() !== null) {
                $db->transRollback();
            }
            return $this->response->setJSON([
                'status' => 'error',
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
                'status' => 'error',
                'message' => 'Parameter tidak lengkap (kd_data/termin).'
            ]);
        }

        $table = 'tb_dokumen_penarikan';
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

                $mime = $file->getClientMimeType(); // atau getMimeType()
                $b64 = base64_encode($binary);
                $dataUri = "data:{$mime};base64,{$b64}";
                $updates[$col] = $dataUri;
            }
        }

        if (empty($updates)) {
            return $this->response->setJSON([
                'status' => 'error',
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
                        'status' => 'ok',
                        'message' => 'Dokumen berhasil diperbarui (base64).'
                    ]);
                }
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal update dokumen.',
                    'db_error' => $this->db->error()
                ]);
            } else {
                // INSERT: set kunci & created_at
                $insertData = array_merge($where, $updates, ['created_at' => $now, 'updated_at' => $now]);
                $ok = $builder->insert($insertData);

                if ($ok) {
                    return $this->response->setJSON([
                        'status' => 'ok',
                        'message' => 'Dokumen berhasil disimpan (base64).'
                    ]);
                }
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal insert dokumen.',
                    'db_error' => $this->db->error()
                ]);
            }
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit_penarikan($kd_data, $termin = null)
    {
        $this->hak_akses();
        $this->permission();

        $builder = $this->db->table('tb_penarikan');
        $builder->where("SHA1(kd_data) = '{$kd_data}'");
        if ($termin !== null) {
            $builder->where("SHA1(termin) = '{$termin}'");
        }

        // ambil row lengkap (termasuk disposisi2)
        $row = $builder->get()->getRowArray();

        $data['title'] = 'Edit Penarikan Kredit Transaksional';
        $data['kd_data'] = $row['kd_data'] ?? null;
        $data['termin'] = $row['termin'] ?? null;

        $kdLevel = (string) session()->get('kd_level_user');

        // mapping level -> field disposisi
        $levelMap = [
            'LVL23072023135343' => 'disposisi_pemasar',
            'LVL23072023133934' => 'disposisi_koor_pemasar',
            'LVL23072023131340' => 'disposisi_kacab',
            'LVL18092023101055' => 'disposisi_analis',
            'LVL23072023134345' => 'disposisi_kabag',
            'LVL07112023100547' => 'disposisi_kadiv',
        ];

        $flowFields = [
            'disposisi_pemasar',
            'disposisi_koor_pemasar',
            'disposisi_kacab',
            'disposisi_analis',
            'disposisi_kabag',
            'disposisi_kadiv',
        ];

        // cari "field berikutnya yang masih kosong" = tahap aktif saat ini
        $activeField = null;
        foreach ($flowFields as $f) {
            $val = $row[$f] ?? '';
            if (trim((string) $val) === '') {
                $activeField = $f; // inilah tahap yang sedang berhak input
                break;
            }
        }

        // kalau semua sudah terisi, berarti sudah selesai (kadiv sudah isi)
        // tidak ada yang boleh edit lagi
        $currentUserField = $levelMap[$kdLevel] ?? null;

        $data['can_edit'] = false;
        if ($currentUserField && $activeField && $currentUserField === $activeField) {
            $data['can_edit'] = true;
        }

        // opsi: kalau status DISETUJUI, force readonly
        if (!empty($row['status']) && strtoupper($row['status']) === 'DISETUJUI') {
            $data['can_edit'] = false;
        }

        // kirim juga untuk debug / label
        $data['active_field'] = $activeField;
        $data['current_field'] = $currentUserField;
        $role = session('role'); // contoh: pemasar, koor_pemasar, kacab, analis, kabag, kadiv
        $status = strtoupper($row['status'] ?? '');

        // mapping role → kolom disposisi
        $roleDisposisiMap = [
            'pemasar' => 'disposisi_pemasar',
            'koor_pemasar' => 'disposisi_koor_pemasar',
            'kacab' => 'disposisi_kacab',
            'analis' => 'disposisi_analis',
            'kabag' => 'disposisi_kabag',
            'kadiv' => 'disposisi_kadiv',
        ];

        $isReadonly = false;

        // 1. Kalau sudah DISETUJUI → semua readonly
        if ($status === 'DISETUJUI') {
            $isReadonly = true;
        }
        // 2. Kalau role ini SUDAH mengisi disposisinya → readonly
        elseif (isset($roleDisposisiMap[$role])) {
            $kolom = $roleDisposisiMap[$role];
            if (!empty($row[$kolom])) {
                $isReadonly = true;
            }
        }

        $data['isReadonly'] = $isReadonly;
        $data['status'] = $status;
        $data['role'] = $role;


        return view('backend/kredit_transaksional/penarikan_kredit/v_edit_penarikan', $data);
    }


    public function generate_nomor_fcr()
    {
        // Ambil parameter minimal
        $kd_data = trim((string) $this->request->getPost('kd_data') ?: $this->request->getGet('kd_data'));
        $kd_fcr = trim((string) $this->request->getPost('kd_fcr') ?: $this->request->getGet('kd_fcr'));
        $kd_unit_kerja = session()->get('kd_unit_user'); // asumsi ini adalah kd_unit_kerja cabang

        if ($kd_data === '' || !$kd_unit_kerja) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Parameter tidak lengkap (kd_data / kd_unit_kerja).'
            ]);
        }

        try {
            $db = \Config\Database::connect();

            // Ambil singkatan cabang
            $singkatanRow = $db->table('tb_unit_kerja')
                ->select('kode_cabang')
                ->where('kd_unit', $kd_unit_kerja)
                ->get()->getRow();

            $singkatan_cabang = $singkatanRow->kode_cabang ?? 'UNK';

            // Komponen nomor
            $kata1 = 'FCR-Kons';
            $kata2 = 'Kmr-';
            $kata3 = 'KP';

            // Tahun referensi
            $tahun_sekarang = (int) date('Y');

            // Cari tahun terakhir & nomor terakhir dari tb_nomor_fcr (HANYA BACA; TIDAK INSERT)
            $tahun_db_row = $db->table('tb_nomor_fcr')
                ->select('MAX(tahun) AS tahun_max', false)
                ->where('kd_unit_kerja', $kd_unit_kerja)
                ->get()->getRowArray();

            $tahun_db = (int) ($tahun_db_row['tahun_max'] ?? 0);

            if ($tahun_db === $tahun_sekarang) {
                // Jika ada di tahun berjalan, ambil max urutan pendek
                $urut_row = $db->table('tb_nomor_fcr')
                    ->select('MAX(nomor_urut_pendek) AS nomor_urut_pendek_max', false)
                    ->where('kd_unit_kerja', $kd_unit_kerja)
                    ->where('tahun', $tahun_sekarang)
                    ->get()->getRowArray();

                $nomor_urut_pendek = (int) ($urut_row['nomor_urut_pendek_max'] ?? 0);
                $tahun = $tahun_db;
            } else {
                // Tahun baru (atau belum pernah ada)
                $nomor_urut_pendek = 0;
                $tahun = $tahun_sekarang;
            }

            // Hitung urutan berikutnya (padding 3 digit)
            $tambah_satu = $nomor_urut_pendek + 1;
            $nomor_urut_panjang = str_pad((string) $tambah_satu, 3, '0', STR_PAD_LEFT);

            // Format nomor final
            $hasil_generate = $nomor_urut_panjang . '/' . $kata1 . '/' . $kata2 . $singkatan_cabang . '/' . $kata3 . '/' . $tahun;

            // Tanggal (server) untuk kolom tanggal (readonly)
            $tanggal_today = date('Y-m-d');

            // Kembalikan TANPA menyimpan ke tb_nomor_fcr
            return $this->response->setJSON([
                'status' => 'ok',
                'nomor' => $hasil_generate,
                'tanggal' => $tanggal_today,
                'nomor_urut_pendek' => $tambah_satu,
                'tahun' => $tahun,
                'kode_cabang' => $singkatan_cabang,
                'preview_only' => true  // indikator bahwa ini belum disimpan
            ]);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function get_data()
    {
        $kd_unit_user = session()->get('kd_unit_user');

        $kd_data = $this->request->getGet('kd_data');
        $termin = $this->request->getGet('termin');

        // Ambil data dari tb_data_entry (detail eform)
        $penarikan = $this->db->table('tb_penarikan')
            ->where('kd_data', $kd_data)
            ->where('termin', $termin)
            ->get()
            ->getRowArray();
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
        $NomorFCR = $this->db->table('tb_nomor_fcr')
            ->where('kd_cabang', $kd_unit_user)
            ->get()
            ->getResultArray();

        $data_induk = $this->db->table('tb_data_induk')
            ->where('kd_data', $kd_data)
            ->where('termin', $termin)
            ->get()
            ->getRowArray();
        $fcrpenarikan = $this->db->table('tb_fcr_penarikan')
            ->where('kd_data', $kd_data)
            ->where('termin', $termin)
            ->get()
            ->getRowArray();
        $dataDokPenarikan = $this->db->table('tb_dokumen_penarikan')
            ->where('kd_data', $kd_data)
            ->where('termin', $termin)
            ->get()
            ->getRowArray();
        $mpdkk = $this->db->table('tb_mpdkk')
            ->where('kd_data', $kd_data)
            ->where('termin', $termin)
            ->get()
            ->getRowArray();

        // === Hitung jumlah termin dan total penarikan ===
        // $count = count($penarikan);
        // $nextTermin = $count + 1;

        $totalPenarikanMpdkk = 0;
        if (!empty($mpdkk)) {
            foreach ($mpdkk as $row) {
                $totalPenarikanMpdkk += floatval($row['jumlah_penarikan_disetujui'] ?? 0);
            }
        }

        $levelUser = strtolower((string) session()->get('kd_level_user'));
        $allowedLevels = ['LVL23072023135343', 'LVL23072023133934', 'LVL31052024093622', 'LEVEL20230510141317']; //hanya pemasar dan koordinator pemasar dan admin
        $allowedLevelsPemasar = ['LVL23072023135343', 'LVL31052024093622', 'LEVEL20230510141317']; //hanya pemasar dan koordinator pemasar dan admin
        $allowedLevelsKoorCabang = ['LVL23072023133934', 'LVL31052024093622', 'LEVEL20230510141317']; //hanya pemasar dan koordinator pemasar dan admin
        $allowedLevelsKacab = ['LVL23072023131340', 'LVL31052024093622', 'LEVEL20230510141317']; //hanya pemasar dan koordinator pemasar dan admin
        $allowedLevelsAnalis = ['LVL18092023101055', 'LVL31052024093622', 'LEVEL20230510141317']; //hanya pemasar dan koordinator pemasar dan admin
        $allowedLevelsKabag = ['LVL23072023134345', 'LVL31052024093622', 'LEVEL20230510141317']; //hanya pemasar dan koordinator pemasar dan admin
        $allowedLevelsKadiv = ['LVL07112023100547', 'LVL31052024093622', 'LEVEL20230510141317']; //hanya pemasar dan koordinator pemasar dan admin

        $canEdit = in_array($levelUser, $allowedLevels, true);
        $canEditPemasar = in_array($levelUser, $allowedLevelsPemasar, true);
        $canEditKoorCabang = in_array($levelUser, $allowedLevelsKoorCabang, true);
        $canEditKacab = in_array($levelUser, $allowedLevelsKacab, true);
        $canEditAnalis = in_array($levelUser, $allowedLevelsAnalis, true);
        $canEditKabag = in_array($levelUser, $allowedLevelsKabag, true);
        $canEditKadiv = in_array($levelUser, $allowedLevelsKadiv, true);
        $status = strtoupper((string) ($penarikan['status'] ?? ''));

        $roleToField = [
            'LVL23072023135343' => 'disposisi_pemasar',
            'LVL23072023133934' => 'disposisi_koor_pemasar',
            'LVL23072023131340' => 'disposisi_kacab',
            'LVL18092023101055' => 'disposisi_analis',
            'LVL23072023134345' => 'disposisi_kabag',
            'LVL07112023100547' => 'disposisi_kadiv',
        ];

        // level user kamu di session itu bentuknya apa? kamu sempat strtolower(), tapi ID level itu uppercase semua.
// Jadi JANGAN strtolower untuk ID level.
        $levelUser = (string) session()->get('kd_level_user');

        $myField = $roleToField[$levelUser] ?? null;
        $myAlreadyDispose = false;

        if ($myField) {
            $myAlreadyDispose = trim((string) ($penarikan[$myField] ?? '')) !== '';
        }

        $isReadonly = ($status === 'DISETUJUI') || $myAlreadyDispose;


        // Gabungkan hasil
        $result = [
            'data_entry' => $dataEntry,   // detail dari tb_data_entry
            'penarikan' => $penarikan,   // detail dari tb_data_entry
            'fcr' => $dataFCR,   // detail dari tb_data_entry
            'fak_data' => $dataFAKdata,   // detail dari tb_data_entry
            'fak_rl' => $dataFAKRL,   // detail dari tb_data_entry
            // 'penarikan'    => $penarikan,   // daftar penarikan yang sudah ada
            // 'next_termin'  => $nextTermin,  // termin berikutnya
            'nomor_fcr' => $NomorFCR,  // termin berikutnya
            'data_induk' => $data_induk,  // termin berikutnya
            'fcr_penarikan' => $fcrpenarikan,  // termin berikutnya
            'dok_penarikan' => $dataDokPenarikan,  // termin berikutnya
            'mpdkk' => $mpdkk,  // termin berikutnya
            'mpdkk_detail' => [
                'detail' => $mpdkk,
                'total_penarikan' => $totalPenarikanMpdkk
            ],
            'edit_data' => $canEdit, // 👈 ini yang kamu butuhkan
            'edit_data_pemasar' => $canEditPemasar, // 👈 ini yang kamu butuhkan
            'edit_data_koorcabang' => $canEditKoorCabang, // 👈 ini yang kamu butuhkan
            'edit_data_kacab' => $canEditKacab, // 👈 ini yang kamu butuhkan
            'edit_data_analis' => $canEditAnalis, // 👈 ini yang kamu butuhkan
            'edit_data_kabag' => $canEditKabag, // 👈 ini yang kamu butuhkan
            'edit_data_kadiv' => $canEditKadiv, // 👈 ini yang kamu butuhkan
            'status' => $status,
            'is_readonly' => $isReadonly,
            'readonly_reason' => ($status === 'DISETUJUI') ? 'DISETUJUI' : ($myAlreadyDispose ? 'SUDAH_DISPOSISI' : ''),
            'readonly_field' => $myField,
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

    public function cek_rekap()
    {
        $kd_data = $this->request->getPost('kd_data');
        $termin = $this->request->getPost('termin'); // kalau per-termin

        if (!$kd_data) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'kd_data tidak boleh kosong.'
            ]);
        }

        $db = \Config\Database::connect();

        // -----------------------
        // 1. Cek DATA INDUK
        // -----------------------
        $qInduk = $db->table('tb_data_induk')
            ->where('kd_data', $kd_data);

        if ($termin !== null && $termin !== '') {
            $qInduk->where('termin', $termin);
        }

        $rowInduk = $qInduk->get()->getRowArray();

        // Kolom yang dianggap wajib terisi
        $requiredInduk = [
            'unit_kerja',
            'pemasar',
            'nama_debitur_induk',
            'npwp',
            'alamat_kantor_induk',
            'plafond',
            'jangka_waktu_kredit',
        ];

        $dataIndukOk = true;
        $missingInduk = [];

        if (!$rowInduk) {
            $dataIndukOk = false;
            $missingInduk[] = 'row_kosong';
        } else {
            foreach ($requiredInduk as $fld) {
                $val = $rowInduk[$fld] ?? null;
                if ($val === null || $val === '') {
                    $dataIndukOk = false;
                    $missingInduk[] = $fld;
                }
            }
        }

        // -----------------------
        // 2. Cek FCR PENARIKAN
        // -----------------------
        $qFcr = $db->table('tb_fcr_penarikan')
            ->where('kd_data', $kd_data);

        if ($termin !== null && $termin !== '') {
            $qFcr->where('termin', $termin);
        }

        $rowFcr = $qFcr->get()->getRowArray();

        $requiredFcr = [
            'nomor',           // kalau ada
            'tanggal',         // kalau ada
            // tambahkan field-field lain yang menurutmu wajib: 'tujuan', 'hasil_kunjungan', dll
        ];

        $fcrOk = true;
        $missingFcr = [];

        if (!$rowFcr) {
            $fcrOk = false;
            $missingFcr[] = 'row_kosong';
        } else {
            foreach ($requiredFcr as $fld) {
                if (!array_key_exists($fld, $rowFcr))
                    continue; // kalau memang belum ada kolomnya, skip
                $val = $rowFcr[$fld];
                if ($val === null || $val === '') {
                    $fcrOk = false;
                    $missingFcr[] = $fld;
                }
            }
        }

        // -----------------------
        // 3. Cek DOKUMEN CHECKLIST
        // -----------------------
        $qDok = $db->table('tb_dokumen_penarikan')
            ->where('kd_data', $kd_data);

        if ($termin !== null && $termin !== '') {
            $qDok->where('termin', $termin);
        }

        $rowDok = $qDok->get()->getRowArray();

        $requiredDok = [
            'permohonan_penarikan',
            'dokumen_kebutuhan_penarikan',
            'dokumen_progres',
            // tambahkan jika ada field lain wajib
        ];

        $dokOk = true;
        $missingDok = [];

        if (!$rowDok) {
            $dokOk = false;
            $missingDok[] = 'row_kosong';
        } else {
            foreach ($requiredDok as $fld) {
                if (!array_key_exists($fld, $rowDok))
                    continue;
                $val = $rowDok[$fld];
                if ($val === null || $val === '') {
                    $dokOk = false;
                    $missingDok[] = $fld;
                }
            }
        }

        // -----------------------
        // 4. Cek MPDKK
        // -----------------------
        $qMpdkk = $db->table('tb_mpdkk')
            ->where('kd_data', $kd_data);

        if ($termin !== null && $termin !== '') {
            $qMpdkk->where('termin', $termin);
        }

        $rowMpdkk = $qMpdkk->get()->getRowArray();

        $requiredMpdkk = [
            'plafond_kredit_mpdkk',
            'sisa_termijn_mpdkk',
            'jumlah_penarikan_disetujui_mpdkk',
            // tambahkan field lain kalau ada (rencana_penggunaan_mpdkk, dll)
        ];

        $mpdkkOk = true;
        $missingMpdkk = [];

        if (!$rowMpdkk) {
            $mpdkkOk = false;
            $missingMpdkk[] = 'row_kosong';
        } else {
            foreach ($requiredMpdkk as $fld) {
                if (!array_key_exists($fld, $rowMpdkk))
                    continue;
                $val = $rowMpdkk[$fld];
                if ($val === null || $val === '') {
                    $mpdkkOk = false;
                    $missingMpdkk[] = $fld;
                }
            }
        }

        // -----------------------
        // STATUS GLOBAL
        // -----------------------
        $allOk = $dataIndukOk && $fcrOk && $dokOk && $mpdkkOk;

        return $this->response->setJSON([
            'status' => 'ok',
            'all_ok' => $allOk,
            'data_induk_ok' => $dataIndukOk,
            'fcr_ok' => $fcrOk,
            'dokumen_ok' => $dokOk,
            'mpdkk_ok' => $mpdkkOk,
            // opsional: informasi field yang kosong untuk debugging
            'missing' => [
                'data_induk' => $missingInduk,
                'fcr' => $missingFcr,
                'dokumen' => $missingDok,
                'mpdkk' => $missingMpdkk,
            ],
        ]);
    }

    public function simpan_permohonan()
    {
        $kd_data = trim((string) $this->request->getPost('kd_data'));
        $termin = trim((string) $this->request->getPost('termin'));

        $jumlah = $this->request->getPost('jumlah_penarikan');
        $tanggal = $this->request->getPost('tanggal');

        $disposisi_pemasar = $this->request->getPost('disposisi_pemasar');
        $disposisi_koor_pemasar = $this->request->getPost('disposisi_koor_pemasar');
        $disposisi_kacab = $this->request->getPost('disposisi_kacab');
        $disposisi_analis = $this->request->getPost('disposisi_analis');
        $disposisi_kabag = $this->request->getPost('disposisi_kabag');
        $disposisi_kadiv = $this->request->getPost('disposisi_kadiv');

        if ($kd_data === '' || $termin === '') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Parameter kd_data / termin tidak lengkap.'
            ]);
        }

        // fallback jumlah dari tb_mpdkk jika kosong
        if ($jumlah === null || $jumlah === '') {
            $rowM = $this->db->table('tb_mpdkk')
                ->select('jumlah_penarikan_disetujui_mpdkk')
                ->where('kd_data', $kd_data)
                ->where('termin', $termin)
                ->get()
                ->getRowArray();

            if ($rowM) {
                $jumlah = $rowM['jumlah_penarikan_disetujui_mpdkk'];
            }
        }

        $jumlah = ($jumlah !== null && $jumlah !== '') ? (float) $jumlah : null;
        $tanggal = $tanggal ?: date('Y-m-d');

        $builder = $this->db->table('tb_penarikan');

        // ambil row penarikan eksisting
        $row = $builder->where('kd_data', $kd_data)->where('termin', $termin)->get()->getRowArray();
        if (!$row) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Data penarikan tidak ditemukan untuk kd_data={$kd_data}, termin={$termin}."
            ]);
        }

        // =========================
        // AMBIL PLAFOND DARI tb_data_induk
        // =========================
        $rowInduk = $this->db->table('tb_data_induk')
            ->select('plafond')
            ->where('kd_data', $kd_data)
            ->where('termin', $termin)   // kalau tb_data_induk pakai termin
            ->get()
            ->getRowArray();

        // jika ternyata tb_data_induk tidak per termin, pakai tanpa termin:
        if (!$rowInduk) {
            $rowInduk = $this->db->table('tb_data_induk')
                ->select('plafond')
                ->where('kd_data', $kd_data)
                ->get()
                ->getRowArray();
        }

        $plafondRaw = $rowInduk['plafond'] ?? 0;

        // normalisasi plafon (hapus titik/koma/spasi)
        // $plafond = (float) preg_replace('/[^\d]/', '', (string) $plafondRaw);
        $plafond = (float) $plafondRaw;
        $batasKadiv = 3000000000; // 3 miliar

        // kalau plafond >= 3M -> final approver Kadiv
        // kalau di bawah -> final approver Kacab
        $finalApproverField = ($plafond >= $batasKadiv) ? 'disposisi_kadiv' : 'disposisi_kacab';

        // =========================
        // LOGIKA STATUS PROGRESS
        // =========================
        // default status bila kosong
        $status = $row['status'] ?: 'DRAFT';

        // Tentukan status berdasarkan "sejauh mana disposisi terisi"
        // dan berdasarkan final approver
        //
        // Catatan: ini hanya contoh status yang rapi dan konsisten;
        // kamu boleh ganti text statusnya sesuai standard internal.

        $filled = [
            'disposisi_pemasar' => trim((string) $disposisi_pemasar) !== '',
            'disposisi_koor_pemasar' => trim((string) $disposisi_koor_pemasar) !== '',
            'disposisi_kacab' => trim((string) $disposisi_kacab) !== '',
            'disposisi_analis' => trim((string) $disposisi_analis) !== '',
            'disposisi_kabag' => trim((string) $disposisi_kabag) !== '',
            'disposisi_kadiv' => trim((string) $disposisi_kadiv) !== '',
        ];

        // status berjalan (progress)
        // (urutan: pemasar -> koor -> kacab -> analis -> kabag -> kadiv)
        if ($filled['disposisi_pemasar'])
            $status = 'DIPROSES_KOOR_PEMASAR';
        if ($filled['disposisi_koor_pemasar'])
            $status = 'DIPROSES_KACAB';
        if ($filled['disposisi_kacab']) {
            // jika finalnya kacab (plafond < 3M), selesai di sini
            $status = ($finalApproverField === 'disposisi_kacab') ? 'DISETUJUI' : 'DIPROSES_ANALIS';
        }
        if ($filled['disposisi_analis'])
            $status = 'DIPROSES_KABAG';
        if ($filled['disposisi_kabag'])
            $status = 'DIPROSES_KADIV';

        // FINAL: jika final approver sudah isi, set DISETUJUI
        if ($finalApproverField === 'disposisi_kadiv' && $filled['disposisi_kadiv']) {
            $status = 'DISETUJUI';
        }

        // kalau sudah disetujui, jangan turun lagi
        if (!empty($row['status']) && strtoupper($row['status']) === 'DISETUJUI') {
            $status = 'DISETUJUI';
        }

        $now = date('Y-m-d H:i:s');

        // Update data (tetap update kolom disposisi sesuai yang dikirim)
        $dataUpdate = [
            'jumlah_penarikan' => $jumlah,
            'tanggal' => $tanggal,
            'status' => $status,

            'disposisi_pemasar' => $disposisi_pemasar,
            'disposisi_koor_pemasar' => $disposisi_koor_pemasar,
            'disposisi_kacab' => $disposisi_kacab,
            'disposisi_analis' => $disposisi_analis,
            'disposisi_kabag' => $disposisi_kabag,
            'disposisi_kadiv' => $disposisi_kadiv,

            'updated_at' => $now,
        ];

        // jangan tulis NULL (tapi string kosong tetap akan keupdate kalau kamu kirim kosong)
        $dataUpdate = array_filter($dataUpdate, static fn($v) => $v !== null);

        // ===== DEBUG: cek final approver & status =====
        // dd($finalApproverField);

        try {
            $ok = $builder->where('kd_data', $kd_data)->where('termin', $termin)->update($dataUpdate);
            if (!$ok) {
                $err = $this->db->error();
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal update tb_penarikan.',
                    'db_error' => $err,
                ]);
            }

            return $this->response->setJSON([
                'status' => 'ok',
                'message' => 'Permohonan penarikan berhasil disimpan.',
                'status_row' => $status,
                'plafond' => $plafond,
                'final_approver' => $finalApproverField,
                'batas_kadiv' => $batasKadiv,
            ]);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }




    public function cek($kd_data)
    {
        $hasil = [
            'data_induk' => $this->cekTable('tb_data_induk_tb', $kd_data),
            'fcr' => $this->cekTable('tb_fcr', $kd_data),
            'ceklist' => $this->cekTable('tb_dok_ceklis', $kd_data),
            'mpdkk' => $this->cekTable('tb_mpdkk', $kd_data),
            'fak_data' => $this->cekTable('tb_fak_data', $kd_data),
            'fak_rl' => $this->cekTable('tb_fak_rl', $kd_data),
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
            if ($kolom === 'kd_data')
                continue; // skip kolom kunci
            if ($nilai === null || $nilai === '') {
                return false; // ada kolom kosong
            }
        }
        return true; // semua kolom terisi
    }

    public function cetak_dokumen($kd_data, $id_dok,$termin)
    {
        // Cetak Dokumen Pengajuan
        if ($id_dok == sha1('fcr_gen')) {
            $this->generate_fcr($kd_data, $id_dok,$termin);
        // } else if ($id_dok == sha1('fcr_usaha_gen')) {
        //     $this->generate_fcr_usaha($kd_data, $id_dok);
        // } else if ($id_dok == sha1('fcr_agunan_gen')) {
        // } else if ($id_dok == sha1('fcr_dok_ceklist_gen')) {
        //     $this->generate_dokumen_ceklis($kd_data, $id_dok);
        // } else if ($id_dok == sha1('fak_gen')) {
        // } else if ($id_dok == sha1('faa_gen')) {
        // } else if ($id_dok == sha1('mauk_gen')) {
        // } else if ($id_dok == sha1('dcc_gen')) {
        // } else if ($id_dok == sha1('scoring_gen')) {
        // } else if ($id_dok == sha1('fkk_gen')) {
        //     $this->generate_fkk($kd_data, $id_dok);
        // } else if ($id_dok == sha1('mkk_gen')) {
        //     $this->generate_mkk($kd_data, $id_dok);
        // } else if ($id_dok == sha1('sp2k_gen')) {
        // } else if ($id_dok == sha1('pk_gen')) {
        } else {
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('pengajuan-kredit-transaksional') . '">Klik untuk kembali</a>';
        }
    }

    public function generate_fcr($kd_data, $id_dok,$termin)
    {
        $cek_ada = $this->db->query("SELECT * FROM tb_fcr_penarikan where SHA1(kd_data) = '" . $kd_data . "' AND termin= '".$termin."' ");
        $ada_data_entry = $this->db->query("SELECT * FROM tb_data_entry where SHA1(kd_data) = '" . $kd_data . "' ");
        $ada_data_master = $this->db->query("SELECT * FROM tb_data_induk where SHA1(kd_data) = '" . $kd_data . "' AND termin= '".$termin."' ");

        // if ($cek_ada->getNumRows() > 0 && $ada_data_entry->getNumRows() > 0 && $ada_data_master->getNumRows() > 0) {
        if ($cek_ada->getNumRows() > 0 && $ada_data_master->getNumRows() > 0) {
        // if ($cek_ada->getNumRows() > 0 ) {
            $data = $cek_ada->getRow();
            $data_entry = $ada_data_entry->getRow();
            // $this->debug($data->kondisi_fisik_kantor);
            $data_master = $ada_data_master->getRow();

            $ada_nama_unit = $this->db->query("SELECT nama_unit FROM tb_unit_kerja where kd_unit = '" . $data_master->unit_kerja . "' ");
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
            echo 'Dokumen tidak ditemukan. <a href="' . base_url('penarikan-kredit-transaksional') . '">Klik untuk kembali</a>';
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

    public function get_unit_tanpa_konsolidasi()
    {
        // $hasil = $this->db->query("SELECT * FROM tb_level order by waktu_maker_level desc limit 5")->getResult();
        $hasil = $this->db->query("SELECT kd_unit, nama_unit FROM tb_unit_kerja where aktif_unit = 'Aktif' ")->getResult();

        $data['unit'] = $hasil;
        echo json_encode($data);
    }
    public function simpan_unit()
    {

        if (
            !$this->validate([

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



            ])
        ) {
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

        if (
            !$this->validate([

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





            ])
        ) {

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
