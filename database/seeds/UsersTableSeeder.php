<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('secret')]);

        $user->assignRole('admin');

        User::create(['name' => 'Chuchita Bolson', 'email' => 'chuchita@gmail.com', 'password' => bcrypt('secret')]);
        User::create(['name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'password' => bcrypt('secret')]);
    }
}
