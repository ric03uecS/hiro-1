<?php

namespace Hiro;

class ServiceContainer extends DIContainer
{
    public function __construct($config) {
        foreach($config as $name => $configItem) {
            $this->$name = $this->asShared(function($c) use($name, $configItem) {
                $class = new \ReflectionClass($configItem['class']);
                
                $arguments = [];
                
                if(isset($configItem['arguments'])) {
                    foreach($configItem['arguments'] as $arg) {
                        $arguments[] = $arg;
                    }
                }
                
                if(isset($configItem['calls'])) {
                    foreach($configItem['calls'] as $call) {
                        $arguments[] = $c->$call;
                    }
                }
                
            	return $class->newInstanceArgs($arguments);
            });
        }
    }
}
