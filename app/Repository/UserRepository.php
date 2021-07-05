<?php 

namespace App\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface {

     private $users;

     public function __construct(User $users)
     {
         $this->users = $users; 
     }

    public function findUserById(int $id): ?User 
    {
       return $this->users->find($id);
    }

    public function getUserByEmail(string $email): ?User 
    {
        return $this->users->where('email', $email)->first();
    }

    public function getUserByUsername(string $username): ?User {
        return $this->users->where('username', $username)->first();
    }

    public function create(array $data): ?User {
        return $this->users->create($data);
    }
}