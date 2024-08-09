<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface RepositoryContract
{
    public function paginate($perPage): LengthAwarePaginator;

    public function all(): Collection;

    public function get($limit): Collection;

    public function find(string $id): Collection|Model|array;

    public function findMany(array $ids): Collection;

    public function findBySlug(string $slug): Collection|Model|array;
}
