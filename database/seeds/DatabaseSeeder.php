<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'NEO Admin',
            'mail' => 'webmaster@local.dev',
            'pass' => bcrypt('toto1234'),
            'role' => 2,
        ]);
    }
}
