<?php

namespace App\Repositories;

use App\Models\Patient;

class PatientRepository extends BaseRepository
{
    public function __construct(Patient $model)
    {
        $this->model = $model;
    }

    public function recent(int $number)
    {
        return $this->model
                    // ->inClinic()
                    ->orderBy('created_at', 'desc')
                    ->limit($number)
                    ->get();
    }

    public function getUserByCredentials(array $credentials)
    {
        return $this->model
                    ->where([
                        ['login', '=', $credentials['login']],
                    ])
                    ->get()
                    ->first();
    }

    public function saveCredentials(string $id, string $login, string $password)
    {
        $this->update($id, [
            'login'    => $login,
            'password' => $password,
        ]);
    }

    public function getForAutocomplete(string $query)
    {
        $fields = ['id', 'first_name', 'last_name', 'ssn', 'system_number', 'dob'];

        return $this->model
                    ->select($fields)
                    ->where(function ($select) use ($query) {
                        $select->where('first_name', 'LIKE', "%$query%")
                               ->orWhere('last_name', 'LIKE', "%$query%")
                               ->orWhere('system_number', 'LIKE', "%$query%")
                               ->orWhere('ssn', 'LIKE', "%$query%");
                    })
                    ->get();
    }

    public function updateWithChanges($id, array $attributes)
    {
        $model = $this->find($id);
        $model->update($attributes);        

        return $model->getChanges();
    }

    public function paginate(array $parameters)
    {
        $query = $this->model->select('*');

        if (!empty($parameters['filter']['name'])) {
            $query = $query->orWhere('patients.first_name', 'LIKE', "%{$parameters['filter']['name']}%")
                           ->orWhere('patients.last_name', 'LIKE', "%{$parameters['filter']['name']}%")
                           ->orWhere('patients.middle_name', 'LIKE', "%{$parameters['filter']['name']}%");
        }

        if (!empty($parameters['filter']['system_number'])) {
            $query = $query->where('system_number', '=', $parameters['filter']['system_number']);
        }

        if (!empty($parameters['filter']['ssn'])) {
            $query = $query->where('ssn', '=', $parameters['filter']['ssn']);
        }

        if (!empty($parameters['filter']['external_id'])) {
            $query = $query->where('external_id', '=', $parameters['filter']['external_id']);
        }

        $total = $query->count();
        
        $query = $query->pagination($parameters['pagination'])
                       ->orderBy('system_number', 'DESC');

        return [
            'patients' => $query->get(),
            'total'    => $total,
        ];
    }

    public function getFullName(string $id)
    {
        $fields = ['id', 'first_name', 'last_name'];

        return $this->model
                    ->select($fields)
                    ->where('id', $id)
                    ->first();
    }

    public function getCurrentDoctors(string $patientId)
    {
        $fields = ['primary_care_physician', 'referring_doctor', 'usual_provider'];

        return $this->model
                    ->select($fields)
                    ->with('usualProvider', 'usualProvider.specialization', 'referringDoctor', 'referringDoctor.specialization', 'pcp', 'pcp.specialization')
                    ->where('id', $patientId)
                    ->first();
    }

    public function getPatientsReport(array $parameters)
    {
        $query = $this->model
                    ->with(['base_contact', 'pcp']);

        if (!empty($parameters['filter']['demographics_from'])) {
            $query = $query->where('updated_at', '>=', $parameters['filter']['demographics_from']);
        }

        if (!empty($parameters['filter']['demographics_to'])) {
            $query = $query->where('updated_at', '<=', $parameters['filter']['demographics_to']);
        }

        if (!empty($parameters['dob_from'])) {
            $query = $query->where('dob', '>=', $parameters['dob_from']);
        }

        if (!empty($parameters['dob_to'])) {
            $query = $query->where('dob', '<=', $parameters['dob_to']);
        }

        if (!empty($parameters['filter']['sex'])) {
            $query = $query->where('sex', '=', $parameters['filter']['sex']);
        }

        if (!empty($parameters['filter']['patientIds'])) {
            $query = $query->whereIn('id', $parameters['filter']['patientIds']);
        }

        $total = $query->count();
        
        $query = $query->pagination($parameters['pagination']);

        return [
            'list'   => $query->get(),
            'total'  => $total,
        ];
    }
}
