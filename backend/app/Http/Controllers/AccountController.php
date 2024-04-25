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

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
    public function detailProfile()
    {
        $response = array();
        return response()->json($response);
    }

    public function updateProfile(Request $request)
    {
        $response = array();
        return response()->json($response);
    }

    public function updatePassword(Request $request)
    {
        $response = array();
        return response()->json($response);
    }

}
