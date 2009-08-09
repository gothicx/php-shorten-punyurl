<?php

/*
	PunyURL is a URL shortening service provided by SAPO (http:/www.sapo.pt)
	Homepage: http://services.sapo.pt/Metadata/Service/PunyURL?culture=EN

	Version: 2.0
	
	Dependencies:
	- PHP version 5.x

	Copyright (C) 2009 Marco Rodrigues <http://Marco.Tondela.org>
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License along
	with this program; if not, write to the Free Software Foundation, Inc.,
	51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
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
