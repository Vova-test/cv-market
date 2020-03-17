<?php

namespace Tests\Unit;

use App\Repositories\AccessTokenRepository;
use App\Services\AccessTokenService;
use Carbon\Carbon;
use Mockery;
use Tests\TestUnitCase;

/**
 * @coversNothing
 */
class AccessTokenServiceTest extends TestUnitCase
{
    public function testGetStatusForChatTrue()
    {
        $repositoryMock = Mockery::mock(AccessTokenRepository::class);

        $repositoryMock->shouldReceive('getLastActions')
                    ->once()
                    ->andReturn(Carbon::now()->sub(20, 'minutes'));

        $accessTokenService = new AccessTokenService($repositoryMock);
        $this->assertTrue($accessTokenService->getStatusForChat("af406f8e-260d-4d81-9827-ba9301ebd41f"));
    }

    public function testGetStatusForChatFalse()
    {
        $repositoryMock = Mockery::mock(AccessTokenRepository::class);

        $repositoryMock->shouldReceive('getLastActions')
                    ->once()
                    ->andReturn(Carbon::now()->sub(35, 'minutes'));

        $accessTokenService = new AccessTokenService($repositoryMock);
        $this->assertFalse($accessTokenService->getStatusForChat("af406f8e-260d-4d81-9827-ba9301ebd41f"));
    }
}
