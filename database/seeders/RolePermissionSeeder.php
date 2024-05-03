<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat beberapa role
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        // membuat default user untuk super admin untuk mengelola data awal
        $userOwner = User::create([
            'name' => 'Ariq Aziz',
            'occupation' => 'Educator',
            'avatar' => 'images/default-avatar.png',
            'email' => 'ariq@mail.com',
            'password' => bcrypt('admin123')
        ]);

        $userOwner->assignRole($ownerRole);
    }
}
