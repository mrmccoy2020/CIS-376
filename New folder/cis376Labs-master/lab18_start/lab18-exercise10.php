<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 16-10 | Cross Site Scripting</title>
</head>

<body>
<header>
<h1>User Profile Page</h1>
</header>

<div class='container'>
<?php
   echo "<h1>User: ".$_GET['user']."</h1>";
   //Later fill these fields below from a database.
   echo "Name:<br>";
   echo "Posts:<br>";
   echo "Joined Date:<br>";
?>
</div>

<div class='container sidebar'>
<h2>User List</h2>
<ul>
<li><a href='?user=ricardo'>Ricardo Hoar</a>
<li><a href='?user=randy'>Randy Connolly</a>
<li><a href='?user=instructor'>Instructor Page</a>
</ul>
</div>

</body>
</html>
