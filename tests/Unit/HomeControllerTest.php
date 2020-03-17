<?php

namespace Tests\Unit;

use App\Services\CvService;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Mockery;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testShow()
    {
    	$request = Request::create('/home/show', 'GET');

        $request->setRouteResolver(function () use ($request) {
            $route = new Route('GET', '/home/show', []);

            return $route->bind($request);
        });

        $request
        	->headers
        	->add([
        		"checked" => 1, 
			    "page" => 1
			]);

        $cvServiceMock = Mockery::mock(CvService::class);
        //$requestMock = Mockery::mock(Request::class);

        $cvServiceMock->shouldReceive('paginate')
                    ->once()
                    ->andReturn([
			            "id" => 1, 
			            "first_name" => 'John',
			            "last_name" => 'Silver',
			            "profession" => 'pirate',
			            "salary" => 1000,
			            "currency" => '$',
			            "age" => 20, 
			            "city" =>'London',
			            "education" =>'nothing',
			            "schedule" => 'freelancer',
			            "created_at" => '2020-03-17 18:18:45',
			            "image_link" => '2020-03-17 18:18:45'
			        ]);

		/*$requestMock->once()
                    ->andReturn([
			            "checked" => 1, 
			            "page" => 1
			        ]);*/

        $homeController = new HomeController($cvServiceMock);

        /*$request = (object) [
        	"checked" => 1, 
			"page" => 1
		];*/

        //$result = $homeController->show($requestMock);
        $result = $homeController->show($request);

        $this->assertEquals(
        	[
	            "id" => 1, 
	            "first_name" => 'John',
	            "last_name" => 'Silver',
	            "profession" => 'pirate',
	            "salary" => 1000,
	            "currency" => '$',
	            "age" => 20, 
	            "city" =>'London',
	            "education" =>'nothing',
	            "schedule" => 'freelancer',
	            "created_at" => '2020-03-17 18:18:45',
	            "image_link" => '2020-03-17 18:18:45'
	        ], $result);

    }
}
