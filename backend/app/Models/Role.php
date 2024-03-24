<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $table = "roles";

    protected $fillable = [
        "code",
        "name",
        "description",
        "status"
    ];

    public function Users() {
        return $this->belongsToMany(User::class, "users_roles");
    }

}
