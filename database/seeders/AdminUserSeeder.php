<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo Role Admin nếu chưa có
        $adminRole = Role::firstOrCreate(
            ['slug' => 'admin'],
            ['name' => 'Quản trị viên']
        );

        // Tạo Role Customer nếu chưa có
        $customerRole = Role::firstOrCreate(
            ['slug' => 'customer'],
            ['name' => 'Khách hàng']
        );

        // Tạo User Admin mặc định
        User::firstOrCreate(
            ['email' => 'admin@tourvn.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
                'role_id' => $adminRole->id,
                'phone' => '0987654321',
            ]
        );
    }
}
