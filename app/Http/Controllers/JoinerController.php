<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JoinerController extends Controller
{
    function create(){
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
			return ['status'=>'success', 'result' => $result ];
    	} catch (Exception $e) {
    		DB::rollBack();
    		Log::error("Message : ".$e->getMessage());
    		Log::error("Line : ".$e->getLine());
    		Log::error("File : ".$e->getFile());
    		return ['status'=>'error', 'message' => $e->getMessage()];
    	}
    }

    
}
