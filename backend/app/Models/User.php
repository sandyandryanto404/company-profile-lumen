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

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Auth\Authorizable;
use Faker\Factory as Faker;
use App\Models\Article;
use App\Models\ArticleComment;


class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'image',
        'first_name',
        'last_name',
        'gender',
        'country',
        'postal_code',
        'address',
        'about_me',
        'email',
        'phone',
        'password',
        'status',
        'remember_token',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function Article() {
        return $this->hasMany(Article::class);
    }

    public function Comment() {
        return $this->hasMany(ArticleComment::class);
    }

    public static function InitialCreate()
    {
        $users = self::whereNotNull("id")->count();
        if($users == 0)
        {
            for($i = 1; $i <= 10; $i++)
            {
                $faker = Faker::create();
                $gender = rand(1,2);
                $first_name = $gender == 1 ? $faker->firstNameMale : $faker->firstNameFemale;
                $user = new self;
                $user->image = $gender == 1 ? "user-male.jpg" : "user-female.jpg";
                $user->first_name = $first_name;
                $user->last_name = $faker->lastName;
                $user->gender = $gender == 1 ? "M" : "F";
                $user->country = $faker->country;
                $user->address = $faker->streetAddress;
                $user->about_me = $faker->text;
                $user->email = $faker->safeEmail;
                $user->password = Hash::make("p4ssw0rd!");
                $user->phone = $faker->phoneNumber;
                $user->status = 1;
                $user->confirm_token = md5($faker->uuid);
                $user->save();
            }
        }
    }

}
