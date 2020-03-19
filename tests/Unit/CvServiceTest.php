<?php

namespace Tests\Unit;

use App\Services\CvService;
use App\Repositories\CvRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class CvServiceTest extends TestCase
{

    public function testPaginate()
    {
    	$repositoryMock = Mockery::mock(CvRepository::class);

    	$repositoryMock->shouldReceive('paginate')
                    ->once()
                    ->andReturn([
			            'cvs' => [
				            "id" => 1, 
				            "first_name" => "John",
				            "last_name" => "Silver",
				            "profession" => "pirate",
				            "salary" => 2000,
				            "currency" => "$",
				            "age" => 20, 
				            "city" => "London",
				            "education" => "nothing",
				            "schedule" => "freelancer",
				            "created_at" => "2020-03-17 18:18:45",
				            "image_link" => "2020-03-17 18:18:45"
				        ],
			            'checked' => 1
			        ]);
        $cvService = new CvService($repositoryMock);
        $this->assertEquals([
            'cvs' => [
	            "id" => 1, 
	            "first_name" => "John",
	            "last_name" => "Silver",
	            "profession" => "pirate",
	            "salary" => 2000,
	            "currency" => "$",
	            "age" => 20, 
	            "city" => "London",
	            "education" => "nothing",
	            "schedule" => "freelancer",
	            "created_at" => "2020-03-17 18:18:45",
	            "image_link" => "2020-03-17 18:18:45"
	        ],
            'checked' => 1
        ], $cvService->paginate([
	    		'check' => 1,
	            'pagination' => 5,
	            'page'  => 1
	    ]));
    }
}
