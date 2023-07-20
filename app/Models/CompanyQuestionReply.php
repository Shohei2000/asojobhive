<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyQuestionReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_question_id',
        'reply_content',
        'user_id',
    ];

    public function question()
    {
        return $this->belongsTo(CompanyQuestion::class, 'company_question_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

?>
