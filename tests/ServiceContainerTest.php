<?php

class ServiceContainerTest extends PHPUnit_Framework_TestCase
{
    public function testWithArgument()
    {
        $config = ['some' => ['class' => '\Hiro\Tests\Service', 'arguments' => ['Test']]];
        $container = new Hiro\ServiceContainer($config);

        $this->assertEquals($container->some->arg, 'Test');
    }

    public function testWithCall()
    {
        $config = [
            'serviceWithArgument' => ['class' => '\Hiro\Tests\Service', 'arguments' => ['value']],
            'serviceWithCall' => ['class' => '\Hiro\Tests\Service', 'calls' => ['serviceWithArgument']]
        ];

        $container = new Hiro\ServiceContainer($config);

        $this->assertInstanceOf('\Hiro\Tests\Service', $container->serviceWithCall);
        $this->assertEquals($container->serviceWithCall->arg->arg, 'value');
    }
}
