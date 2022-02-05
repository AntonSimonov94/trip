<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    public static $availableFields = ['id', 'title','producer', 'description', 'likes','created_at'];


    protected $fillable = [
        'title',
        'producer',
        'description',
        'slug',
        'likes'
    ];

    public function catalog(): Relation
    {
        return $this->belongsToMany(Catalog::class, 'catalogs_has_news',
            'news_id', 'catalog_id');
    }
    public function source(): Relation
    {
        return $this->belongsToMany(Sources::class, 'news_has_sources',
            'news_id', 'sources_id');
    }
}
