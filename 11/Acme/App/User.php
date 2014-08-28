<?php
/* AIM:
Declare NameSpace for PSR-0
*/

namespace Acme\App;

class User {
	// Properties
	private $email;
	private $pwd;
	private $fillable = array('email');
	private $allowed = ['email','pwd'];

	private $isAdmin = false;

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
		if (! in_array($name, $this->fillable)) { // prevent the modification of a property dynamically
			return false; // nothing to return if it's not in $fillable rules
		}
		if (isset($this->name)) { // modifications are allowed ONLY on this class' properties
			$this->$name = $value;
		}
	}

	public function __get($name) // Magic Method: GET
	{
		// trying to get values from a property defined by $name (especially private/protected properties)
		if (! in_array($name, $this->allowed)) { // prevent the modification of a property dynamically
			return false; // nothing to return if it's not in $allowed rules
			}

		return isset($this->$name) ? $this->$name : NULL; // just check if this property is declared here (else nothing to return)
	}

	public function __toString() // Magic Method: toString
	{
		// casting an object to a string. Here: yield a json format string

		$data = []; // new empty array

		foreach ($this->allowed as $key) { // check ONLY $allowed keys
			$data[$key] = $this->$key; // get the value of the key
		}

		return json_encode($data); // encoded format in JSON
	}

	/* *********
	*	METHODS
	************ */

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