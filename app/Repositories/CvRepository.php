<?php

namespace App\Repositories;

use App\Models\CV;

class CvRepository extends BaseRepository
{
    public function __construct(CV $model)
    {
        $this->model = $model;
    }

    public function paginate(array $parameters)
    {
        $query = $this->model->select([
            "id", 
            "first_name",
            "last_name",
            "profession",
            "salary",
            "currency",
            "age", 
            "city",
            "education",
            "schedule",
            "created_at",
            "image_link"
        ]);
        $query = $query->ofChecked($parameters['check']);

        if (!empty($parameters['check'])) {            
            $query = $query->orderBy('created_at', 'desc');    
        }

        $query = $query->paginate($parameters['pagination']);

        return [
            'cvs' => $query,
            'checked' => $parameters['check']
        ];
    }

    public function create(array $attributes)
    {
        $class = get_class($this->model); 

        $model = new $class();

        return $model->create($attributes);
    }
}
