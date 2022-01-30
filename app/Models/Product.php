<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function getNews(){

        return \DB::select("SELECT id, title, description from {$this->table}");
    }

    public function getNewsbyId(int $id){

        return \DB::select("SELECT id, title, description from {$this->table} where id = $id");
    }
}
