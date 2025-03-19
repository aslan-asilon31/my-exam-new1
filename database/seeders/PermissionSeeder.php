<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Pengguna;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // reset cahced roles and permission
                app()[PermissionRegistrar::class]->forgetCachedPermissions();

                // create permissions
                Permission::create(['name' => 'view pertanyaan']);
                Permission::create(['name' => 'create pertanyaan']);
                Permission::create(['name' => 'edit pertanyaan']);
                Permission::create(['name' => 'delete pertanyaan']);
                Permission::create(['name' => 'publish pertanyaan']);
                Permission::create(['name' => 'unpublish pertanyaan']);

                //create roles and assign existing permissions
                $customerRole = Role::create(['name' => 'customer']);
                $customerRole->givePermissionTo('view pertanyaan');
                // $customerRole->givePermissionTo('edit pertanyaan');
                // $customerRole->givePermissionTo('create pertanyaan');
                // $customerRole->givePermissionTo('delete pertanyaan');
        
                $marketingRole = Role::create(['name' => 'marketing']);
                $marketingRole->givePermissionTo('view pertanyaan');
                $marketingRole->givePermissionTo('create pertanyaan');
                $marketingRole->givePermissionTo('edit pertanyaan');
                $marketingRole->givePermissionTo('delete pertanyaan');
                $marketingRole->givePermissionTo('publish pertanyaan');
                $marketingRole->givePermissionTo('unpublish pertanyaan');
        
                $developerRole = Role::create(['name' => 'developer']);
                // gets all permissions via Gate::before rule
        
                // create demo users
                $user = Pengguna::factory()->create([
                    'name' => 'Example user',
                    'email' => 'writer@qadrlabs.com',
                    'password' => bcrypt('12345678')
                ]);
                $user->assignRole($visitorRole);
        
                $user = Pengguna::factory()->create([
                    'name' => 'Example admin user',
                    'email' => 'sales@qadrlabs.com',
                    'password' => bcrypt('12345678')
                ]);
                $user->assignRole($salesRole);
        
                $user = Pengguna::factory()->create([
                    'name' => 'Example developer user',
                    'email' => 'developer@qadrlabs.com',
                    'password' => bcrypt('12345678')
                ]);
                $user->assignRole($developerRole);
    }
}
