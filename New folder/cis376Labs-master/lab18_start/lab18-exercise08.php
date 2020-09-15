<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 16-8 | Gone Phising</title>
</head>

<body>
<header>
</header>


<?php
   $to      = 'nobody@example.com';
   $subject = 'Exercise 16-8 Phishing Attack';
   $message = 'You email quota has been exceeded visit this URL or your account will be deleted http://hackers.funwebdev.com/stealData.php';
   $headers = 'From: president@funwebdev.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

   mail($to, $subject, $message, $headers);
?>

 </div>
</body>
</html>
