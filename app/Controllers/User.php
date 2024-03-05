<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Files\File;

use App\Models\UsersModel;

// use CodeIgniter\I18n\Time;
use DateTime;
// Import namespace yang diperlukan
use CodeIgniter\Validation\Rules;

class User extends BaseController
{
    private $now;
    public $db;
    protected $users;
    public $session;
    public $email;
    public function __construct()
    {
        helper('date');
        // $this->Service = new ConfigServices();
        // $this->UsersModel = new UsersModel();
        $this->db = \Config\Database::connect();
        $this->email = Services::email();
        $this->now = date('Y-m-d H:i:s', now());
        // $this->UsersModel = new UsersModel();
        $this->session = session();
    }
    public function index()
    {
        $data['setting'] = $this->db->query("SELECT * from tb_pengaturan")->getRow();
        return view('backend/v_login', $data);
    }

    public function gambar_login()
    {
        // Membuat array angka dari 1 sampai 18
        $numbers = range(1, 17);

        // Mengacak array angka
        shuffle($numbers);

        // Mengambil angka pertama setelah diacak
        $randomNumber = $numbers[0];

        // Menampilkan angka random
        // echo "Angka random: $randomNumber";

        // Logic untuk mendapatkan URL gambar dari database atau sumber lainnya
        $imageUrl = base_url() . 'public/assets/img/login/' . $randomNumber . '.jpg';

        // Mengembalikan URL gambar sebagai response JSON
        // return $this->response->setJSON(['image_url' => $imageUrl]);
        $data['image_url'] = $imageUrl;
        echo json_encode($data);
    }
    public function proses_login()
    {
        $users = new UsersModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $ipAddress = $this->request->getIPAddress();

        // Check the number of failed login attempts
        $loginAttemptsModel = new \App\Models\LoginAttemptsModel(); // Sesuaikan dengan nama model yang sesuai di proyek Anda
        $attempts = $loginAttemptsModel->getAttempts($username, $ipAddress);

        // $dataUser = $users->where([
        //     'username' => $username,
        // ])->first();
        $isi_counter = $this->db->query("SELECT username_user from tb_user where username_user ='" . $username . "' and counter_blokir >= '1' and counter_blokir <= '2' ")->getNumRows();
        if ($isi_counter > 0) {
            $session = session();
            $tangkap_session = $session->get('nama_tempdata');

            if ($tangkap_session == null) {
                $data = [
                    'counter_blokir' => 0
                ];
                $cek_username = $this->db->query("SELECT username_user from tb_user where username_user ='" . $username . "' ")->getNumRows();

                if ($cek_username > 0) {

                    $this->db->table('tb_user')->where('username_user', $username)->update($data);
                }
            }
        }
        $cek_blokir = $this->db->query("SELECT username_user from tb_user where username_user ='" . $username . "' and aktif_user = 'Ya' ")->getNumRows();
        // $cek_blokir = $this->db->query("SELECT username_user from tb_user where username_user ='" . $username . "' and counter_blokir >= '3' ")->getNumRows();
        if ($cek_blokir > 0) {
            echo "Akun Anda Belum Aktif. Hubungi Divisi Terkait Untuk Mengaktifkan Akun";
        } else {
            $data_user = $this->db->query("SELECT * from tb_user where username_user ='" . $username . "' ")->getRow();
            if ($data_user) {
                if (password_verify($password, $data_user->password_user)) {
                    // $nama_level = $this->db->query("SELECT kd_level from tb_level where kd_level = '" . $kd_level . "' ")->getNumRows();
                    $cek_username = $this->db->query("SELECT username_user from tb_user where username_user ='" . $username . "' ")->getNumRows();

                    if ($cek_username > 0) {
                        $nama_level = $this->db->query("SELECT nama_level from tb_level where kd_level = '" . $data_user->kd_level_user . "' ")->getNumRows();
                        if ($nama_level > 0) {
                            $nama_level = $this->db->query("SELECT nama_level from tb_level where kd_level = '" . $data_user->kd_level_user . "' ")->getRow()->nama_level;
                        } else {
                            $nama_level = 'Nama level belum ada';
                        }
                        $nama_unit = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit = '" . $data_user->kd_unit_user . "' ")->getNumRows();
                        if ($nama_unit > 0) {
                            $nama_unit = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit = '" . $data_user->kd_unit_user . "' ")->getRow()->nama_unit;
                        } else {
                            $nama_unit = 'Nama unit belum ada';
                        }

                        $loginAttemptsModel->resetAttempts($username, $ipAddress);

                        session()->set([
                            'kd_user' => $data_user->kd_user,
                            'username_user' => $data_user->username_user,
                            'kd_unit_user' => $data_user->kd_unit_user,
                            'kd_level_user' => $data_user->kd_level_user,
                            'nama_user' => $data_user->nama_user,
                            'last_login_user' => $data_user->last_login_user,
                            'sha_user' => sha1('SHA' . gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8)),
                            'nama_foto' => $data_user->nama_foto,
                            'kd_unit_user2' => $data_user->kd_unit_user2,
                            'kd_induk_user' => $data_user->kd_induk_user,
                            'konsolidasi_user' => $data_user->konsolidasi_user,
                            'nama_level' => $nama_level,
                            'nama_unit' => $nama_unit,
                            'sudah_login' => TRUE,
                        ]);
                        $data = [
                            'last_login_user' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                            // 'last_login_user' => $this->now,
                            'sha_user' => sha1('SHA' . gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8)),
                            'counter_blokir' => 0,
                            'aktif_user' => 'Tidak'
                        ];
                        $this->db->table('tb_user')->where('username_user', $username)->update($data);
                        $pengaruh = $this->db->affectedRows();
                        echo json_encode($pengaruh);
                    }
                } else {
                    $loginAttemptsModel->incrementAttempts($username, $ipAddress);

                    if ($attempts < 3) {
                        // Too many failed attempts, block the account
                        echo "Username/Password salah";
                    } else
                    if ($attempts >= 3 && $attempts < 5) {
                        // Too many failed attempts, block the account
                        echo "Terlalu Banyak Percobaan Masuk. Harap Tunggu 1 Menit";
                    } else
                    if ($attempts >= 5 && $attempts < 7) {
                        // Too many failed attempts, block the account
                        echo "Terlalu Banyak Percobaan Masuk. Harap Tunggu 5 Menit";
                    }
                    if ($attempts > 8) {
                        // Too many failed attempts, block the account
                        $aktif = 'Ya';
                        $data = [
                            'aktif_user' => $aktif
                        ];
                        $this->db->table('tb_user')->where('username_user', $username)->update($data);
                        echo "Akun Anda Telah Dinonaktifkan. Hubungi Divisi Terkait Untuk Mengaktifkan Akun";
                    }
                }

                // echo "1";
                // } else {
                //     $cek_username = $this->db->query("SELECT username_user from tb_user where username_user ='" . $username . "' ")->getNumRows();

                //     if ($cek_username > 0) {
                //         $this->db->table('tb_user')->where('username_user', $username)->increment('counter_blokir', 1);
                //         $cek_counter = $this->db->query("SELECT counter_blokir from tb_user where username_user ='" . $username . "' ")->getRow()->counter_blokir;
                //     }

                //     if ($cek_counter == '1') {
                //         $session = session();
                //         $session->set('nama_tempdata', 'isi_tempdata');
                //         $session->markAsTempdata('nama_tempdata', 10800); // 3 jam

                //         echo "Password Salah. Sisa Percobaan Password 2";
                //     } else if ($cek_counter == '2') {
                //         $session = session();
                //         $session->set('nama_tempdata', 'isi_tempdata');
                //         $session->markAsTempdata('nama_tempdata', 10800); // 3 jam
                //         echo "Password Salah. Sisa Percobaan Password 1";
                //     } else if ($cek_counter == '3') {
                //         if ($cek_counter == '3') {
                //             $aktif = 'Ya';
                //         } else {
                //             $aktif = 'Tidak';
                //         }
                //         $data = [
                //             'aktif_user' => $aktif
                //         ];
                //         $this->db->table('tb_user')->where('username_user', $username)->update($data);
                //         echo "Akun Anda Telah di Blokir. Hubungi Divisi Terkait Untuk Membuka Blokir Akun";
                //     } else {
                //         echo "Password Salah. Masukkan Password Yang Benar";
                //         // echo "10";
                //     }
                // }
            } else {
                echo "Masukkan Username/Password Yang Benar";
            }
        }
    }
    public function cek_pw_default()
    {
        $data_user = $this->db->query("SELECT kd_user, password_user from tb_user where kd_user ='" . session()->get('kd_user') . "'")->getRow();
        $default_password = $this->db->query("SELECT default_password from tb_pengaturan")->getRow()->default_password;
        // $row = array();
        // $row[] = $aRow->nama_user; //0
        // $output[] = $row;
        // echo json_encode($output);
        if (password_verify($default_password, $data_user->password_user)) {
            $data = [
                'status' => true,
                'kd_user' => $data_user->kd_user,
            ];
            echo json_encode($data);
        } else {
            $data = [
                'status' => false,
                'kd_user' => $data_user->kd_user,
            ];
            echo json_encode($data);
        }
    }
    public function proses_ganti_pw_default()
    {
        if ($this->request->getPost('csrf_test_name')) {
            if (!$this->validate([


                'pw_baru' => [
                    'rules' => 'required|min_length[8]|max_length[50]',
                    'errors' => [
                        'required' => 'Password Baru Harus diisi',
                        'min_length' => 'Password Baru Minimal 8 Karakter',
                        'max_length' => 'Password Baru Maksimal 50 Karakter',
                    ]
                ],
                'konf_pw' => [
                    'rules' => 'matches[pw_baru]|required',
                    'errors' => [
                        'required' => 'Konfirmasi Password Baru Harus diisi',
                        'matches' => 'Konfirmasi Password Baru tidak sesuai dengan Password Baru',
                    ]
                ],

            ])) {
                echo $this->validator->listErrors();
            } else {
                $kd_user = $this->request->getVar('kd_user');
                $pw_lama = $this->request->getVar('pw_lama');
                $pw_baru = $this->request->getVar('pw_baru');
                // $hitung_pw_lama = $this->db->query("SELECT kd_user from tb_users where kd_user = '" . $kd_user . "' and password_user = '".$pw_lama."' ")->getNumRows();
                // if ($hitung_pw_lama > 0) {
                $cek_pw_lama = $this->db->query("SELECT password_user from tb_user where kd_user = '" . $kd_user . "' ")->getRow()->password_user;
                $default_password = $this->db->query("SELECT default_password from tb_pengaturan")->getRow()->default_password;
                if (password_verify($pw_lama, $cek_pw_lama)) {
                    if ($pw_baru == $default_password) {
                        echo 'Password baru tidak boleh menggunakan default password';
                    } else {
                        $kd_user_db = $this->db->query("SELECT kd_user from tb_user where kd_user = '" . $kd_user . "' ")->getRow()->kd_user;
                        if ($kd_user_db == session()->get('kd_user')) {
                            // Proses penyimpanan data
                            $data = [
                                'password_user' => password_hash($this->request->getVar('pw_baru'), PASSWORD_BCRYPT),
                                'updater_user' => session()->get('nama_user'),
                                'waktu_updater_user' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                                'kd_unit_updater_user' => session()->get('kd_unit_user'),
                            ];

                            //pengecekan kd info tidak boleh sama sebelum insert
                            $cek_kd_user = $this->db->query("SELECT kd_user from tb_user where kd_user = '" . $kd_user . "' ")->getNumRows();
                            if ($cek_kd_user > 0) {

                                $this->db->table('tb_user')->where('kd_user', $kd_user)->update($data);
                                $pengaruh = $this->db->affectedRows();
                                echo json_encode($pengaruh);
                            } else {
                                echo 'Atur ulang password belum berhasil';
                            }
                        } else {
                            echo 'Anda belum login';
                        }
                    }
                } else {
                    echo 'Password lama salah';
                }
                // } else {
                //     echo 'Password lama salah.';
                // }
            }
        } else {
            echo "Token CSRF tidak valid!";
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url() . 'login');
    }
    public function v_user()
    {
        $hasil = $this->hak_akses();
        if ($hasil == true) {
            $data['title'] = 'Setup User';
            $data['setting'] = $this->db->query("SELECT * from tb_pengaturan")->getRow();
            return view('backend/v_user', $data);
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
    public function tabel_user()
    {
        $sQuery1 = "SELECT * FROM v_user ";
        $sQuery2 = "SELECT COUNT(kd_user) AS TOTFIL FROM v_user ";
        $sQuery3 = "SELECT COUNT(kd_user) AS TOT FROM v_user ";
        $sIndexColumn = "kd_user";

        // $where2 = " kd_unit_pks <>'100' ";
        $where2 = " username_user !='12345' and kd_unit_user <>'abc' ";

        //aktif user = isi dari counter blokir. apabila 1,2 = tidak. 3 = ya
        $aColumns = array(
            'username_user', 'nama_unit', 'nama_level', 'nama_user', 'aktif_user', 'konsolidasi_user'
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
            $row[] = $aRow->username_user; //0
            $row[] = $aRow->nama_unit; //1
            $row[] = $aRow->nama_level; //2
            $row[] = $aRow->nama_user; //3
            //4
            if ($aRow->counter_blokir == '3') {
                $row[] = '<span class="label label-danger">' . $aRow->aktif_user . '</span>';
            } else {
                $row[] = '<span class="label label-primary">' . $aRow->aktif_user . '</span>';
            }
            //5
            $row[] = $aRow->konsolidasi_user;
            // 6
            $row[] = '<button title="Edit" id="edit_user" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>' . '<button title="Detail" id="detail_user" class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>';
            $row[] = $aRow->kd_user; //7

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
    public function get_level()
    {
        $hasil = $this->db->query("SELECT kd_level, nama_level FROM tb_level where aktif_level = 'Aktif' ")->getResult();
        $data['level'] = $hasil;
        echo json_encode($data);
    }
    public function get_unit()
    {
        $hasil = $this->db->query("SELECT kd_unit, nama_unit FROM tb_unit_kerja where aktif_unit = 'Aktif' ")->getResult();
        $data['unit'] = $hasil;
        echo json_encode($data);
    }
    public function simpan_user()
    {
        $username = $this->request->getVar('username_user_tambah');
        if (strpos($username, ' ') !== false) {

            echo '<ul><li>Username tidak boleh mengandung spasi</li></ul>';
        } else {

            if (!$this->validate([
                'nama_user_tambah' => [
                    'rules' => 'required|min_length[3]|max_length[100]|alpha_space',
                    'errors' => [
                        'required' => 'Nama Harus diisi',
                        'min_length' => 'Nama Minimal 3 Karakter',
                        'max_length' => 'Nama Maksimal 100 Karakter',
                        'alpha_space' => 'Nama Hanya Memuat Huruf atau Spasi',

                    ]
                ],
                'username_user_tambah' => [
                    'rules' => 'required|min_length[5]|max_length[30]|is_unique[tb_user.username_user]',
                    'errors' => [
                        'required' => 'Username Harus diisi',
                        'min_length' => 'Username Minimal 5 Karakter',
                        'max_length' => 'Username Maksimal 30 Karakter',
                        'is_unique' => 'Username Sudah Digunakan Sebelumnya',

                    ]
                ],

                'kd_level_user_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Level Harus diisi',
                    ]
                ],
                'kd_unit_user_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit Kerja Harus diisi',
                    ]
                ],
                'konsolidasi_user_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role User Harus diisi',
                    ]
                ],
                'counter_blokir_tambah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Blokir Harus diisi',
                    ]
                ],

            ])) {

                echo $this->validator->listErrors();
            } else {
                $kd_unit = $this->request->getVar('kd_unit_user_tambah');
                $counter_blokir = $this->request->getVar('counter_blokir_tambah');
                if ($counter_blokir == '3') {
                    $aktif = 'Ya';
                } else {
                    $aktif = 'Tidak';
                }
                $default_password = $this->db->query("SELECT * from tb_pengaturan")->getRow()->default_password;

                // Proses penyimpanan data
                $data = [
                    'kd_user' => 'USER' . gmdate("mdYHis", time() + 60 * 60 * 8),
                    'username_user' => $this->request->getVar('username_user_tambah'),
                    'password_user' => password_hash($default_password, PASSWORD_BCRYPT),
                    'kd_unit_user' => $this->request->getVar('kd_unit_user_tambah'),
                    'kd_level_user' => $this->request->getVar('kd_level_user_tambah'),
                    'nama_user' => $this->request->getVar('nama_user_tambah'),
                    'aktif_user' => $aktif,
                    'counter_blokir' => $this->request->getVar('counter_blokir_tambah'),

                    'kd_unit_user2' => session()->get('kd_unit_user'),
                    'kd_induk_user' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . $kd_unit . "' ")->getRow()->kd_induk_unit,
                    'konsolidasi_user' => $this->request->getVar('konsolidasi_user_tambah'),

                    'maker_user' => session()->get('nama_user'),
                    'waktu_maker_user' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                    'kd_unit_maker_user' => session()->get('kd_unit_user'),

                ];
                //pengecekan kd info tidak boleh sama sebelum insert
                $cek_kd_user = $this->db->query("SELECT kd_user from tb_user where kd_user = '" . $data['kd_user'] . "' ")->getNumRows();
                if ($cek_kd_user < 1) {

                    $this->db->table('tb_user')->insert($data);
                    $pengaruh = $this->db->affectedRows();
                    echo json_encode($pengaruh);
                } else {
                    echo 'Simpan User Gagal';
                }
            }
        }
    }
    public function get_tabel_user_by_id($kd_user)
    {
        $aRow = $this->db->query("SELECT * FROM v_user where kd_user = '" . $kd_user . "' ")->getRow();

        $row = array();
        $row['kd_user'] = $aRow->kd_user; //0
        $row['username_user'] = $aRow->username_user; //
        $row['kd_unit_user'] = $aRow->kd_unit_user; //
        $row['kd_level_user'] = $aRow->kd_level_user; //
        $row['nama_user'] = $aRow->nama_user; //
        $row['aktif_user'] = $aRow->aktif_user; //
        $row['counter_blokir'] = $aRow->counter_blokir; //
        if ($aRow->counter_blokir == '3') {
            $row['counter_blokir2'] = '<span class="label label-danger">' . $aRow->aktif_user . '</span>';
        } else {
            $row['counter_blokir2'] = '<span class="label label-primary">' . $aRow->aktif_user . '</span>';
        }
        $row['last_login_user'] = $aRow->last_login_user; //
        if (empty($aRow->last_login_user)) {
            $row['last_login_user2'] = '<span class="label label-warning">Belum Pernah Login</span>';
        } else {
            $dateArr = explode(' ', $aRow->last_login_user);
            $row['last_login_user2'] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
        }
        $row['maker_user'] = $aRow->maker_user; //
        $row['waktu_maker_user'] = $aRow->waktu_maker_user; //
        if (empty($aRow->waktu_maker_user)) {

            $row['waktu_maker_user2'] = $aRow->waktu_maker_user;
        } else {

            $dateArr = explode(' ', $aRow->waktu_maker_user);
            $row['waktu_maker_user2'] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
        }
        $row['kd_unit_maker_user'] = $aRow->kd_unit_maker_user; //
        if (!empty($aRow->kd_unit_maker_user)) {
            $row['kd_unit_maker_user2'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_maker_user . "'")->getRow()->nama_unit;
        } else {
            $row['kd_unit_maker_user2'] = $aRow->kd_unit_maker_user; //
        }

        $row['updater_user'] = $aRow->updater_user; //
        $row['waktu_updater_user'] = $aRow->waktu_updater_user; //
        if (empty($aRow->waktu_updater_user)) {

            $row['waktu_updater_user2'] = $aRow->waktu_updater_user;
        } else {

            $dateArr = explode(' ', $aRow->waktu_updater_user);
            $row['waktu_updater_user2'] = date('d-m-Y', strtotime($dateArr[0])) . '&nbsp &nbsp' . $dateArr[1];
        }
        $row['kd_unit_updater_user'] = $aRow->kd_unit_updater_user; //
        if (!empty($aRow->kd_unit_updater_user)) {
            $row['kd_unit_updater_user2'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_unit_updater_user . "'")->getRow()->nama_unit;
        } else {
            $row['kd_unit_updater_user2'] = $aRow->kd_unit_updater_user;
        }
        $row['kd_unit_user2'] = $aRow->kd_unit_user2; //
        $row['kd_induk_user'] = $aRow->kd_induk_user; //
        if (!empty($aRow->kd_induk_user)) {
            $row['kd_induk_user2'] = $this->db->query("SELECT nama_unit from tb_unit_kerja where kd_unit ='" . $aRow->kd_induk_user . "'")->getRow()->nama_unit;
        } else {
            $row['kd_induk_user2'] = $aRow->kd_induk_user;
        }

        $row['konsolidasi_user'] = $aRow->konsolidasi_user; //
        if ($aRow->konsolidasi_user == '1') {
            $row['konsolidasi_user2'] = '1 - Bisa Lihat Semua Unit Kerja (Termasuk Kantor Pusat)';
        } else if ($aRow->konsolidasi_user == '2') {
            $row['konsolidasi_user2'] = '2 - Bisa Lihat Induk dan Anak Unit Sendiri (Konsolidasi Cabang)';
        } else {
            $row['konsolidasi_user2'] = '3 - Hanya Bisa Lihat Unit Kerja Sendiri';
        }
        $row['nama_level'] = $aRow->nama_level; //
        $row['nama_unit'] = $aRow->nama_unit; //

        $output['data'] = $row;
        echo json_encode($output);
    }
    public function edit_user()
    {
        $username = $this->request->getVar('username_user_edit');
        if (strpos($username, ' ') !== false) {
            echo '<ul><li>Username tidak boleh mengandung spasi</li></ul>';
        } else {

            if (!$this->validate([
                'nama_user_edit' => [
                    'rules' => 'required|min_length[3]|max_length[100]|alpha_space',
                    'errors' => [
                        'required' => 'Nama Harus diisi',
                        'min_length' => 'Nama Minimal 3 Karakter',
                        'max_length' => 'Nama Maksimal 100 Karakter',
                        'alpha_space' => 'Nama Hanya Memuat Huruf atau Spasi',

                    ]
                ],
                'username_user_edit' => [
                    'rules' => 'required|min_length[5]|max_length[30]',
                    'errors' => [
                        'required' => 'Username Harus diisi',
                        'min_length' => 'Username Minimal 5 Karakter',
                        'max_length' => 'Username Maksimal 30 Karakter',

                    ]
                ],

                'kd_level_user_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Level Harus diisi',
                    ]
                ],
                'kd_unit_user_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit Kerja Harus diisi',
                    ]
                ],
                'konsolidasi_user_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role User Harus diisi',
                    ]
                ],
                'counter_blokir_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Blokir Harus diisi',
                    ]
                ],
                'reset_password_edit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Reset Password Harus diisi',
                    ]
                ],

            ])) {
                echo $this->validator->listErrors();
            } else {
                $kd_unit = $this->request->getVar('kd_unit_user_edit');
                $counter_blokir = $this->request->getVar('counter_blokir_edit');
                if ($counter_blokir == '3') {
                    $aktif = 'Ya';
                } else {
                    $aktif = 'Tidak';
                }
                $default_password = $this->db->query("SELECT * from tb_pengaturan")->getRow()->default_password;

                // Proses penyimpanan data
                $data = [
                    // 'kd_user' => 'USER' . gmdate("mdYHis", time() + 60 * 60 * 8),
                    // 'username_user' => $this->request->getVar('username_user_edit'),
                    // 'password_user' => password_hash('Passwordbpd1*', PASSWORD_BCRYPT),
                    'kd_unit_user' => $this->request->getVar('kd_unit_user_edit'),
                    'kd_level_user' => $this->request->getVar('kd_level_user_edit'),
                    'nama_user' => $this->request->getVar('nama_user_edit'),
                    'aktif_user' => $aktif,
                    'counter_blokir' => $this->request->getVar('counter_blokir_edit'),

                    // 'kd_unit_user2' => session()->get('kd_unit_user'),
                    'kd_induk_user' => $this->db->query("SELECT kd_induk_unit from tb_unit_kerja where kd_unit = '" . $kd_unit . "' ")->getRow()->kd_induk_unit,
                    'konsolidasi_user' => $this->request->getVar('konsolidasi_user_edit'),

                    'updater_user' => session()->get('nama_user'),
                    'waktu_updater_user' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                    'kd_unit_updater_user' => session()->get('kd_unit_user'),

                ];
                $kd_user = $this->request->getVar('kd_user_edit');
                $username_input = $this->request->getVar('username_user_edit');
                $username_db = $this->db->query("SELECT username_user from tb_user where kd_user = '" . $kd_user . "' ")->getRow()->username_user;
                if ($username_input != $username_db) {
                    $cek_username_sama = $this->db->query("SELECT username_user from tb_user where username_user = '" . $username_input . "' ")->getNumRows();
                    if ($cek_username_sama > 0) {
                        echo 'Username Sudah Ada';
                    } else {
                        $data['username_user'] = $this->request->getVar('username_user_edit');
                        //pengecekan kd info tidak boleh sama sebelum insert
                        $cek_kd_user = $this->db->query("SELECT kd_user from tb_user where kd_user = '" . $kd_user . "' ")->getNumRows();
                        if ($cek_kd_user > 0) {
                            $reset_pw = $this->request->getVar('reset_password_edit');
                            if ($reset_pw == 'Ya') {
                                $data['password_user'] = password_hash($default_password, PASSWORD_BCRYPT);
                            }
                            $this->db->table('tb_user')->where('kd_user', $kd_user)->update($data);
                            $pengaruh = $this->db->affectedRows();
                            echo json_encode($pengaruh);
                            // echo $pengaruh;
                        } else {
                            echo 'Edit User Gagal';
                        }
                    }
                } else {
                    $cek_kd_user = $this->db->query("SELECT kd_user from tb_user where kd_user = '" . $kd_user . "' ")->getNumRows();
                    if ($cek_kd_user > 0) {
                        $reset_pw = $this->request->getVar('reset_password_edit');
                        if ($reset_pw == 'Ya') {
                            $data['password_user'] = password_hash($default_password, PASSWORD_BCRYPT);
                        }
                        $this->db->table('tb_user')->where('kd_user', $kd_user)->update($data);
                        $pengaruh = $this->db->affectedRows();
                        echo json_encode($pengaruh);
                        // echo $pengaruh;
                    } else {
                        echo 'Edit User Gagal';
                    }
                }
            }
        }
    }
}
