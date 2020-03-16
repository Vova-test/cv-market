<?php

namespace App\Services;

use App\Repositories\PatientRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PatientService extends BaseService
{
    public function __construct(
        PatientRepository $repository,
        EncounterService $encounters
    ){
        $this->repository = $repository;
        $this->encounters = $encounters;
    }

    public function paginate(array $parameters)
    {
        return $this->repository->paginate($parameters);
    }

    public function create(array $attributes)
    {
        $patient = parent::create($attributes);

        $patient = $patient->refresh();

        $login = "{$patient->first_name}_{$patient->system_number}";
        
        $password = Hash::make(str_random(12));

        $this->repository->saveCredentials($patient->id, $login, $password);

        return $patient;
    }

    public function login(array $credentials)
    {
        $user = $this->repository->getUserByCredentials($credentials);

        if (!$user) {
            return false;
        }

        if (Hash::check($credentials['password'], $user->password)) {
            return $user;
        }

        return false;
    }

    public function update(string $id, array $attributes)
    {
        return $this->repository->update($id, $attributes);
    }

    public function updateWithChanges(string $id, array $attributes)
    {
        return $this->repository->updateWithChanges($id, $attributes);
    }

    public function recent(int $number = 10)
    {
        return $this->repository->recent($number);
    }

    public function shortInfo(string $id)
    {
        $patient = $this->repository->find($id);

        return [
            'id'            => $patient->id,
            'first_name'    => $patient->first_name,
            'last_name'     => $patient->last_name,
            'middle_name'   => $patient->middle_name,
            'dob'           => $patient->dob,
            'honorific'     => $patient->honorific,
            'sex'           => $patient->sex,
            'phone_primary' => $patient->phone_primary,
        ];
    }

    public function details(string $id)
    {
        $patient = $this->repository->find($id);

        return $patient;
    }

    public function mainInfo($id)
    {
        $patient = $this->repository->find($id);

        return [
            'first_name'    => $patient->first_name,
            'last_name'     => $patient->last_name,
            'system_number' => $patient->system_number,
            'middle_name'   => $patient->middle_name,
            'login'         => $patient->login,
            'created_at'    => Carbon::parse($patient->created_at)->format('Y-m-d'),
        ];
    }

    public function personalInfo($id)
    {
        $patient = $this->repository->find($id);

        return [
            'first_name'        => $patient->first_name,
            'last_name'         => $patient->last_name,
            'middle_name'       => $patient->middle_name,
            'sex'               => $patient->sex,
            'marital_status'    => $patient->marital_status,
            'dob'               => $patient->dob,
            'ssn'               => $patient->ssn,
            'driver_license_id' => $patient->driver_license_id,
        ];
    }

    public function accountInfo($id)
    {
        return $this->repository->find($id);
    }

    public function getFullName(string $id)
    {
        return $this->repository->getFullName($id);
    }

    public function getCurrentDoctors(string $patientId = null)
    {
        return $this->repository->getCurrentDoctors($patientId ?? app('user')->id);
    }

    public function getPatientsReport(array $parameters)
    {
        $parameters['dob_from'] = $parameters['filter']['age_to'] ? 
                                Carbon::today()->subYears($parameters['filter']['age_to'])->format('Y-m-d') : '';

        $parameters['dob_to'] = $parameters['filter']['age_from'] ? 
                                Carbon::today()->subYears($parameters['filter']['age_from'])->format('Y-m-d') : '';

        if ($parameters['filter']['service_date_from'] || $parameters['filter']['service_date_to']) {
            
            $parameters['filter']['patientIds'] = $this->encounters->getPatientByServiceDate([
                'service_date_from' => $parameters['filter']['service_date_from'],
                'service_date_to' => $parameters['filter']['service_date_to']
            ]);

            if (empty($parameters['filter']['patientIds'])) {
                return [ 
                    'list' => [],
                    'total'  => 0
                ];
            }
        }

        return $this->repository->getPatientsReport($parameters);
    }
}
