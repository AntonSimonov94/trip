<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CatalogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('catalogs')->insert($this->getData());
    }

    public function getData(): array
    {
        $data=[];

        $faker = Factory::create();

        for($i=0; $i < 5; $i++) {
            $title = $faker->sentence(5);
            $data[] = [
                'title' => $faker->sentence(5),
                'slug'   => \Str::slug($title),
                'description'  => $faker->text(100),
                'isImage' => $faker->boolean()
            ];
        }
        return $data;

    }
}
