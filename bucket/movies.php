<!DOCTYPE html>

<html>
<head>
    <title>Team Form</title>
    <script type="text/javascript">
        
    function loadDoc(id, file) {
        
                    var xmlhttp;

                    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else { // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        
                        //alert(file);
                        //alert(xmlhttp.readyState);
                        //alert(xmlhttp.status);
                        
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById('changeMe').innerHTML = xmlhttp.responseText;
                        }
    
                    }
                    
                    xmlhttp.open("GET", "getMovies.php", true);
                    xmlhttp.send(null);
    }
    </script>
    
</head>
    
<body>
    <?php $mysqli = new mysqli("localhost", "phpUser", "password", "movies");
        if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }
    ?>
    
    <h1>Actors!</h1>
    
    <?php $result = $mysqli->query("select name from actor"); 
    
        while ($row = $result->fetch_assoc()) {
           echo "Actor: ";
            echo $row["name"] . "<br /><br />";
        }
    ?>
    
    
    <form name=movieActors>
    
        <select name="actor">
        <?php

        $result = $mysqli->query("select name from actor");

        while ($row = $result->fetch_assoc()) {
           echo "<option value = \"" . $row[actor_ID] . "\">" . $row["name"] . "</option> <br />";
        }
            
            ?>
        </select>
    </form>
    
    <div id="changeMe">Hello!</div>
    
</body>
</html>