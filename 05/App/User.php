<?php
/* AIM:
Let's clean out Validation Method from here,
and share it outside this Class (somewhere else)
A.K.A. SINGLE RESPONSABILITY PRINCIPLE
*/
class User {
	// Properties
	private $email;
	private $pwd;

	// Methods
	public function login()
	{
		return 'logging in ...';
	}

	public function logout()
	{
		return 'loggout from ...';
	}

	public function setPwd($string) // typically: SETTER METHOD
	{

		$this->pwd = $string;
		return $this; // I do not know why that here, but...
	}

	// Let's create a method to return the password anyway...
	public function getPwd() // typically: GETTER METHOD
	{
		return $this->pwd;
	}

	// SETTER & GETTER for email property
	public function setEmail($string) // SETTER
	{
			$this->email = $string;
			return $this; // I do not know why that here, but...
	}

	public function getEmail() // GETTER
	{
		return $this->email;
	}
}