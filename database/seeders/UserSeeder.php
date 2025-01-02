<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil UUID dari role 'User'
        $roleId = DB::table('roles')->where('name', 'User')->value('id');

        DB::table('users')->insert([
            [
                'id' => Str::uuid()->toString(),
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password'), // Enkripsi password
                'role_id' => $roleId, // Menggunakan UUID yang valid
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
