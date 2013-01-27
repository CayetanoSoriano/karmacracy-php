<?php
namespace kcy;
use Buzz\Browser;

class kcy {

	protected $username, $keypass, $appkey;
	protected $browser;
	protected $base_url;
	protected $json_output;

	function __construct($keypass = NULL, $appkey = NULL){
        $this->browser = new Browser();
		$this->keypass = $keypass;
		$this->appkey = $appkey;
		$this->base_url = 'http://karmacracy.com/api/v1/';
		$this->json_output = TRUE;
	}

	public function setBaseUrl($base_url)
	{
		$this->base_url = $base_url;
		return $this;
	}

	public function setKeypass($keypass)
	{
		$this->user = $keypass;
		return $this;
	}

	public function getKeypass()
	{
		return $this->keypass;
	}

	public function setAppkey($appkey)
	{
		$this->user = $appkey;
		return $this;
	}

	public function setJsonOutput($value){
		$this->json_output = ($value === TRUE) ? TRUE : FALSE;
		return $this;
	}

	public function getAppkey()
	{
		return $this->appkey;
	}


	public function getShortUrl($url)
	{
		$base_url = 'http://kcy.me/api/';
		$url = "$base_url?u=$this->user&key=$this->keypass&url=$url";
		$url .= $json ? "&format=json" : '';
		print $url;
		$response = $this->browser->get($url)->getContent();

		return $this->getResponse($response);
	}


	public function getKcyData($kcy){
		$endpoint = 'kcy/';
		$parameters = "$kcy?appkey=$this->appkey";
		$url = $this->base_url.$endpoint.$parameters;
		$response = $this->browser->get($url)->getContent();

		return $this->getResponse($response);
	}

	protected function getResponse($data){
		return (($this->json_output === TRUE) ? $data : json_decode($data));
	}

}