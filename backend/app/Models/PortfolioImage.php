<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio;

class PortfolioImage extends Model
{
    protected $table = "portfolios_images";

    protected $fillable = [
        "portfolio_id",
        "image",
        "status"
    ];

    public function Portfolio() {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

}
