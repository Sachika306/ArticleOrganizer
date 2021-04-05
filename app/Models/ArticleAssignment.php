<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleAssignment extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'article_user_id', 'id');
    }

    public function article() {
        return $this->belongsTo(Article::class);
    }

    protected $fillable = [
        'article_id',
        'article_user_id',
        'article_deadline'
    ];
}
