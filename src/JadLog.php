<?php

namespace JadLog;

/**
 * @author Lucien
 * @link https://github.com/LucienCorreia/JadLog GitHub
 */
class JadLog {

	/**
	 * @var string GetModal KEY
	 */
	protected static $gmkey;

	/**
	 * @var string GetModal TOKEN
	 */
	protected static $gmtoken;

	/**
	 * Seta as chaves
	 */
	public function __construct() {
		self::$gmkey = config('jadlog.gmkey');
		self::$gmtoken = config('jadlog.gmtoken');
	}

	/**
	 * Seta a key
	 * 
	 * @param string $key
	 */
	public function setKey(string $key) {
		self::$gmkey = $key;
	}

	/**
	 * Seta o token
	 * 
	 * @param string $token
	 */
	public function setToken(String $token) {
		self::$gmtoken = $token;
	}
}