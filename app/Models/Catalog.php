<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalogs';
    public static $availableFields = ['id', 'title', 'description', 'created_at'];


    protected $fillable = [
        'title',
        'description',
        'slug'
    ];


    public function news() {
        return $this->belongsToMany(News::class, 'catalogs_has_news');
    }

}
