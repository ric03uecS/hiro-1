<?php

namespace Hiro\Tests;

use Hiro\Response;
use Hiro\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    public function testRouteNameWhileAddingRoute()
    {
        $request = $this->getMockBuilder('\Hiro\Request')
                        ->disableOriginalConstructor()
                        ->getMock();

        $router = new Router($request);

        $router->addRoute('get', '/hello', function() {});
        $router->addRoute('post', '/world', function() {});

        $this->assertArrayHasKey('get:/hello', $router->getRoutes());
        $this->assertArrayHasKey('post:/world', $router->getRoutes());
    }

    public function testAddRouteWithValidResponse()
    {
        $request = $this->getMockBuilder('\Hiro\Request')
            ->disableOriginalConstructor()
            ->setMethods(['getMethod', 'getCurrentUri'])
            ->getMock();

        $request->expects($this->once())
                ->method('getMethod')
                ->will($this->returnValue('get'));

        $request->expects($this->once())
            ->method('getCurrentUri')
            ->will($this->returnValue('/hello'));

        $router = new Router($request);

        $router->addRoute('get', '/hello', function() {
            return new Response('Hello World!');
        });

        $router->dispatch();

        $this->expectOutputString('Hello World!');
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Callback has to return Response instance
     */
    public function testAddRouteWithInvalidResponse()
    {
        $request = $this->getMockBuilder('\Hiro\Request')
            ->disableOriginalConstructor()
            ->setMethods(['getMethod', 'getCurrentUri'])
            ->getMock();

        $request->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('get'));

        $request->expects($this->once())
            ->method('getCurrentUri')
            ->will($this->returnValue('/hello'));

        $router = new Router($request);

        $router->addRoute('get', '/hello', function() {
            return 'Invalid response';
        });

        $router->dispatch();
    }
}
