<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'question_title',
        'question_content',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function replies()
    {
        return $this->hasMany(CompanyQuestionReply::class, 'company_question_id');
    }
}

?>
