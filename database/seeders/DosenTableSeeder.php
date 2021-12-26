<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('dosens')->insert([
            'user_id' => '2',
            'nip' => '49203846',
        ]);  
        
        DB::table('dosens')->insert([
            'user_id' => '3',
            'nip' => '29483745',
        ]);

    }
}
