<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GolonganTPDModel extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'golongan_tpd';
    protected $guarded = [];
    protected $date = ['deleted_at'];
}
