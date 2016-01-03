<?php

namespace Hiro;

class Db extends \PDO
{
    public function __construct($dsn) {
        parent::__construct($dsn);
    }
}
