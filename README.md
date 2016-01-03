# Hiro Framework

[![Build Status](https://travis-ci.org/bgruszka/hiro.svg?branch=master)](https://travis-ci.org/bgruszka/hiro)

## DI Container:
To config Dependency Injection Container place your dependencies in section _container_ in the _config.yml_.

To define simple service in container:
```yaml
request:
    class: 'Hiro\Request'
```

To inject defined service use the _calls_ parameter:
```yaml
router:
    class: 'Hiro\Router'
    calls: ['request']
```

To inject simple type use the _arguments_ parameter:
```yaml
db:
    class: 'Hiro\Db'
    arguments: ['sqlite:///tmp/db.sqlite']
```

## Example routing:
```php
$serviceContainer->router->addRoute('/hello-world', function() {
    $currentUri = $this->request->getCurrentUri();
    $content = 'Hello World!';
    return new Hiro\Response($content);
});
```