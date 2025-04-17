<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Lib\Roler;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        {
            // reset cahced roles and permission
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            Permission::create(['name' => 'pertanyaan-lihat']);
            Permission::create(['name' => 'pertanyaan-ubah']);
            Permission::create(['name' => 'pertanyaan-edit']);
            Permission::create(['name' => 'pertanyaan-hapus']);

            Permission::create(['name' => 'asesmen-lihat']);
            Permission::create(['name' => 'asesmen-ubah']);
            Permission::create(['name' => 'asesmen-edit']);
            Permission::create(['name' => 'asesmen-hapus']);

            Permission::create(['name' => 'role-lihat']);
            Permission::create(['name' => 'role-ubah']);
            Permission::create(['name' => 'role-edit']);
            Permission::create(['name' => 'role-hapus']);

            Permission::create(['name' => 'user-lihat']);
            Permission::create(['name' => 'user-ubah']);
            Permission::create(['name' => 'user-edit']);
            Permission::create(['name' => 'user-hapus']);

            Permission::create(['name' => 'hasil_asesmen-lihat']);
            Permission::create(['name' => 'hasil_asesmen-ubah']);
            Permission::create(['name' => 'hasil_asesmen-edit']);
            Permission::create(['name' => 'hasil_asesmen-hapus']);

            Permission::create(['name' => 'penilaian_asesmen-lihat']);
            Permission::create(['name' => 'penilaian_asesmen-ubah']);
            Permission::create(['name' => 'penilaian_asesmen-edit']);
            Permission::create(['name' => 'penilaian_asesmen-hapus']);

            Permission::create(['name' => 'asesmen_evaluator-lihat']);
            Permission::create(['name' => 'asesmen_evaluator-ubah']);
            Permission::create(['name' => 'asesmen_evaluator-edit']);
            Permission::create(['name' => 'asesmen_evaluator-hapus']);

            Permission::create(['name' => 'daftar_asesmen-lihat']);
            Permission::create(['name' => 'daftar_asesmen-ubah']);
            Permission::create(['name' => 'daftar_asesmen-edit']);
            Permission::create(['name' => 'daftar_asesmen-hapus']);
            

            $customerRole = Role::create(['name' => 'customer']);
            $customerRole->givePermissionTo('hasil_asesmen-lihat');

            $adminRole = Role::create(['name' => 'admin']);
            $adminRole->givePermissionTo('asesmen-lihat');
            $adminRole->givePermissionTo('asesmen-ubah');
            $adminRole->givePermissionTo('asesmen-edit');

            $adminRole->givePermissionTo('pertanyaan-lihat');
            $adminRole->givePermissionTo('pertanyaan-ubah');
            $adminRole->givePermissionTo('pertanyaan-edit');

            $developerRole = Role::create(['name' => 'developer']);

            $user = User::factory()->create([
                'name' => 'aslancustomer',
                'email' => 'aslancustomer@gmail.com',
                'password' => bcrypt('123123123')
            ]);
            $user->assignRole($customerRole);

            $user = User::factory()->create([
                'name' => 'aslanadmin',
                'email' => 'aslanadmin@gmail.com',
                'password' => bcrypt('123123123')
            ]);
            $user->assignRole($adminRole);

            $user = User::factory()->create([
                'name' => 'aslandeveloper',
                'email' => 'aslandeveloper@gmail.com',
                'password' => bcrypt('123123123')
            ]);
            $user->assignRole($developerRole);
        }

        
    }
}
