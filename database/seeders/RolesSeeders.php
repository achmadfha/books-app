<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'global-admin'],
            ['name' => 'admin'],
            ['name' => 'users'],
        ];

        DB::table('roles')->insert($data);
    }
}
