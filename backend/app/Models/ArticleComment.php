<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\User;

class ArticleComment extends Model
{
    protected $table = "articles_comments";

    protected $fillable = [
        "parent_id",
        "article_id",
        "user_id",
        "comment"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Article() {
        return $this->belongsTo(Article::class, 'article_id');
    }

}
