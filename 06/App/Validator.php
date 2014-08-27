<?php
// CRUD Validation Service : Validation Class

class Validation
{
	private $errors = [];

	public function validate(Array $data, Array $rules) // 2 sets of values into arrays
	{
		$valid = true;

		foreach ($rules as $item => $ruleset) { // for rules -> one rule and even a value called ruleset
			// DATATYPE: required|email|min:8
			$ruleset = explode('|', $ruleset); // exploding $ruleset by '|'

			foreach ($ruleset as $rule) {
				$pos = strpos($rule, ':'); // check if there is a param after $rule
				if ($pos !== false) {
					$param = substr($rule, $pos + 1); // $PARAM value after ':'
					$rule = substr($rule, 0, $pos); // $RULE before ':'
				} else {
					$param = ''; // just set $RULE and empty $PARAM
				}

				$methodName = 'validate' . ucfirst($rule); // make a temp var for a Method, based on $RULE

				$value = isset($data[$item]) ? $data[$item] : NULL; // make a temp var for checking values inside data's array

				if (method_exists($this, $methodName)) {
					$this->$methodName($item, $value, $param) OR $valid = false; // I HAVE TO FIGURE IT OUT WHAT IS THIS 'OR'???
				}
			}
		}
		return $valid;
	}

	public function getErrors() // GETTER
	{
		return $this->errors;
	}

	// The 3 Methods we declare as RULES in index.php
	private function validateRequired($item, $value, $param)
	{
		if ($value === '' || $value === NULL) { // if IT FAILS: return false with an error message
			$this->errors[$item][] = 'The ' . $item . ' field is required.';
			return false;
		}
		return true; // ELSE everything is TRUE, then OK
	}

	private function validateEmail($item, $value, $param)
	{
		if (! filter_var($value, FILTER_VALIDATE_EMAIL)) { // if IT FAILS: return false with an error message
			$this->errors[$item][] = 'The ' . $item . ' field should be a valid email address.';
			return false;
		}
		return true;
	}

	private function validateMin($item, $value, $param)
	{
		if (strlen($value) >= $param == false) { // if IT FAILS: return false with an error message
			$this->errors[$item][] = 'The ' . $item . ' field should have a minimum length of ' . $param . ' characters.';
			return false;
		}
		return true;
	}
}