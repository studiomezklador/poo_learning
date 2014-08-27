<?php
// Inheritance & Cloning
require 'User.php';

// Create an Object based on User's Class
$joe = new User();

$joe->setEmail('joe@joe.com');
$joe->setPwd('123456789');

// 01 An other Object based on $joe (exact copy)
// $mike = $joe;

/* RESULTS:
object(User)[1]
  private 'email' => string 'joe@joe.com' (length=11)
  private 'pwd' => string '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225' (length=64)

object(User)[1]
  private 'email' => string 'joe@joe.com' (length=11)
  private 'pwd' => string '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225' (length=64)
SAME EXACT THING, ISN'T IT? Even if we changed the value of Mike's Pwd...
*/

// 02 clone technique
$mike = clone $joe;

$mike->setEmail('mike@joe.com');

/* RESULTS:

object(User)[1]
  private 'email' => string 'joe@joe.com' (length=11)
  private 'pwd' => string '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225' (length=64)

object(User)[2]
  private 'email' => string 'mike@joe.com' (length=12)
  private 'pwd' => string '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225' (length=64)

  They are sharing the same pwd, but have different email adresses...
  */

// Let's see the results
var_dump($joe);
echo '<br/>';
var_dump($mike);
echo '<br/>';