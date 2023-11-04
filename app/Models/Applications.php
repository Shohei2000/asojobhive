<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'job_id',
        'status_id',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
