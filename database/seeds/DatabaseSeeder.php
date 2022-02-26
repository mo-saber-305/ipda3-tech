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
        $this->call([
            LaratrustSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            ProjectImagesSeeder::class,
            ClientSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
