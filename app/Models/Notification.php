<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    protected $fillable = [
        'title',//通知用タイトル// Notification.php
        'url',//通知用URL// Notification.php
        'created_at',
        'updated_at'
    ];
}
