<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Nama tabel database yang digunakan
    protected $table = 'users';

    // Primary key tabel
    protected $primaryKey = 'id';

    // Menentukan bahwa kolom primary key menggunakan auto increment
    protected $useAutoIncrement = true;

    // Tipe data hasil query akan dikembalikan sebagai array
    protected $returnType = 'array';

    // Tidak menggunakan soft deletes (hapus secara fisik dari database)
    protected $useSoftDeletes = false;

    // Mengaktifkan proteksi field agar hanya yang ada di allowedFields yang bisa diset
    protected $protectFields = true;

    // Field yang diizinkan untuk diisi (untuk insert/update)
    protected $allowedFields = ['username', 'password'];

    // Tidak mengizinkan insert kosong
    protected bool $allowEmptyInserts = false;

    // Hanya field yang berubah yang akan diperbarui
    protected bool $updateOnlyChanged = true;

    // Tidak menggunakan fitur casting otomatis
    protected array $casts = [];
    protected array $castHandlers = [];

    // Konfigurasi timestamps (meskipun field sudah disebutkan, timestamps tidak diaktifkan)
    protected $useTimestamps = false;       // TIDAK mengaktifkan otomatisasi timestamps
    protected $dateFormat = 'datetime';     // Format tanggal yang digunakan (jika aktif)
    protected $createdField = 'created_at'; // Nama kolom untuk mencatat waktu dibuat
    protected $updatedField = 'updated_at'; // Nama kolom untuk mencatat waktu diubah
    protected $deletedField = 'deleted_at'; // Nama kolom untuk soft delete

    // Validasi (belum diaktifkan atau diisi)
    protected $validationRules = [];         // Tempat menambahkan aturan validasi
    protected $validationMessages = [];      // Tempat menambahkan pesan error custom
    protected $skipValidation = false;       // Validasi akan tetap dijalankan jika ada rules
    protected $cleanValidationRules = true;  // Rules kosong akan dibersihkan

    // Callback (fungsi yang dipanggil otomatis sebelum/sesudah proses tertentu)
    protected $allowCallbacks = true;

    // Callback belum diisi, bisa digunakan untuk proses seperti hashing password otomatis
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
