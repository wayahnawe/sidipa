<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SBUModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sbu';
    protected $guarded = [];
    protected $date = ['deleted_at'];
}
