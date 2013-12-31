<?php

class xhash {

	const savepath = '/home/www/apps/options/';
	const chmod    = 0777;
	const extension= '.txt';

	function &getObject($hash, $default = null) {
		return new xhash_object($hash, $default);
	}

	function get($hash, $default = '')  { return self::read($hash, $default); }
	function read($hash, $default = '') {
    	$file = self::savepath.$hash.self::extension;
		if(file_exists($file)) {
			return unserialize(file_get_contents($file));
		} else {
    		self::write($hash, $default);
    		return $default;
		}
	}

	function set($hash, $value) { return self::write($hash, $value); }
	function write($hash, $value) {
    	$file = self::savepath.$hash.self::extension;
    	if(!is_dir(dirname($file))) {
    		@mkdir(dirname($file), self::chmod, true);
		    if(!is_dir(dirname($file))) {
    		    return false;
		    }
		}
    	file_put_contents($file, serialize($value));
		@chmod($file, self::chmod);
		return true;
	}

	function delete($hash) {
    	$file = self::savepath.$hash.self::extension;
    	if(file_exists($file)) {
    	    return unlink($file);
		} else {
    		return true;
		}
	}

	function getModifiedTime($hash) {
    	$file = self::savepath.$hash.self::extension;
    	if(file_exists($file)) {
    	    return filemtime($file);
		} else {
    		return 0;
		}
	}

	function getAccessTime($hash) {
    	$file = self::savepath.$hash.self::extension;
    	if(file_exists($file)) {
    	    return fileatime($file);
		} else {
    		return 0;
		}
	}
}

class xhash_object {
	var $hash  = '';
	var $value = '';

	function xhash_object($hash, $default = null) {
		$this->hash  = $hash;
		$this->value = xhash::get($hash, $default);
	}

	function __toString() {
		if(is_scalar($this->value))	return $this->value;
		if(is_array($this->value))  return print_r($this->value, true);
		return ''.$this->value;
	}

	function __destruct() {
    	$this->save();
	}

	function get() {
		return $this->value;
	}

	function set($value) {
		$this->value = $value;
		$this->save();
	}

	function save()   { xhash::set($this->hash, $this->value); }
	function delete() { xhash::delete($this->hash); }
	function getModifiedTime() { xhash::getModifiedTime($this->hash); }
	function getAccessTime()   { xhash::getAccessTime($this->hash);   }
}

?>