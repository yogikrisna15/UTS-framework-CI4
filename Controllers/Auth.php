<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {

    // Fungsi untuk proses login pengguna
    public function login() {
        // Memuat helper form agar bisa menggunakan fungsi seperti set_value()
        helper(['form']);

        // Mengecek apakah request method adalah POST (artinya form sedang dikirim)
        if ($this->request->getMethod() === 'post') {

            // Membuat instance model pengguna
            $model = new UserModel();

            // Mencari pengguna berdasarkan username yang dimasukkan
            $user = $model->where('username', $this->request->getPost('username'))->first();

            // Jika user ditemukan dan password cocok
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Set data user ke session
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username']
                ]);

                // Redirect ke halaman setelah login berhasil (misalnya dashboard tugas)
                return redirect()->to('/tugas');
            }

            // Jika login gagal, kembali ke form login dengan pesan error
            return redirect()->back()->with('error', 'Login gagal');
        }

        // Jika bukan POST, tampilkan halaman login
        return view('auth/login');
    }

    // Fungsi untuk proses registrasi pengguna
    public function register() {
        // Memuat helper form
        helper(['form']);

        // Cek apakah form dikirim via POST
        if ($this->request->getMethod() === 'post') {

            // Membuat instance model user
            $model = new UserModel();

            // Menyiapkan data untuk disimpan
            $data = [
                'username' => $this->request->getPost('username'),
                // Hash password sebelum disimpan ke database
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            // Menyimpan data user ke database
            $model->insert($data);

            // Redirect ke halaman login setelah registrasi
            return redirect()->to('/login');
        }

        // Jika bukan POST, tampilkan form registrasi
        return view('auth/register');
    }

    // Fungsi untuk logout pengguna
    public function logout() {
        // Menghapus seluruh data sesi
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
