<?php

namespace Infor;

use Symfony\Component\Yaml\Yaml;

ini_set('display_errors', 'stderr');

require_once __DIR__ . '/../vendor/autoload.php';

$serviceConfig = Yaml::parse(file_get_contents('config.yml'));

$serviceContainer = new Hiro\ServiceContainer($serviceConfig['config']);

// custom routings go here

$serviceContainer->router->dispatch();

