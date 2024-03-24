<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio;
use App\Models\Article;

class Reference extends Model
{
    protected $table = "references";

    protected $fillable = [
        "slug",
        "name",
        "description",
        "type",
        "status"
    ];

    public function Portfolio() {
        return $this->hasMany(Portfolio::class);
    }

    public function Articles() {
        return $this->belongsToMany(Article::class, "articles_references");
    }

}
