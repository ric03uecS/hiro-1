<?php

namespace Hiro;

class Response
{
    private $content = '';

    public function __construct($content) {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function render()
    {
        echo $this->getContent();
    }
}
