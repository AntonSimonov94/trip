<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i < 10; $i++) {
            $title = $faker->sentence(5);
            $data[] = [
                'title' => $faker->sentence(5),
                'producer' => $faker->name(),
                'slug'   => \Str::slug($title),
                'description'  => $faker->text(100),
                'isImage' => $faker->boolean()
            ];
        }
        return $data;
    }
}
