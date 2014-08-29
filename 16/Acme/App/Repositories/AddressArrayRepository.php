<?php

namespace Acme\App\Repositories;

class AddressArrayRepository implements AddressRepositoryInterface {

	protected $addresses;
	// public $adr; // $adr MUST BE declared HERE or there's an error (lesson debug)

	public function __construct()
	{
		$this->addresses = $this->getAddresses();
	}

	public function Find($id, \Acme\App\Address $adr) // Method defined from Interface called
	{
		if (isset($this->addresses[$id])) {
			foreach ($this->addresses[$id] as $key => $value) {
				$adr->$key = $value;
			}
		}
		return $adr;
	}

	public function getAddresses() // just some datas to work with...
	{
		return array(
			1 => array(
				'street' => '1 Capital Hill',
				'city' => 'Washington'
				),
			2 => array(
				'street' => '1 Euston Road',
				'city' => 'London'
				),
			3 => array(
				'street' => '14 rue du boulevard',
				'city' => 'Villeurbanne'
				)
			);
	}
}