<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends Datamapper
{
	public $table  = 'users';
	
	function __construct()
	{
		parent::__construct();
	}
}