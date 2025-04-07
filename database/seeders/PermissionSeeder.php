<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::truncate();

        $permissions = [
            'role-lihat',
            'role-buat',
            'role-edit',
            'role-hapus',

            'permission-lihat',
            'permission-buat',
            'permission-edit',
            'permission-hapus',

            'user-lihat',
            'user-buat',
            'user-edit',
            'user-hapus',

            'hasil_asesmen-lihat',
            'hasil_asesmen-buat',
            'hasil_asesmen-edit',
            'hasil_asesmen-hapus',

            'penilaian_asesmen-lihat',
            'penilaian_asesmen-buat',
            'penilaian_asesmen-edit',
            'penilaian_asesmen-hapus',

            'asesmen_evaluator-lihat',
            'asesmen_evaluator-buat',
            'asesmen_evaluator-edit',
            'asesmen_evaluator-hapus',

            'pertanyaan-lihat',
            'pertanyaan-buat',
            'pertanyaan-edit',
            'pertanyaan-hapus',

            'daftar_asesmen-lihat',
            'daftar_asesmen-buat',
            'daftar_asesmen-edit',
            'daftar_asesmen-hapus',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name' => 'web']);
        }
    }
}
