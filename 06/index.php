<?php
// MAGIC METHODS!!! See AnotherUser.php
require 'App/User.php';
require 'App/AnotherUser.php';
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
  $joe = new AnotherUser($data); // with the new __construct Magic Method
  $joe->email = 'anotheremailaddress@joe.com'; // testing __set + $fillable = this could be set by __SET method
  $joe->pwd = "456123789"; // testing __set + $fillable = this MUST BE NOT set, gracefully to __SET Method & $fillable array
  $joe->shoesize = 43; // testing __set + $fillable = not working (prevent new properties on the fly)
  //var_dump($joe);
  echo $joe; // testing __toString() Magic Method to allow displayed datas in a particular way.
  //var_dump($joe->pwd); // testing __get + $allow
} else {
  var_dump($validator->getErrors());
}