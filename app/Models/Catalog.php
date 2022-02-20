<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'catalogs';
    public static $availableFields = ['id', 'title','image', 'description', 'created_at'];


    protected $fillable = [
        'title',
        'description',
        'slug',
        'image'
    ];


    public function news() {
        return $this->belongsToMany(News::class, 'catalogs_has_news');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
