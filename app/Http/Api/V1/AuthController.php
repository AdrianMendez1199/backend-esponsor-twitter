<?php

namespace App\Http\Api\V1;

use App\Events\LoginEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

   private $users;

   public function __construct(UserRepositoryInterface $users) 
   {
     $this->users = $users;
   }
   /**
    * Undocumented function
    * @param request $request
    * @return Response
    */
   public function register(Request $request) 
   {
 
    $fields = $request->validate([
        'name' => 'required|max:255',
        'username' => 'required|unique:users',
        'email' => 'required|unique:users|email',
        'password' => 'required|confirmed|min:6',
    ]);

    $user = $this->users->create([
      'name' => $fields['name'],
      'username' => $fields['username'],
      'email' => $fields['email'],
      'password' => bcrypt($fields['password']),
    ]
    );
     
     
     return Response()->json([
       'token' => $user->createToken(env('TOKEN_SECRET'))->plainTextToken,
       'user' => $user,
     ], 201);

   }


   public function login(Request $request) 
   {
      $fields = $request->validate([
        'username' => 'required',
        'password' => 'required',
      ]);

      $user = $this->users->getUserByUsername($fields['username']);

      if(!$user || !Hash::check($fields['password'], $user->password)) {
        return Response()->json([
          'message' => 'Bad credentials'
        ], 401);
      }

      event(new LoginEvent($user, $request));

      return Response()->json([
        'access_token' => $user->createToken(env('TOKEN_SECRET'))->plainTextToken,
        'token_type' => 'Bearer',
        'user' => $user,
      ], 200);
   }
}
