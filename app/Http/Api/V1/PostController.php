<?php

namespace App\Http\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

  public function create(Request $request) {

    $fields = $request->validate([
        'title' => 'required|max:40',
        'body'  => 'required|max:255',
    ]);

    $post = Post::create([
      'user_id' =>  $request->user()->id,
      'title'   => $fields['title'],
      'body'    => $fields['body'],
    ]);
  
    return Response()->json([
      'post' => $post,
    ]);
 
  }
   
}
