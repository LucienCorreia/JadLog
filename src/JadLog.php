<?php

namespace JadLog;

class JadLog {
	protected static $gmkey;
	protected static $gmtoken;

	public function __construct() {
		self::$gmkey = config('jadlog.gmkey');
		self::$gmtoken = config('jadlog.gmtoken');
	}
}