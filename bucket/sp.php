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
    
    
    <form  action="" onsubmit="load()">
    
        <select>
        <?php

        $result = $mysqli->query("select * from scriptures");

        while ($row = $result->fetch_assoc()) {
           echo "<option>" . $row[book] . "</option>";
        }
            
            ?>
        </select>
        <br />
        
        Book: <input type="text" name="Book"/> <br />
        Chapter: <input type="text" name="Chapter"/> <br />
        Verse: <input type="text" name="Verse"/> <br />
        <textarea name="Content"> </textarea><br />
        
        <?php

        $result = $mysqli->query("select * from topics");

        while ($row = $result->fetch_assoc()) {
           echo  $row['name'] . "<input type=\"checkbox\" name=\"box\" value=\"" .$row['id'] . "\"><br />";
        }
            
            ?>
        
        <input type="submit" value="Submit!"/>
    </form>
    
</body>
</html>