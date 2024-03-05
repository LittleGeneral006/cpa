<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginAttemptsModel extends Model
{
    protected $table = 'login_attempts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ip_address', 'timestamp', 'username'];

    public function getAttempts($login, $ipAddress)
    {
        // $timestamp = time() - 60; // Hanya menghitung percobaan dalam waktu 1 menit terakhir
        // return $this->where('ip_address', $ipAddress)
        //     ->where('username', $login)
        //     ->where('timestamp >=', $timestamp)
        //     ->countAllResults();
        $attempts = $this->where('ip_address', $ipAddress)
            ->where('username', $login)
            ->countAllResults();

        $timestamp = time(); // Default timestamp

        if ($attempts >= 3 && $attempts < 5) {
            // Jika jumlah percobaan lebih dari atau sama dengan 3 dan kurang dari 5, gunakan timestamp untuk 1 menit terakhir
            $timestamp -= 60;
        } elseif ($attempts >= 5 && $attempts < 8) {
            // Jika jumlah percobaan lebih dari atau sama dengan 5 dan kurang dari 8, gunakan timestamp untuk 5 menit terakhir
            $timestamp -= 300;
        }

        return $this->where('ip_address', $ipAddress)
            ->where('username', $login)
            ->where('timestamp >=', $timestamp)
            ->countAllResults();
    }
    // public function getAttempts5min($login, $ipAddress)
    // {
    //     $timestamp = time() - 300; // Hanya menghitung percobaan dalam waktu 5 menit terakhir
    //     return $this->where('ip_address', $ipAddress)
    //         ->where('username', $login)
    //         ->where('timestamp >=', $timestamp)
    //         ->countAllResults();
    // }
    public function getAttemptsBlock($login, $ipAddress)
    {
        // $timestamp = time() - 300; // Hanya menghitung percobaan dalam waktu 5 menit terakhir
        return $this->where('ip_address', $ipAddress)
            ->where('username', $login)
            // ->where('timestamp >=', $timestamp)
            ->countAllResults();
    }

    public function incrementAttempts($login, $ipAddress)
    {
        return $this->save(['ip_address' => $ipAddress, 'username' => $login, 'timestamp' => time()]);
    }

    public function resetAttempts($login, $ipAddress)
    {
        return $this->where('ip_address', $ipAddress)->where('username', $login)->delete();
    }
}
