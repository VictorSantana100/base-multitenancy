<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillabble = [
        'name',
        'price',
        'code',
        'validity',
        'type_id'
    ];
}
