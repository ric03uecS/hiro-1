# Hiro Framework

[![Build Status](https://travis-ci.org/bgruszka/hiro.svg?branch=master)](https://travis-ci.org/bgruszka/hiro)

## DI Container:

## Example routing:
```php
$serviceContainer->router->addRoute('/hello-world', function() {
    $currentUri = $this->request->getCurrentUri();
    $content = 'Hello World!';
    return new Response($content);
});
```