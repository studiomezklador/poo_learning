<?php
class User {
	// Properties
	// PUBLIC: values are immediatly accessible OUTSIDE the class (DEFAULT in PHP)
	// PRIVATE: visibility is restrained to the Class itself (not outside)
	// sometimes, no needs to share some values, methods or results
	private $email;
	private $pwd;
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

	public function setPwd($string) // typically: SETTER METHOD
	{
		// Check the length of $string vs. MINCHARS value
		if ($this->validatePwd($string) != true) { // check with validatePwd Method (see bellow)
			// Display a custom PHP error
			throw new Exception("The password should be at least " . self::MINCHARS . ' characters long.');
		}
		// else: pass the pwd value into a Hash Method from PHP
		$this->pwd = hash('sha256', $string);
	}

	// Let's create a method to return the password anyway...
	public function getPwd() // typically: GETTER METHOD
	{
		return $this->pwd;
	}

	// SETTER & GETTER for email property
	public function setEmail($string) // SETTER
	{
		// Check if $string is a correct email adress
		if (! filter_var($string, FILTER_VALIDATE_EMAIL)) {
			throw new Exception("Please provide a valid email adress");
			}
			$this->email = $string;
	}

	public function getEmail()
	{
		return $this->email;
	}

	// A method to validate the password format (offset the responsability)
	private function validatePwd($string)
	{
		return strlen($string) < self::MINCHARS ? false : true ;
	}
}