<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ResponseController extends Controller
{
    function success($data){
    	$response['meta']['code'] = 200;
    	$response['meta']['data'] = 200;

    }
}
