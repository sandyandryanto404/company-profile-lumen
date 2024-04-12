<?php

/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto404@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

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