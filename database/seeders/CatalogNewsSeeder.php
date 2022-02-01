<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CatalogNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('catalogs_has_news')->insert($this->getData());
    }

    public function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'catalog_id' => random_int(1,5),
                'news_id' => random_int(1,10)
            ];
        }
        return $data;
    }
}
