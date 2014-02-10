<!DOCTYPE html>

<html>
<head>
    <title>Team Form</title>
    
</head>
    
<body>
    <?php $mysqli = new mysqli("localhost", "team3", "werock", "bucketData");
        if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }
    ?>
    
    <h1>Scriptures of Light!</h1>
    
    <?php $result = $mysqli->query("select * from scriptures"); 
    
        while ($row = $result->fetch_assoc()) {
           echo "Scripture: " . $row[book] . " " . $row[chapter].":" . $row[verse] . "<br />";
            echo $row[content] . "<br /><br />";
        }
    ?>
    
    
    <form>
    
        <select>
        <?php

        $result = $mysqli->query("select * from scriptures");

        while ($row = $result->fetch_assoc()) {
           echo "<option>" . $row[book] . "</option>";
        }
            
            ?>
        </select>
    </form>
    
</body>
</html>