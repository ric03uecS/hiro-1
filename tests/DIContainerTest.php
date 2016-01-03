<?php

namespace Hiro\Tests;

class DIContainerTest extends \PHPUnit_Framework_TestCase
{
    public function testWithString()
    {
        $container = new \Hiro\DIContainer();
        $container->param = 'value';

        $this->assertEquals('value', $container->param);
    }

    public function testWithClosure() {
        $container = new \Hiro\DIContainer();
        $container->service = function($c) {
            return new \Hiro\Tests\Service();
        };


        $this->assertInstanceOf('\Hiro\Tests\Service', $container->service);
    }
}
