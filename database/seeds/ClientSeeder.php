<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Client::query()->insert([
            [
                'user_id' => 1,
                'name' => 'one',
                'image' => 'images/clients/1.png',
                'url' => 'http://one-services.org',
            ], [
                'user_id' => 1,
                'name' => 'Smart Erisildi',
                'image' => 'images/clients/2.png',
                'url' => 'http://smarterisildi.com/en',
            ], [
                'user_id' => 1,
                'name' => 'rawag',
                'image' => 'images/clients/3.png',
                'url' => 'http://rawagemarketing.com/en',
            ], [
                'user_id' => 1,
                'name' => 'dokan',
                'image' => 'images/clients/4.png',
                'url' => 'http://ipda3.com',
            ], [
                'user_id' => 1,
                'name' => 'النسر للصناعات الغذائية',
                'image' => 'images/clients/5.png',
                'url' => 'http://alnesregypt.com/ar',
            ],
        ]);
    }
}
