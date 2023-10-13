<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id',
        'job_title',
        'job_description',
        'job_vacancies',
        'work_location',
        'supplement',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}