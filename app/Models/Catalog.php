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

    public function catalogs(): BelongsToMany {
        return $this->belongsToMany(Catalog::class,'catalogs_has_news', 'catalog_id','news_id');
    }

}
