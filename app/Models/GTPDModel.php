<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GTPDModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gtpds';
    protected $guarded = [];
    protected $date = ['deleted_at'];
}
