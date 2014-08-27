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

	// Magic Methods
	public function __construct(Array $params = array())
	{
		if (count($params)) {
			foreach ($params as $key => $value) {
				$this->$key = $value;
			}
		}
	}

	public function __set($name, $value) // Magic Method to set a property : private one or unkknown one...
	{
		if (isset($name)) { // if this $name exists as a property, then set its value
			$this->$name = $value;
		}
		// If there's not this kind of condition : anything as $name could be set with the $value!!! CRAZYNESS!!!
	}

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