<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio;
use App\Models\Testimonial;

class Customer extends Model
{
    protected $table = "customers";

    protected $fillable = [
        "name",
        "email",
        "phone",
        "address",
        "status"
    ];

    public function Portfolio() {
        return $this->hasMany(Portfolio::class);
    }

    public function Testimonial() {
        return $this->hasMany(Testimonial::class);
    }

}
