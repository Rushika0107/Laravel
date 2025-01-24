<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class UserController extends Controller
{
    function addUser(Request $request){
 $request->validate([
"username"=>"required",
"email"=>"required",
"city"=>"required",
"skills"=>"required",
"gender"=>"required",
"age"=>"required",

 ]);
 return $request;
}
}

    