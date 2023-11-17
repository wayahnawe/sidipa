<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $superadmin = User::create([
            'name' => 'Rengga Patria',
            'email' => 'rengga.patria@dsse.co.id',
            'password' => Hash::make('KKLnup78'),
            'email_verified_at' => now(),
            'status' => '1',
        ]);

        $role = Role::create(['name' => 'Admin 1']);

        $permissions = Permission::pluck('name','id')->all();


        $role->syncPermissions($permissions);

        $superadmin->assignRole([$role->id]);
    }
}
