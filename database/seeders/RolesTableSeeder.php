<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'role_slug' => 'admin',
        ]);
        
        DB::table('roles')->insert([
            'role_name' => 'Dosen',
            'role_slug' => 'dosen',
        ]);
        
        DB::table('roles')->insert([
            'role_name' => 'Mahasiswa',
            'role_slug' => 'mahasiswa',
        ]);
    }
}
