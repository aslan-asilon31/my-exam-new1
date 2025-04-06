<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\RoleHasPermission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua permission dari database
        $permissions = Permission::all();

        // Hitung jumlah permission yang ada
        $permissionCount = $permissions->count();

        // Jika ada permissions, lakukan iterasi melalui masing-masing ID-nya
        if ($permissionCount > 0) {
            foreach ($permissions as $permission) {
                // Lakukan sesuatu dengan setiap permission,
                // misalnya menambahkan ke role atau mencetak ID-nya.

                RoleHasPermission::create([
                    'role_id' => 1, // Ganti dengan ID role yang sesuai jika perlu.
                    'permission_id' => $permission->id,
                ]);
            }
        } else {
            \Log::info('No permissions found to assign.');
        }
    }
}
