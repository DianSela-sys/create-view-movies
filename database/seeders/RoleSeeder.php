<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Admin',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'User',
            ],
        ]);
    }
}
