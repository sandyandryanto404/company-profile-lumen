<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reference;
use App\Models\ArticleComment;


class Article extends Model
{
    protected $table = "articles";

    protected $fillable = [
        "user_id",
        "image",
        "title",
        "slug",
        "content",
        "status",
        "sort"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function References() {
        return $this->belongsToMany(Reference::class, "articles_references");
    }

    public function Comment() {
        return $this->hasMany(ArticleComment::class);
    }

}
