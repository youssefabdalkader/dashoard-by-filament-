<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    // تأكد إن الـ roles موجودة
    $adminRole = Role::firstOrCreate(['name' => 'admin']);
    $editorRole = Role::firstOrCreate(['name' => 'editor']);
    $userRole = Role::firstOrCreate(['name' => 'user']);

    // إنشاء 10 users
    for ($i = 1; $i <= 10; $i++) {

        $user = User::create([
            'name' => 'User ' . $i,
            'email' => 'user' . $i . '@test.com',
            'password' => Hash::make('password'),
        ]);

        // توزيع roles
        if ($i <= 2) {
            $user->assignRole($adminRole);   // 2 admin
        } elseif ($i <= 5) {
            $user->assignRole($editorRole);  // 3 editor
        } else {
            $user->assignRole($userRole);    // 5 user
        }
    }
}


}
