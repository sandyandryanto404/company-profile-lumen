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

class ArticleController extends BaseController
{
    public function list(Request $request)
    {
        $page = $request->get("page", 1);
        $response = array();
        return response()->json($response);
    }

    public function detail($slug)
    {
        $response = array();
        return response()->json($response);
    }

    public function listComment($id)
    {
        $response = array();
        return response()->json($response);
    }

    public function sendComment($id, Request $request)
    {
        $comment = $request->get("comment");
        $response = array();
        return response()->json($response);
    }

    public function deleteComment($id)
    {
        $response = array();
        return response()->json($response);
    }

}
