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

class PageController extends BaseController
{

    public function ping()
    {
        return response()->json([true]);
    }

    public function home()
    {
        $response = array();
        return response()->json($response);
    }

    public function about()
    {
        $response = array();
        return response()->json($response);
    }

    public function service()
    {
        $response = array();
        return response()->json($response);
    }

    public function faq()
    {
        $response = array();
        return response()->json($response);
    }

    public function contact()
    {
        $response = array();
        return response()->json($response);
    }

    public function message(Request $request)
    {
        $response = array();
        return response()->json($response);
    }

    public function subscribe(Request $request)
    {
        $response = array();
        return response()->json($response);
    }

    public function file($name){
        $file_path = storage_path('files') . '/' . $name;
        if (file_exists($file_path)) {
            $file = file_get_contents($file_path);
            return response($file, 200)->header('Content-Type', 'image/jpeg');
        }else{
            $response = array();
            $response['success'] = false;
            $response['message'] = "Avatar not found";
            return response()->json($response);
        }
    }

}
