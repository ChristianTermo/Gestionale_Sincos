<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $intermedio = Role::create(['name' => 'intermedio']);
        $standard = Role::create(['name' => 'standard']);
        $minimo = Role::create(['name' => 'minimo']);
    }
}
