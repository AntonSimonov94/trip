<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Models\Parse;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $service)
    {
        $url = 'https://news.yandex.ru/sport.rss';
        $data = $service->setLink($url)->parse();
        $service->addParse($data);
    }


}
