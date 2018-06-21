<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'            => 'admin3',
          'username'        => 'admin3',
          'password'        => Hash::make('password3'),
          'remember_token'  => str_random(10),
        ]);
    }
}
