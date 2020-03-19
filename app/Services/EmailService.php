<?php

namespace App\Services;
use Carbon\Carbon;

use App\Repositories\EmailRepository;
use App\Services\ApiEmailService;

class EmailService extends BaseService
{
    public function __construct(
        EmailRepository $repository, 
        ApiEmailService $emailService
    ) {
        $this->repository = $repository;
        $this->emailService = $emailService;
    }

    public function check(string $email)
    {
        $date = Carbon::now()->subDays(2);

        $validationRecord = $this->repository->check([
            'email' => $email,
            'date' => $date
        ]);

        if (!is_null($validationRecord)) {
            return [
                'success' => true,
                'result' => $validationRecord->validated
            ];
        }

        $apiAnswer = $this->emailService->isEmailValid($email);

        if ($apiAnswer['success']) {
            $this->updateOrCreate([
                'email' => $email,
                'validated' => $apiAnswer['result']
            ]);
        }

        return $apiAnswer;
    }

    public function updateOrCreate(array $attributes)
    {
        return $this->repository->updateOrCreate($attributes);
    }

}
