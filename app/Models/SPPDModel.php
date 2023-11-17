<?php

namespace App\Models;

use App\Models\PerjalananDinasModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SPPDModel extends Model
{
    use HasFactory,SoftDeletes,HasUuids;

    protected $table = 'sppd';
    protected $guarded = [];
    protected $date = ['deleted_at'];

    public function spdid()
    {
        return $this->belongsTo(PerjalananDinasModel::class, 'id');
    }

    public function pegawaiid()
    {
        return $this->belongsTo(EmployeeModel::class, 'id');
    }
}
