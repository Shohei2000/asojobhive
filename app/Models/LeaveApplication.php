<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    use HasFactory;

    protected $table = 'leave_applications';

    protected $fillable = [
        'department',
        'student_id',
        'name',
        'subject',
        'teacher',
        'company_name',
        'location',
        'contents',
        'date',
    ];
}
