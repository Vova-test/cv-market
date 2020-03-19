<?php

namespace Tests\Unit;

use App\Repositories\EmailRepository;
use App\Services\ApiEmailService;
use App\Services\EmailService;
use Carbon\Carbon;
use Mockery;
use PHPUnit\Framework\TestCase;

class EmailServiceTest extends TestCase
{
    public function testCheckForNullableEmail()
    {
        $repositoryMock = Mockery::mock(EmailRepository::class);
    	$ApiEmailServiceMock = Mockery::mock(ApiEmailService::class);

    	$repositoryMock->shouldReceive('check')
                    ->once()
                    ->andReturn([]);
        $repositoryMock->shouldReceive('updateOrCreate')
                    ->once()
                    ->andReturn(true);

        $ApiEmailServiceMock->shouldReceive('isEmailValid')
                    ->once()
                    ->andReturn( [
            'success' => false,
            'result' => false
        ]);

    	$emailService = new EmailService($repositoryMock, $ApiEmailServiceMock);
    	$this->assertEquals([
            'success' => false,
            'result' => false
        ], $emailService->check('Test@email.loc'));

    }

   /* public function testCheckForTrueEmail()
    {

    }

    public function testCheckForFalseEmail()
    {

    }*/
}
