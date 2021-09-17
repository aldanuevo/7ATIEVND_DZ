<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'productos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['uuid','descripcion', 'precio'];
}
