<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\AuthKeys;

class AuthKeyController extends Controller
{
    function generate($userId){
		$authKey = new AuthKeys();
		$authKey->user_id = $userId;
		$authKey->api_key = hash('sha256', $userId.time());
		$authKey->api_secret = hash('sha256', $userId.time());
		$authKey->is_active = 1;
		return $authKey->save();
    }
}
