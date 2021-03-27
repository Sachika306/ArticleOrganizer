<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function outlineassignment() {
        return $this->hasOne(OutlineAssignment::class);
    }

    public function articleassignment() {
        return $this->hasOne(ArticleAssignment::class);
    }

    public function thumbnail() {
        return $this->hasOne(Thumbnail::class);
    }

    public function getData() {
        return Article::with('status')->get();
        return Article::with('outlineassignment')->get();
        return Article::with('articleassignment')->get();
        return Article::with('thumbnail')->get();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content'
    ];
}
