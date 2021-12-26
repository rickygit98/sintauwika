<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
	    $this->call(RolesTableSeeder::class);
	    $this->call(KategorisTableSeeder::class);
	    $this->call(UsersTableSeeder::class);
	    $this->call(MahasiswaTableSeeder::class);
	    $this->call(DosenTableSeeder::class);
	    $this->call(AdminTableSeeder::class);
    }
}
