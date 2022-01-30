<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CatalogProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('catalogs_has_products')->insert($this->getData());
    }

    public function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'catalog_id' => random_int(1,5),
                'product_id' => random_int(1,10),
                'source_id'  => random_int(1,10)
            ];
        }
        return $data;
    }
}
