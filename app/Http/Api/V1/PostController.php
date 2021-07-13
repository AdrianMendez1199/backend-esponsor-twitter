<?php

namespace App\Http\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Post\PostRepositoryInterface as PostRepository;

class PostController extends Controller
{

  protected $posts;
   
  public function __construct(PostRepository $posts)
  {
     $this->posts = $posts;
  }

  public function create(Request $request) {

    $fields = $request->validate([
        'message'  => 'required|max:255',
    ]);


    $post = $this->posts->create([
      'user_id' => $request->user()->id,
      'message'    => $fields['message'],
    ]);
  
    return Response()->json([
      'post' => $post,
    ], 201);
 
  }

  public function posts() {
    // TODO paginate
    return $this->posts->getPosts();
  }
   
}
