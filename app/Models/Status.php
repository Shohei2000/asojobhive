<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    
    protected $table = 'status'; // テーブル名を指定

    protected $fillable = [
        'status_name',
        'status_detail',
    ];

    public function status()
    {
        return $this->hasMany(Applications::class, 'status_id');
    }
}
