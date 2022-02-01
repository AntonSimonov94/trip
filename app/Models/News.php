<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
