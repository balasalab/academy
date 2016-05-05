<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Exception;
use Log;
use DB;

use App\Http\Controllers\AuthKeyController;
use App\Http\Controllers\ResponseController;

class UserController extends Controller
{
	/**
	 * Create user
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 *
	 * success code 200
	 */
    public function create(Request $request){
    	Log::info(__CLASS__.'::'.__FUNCTION__.'() ==>');
    	try {
		    DB::beginTransaction();
			$validator = Validator::make($request->all(), [
			        'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6',
			    ]);
			if ($validator->fails()) {
		        throw new Exception($validator->errors()->all()[0], 1);   
		    }
		    $user = new \App\User();
	    	$user->name = $request->name;
	    	$user->email = $request->email;
	    	$user->password = bcrypt($request->possword);
	    	$userInsert = $user->save();
	    	if(!$userInsert):
	    		throw new Exception("User registration failed.", 1);
	    	endif;
	    	$userId = $user->id;
	    	$authKey = new AuthKeyController();
	    	$result = $authKey->generate($userId);
	    	if(!$result):
	    		throw new Exception("Failed to generate authentication key.", 1);
	    	endif;
	    	DB::commit();
			return ['status'=>'200', 'result' => $result ];
    	} catch (Exception $e) {
    		DB::rollBack();
    		Log::error("Message : ".$e->getMessage());
    		Log::error("Line : ".$e->getLine());
    		Log::error("File : ".$e->getFile());
    		return ['status'=>'error', 'message' => $e->getMessage()];
    	}
    }

    public function get(){
    	Log::info(__CLASS__.'::'.__FUNCTION__.'() ==>');
    	try {
    		$result = \App\User::get();
    		return ['status'=>'success', 'data' => $result ];
    	} catch (Exception $e) {
    		
    	}
    	Log::info(__CLASS__.'::'.__FUNCTION__.'() <==');
    }

    function getAuthKeys(Request $request){
    	Log::info(__CLASS__.'::'.__FUNCTION__.'() ==>');
    	try {
			$validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'password' => 'required|min:6',
			    ]);
			if ($validator->fails()) {
		        throw new Exception($validator->errors()->all()[0], 1);   
		    }
		    $user = \App\User::where(['email' => $request->email , 'password' => hash('sha256', $request->password)])->first();
	    	if(!$user):
	    		throw new Exception("Sorry! Invalid credentials.", 1);
	    	endif;
	    	$userId = $user->id;
	    	$authKey = \App\Model\AuthKeys::where(['user_id'=>$userId])->first();
	    	if(!$authKey):
	    		throw new Exception("Authentication key not exist", 1);
	    	endif;
			return ['status'=>'success', 'data' => array('api_key'=>$authKey->api_key, 'api_secret'=>$authKey->api_secret) ];
    	} catch (Exception $e) {
    		Log::error("Message : ".$e->getMessage());
    		Log::error("Line : ".$e->getLine());
    		Log::error("File : ".$e->getFile());
    		return ['status'=>'error', 'message' => $e->getMessage()];
    	}
    }
}
