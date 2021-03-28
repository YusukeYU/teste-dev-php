<?php

namespace App\Modules\CarManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $table = 'cars';
    public $module = 'CarManagement';

    protected $fillable = [
        'id',
        'brand',
        'model',
        'year',
        'created_at',
        'updated_at',
        'deleted_at'

    ];
}
