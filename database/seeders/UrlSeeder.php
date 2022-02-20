<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    protected $urls = ['https://news.yandex.ru/auto.rss',
        'https://news.yandex.ru/auto_racing.rss',
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/gadgets.rss',
        'https://news.yandex.ru/index.rss',
        'https://news.yandex.ru/martial_arts.rss',
        'https://news.yandex.ru/communal.rss',
        'https://news.yandex.ru/health.rss',
        'https://news.yandex.ru/games.rss',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('urls')->insert($this->getData());

    }
    public function getData():array
    {
        $data = [];
        foreach ($this->urls as $url) {
            $data[] = [
                'urls' => $url];
        }
        return $data;
    }
}
