<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PejabatModel extends Model
{
    use HasFactory,SoftDeletes,HasUuids;

    protected $table = 'daftar_pejabat';
    protected $guarded = [];
    protected $date = ['deleted_at'];
}
