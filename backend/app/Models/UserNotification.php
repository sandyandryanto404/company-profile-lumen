<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserNotification extends Model
{
    protected $table = "users_notifications";

    protected $fillable = [
        "user_id",
        "subject",
        "description",
        "content",
        "status"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
