<?php

namespace App\Repositories;

use App\Models\EmailValidation;

class EmailRepository extends BaseRepository
{
    public function __construct(EmailValidation $model)
    {
        $this->model = $model;
    }

    public function check(array $parameters)
    {
        $query = $this->model
            ->select(["validated"])
            ->where('email', $parameters['email'])
            ->where('updated_at','>',$parameters['date'])
            ->first();
        return $query;
    }

    public function updateOrCreate(array $attributes)
    {
        return $this->model->updateOrCreate(
            ['email' => $attributes['email']],
            ['validated' => $attributes['validated']]
        );
    
    }
}
