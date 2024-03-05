<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "tb_user";
    protected $primaryKey = "user_id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField  = 'DELETED_AT';
    protected $allowedFields = [
        'kode_bks', 'username', 'password',
        'level', 'status', 'nama_user', 'unit_kerja',
    ];

    // public function getb_user_all()
    // {
    //     $data = $this->db->table('tb_user')->select('*')->join('t_info_kantor', 't_info_kantor.kode_bks = tb_user.kode_bks')->get()->getResult();
    //     return $data;
    // }

    // public function getb_user_info_id($id)
    // {
    //     $data = $this->db->table('tb_user')->select('*')->join('t_info_kantor', 't_info_kantor.kode_bks = tb_user.kode_bks')->where('tb_user.user_id', $id)->get()->getRow();
    //     return $data;
    // }
    public function getb_user_info_id($id)
    {
        $data = $this->db->table('tb_user')->select('*')->join('t_cabang', 't_cabang.BRANCH_CODE = tb_user.kode_bks')->where('tb_user.user_id', $id)->get()->getRow();
        return $data;
    }

    // public function getb_user_info_kode($id)
    // {
    //     $data = $this->db->table('tb_user')->select('*')->join('t_info_kantor', 't_info_kantor.kode_bks = tb_user.kode_bks')->where('tb_user.kode_bks', $id)->get()->getRow();
    //     return $data;
    // }

    public function get_id_users_row($id)
    {
        $data = $this->db->table('tb_user')->select('*')->where('user_id', $id)->get()->getRow();
        return $data;
    }

    public function get_username_users_row($username)
    {
        $data = $this->db->table('tb_user')->select('*')->where('username', $username)->get()->getRow();
        return $data;
    }

    public function get_pass_users($username, $pass)
    {

        $data = $this->db->table('tb_user')->select('*')->where('username', $username)->where('password', $pass)->countAllResults();
        return $data;
    }

    public function get_level($id)
    {
        $data = $this->db->table('tb_user')->select('level')->where('user_id', $id)->get()->getFirstRow();
        return $data;
    }

    public function getKodeBKS1()
    {
        $data = $this->db->table('t_cabang')->select('KODE_CAB, NAMA_CAB')->where('NAMA_CAB != "Kantor Pusat"')->get()->getResult();
        return $data;
    }
    public function getKodeBKS()
    {
        $data = $this->db->table('t_cabang')->select('BRANCH_CODE, BRANCH_NAME')->orderBy('BRANCH_CODE', 'asc')->get()->getResult();
        return $data;
    }
    

    // public function validationUserKode($id, $kode_bks)
    // {
    //     $data = $this->db->table('tb_user')->select('*')->join('t_info_kantor', 't_info_kantor.kode_bks = tb_user.kode_bks')->where('tb_user.user_id', $id)->where('t_info_kantor.kode_bks', $kode_bks)->countAllResults();
    //     return $data;
    // }

    public function validationKodeJumlahUser($kode_bks)
    {
        $data = $this->db->table('tb_user')->select('*')->where('kode_bks', $kode_bks)->where('level', 'supervisor')->countAllResults();
        return $data;
    }

    // public function validationKode($kode_bks)
    // {
    //     $data = $this->db->table('t_info_kantor')->select('kode_bks')->where('kode_bks', $kode_bks)->countAllResults();
    //     return $data;
    // }

    public function validationUser($username)
    {
        $data = $this->db->table('tb_user')->select('username')->where('username', $username)->countAllResults();
        return $data;
    }

    public function validationUserId($id, $username)
    {
        $data = $this->db->table('tb_user')->select('user_id')->where('user_id', $id)->where('username', $username)->countAllResults();
        return $data;
    }

    public function get_id_users($id)
    {
        $data = $this->db->table('tb_user')->select('*')->where('user_id', $id)->get()->getFirstRow();
        return $data;
    }

    public function addData($data)
    {
        $this->db->table('tb_user')->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->db->table('tb_user')->update($data, ['user_id' => $id]);
        return $this->db->affectedRows();
    }

    public function getSession($id)
    {
        $data = $this->db->table('tb_login')->select('session_id')->where('session_id', $id)->countAllResults();
        return $data;
    }

    public function getSessionUser($id)
    {
        $data = $this->db->table('tb_login')->select('session_user')->where('session_user', $id)->countAllResults();
        // $data = $this->db->table('tb_login')->select('*')->where('session_user', $id)->get()->getFirstRow();
        return $data;
    }

    public function getSessionUsername($id)
    {
        // $data = $this->db->table('tb_login')->select('session_user')->where('session_user', $id)->countAllResults();
        $data = $this->db->table('tb_login')->select('*')->where('session_user', $id)->get()->getFirstRow();
        return $data;
    }

    public function setSession($data)
    {
        $this->db->table('tb_login')->insert($data);
    }

    public function updateSession($id, $data)
    {
        $this->db->table('tb_login')->update($data, ['session_user' => $id]);
        return $this->db->affectedRows();
    }

    public function delSession($id)
    {
        $this->db->table('tb_login')->where('session_id', $id)->delete();
    }

    public function deleteData($id)
    {
        $this->UsersModel = new \App\Models\UsersModel();
        $this->UsersModel->where('user_id', $id)->delete();
        $data = [
            'deleter' => session()->get('username'),
        ];
        $this->db->table('tb_user')->update($data, ['user_id' => $id]);
    }
}
