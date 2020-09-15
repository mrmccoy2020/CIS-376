<?php
include 'includes/book-config.inc.php';

// retrieve data from database
$univ = new UniversityDB($connection);
$results = $univ->getAll();


   
$connection = null;   
?>