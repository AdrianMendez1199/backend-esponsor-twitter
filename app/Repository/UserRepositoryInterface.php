<?php 

namespace App\Repository;

use App\Models\User;

interface UserRepositoryInterface {
    
    public function findUserById(int $id): ?User;

    public function getUserByEmail(string $email): ?User;

    public function getUserByUsername(string $email): ?User;

    public function create(array $data): ?User;
}