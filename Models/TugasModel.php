<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    // Nama tabel database yang digunakan model ini
    protected $table = 'tugas';

    // Primary key tabel
    protected $primaryKey = 'id';

    // Aktifkan auto increment untuk kolom primary key
    protected $useAutoIncrement = true;

    // Menentukan tipe data hasil query (array atau object)
    protected $returnType = 'array';

    // Tidak menggunakan soft deletes (penghapusan data dengan menandai, bukan menghapus)
    protected $useSoftDeletes = false;

    // Melindungi field dari mass assignment, hanya field yang diizinkan yang bisa diisi
    protected $protectFields = true;

    // Field yang diizinkan untuk diisi melalui insert/update
    protected $allowedFields = ['judul', 'deskripsi', 'deadline', 'status', 'user_id'];

    // Tidak mengizinkan insert kosong (tanpa field)
    protected bool $allowEmptyInserts = false;

    // Hanya field yang berubah yang akan diupdate
    protected bool $updateOnlyChanged = true;

    // Tidak menggunakan casting data otomatis
    protected array $casts = [];
    protected array $castHandlers = [];

    // Pengaturan tanggal (timestamps) — diatur tapi tidak digunakan
    protected $useTimestamps = false; // TIDAK aktif, meskipun field `created_at` dll ditentukan
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validasi data (tidak diaktifkan pada model ini)
    protected $validationRules = [];        // Belum ada aturan validasi
    protected $validationMessages = [];     // Tidak ada pesan validasi custom
    protected $skipValidation = false;      // Proses validasi tetap dijalankan jika ada rule
    protected $cleanValidationRules = true; // Membersihkan rule kosong

    // Pengaturan callback (fungsi yang dijalankan otomatis sebelum/selesai proses tertentu)
    protected $allowCallbacks = true;

    // Callback kosong, bisa diisi jika ingin proses otomatis saat insert/update/delete
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
