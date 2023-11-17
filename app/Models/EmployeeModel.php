<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeModel extends Model
{
    use HasFactory, SoftDeletes,HasUuids;

    protected $table = 'employees';
    protected $guarded = [];
    protected $date = ['deleted_at'];
}
