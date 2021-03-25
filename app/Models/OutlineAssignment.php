<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutlineAssignment extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'outline_user_id', 'id');
    }

    public function article() {
        return $this->belongsTo(Article::class);
    }

    protected $fillable = [
        'article_id',
        'outline_user_id',
        'outline_url',
        'outline_deadline'
    ];
}