<?php

namespace Hiro;

class Storage
{
	private $path;
	
	function __construct($path = null) {
		$this->path = $path;
	}
}
