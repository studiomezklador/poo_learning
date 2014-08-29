<!-- JSON -->
<?php
// TRAITS (~> PHP5.4): extending multiple classes inside a class (we cannot declare class Something extends One, Two, Tree{} -> this is NOT possible in PHP)
//
// See: Index

require 'autoload.php'; // PSR-0 Autoloader

$admin = new Acme\App\Administrator(['fb_id' => 'francis.carble']);
$admin->fb_id = "tutsplus"; // Testing: overwriting the fb_id property
var_dump($admin->fb_id); // Testing: one property from the Accessible Trait
var_dump($admin->getFbData()); // Testing: Curlable Trait