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

class PortfolioController extends BaseController
{
    public function list()
    {
        $response = array();
        return response()->json($response);
    }

    public function detail($id)
    {
        $response = array();
        return response()->json($response);
    }

}
