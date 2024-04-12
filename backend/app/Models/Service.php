<?php

/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto404@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class Service extends Model
{
    protected $table = "services";

    protected $fillable = [
        "icon",
        "title",
        "description",
        "status",
        "sort"
    ];

    public static function InitialCreate()
    {
        $icons = [
            "fas fa-archive",
            "fas fa-atom",
            "fas fa-award",
            "fas fa-balance-scale",
            "fas fa-blender",
            "fas fa-book-reader",
            "fas fa-box-open",
            "fas fa-cash-register",
            "fas fa-cloud-download-alt",
        ];

        $total = self::whereNotNull("id")->count();
        if($total == 0)
        {
            foreach($icons as $index => $icon){
                $faker = Faker::create();
                self::create([
                    "icon"=> $icon,
                    "title"=> $faker->sentence(4),
                    "description"=>  $faker->text,
                    "status"=> 1,
                    "sort"=> ($index+1)
                ]);
            }
        }

    }

}