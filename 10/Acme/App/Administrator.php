<?php

namespace Acme\App;

use Acme\Library\User;

class Administrator extends User
{ // !!! The initial '\' is to prepend the library out of the namespace

	public function __construct()
	{
		$this->isAdmin = true; // change $isAdmin boolean state
	}

	public function getLogin()
	{
		return $this->login(); // Render out a protected method from the parent
	}
}