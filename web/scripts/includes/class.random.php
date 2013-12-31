<?php

class random {

	public static function string($length = 10) {
		$alphabet = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$string = '';
		for($i = 0; $i < $length; $i++) $string .= substr($alphabet, mt_rand(0, 61), 1);
		return $string;
	}
}

?>