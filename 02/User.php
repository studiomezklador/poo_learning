<?php
class User {
	// Properties
	public $email;
	public $pwd;
	// Constant = a constant set inside the Class ONLY!
	const MINCHARS = 8;

	// Methods
	public function login()
	{
		return 'logging in ...';
	}

	public function logout()
	{
		return 'loggout from ...';
	}

	// A method with the constant

	public function setPwd($string)
	{
		// Check the length of $string vs. MINCHARS value
		if (strlen($string) < self::MINCHARS) { // invoke self for constants, rather than 'this'
			// Display a custom PHP error
			throw new Exception("The password should be at least " . self::MINCHARS . ' characters long.');
		}
		// else: pass the pwd value into a Hash Method from PHP
		$this->pwd = hash('sha256', $string);
	}
}