<!-- JSON -->
<?php
// INTERFACES : sharing snippets of code between classes -> a "contract" telling which methods would be sharing between classes
// keywords: Interfaces, implementations, contract & polymorphism
// See: Acme/App/Repositories -> PostRepository, PostJsonRepository & PostRssRepository

require 'autoload.php'; // PSR-0 Autoloader

$jsonFile = new Acme\App\Repositories\PostJsonRepository(); // new Obj based on new classes implementing interface

$posts = $jsonFile->All(); // testing: contracted Method -> All()

?>
<h1>All JSON POSTS</h1>
<ul>
  <?php // display all titles from json posts
    $id = 0;
    foreach ($posts as $post) {
      $id++;
      $title = $post->title;
      $class = ($id == 2) ? 'style="font-weight:bold;"' : '';
      echo "<li $class>$title</li>";
    }
   ?>
</ul>

<hr />

<?php $post_two = $jsonFile->Find(2); //testing: contracted Method Find with id=2 ?>
<h1><?= $post_two->title; ?></h1>
<p><?= $post_two->body; ?></p>

<hr />
<!-- XML -->

<?php // different implementations with same functionnality = POLYMORPHISM
$rssFile = new Acme\App\Repositories\PostRssRepository(); // new Obj based on new classes implementing interface

$posts = $rssFile->All(); // testing: contracted Method -> All()
?>

<h1>All XML/RSS POSTS</h1>
<ul>
  <?php // display all titles from xml posts
    $id = 0;
    foreach ($posts as $post) {
      $id++;
      $title = $post->title;
      $class = ($id == 2) ? 'style="font-weight:bold;"' : '';
      echo "<li $class>$title</li>";
    }
   ?>
</ul>

<hr />

<?php $post_two = $rssFile->Find(2); //testing: contracted Method Find with id=2 ?>
<h1><?= $post_two->title; ?></h1>
<p><?= $post_two->body; ?></p>