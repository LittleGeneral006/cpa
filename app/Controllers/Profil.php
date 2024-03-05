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

class Profil extends BaseController
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
            $data['title'] = 'Edit Profil';
            return view('backend/v_profil', $data);
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
    public function get_tabel_user_by_id()
    {
        $kd_user = session()->get('kd_user');
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

    public function ganti_password()
    {
        $password_baru = $this->request->getVar('password_baru');
        $password_lama = $this->request->getVar('password_lama');
        $kd_user = $this->request->getPost('kd_user_edit');
        if (strpos($password_baru, ' ') !== false) {
            echo '<ul><li>Password baru tidak boleh mengandung spasi</li></ul>';
        } else {

            if (!$this->validate([
                'konfirmasi_password_baru' => [
                    'rules' => 'matches[password_baru]|required',
                    'errors' => [
                        'required' => 'Konfirmasi Password Baru Harus diisi',
                        'matches' => 'Konfirmasi Password Baru tidak sesuai dengan Password Baru',
                    ]
                ],


            ])) {
                echo $this->validator->listErrors();
            } else {
                $cek_pw_lama = $this->db->query("SELECT password_user from tb_user where kd_user = '" . $kd_user . "' ")->getRow()->password_user;
                if (password_verify($password_lama, $cek_pw_lama)) {
                    // Proses penyimpanan data
                    $data = [
                        'password_user' => password_hash($password_baru, PASSWORD_BCRYPT),

                        'updater_user' => session()->get('nama_user'),
                        'waktu_updater_user' => gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8),
                        'kd_unit_updater_user' => session()->get('kd_unit_user'),

                    ];

                    $cek_kd_user = $this->db->query("SELECT kd_user from tb_user where kd_user = '" . $kd_user . "' ")->getNumRows();
                    if ($cek_kd_user > 0) {
                        $this->db->table('tb_user')->where('kd_user', $kd_user)->update($data);
                        $pengaruh = $this->db->affectedRows();
                        echo json_encode($pengaruh);
                    } else {
                        echo 'Ganti Password Gagal';
                    }
                } else {
                    echo 'Password lama tidak sama dengan password yang sebelumnya ada di database';
                }
            }
        }
    }
}
