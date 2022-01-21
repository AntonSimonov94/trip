<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(): array
    {
        $data = [
            'Mobile' => ['Iphone' => 'Новость1', 'Samsung' => 'Новость2', 'Lg' => 'Новость3', 'Xiaomi' => 'Новость4'],
            'Notebook' => ['MacBook' => 'Новость1', 'ASUS' => 'Новость2', 'HP' => 'Новость3', 'Lenovo' => 'Новость4'],
            'Camera' => ['Sony' => 'Новость1', 'Canon' => 'Новость2', 'NIKON' => 'Новость3', 'FUJIFILM' => 'Новость4'],
            'Headphones' => ['Airpods' => 'Новость1', 'JBL' => 'Новость2', 'Beats' => 'Новость3'],
            'TV' => ['LG' => 'Новость1', 'SAMSUNG' => 'Новость2', 'Philips' => 'Новость3', 'Panasonic' => 'Новость4']
        ];
        return $data;
    }
}
