<?php
/* AIM:
new abstract class
*/

namespace Acme\App;

abstract class User {

	// extending with Trait for the children
	use \Acme\App\Traits\Curlable; // Trait 01
	use \Acme\App\Traits\Accessible; // Trait 02

	// Properties
	private $email;
	private $pwd;
	// $fillable & $allowed are declared inside Accessible Trait / Defined here in __construct

	private $isAdmin = false;

	protected $fb_id;

	// Magic Methods
	public function __construct(Array $params = array())
	{
			// redefined the properties for Accessible Trait in this Class ONLY!
			$this->fillable[] = 'email';
			$this->fillable[] = 'fb_id';
			$this->allowed[] = 'email';
			$this->allowed[] = 'pwd';
			$this->allowed[] = 'fb_id';

		if (count($params)) {
			foreach ($params as $key => $value) {
				$this->$key = $value;
			}
		}
	}

	// __GET & __SET: new Trait

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

	// Method based on Traits
	public function getFbData()
	{
		$url = 'http://graph.facebook.com/' . $this->fb_id;
		return json_decode($this->curl($url), true);
	}

	public function login()
	{
		return 'logging in ...';
	}

	abstract public function logout();

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