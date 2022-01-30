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
            $data[] = [
                'title' => $faker->sentence(5),
                'description'  => $faker->text(100),
                'isImage' => $faker->boolean()
            ];
        }
        return $data;

    }
}
