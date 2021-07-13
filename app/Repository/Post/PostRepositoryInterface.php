<?php 

namespace App\Repository\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;

interface PostRepositoryInterface {

 public function create(array $data): ?Post;

 public function getPosts(int $limit = 10): ?Paginator;

}