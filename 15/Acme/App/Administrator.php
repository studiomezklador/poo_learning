<?php

namespace Acme\App;

class Administrator extends User
{ // !!! The initial '\' is to prepend the library out of the namespace

	public function __construct(Array $settings = [])
	{
		parent::__construct($settings);
		$this->isAdmin = true; // change $isAdmin boolean state
	}

	public function login()
	{
		$message_from_parent = parent::login();
		return $message_from_parent . ' With Administrator Privileges.';
	}

	public function logout()
	{
		return 'Logged Out from Admin board.';
	}
}