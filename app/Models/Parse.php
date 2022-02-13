<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parse extends Model
{
    use HasFactory;

    protected $table = 'parses';
    public static $availableFields = ['id', 'title','link', 'description', 'pubDate','created_at'];


    protected $fillable = [
        'title',
        'link',
        'description',
        'pubDate',
    ];
}
