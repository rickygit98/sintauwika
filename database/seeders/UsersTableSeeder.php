<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $mhs = DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'Ricky Yohanes',
            'username' => 'richdesignart',
            'contact' => '628988887288',
            'email' => 'rickyyohanes98@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        

        $dosen1 = DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Pak Yonatan',
            'username' => 'yo_user',
            'contact' => '621234567890',
            'email' => 'yonatan@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $dosen2 = DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Pak Robby',
            'username' => 'robby_user',
            'contact' => '629863456345',
            'email' => 'robby@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

       

        $admin1 = DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Admin',
            'username' => 'adminUwika',
            'contact' => '6293840492834',
            'email' => 'adminuwika@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

       
    }
}
