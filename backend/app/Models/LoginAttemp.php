<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAttemp extends Model
{
    protected $table = "login_attempts";

    protected $fillable = [
        "ip_address",
        "login"
    ];

}
