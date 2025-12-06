<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        //Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]
        ->forgetCachedPermissions();

        //role dengan huruf kecil
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        //Buat Akun ADMIN
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],//Cek email biar gak duplicate
            [
                'name' => 'Admin',
                'password' => Hash::make('admin'), //Passwordnya: admin
            ]
        );
        $admin->assignRole($roleAdmin);//<-- Kasih Jabatan Admin

        //Buat Akun USER
        $user = User::firstOrCreate(
            ['email' => 'Roberto@gmail.com'],
            [
                'name' => 'Roberto User',
                'password' => Hash::make('roberto'),
            ]
        );
            $user->assignRole($roleUser);//<-- Kasih Jabatan User
        }
}
