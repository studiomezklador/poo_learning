<?php
// ABSTRACT CLASS : cannot be instanciated but forces to develop some extra classes based on its rules
// See: User, Administrator(child of User), Member (child of User) & index

require 'autoload.php'; // contains AUTOLOAD function

// 01 let's test Validator Class
$rules = [
  'email' => 'required|email',
  'pwd' => 'required|min:8'
  ];

$data = [
  'email' => 'joe@joe.com',
  'pwd' => '123456789' // sucess
  ];

$validator = new Acme\App\Validation();
$check = $validator->validate($data, $rules);

if ($check === true) {
  $member = new Acme\App\Member($data);
  echo($member->login()).'<br/><br/>'; // testing: login method inherit from User

  $admin = new Acme\App\Administrator($data);
  echo($admin->login()).'<br/>';
  echo($admin->logout()); // testing: abstract method from abstract class User, redefined into each child
} else {
  var_dump($validator->getErrors());
}