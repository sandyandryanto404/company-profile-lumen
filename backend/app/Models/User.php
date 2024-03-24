<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\UserNotification;
use App\Models\UserVerification;
use App\Models\Role;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'image',
        'first_name',
        'last_name',
        'gender',
        'country',
        'address',
        'about_me',
        'username',
        'email',
        'password',
        'phone',
        'status',
        'remember_token'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function Article() {
        return $this->hasMany(Article::class);
    }

    public function Comment() {
        return $this->hasMany(ArticleComment::class);
    }

    public function Notifications() {
        return $this->hasMany(UserNotification::class);
    }

    public function Verification() {
        return $this->hasMany(UserVerification::class);
    }

    public function Roles() {
        return $this->belongsToMany(Role::class, "users_roles");
    }
}
