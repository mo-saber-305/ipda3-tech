<?php

use Illuminate\Database\Seeder;

class ProjectImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Photo::query()->insert([
            [
                'project_id' => 1,
                'image' => 'images/projects/project_images/project_1_1.png',
            ], [
                'project_id' => 1,
                'image' => 'images/projects/project_images/project_1_2.png',
            ], [
                'project_id' => 1,
                'image' => 'images/projects/project_images/project_1_2.png',
            ], [
                'project_id' => 2,
                'image' => 'images/projects/project_images/project_2_1.png',
            ], [
                'project_id' => 2,
                'image' => 'images/projects/project_images/project_2_2.png',
            ], [
                'project_id' => 2,
                'image' => 'images/projects/project_images/project_2_3.png',
            ], [
                'project_id' => 2,
                'image' => 'images/projects/project_images/project_2_4.png',
            ], [
                'project_id' => 3,
                'image' => 'images/projects/project_images/project_3_1.png',
            ], [
                'project_id' => 3,
                'image' => 'images/projects/project_images/project_3_2.png',
            ], [
                'project_id' => 3,
                'image' => 'images/projects/project_images/project_3_3.png',
            ], [
                'project_id' => 4,
                'image' => 'images/projects/project_images/project_4_1.png',
            ], [
                'project_id' => 4,
                'image' => 'images/projects/project_images/project_4_2.png',
            ], [
                'project_id' => 4,
                'image' => 'images/projects/project_images/project_4_3.png',
            ], [
                'project_id' => 5,
                'image' => 'images/projects/project_images/project_5_1.png',
            ], [
                'project_id' => 5,
                'image' => 'images/projects/project_images/project_5_2.png',
            ], [
                'project_id' => 5,
                'image' => 'images/projects/project_images/project_5_3.png',
            ], [
                'project_id' => 6,
                'image' => 'images/projects/project_images/project_6_1.png',
            ], [
                'project_id' => 6,
                'image' => 'images/projects/project_images/project_6_2.png',
            ], [
                'project_id' => 6,
                'image' => 'images/projects/project_images/project_6_3.png',
            ], [
                'project_id' => 7,
                'image' => 'images/projects/project_images/project_7_1.png',
            ], [
                'project_id' => 7,
                'image' => 'images/projects/project_images/project_7_2.png',
            ], [
                'project_id' => 7,
                'image' => 'images/projects/project_images/project_7_3.png',
            ], [
                'project_id' => 8,
                'image' => 'images/projects/project_images/project_8_1.png',
            ], [
                'project_id' => 8,
                'image' => 'images/projects/project_images/project_8_2.png',
            ], [
                'project_id' => 8,
                'image' => 'images/projects/project_images/project_8_3.png',
            ],
        ]);
    }
}
