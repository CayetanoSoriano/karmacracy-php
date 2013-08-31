<?php

namespace kcy;
use Guzzle\Http\Client;

class kcy {

	protected static $shortUrlBase = "http://kcy.me/api/";
	protected static $baseUrl = 'http://karmacracy.com/api/';
	protected static $apiVersion = 'v1/';
	protected $username, $keypass, $appkey;
	protected $browser;

	function __construct($username, $appkey, $keypass) {
		$this->browser = new Client();
		$this->username = $username;
		$this->keypass = $keypass;
		$this->appkey = $appkey;
	}

	public function shortUrl($url) {
		$request = $this->browser->get(self::$shortUrlBase, array(), array(
			'query' => array('u' => $this->username, 'key' => $this->appkey, 'url' => $url)
			));
		return (string) $this->browser->send($request);
	}
}