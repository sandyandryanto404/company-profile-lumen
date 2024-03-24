<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Testimonial extends Model
{
    protected $table = "testimonials";

    protected $fillable = [
        "customer_id",
        "image",
        "name",
        "position",
        "quote",
        "status",
        "sort"
    ];

    public function Customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
