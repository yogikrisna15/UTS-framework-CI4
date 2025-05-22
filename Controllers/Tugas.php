<?php

namespace App\Controllers;
use App\Models\TugasModel;
use CodeIgniter\Controller;

class Tugas extends Controller {

    // Menampilkan daftar tugas untuk user yang sedang login
    public function index() {
        $model = new TugasModel();

        // Mengambil semua tugas berdasarkan user_id dari session
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll();

        // Menampilkan view 'tugas/index' dengan data tugas
        return view('tugas/index', $data);
    }

    // Menambahkan tugas baru
    public function tambah() {
        // Mengecek apakah form dikirim dengan metode POST
        if ($this->request->getMethod() === 'post') {
            $model = new TugasModel();

            // Menyimpan data tugas baru ke database
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
                'user_id' => session()->get('user_id'), // Menyimpan ID user yang membuat tugas
            ]);

            // Setelah disimpan, redirect ke halaman daftar tugas
            return redirect()->to('/tugas');
        }

        // Jika bukan POST, tampilkan form tambah tugas
        return view('tugas/tambah');
    }

    // Mengedit tugas yang sudah ada berdasarkan ID
    public function edit($id) {
        $model = new TugasModel();

        // Jika form dikirim, lakukan update
        if ($this->request->getMethod() === 'post') {
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]);

            // Redirect ke halaman daftar tugas
            return redirect()->to('/tugas');
        }

        // Jika bukan POST, ambil data tugas yang akan diedit
        $data['tugas'] = $model->find($id);

        // Tampilkan form edit dengan data tugas
        return view('tugas/edit', $data);
    }

    // Menghapus tugas berdasarkan ID
    public function hapus($id) {
        $model = new TugasModel();

        // Hapus tugas dari database
        $model->delete($id);

        // Redirect kembali ke daftar tugas
        return redirect()->to('/tugas');
    }
}
