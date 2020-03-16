<?php

namespace App\Services;

use App\Repositories\CvRepository;

class CvService extends BaseService
{
    public function __construct(CvRepository $repository)
    {
        $this->repository = $repository;
    }

    public function paginate(array $parameters)
    {
        return $this->repository->paginate($parameters);
    }

    public function check(string $id, array $attributes)
    {
        return $this->repository->update($id, $attributes);
    }

    public function delete(string $id)
    {
        return $this->repository->delete($id);
    }

    public function update(string $id, array $attributes)
    {
        return $this->repository->update($id, $attributes);
    }

    public function create(array $attributes)
    {
        return $this->repository->create($attributes);
    }
}
