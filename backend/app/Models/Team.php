<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = "teams";

    protected $fillable = [
        "image",
        "name",
        "email",
        "phone",
        "position_name",
        "sort",
        "twitter",
        "facebook",
        "instagram",
        "linked_in",
        "address",
        "status"
    ];

}
