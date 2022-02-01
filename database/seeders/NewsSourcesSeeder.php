<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news_has_sources')->insert($this->getData());
    }

    public function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'news_id' => random_int(1,10),
                'sources_id' => random_int(1,10)
            ];
        }
        return $data;
    }
}
