<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Gọi Seeder tạo các Role
        $this->call(RoleSeeder::class);

        // 2. Lấy ID của Role Admin và Customer
        $adminRoleId = \App\Models\Role::where('slug', 'admin')->value('id');
        $customerRoleId = \App\Models\Role::where('slug', 'customer')->value('id');

        // 3. Tạo tài khoản Admin mặc định
        User::factory()->create([
            'name' => 'Quản trị viên',
            'email' => 'admin@tourvn.com',
            'password' => bcrypt('password'), // Mật khẩu mặc định là: password
            'role_id' => $adminRoleId,
            'phone' => '0987654321',
        ]);

        // 4. Tạo tài khoản Khách hàng mặc định
        User::factory()->create([
            'name' => 'Khách Hàng Vip',
            'email' => 'khachhang@tourvn.com',
            'password' => bcrypt('password'),
            'role_id' => $customerRoleId,
            'phone' => '0123456789',
        ]);
    }
}
