<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $table = 'urls';
    public static $availableFields = ['id', 'url','created_at'];


    protected $fillable = [
        'url'
    ];
}
