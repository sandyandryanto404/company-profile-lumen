<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Reference;
use App\Models\PortfolioImage;

class Portfolio extends Model
{
    protected $table = "portfolios";

    protected $fillable = [
        "customer_id",
        "reference_id",
        "title",
        "description",
        "project_date",
        "project_url",
        "status",
        "sort"
    ];

    public function Customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function Reference() {
        return $this->belongsTo(Reference::class, 'reference_id');
    }

    public function Image() {
        return $this->hasMany(PortfolioImage::class);
    }

}
