<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sources extends Model
{
    use HasFactory;

    protected $table = 'sources';
    public static $availableFields = ['id', 'title','author', 'country', 'year','created_at'];


    protected $fillable = [
        'title',
        'author',
        'country',
        'year'
    ];
}
