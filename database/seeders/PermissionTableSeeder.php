<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-buat',
           'role-edit',
           'role-hapus',
           'permission-list',
           'permission-buat',
           'permission-edit',
           'permission-hapus',
           'asesmen-list',
           'asesmen-buat',
           'asesmen-edit',
           'asesmen-hapus'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
