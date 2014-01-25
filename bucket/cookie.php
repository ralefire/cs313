<?php

if (isset($_COOKIE["count"]))
{
     $visitedcount = $_COOKIE["count"] + 1;
}
else
{
    $visitedcount = 1;
}
    setcookie("count", $visitedcount, time() + 60);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cookies</title>
    <link rel="stylesheet" type="text/css" href="bucket.css"/>
</head>
    
<body>
<h1>Cookie starts with C</h1>
<p> You've been here before...</p>
    <p>
    <?php 
        echo $visitedcount;
    ?>
        times.
      </p>  
</p>
    
</body>
</html>