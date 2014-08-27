<?php
// SINGLE RESPONSABILITY PRINCIPLE (SEE App->Validator && Helpers)
require 'App/User.php';
require 'App/Validator.php';
require 'App/Helpers.php';

// 01 let's test Validator Class
$rules = [
  'email' => 'required|email',
  'pwd' => 'required|min:8'
  ];

// $data = [
//   // 'email' => 'joe@joe.com', // making it success!
//   'email' => 'joe', // another failure
//   // 'email' => '', // making it fails!
//   // 'pwd' => '' // failure also
//   'pwd' => '1234' // another failure
//   // 'pwd' => '123456789' // sucess
//   ];

// $validator = new Validation();
// $check = $validator->validate($data, $rules);

/*
if ($check === true) {
  var_dump('Nickel !');
} else {
  var_dump($validator->getErrors());
}
*/

// 02 Full Test with a new User Object

$data = [
  'email' => 'joe@joe.com',
  'pwd' => '123456789' // sucess
  ];

$validator = new Validation();
$check = $validator->validate($data, $rules);


if ($check === true) {
  $joe = new User();
  $joe->setEmail($data['email'])->setPwd(getHash($data['pwd']));
  var_dump($joe);
} else {
  var_dump($validator->getErrors());
}