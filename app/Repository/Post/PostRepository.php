<?php 

namespace App\Repository\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;

class PostRepository implements PostRepositoryInterface {

    protected $model;

    public function __construct(Post $model)
    {
      $this->model = $model;    
    }

    public function create(array $data): ?Post {
        return $this->model->create($data);
    }

    public function getPosts(int $limit = 10): ?Paginator {
        return $this->model
            ->orderByDesc('created_at')
            ->simplePaginate($limit);
    }
}