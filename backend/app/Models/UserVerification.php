<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserVerification extends Model
{
    protected $table = "users_verifications";

    protected $fillable = [
        "user_id",
        "token",
        "status",
        "expired_at"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
