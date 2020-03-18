<?php

namespace Tests\Unit;

use App\Services\CvService;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mockery;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    public function testShow()
    {
    	$request = Request::create('/home/show?checked=1&page=1', 'GET');
    	$request->setRouteResolver(function () use ($request) {
            $route = new Route('GET', '/home/show', []);

            return $route->bind($request);
        });

        $cvServiceMock = Mockery::mock(CvService::class);
        //$userMock = Mockery::mock(User::class);

		$userMock = new User([
		    'id' => 1,
		    'name' => 'John',
		    'type' => 'manager'
		]);

		Auth::shouldReceive('check')
			->once()
			->andReturn(true);

		Auth::shouldReceive('user')
			->once()
			->andReturn($userMock);

		/*$userMock->shouldReceive('MANAGER_TYPE')
                    ->once()
                    ->andReturn('manager');*/

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

        $homeController = new HomeController($cvServiceMock);

        $result = $homeController->show($request);
        //dump($result);die();
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
