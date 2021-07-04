<?php

namespace App\Http\Api\V1;;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function create(request $request) {

    $request->validate([
        'name' => 'required|max:255',
        'username' => 'required|unique:users',
        'email' => 'required|unique:users|email',
        'password' => 'required|confirmed|min:6',
    ]);

    $data = User::create($request->all());

     return Response()->json([
       'status' => true,
       'data' => $data
     ], 201);

   }
}
