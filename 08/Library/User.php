<?php // This class could collide with User class into App

namespace Library; // Sort of Alias of this class

class User
{
	public function __contruct()
	{
		var_dump('You are another User Object.');
	}
}