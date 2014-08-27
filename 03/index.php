<?php
// Public vs. Private methods
require 'User.php';

// Create an Object based on User's Class
$joe = new User();
// 01 See the error thrown
// $joe->setPwd('1234');

// 02 With more than MINCHARS value = success!
$joe->setPwd('123456789');

// 03 Need to set email value with the new SETTER & GETTER method declare in User's Class
// HERE: intentionally insert an invalid value for email
// $joe->setEmail('joe.com');

// 04 Same process, with a valid email adress, this time
$joe->setEmail('joe@joe.com');

// 05 Let's view the private property 'pwd' (fails)
// var_dump($joe->pwd);

// If the need of returning a private value is here: let's call the public method just created in User's Class
var_dump($joe->getPwd());
var_dump($joe->getEmail());