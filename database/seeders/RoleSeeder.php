<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Nhân viên Sales', 'slug' => 'sales'],
            ['name' => 'Điều hành Tour', 'slug' => 'operator'],
            ['name' => 'Hướng dẫn viên', 'slug' => 'guide'],
            ['name' => 'Khách hàng', 'slug' => 'customer'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['slug' => $role['slug']], $role);
        }
    }
}
