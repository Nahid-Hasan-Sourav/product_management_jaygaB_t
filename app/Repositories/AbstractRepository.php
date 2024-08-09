<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractRepository implements RepositoryContract
{
    protected Builder $query;

    abstract public function __construct();

    public function paginate($perPage = 15): LengthAwarePaginator
    {
        return $this->query->paginate($perPage);
    }

    public function all(): Collection
    {
        return $this->query->get();
    }

    public function get($limit = 20): Collection
    {
        return $this->query->limit($limit)->get();
    }

    public function find(string $id): Collection|Model|array
    {
        return $this->query->findOrFail($id);
    }

    public function findMany(array $ids): Collection
    {
        return $this->query->findMany($ids);
    }

    public function findBySlug(string $slug): Collection|Model|array
    {
        return $this->query->where('slug', $slug)->firstOrFail();
    }
}
