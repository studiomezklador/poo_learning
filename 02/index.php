<?php
// Testing the setPwd Method created in User's Class
require 'User.php';

// Create an Object based on User's Class
$joe = new User();
// 01 See the error thrown
// $joe->setPwd('1234');

// 02 With more than MINCHARS value = success!
$joe->setPwd('123456789');

// Let's view the entire object
var_dump($joe);