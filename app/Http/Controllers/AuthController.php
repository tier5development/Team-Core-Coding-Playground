<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home() {
    	try {

    		return view('welcome');

    	} catch (Exception $exception) {

    		return $exception->getMessage();

    	}
    }
}
