<?php
namespace kcy;
use Buzz\Browser;

class kcy {

	protected $user, $keypass, $appkey, $browser;

	function __construct($user = NULL, $keypass = NULL, $appkey = NULL){
        $this->browser = new Browser();
		$this->user = $user;
		$this->keypass = $keypass;
		$this->appkey = $appkey;
	}


	public function setUser($user)
	{
		$this->user = $user;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setKeypass($keypass)
	{
		$this->user = $keypass;
	}

	public function getKeypass()
	{
		return $this->keypass;
	}

	public function setAppkey($appkey)
	{
		$this->user = $appkey;
	}

	public function getAppkey()
	{
		return $this->appkey;
	}


	public function shortUrl($url, $json = TRUE)
	{
		$url = "http://kcy.me/api/?u=$this->user&key=$this->keypass&url=$url";
		$url .= $json ? "&format=json" : '';
		print $url;
		$response = $this->browser->get($url)->getContent();

		return ($json ? json_decode($response) : $response);
	}

}
