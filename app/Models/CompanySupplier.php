<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'supplier_id'
    ];
}
