<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalogs';
    protected $reltable = 'catalogs_has_products';
    protected $prtable = 'products';

    public function getNews(){

        return \DB::select("SELECT id, title, description from {$this->table}");
    }

    public function getNewsbyId(int $id){

        $product = \DB::select("SELECT product_id from {$this->reltable} where catalog_id = $id");
        foreach ($product as $id) {
                $productlist[] = \DB::select("SELECT id, title, description from {$this->prtable} where id = $id->product_id");
        }
        return $productlist;
    }
}
