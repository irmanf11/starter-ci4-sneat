<?php

namespace App\Database\Seeds;

use App\Models\PenggunaModel;
use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_lengkap' => 'Administrator',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'level' => 'Admin',
            'aktif' => 1,
        ];

        $pengguna = new PenggunaModel();
        $pengguna->insert($data);
    }
}
