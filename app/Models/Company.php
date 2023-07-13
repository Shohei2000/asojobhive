<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'company_name_kana',
        'representative_name',
        'representative_position',
        'headquarters_address',
        'headquarters_postal_code',
        'headquarters_phone',
        'submission_address',
        'submission_postal_code',
        'submission_phone',
        'recruitment_department',
        'recruitment_contact',
        'recruitment_contact_phone',
        'recruitment_contact_fax',
        'recruitment_contact_email',
        'business_description',
        'established',
        'capital',
        'annual_sales',
        'stocks',
        'branch_count',
        'office_count',
        'website_url',
    ];
}
