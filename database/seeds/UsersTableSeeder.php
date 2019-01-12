<?php

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
        factory(\App\Role::class, 1)->create(['name' => 'admin']);
        factory(\App\Role::class, 1)->create(['name' => 'client']);

        factory(\App\User::class, 1)->create([
        	'name' => 'admin',
	        'email' => 'admin@mail.com',
	        'password' => bcrypt('secret'),
	        'role_id' => \App\Role::ADMIN
        ]);
    }
}
