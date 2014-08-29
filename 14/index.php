<!-- JSON -->
<?php
// STATIC METHODS & PROPERTIES: declaring static methods or properties means no need to instanciated a class
// keywords: Interfaces, implementations, contract & polymorphism
// See: Index

require 'autoload.php'; // PSR-0 Autoloader

$post = new stdClass();
$post->title = 'My title';

Debug::dd($post); // Static call
echo Debug::$foo; // Static call and display property

echo '<hr>';

$dumper = new Debug(); // instanciation
$dumper::$foo = 'Not Bar'; // Static call to redefine a property
echo $dumper::$foo;

echo '<hr>';

$otherDumper = new Debug();  // another instanciation
echo $otherDumper::$foo; // same value as the last object: not same behaviour as non-static classes!

class Debug {

  static $start = '<pre>';
  static $end = '</pre>';
  static $foo = 'Bar';

  static public function dd($var)
  {
    echo self::$start;
    print_r($var);
    echo self::$end;
  }
}