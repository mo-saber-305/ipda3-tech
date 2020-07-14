<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mo Saber',
            'email' => 'mo.saber305@yahoo.com',
            'description' => 'full stack developer',
            'password' => Hash::make('mo saber')
        ]);

        $user->attachRole('super_admin');
    }
}
