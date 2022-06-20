<?php


namespace App\Repositories\Contracts;


use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{

    public function getModel(): User;
    public function all($role = false): Collection;
    public function findById(int $id): User;
}
