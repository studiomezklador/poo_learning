<?php

namespace Acme\App\Traits;

trait Accessible {

		protected $fillable = [];
		protected $allowed = [];


		public function __set($name, $value) // Magic Method to set a property : private one or unkknown one...
	{
		if (count($this->fillable) && ! in_array($name, $this->fillable)) { // prevent the modification of a property dynamically
			return false; // nothing to return if it's not in $fillable rules
		}
		if (property_exists($this, $name)) { // modifications are allowed ONLY on this class' properties
			$this->$name = $value;
		}
	}

	public function __get($name) // Magic Method: GET
	{
		// trying to get values from a property defined by $name (especially private/protected properties)
		if (count($this->allowed) && ! in_array($name, $this->allowed)) { // prevent the modification of a property dynamically
			return false; // nothing to return if it's not in $allowed rules
			}

		return property_exists($this, $name) ? $this->$name : NULL; // just check if this property is declared here (else nothing to return)
	}
}