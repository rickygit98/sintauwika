<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'name' => 'Artificial Intelligence',
        ]);
        
        DB::table('kategoris')->insert([
            'name' => 'Internet of Things',
        ]);
        
        DB::table('kategoris')->insert([
            'name' => 'Information System',
        ]);

        DB::table('kategoris')->insert([
            'name' => 'Database Management',
        ]);

        DB::table('kategoris')->insert([
            'name' => 'Cloud Computing',
        ]);
    }
}
