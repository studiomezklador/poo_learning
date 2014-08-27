<?php
// Class = blueprint vs. Object = an instance of a class
// Here : load User Class
require 'User.php';

// Create an Object based on User's Class
$joe = new User();

// 01 See what it's like...
// var_dump($joe);

// 02 Set some properties to the Object
$joe->email = 'joe@joe.com';
$joe->pwd = '1234';

// var_dump($joe);

// 03 Create an other Object from User
$bob = new User();

// And set its properties
$bob->email = 'bob@bob.com';
$bob->pwd = '4321';

// Let's see if Bob has a login's method
var_dump($bob->login());