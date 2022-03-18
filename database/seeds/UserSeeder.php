<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'super admin',
            'email' => 'admin@demo.com',
            'description' => 'full stack developer',
            'password' => Hash::make('mo saber')
        ]);

        $user->attachRole('super_admin');
    }
}
