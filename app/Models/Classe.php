<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'class_id',
        'class_name',
        'grade',
    ];
    use HasFactory;
}
