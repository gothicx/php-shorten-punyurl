<?php

/*
	PunyURL is a URL shortening service provided by SAPO (http:/www.sapo.pt)
	Homepage: http://services.sapo.pt/Metadata/Service/PunyURL?culture=EN

	Version: 2.0
	
	Dependencies:
	- PHP version 5.x

	Copyright (C) 2009 Marco Rodrigues - http://www.marblehole.com
*/

class PunyURL {
	// Set User-Agent
	private function __contruct() {
		$_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.2) Gecko/20090805 Firefox/3.5.2";
	}

	// Convert long URL into two different types of shortened URL's.
	public static function short($url="") {
		// The URL for PunyURL service at SAPO.
		$surl="http://services.sapo.pt/PunyURL/GetCompressedURLByURL?url=".urlencode($url);

		// Get the information from XML response.
		$xml=@simplexml_load_string(@file_get_contents($surl));
		$shorten['puny']=$xml->puny;
		$shorten['ascii']=$xml->ascii;
		$shorten['preview']=$xml->preview;

		return $shorten;
	}

	// Given a short URL that you got previously from short() function, return the Original URL.
	public static function long($url="") {
		// The URL for PunyURL service at SAPO.
		$surl="http://services.sapo.pt/PunyURL/GetURLByCompressedURL?url=".urlencode($url);

		// Get the information from XML response.
		$xml=@simplexml_load_string(@file_get_contents($surl));
		$original['url']=$xml->url;

		return $original;
	}
}

?>
