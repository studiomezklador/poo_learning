<?php
/* AIM:
Let's clean out Validation Method from here,
and share it outside this Class (somewhere else)
A.K.A. SINGLE RESPONSABILITY PRINCIPLE
*/
class AnotherUser {
	// Properties
	private $email;
	private $pwd;
	private $fillable = array('email'); // A new property to protected those which ARE NOT declared here (see below: __set Method)

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
		if (! in_array($name, $this->fillable)) { // prevent to not set protected properties (out of $fillable up here)
			return false;
		}
		if (isset($this->name)) {
			$this->$name = $value;
		}
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