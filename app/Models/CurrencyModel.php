<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrencyModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'currency';
    protected $guarded = [];
    protected $date = ['deleted_at'];
}
