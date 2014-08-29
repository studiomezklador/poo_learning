<!-- JSON -->
<?php
// DEPENDENCY INJECTION: clever way to multiply code
//
// See: Index

require 'autoload.php'; // PSR-0 Autoloader

$addRep = new Acme\App\Repositories\AddressArrayRepository();

$addressModel = new Acme\App\Address($addRep); // HERE: dependency injection

$address = $addressModel->Find(3);

// var_dump($address);

?>

<pre><?php //print_r($address); ?></pre>

<?php

echo '<h1>' . $address->city . '</h1>';
echo '<p>' . $address->street . '</p>';

 ?>
 <!-- A BIT OF SUGER WITH GOOGLE MAP API -->
 <iframe
  width="800"
  height="700"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA2M8-Ta1EN7kIkDSbJpM7rsfy4fhUKg0U
    &q=<?= $address->street; ?>,<?= $address->city; ?>">
</iframe>
