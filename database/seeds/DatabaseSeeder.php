<?php

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
        // $this->call(UsersTableSeeder::class);
        App\User::create([
		    'name' => 'Super Admin',
		    'email' => 'admin@email.com',
		    'password' => \Illuminate\Support\Facades\Hash::make('password'),
		    'is_super_admin' => 1
	    ]);

	    App\User::create([
		    'name' => 'John',
		    'email' => 'user@test.com',
		    'password' => \Illuminate\Support\Facades\Hash::make('password'),
		    'is_super_admin' => 0
	    ]);
    }
}
