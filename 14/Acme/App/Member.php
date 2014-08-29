<?php
// new class based on User
namespace Acme\App;

class Member extends User
{ // !!! The initial '\' is to prepend the library out of the namespace

	public function __construct()
	{
		$this->isAdmin = false; // change $isAdmin boolean state
	}

	public function login()
	{
		$message_from_parent = parent::login();
		return $message_from_parent . ' With Member Privileges.';
	}

	public function logout()
	{
		return 'Logged Out from Member board.';
	}
}