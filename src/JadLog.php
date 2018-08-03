<?php

namespace JadLog;

use GuzzleHttp\Client;

class JadLog {
	protected static $gmkey;
	protected static $gmtoken;

	public function __construct() {
		$this->gmkey = config('jadlog.gmkey');
		$this->gmtoken = config('jadlog.gmtoken');
	}
}