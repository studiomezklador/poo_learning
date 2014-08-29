<?php

namespace Acme\App;

use Acme\App\Repositories\AddressRepositoryInterface;

class Address {

	use \Acme\App\Traits\Accessible;

	protected $street;
	protected $city;
	protected $addressRepo;

	public function __construct(AddressRepositoryInterface $addressRepo) // get the Object i CONSTRUCTOR
	{
		// $this->addressRepo = new \Acme\App\Repositories\AddressArrayRepository(); // Simple but bad pratice

		$this->addressRepo = $addressRepo; // then set property as an DEPENDENCY of the Object injected

		//prevent Mass-Assignement Set
		$this->fillable[] = 'street';
		$this->fillable[] = 'city';
		$this->allowed[] = 'street';
		$this->allowed[] = 'city';
	}

	public function Find($id)
	{
		$this->addressRepo->Find($id, $this);

		// foreach ($result as $key => $value) { // before we set a second arg to Find Method
		// 	$this->$key = $value;
		// } // REFACTORY: check at AddressArrayRepository -> Find Method (+ Interface)

		return $this;
	}

}