<?php session_start(); 

           if (isset($_POST["theme"]))
           {
            $_SESSION["canVote"] = false;
            }
?>

<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../main.css"/>
    <link rel="stylesheet" type="text/css" href="assign2.css"/>
</head>
<body>
    <div class="outerBody" id="thePadding">
<h1>Family Reunion Results!</h1>
    
<?php
        $filename = "assign2results.txt";
        $file = fopen( $filename, "r+" );

        if( $file == false )
        {
           echo ( "Error reading/writing results" );
           exit();
        }

        $results = file($filename);
            
$nameArray = array("theme", "Crafts", "Games", "Physical", "Recipes", "Music", "Stay");

$index = 0;

foreach($nameArray as $value)
{

    switch ($_POST[$value])
    {
        case 1:
            $results[$index + 1] += 1;
            $results[$index + 1] .= "\n";
            break;
        case 2:
            $results[$index + 2] += 1;
            $results[$index + 2] .= "\n";
            break;
        case 3:
            $results[$index + 3] += 1;
            $results[$index + 3] .= "\n";
            break;
        case 4:
            $results[$index + 4] += 1;
            $results[$index + 4] .= "\n";
            break;
    }
    $index += 5;
}

echo "<h3>Reunion Theme</h3>";
echo "Love Endures Through all Generations: <strong> $results[1]</strong> <br />";
echo "United and Growing: <strong> $results[2]</strong> <br />";
echo "United We Stand: <strong> $results[3]</strong> <br />";
echo "Super Gen: <strong> $results[4]</strong> <br /><br />";

echo "<h3>Activities</h3>
<table border='1'>
    <tr>
        <th> </th><th>Crafts</th><th>Games</th><th>Physical Activities</th><th>Recipes</th><th>Music</th>
    <tr/>
    <tr>
        <td>Please, No.</td> <td> $results[6] </td> <td> $results[11] </td> <td> $results[16] </td> <td> $results[21] </td> <td> $results[26] </td>
    </tr>
    <tr>
        <td>I'll Watch.</td> <td> $results[7] </td> <td> $results[12] </td> <td> $results[17] </td> <td> $results[22] </td> <td> $results[27] </td>
    </tr>
    <tr>
        <td>I'll enjoy it.</td> <td> $results[8] </td> <td> $results[13] </td> <td> $results[18] </td> <td> $results[23] </td> <td> $results[28] </td>
    </tr>
    <tr>
        <td>Yes! Let's do it!</td> <td> $results[9] </td> <td> $results[14] </td> <td> $results[19] </td> <td> $results[24] </td> <td> $results[29] </td>
    </tr>

    </table>";

for ($i = 0; $i < filesize($filename); $i++)
{
    $output .= $results[$i]; 
}

echo "<h3>Comments and requests</h3>";
echo "<ul>";
fwrite($file, $output);
fclose($file);

        $commentFile = "comments.txt";
        $cfile = fopen( $commentFile, "a+" );

        if( $cfile == false )
        {
           echo ( "Error reading/writing comments" );
           exit();
        }

        if ($_POST["Comments"] != "")
        {
            $comments .= "<li>";
            $comments .= $_POST["Comments"];
            $comments .= "</li>";
            fwrite($cfile, $comments);
        }

    rewind($cfile);
    $Comm = fread($cfile, filesize($commentFile));
        
    echo $Comm;
    echo "</ul>";
fclose($cfile);

?>
</div>
</body>
</html>




