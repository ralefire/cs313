<!DOCTYPE html>

<html>
<head>
</head>
<body>
Welcome <?php echo $_POST["name"]; ?><br />
Your email is: <?php echo "<a href=\"mailto:{$_POST['email']}\">{$_POST['email']} </a><br />";?>
Your major is: <?php echo $_POST["major"]; ?><br />
You have visited: <br />
<?php  

foreach($_POST["places"] as $value)
{
   echo "$value <br>" ;
}
?>
Your comments are: <?php echo $_POST["comments"]; ?><br />
</body>
</html>