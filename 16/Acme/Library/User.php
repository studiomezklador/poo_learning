<?php // This class could collide with User class into App

namespace Acme\Library; // Sort of Alias of this class

use Acme\App\Validator; // link to specific class and prevent mispelling paths
use Acme\App\User as U; // link to User Class and prevent misconfusion of classes with an alias
class User
{

	protected $isAdmin = false; // A specific protected property, could be modified by children

	public function __contruct()
	{
		var_dump(new U);
	}

	/*
	METHODS
	*/

	protected function login()
	{
		return 'logging in as administrator';
	}

	protected function logout()
	{
		return 'loggout from admin board...';
	}
}