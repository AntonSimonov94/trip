<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert($this->getData());
    }

    public function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(5),
                'producer' => $faker->name(),
                'description'  => $faker->text(100),
                'isImage' => $faker->boolean()
            ];
        }
        return $data;
    }
}
