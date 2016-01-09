<?php

namespace Hiro\Tests;


use Hiro\Request;

class RequestTest extends \PHPUnit_Framework_TestCase {
    public function testGetCurrentUri()
    {
        $_SERVER['REQUEST_URI'] = '/hello-world';
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $request = new Request();

        $this->assertEquals('/hello-world', $request->getCurrentUri());
    }

    public function testGetMethod()
    {
        $_SERVER['REQUEST_URI'] = '/hello-world';
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $request = new Request();

        $this->assertEquals('get', $request->getMethod());
    }

    public function testSettingGetVariables()
    {
        $_SERVER['REQUEST_URI'] = '/hello-world';
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $_GET['var1'] = 'test1';
        $_GET['var2'] = 'test2';

        $request = new Request();

        $this->assertEquals('test1', $request->get('var1'));
        $this->assertEquals('test2', $request->get('var2'));
    }

    public function testSettingPostVariables()
    {
        $_SERVER['REQUEST_URI'] = '/hello-world';
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $_POST['var1'] = 'test1';
        $_POST['var2'] = 'test2';

        $request = new Request();

        $this->assertEquals('test1', $request->post('var1'));
        $this->assertEquals('test2', $request->post('var2'));
    }

    public function testGetDefaultValueForVariable()
    {
        $_SERVER['REQUEST_URI'] = '/hello-world';
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $request = new Request();

        $this->assertEquals('default', $request->get('var', 'default'));
        $this->assertEquals('default', $request->post('var', 'default'));
    }
}
