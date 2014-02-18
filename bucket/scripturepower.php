<!DOCTYPE html>

<html>
<head>
    <title>Team Form</title>
    <script>
       /* function load(id) {
            
                var url = "http://ec2-54-209-227-242.compute-1.amazonaws.com/bucket/sp.php";
                var httprequest = null;
                if (window.XMLHttpRequest) {
                    httprequest = new XMLHttpRequest();
                } else {
                    try {
                        httprequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (ex) {
                        alert("This webpage cannot load in your browser.\nPlease update your browser.");
                    }
                }

                httprequest.onreadystatechange = function () {
                    if (httprequest.readyState == 4) {
                        if (httprequest.status == 200) {
                            document.getElementById(id).innerHTML = httprequest.responseText;
                        } else {
                            alert("Error loading page.\nPlease try again.");
                            alert(httprequest.status);
                        }
                    }
                }
               
                
                httprequest.open("POST", url, true);
                httprequest.send(null);
            
            
            }*/
        </script>
</head>
    
<body>
    <div id="changeMe">
    <?php $mysqli = new mysqli("localhost", "team3", "werock", "bucketData");
        if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }



        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $mysqli->query("insert into scriptures (book, chapter, verse, content) values ('"
                          . $_POST['Book'] . "','" . $_POST['Chapter'] . "','" . $_POST['Verse'] . "','" . $_POST['Content'] . "'))";
                          );
            
        $result = $mysqli->query("select * from scriptures ");
            $count = 0;
         while ($row = $result->fetch_assoc())
         {
             $count++;
         }
            $count++;
            
            foreach($_POST as $key=>$value) { 
            {
                
                $mysqli->query("insert into scripture_topics (scripture_ID, topic_ID) values ("
                              . $count . "," . $_POST[id] . ")");
            }
       }
    ?>
    
        
        
    <h1>Scriptures of Light!</h1>
    
    <?php $result = $mysqli->query("select * from scriptures"); 
    
        while ($row = $result->fetch_assoc()) {
           echo "Scripture: " . $row[book] . " " . $row[chapter].":" . $row[verse] . "<br />";
            echo $row[content] . "<br /><br />";
        }
    ?>
    
    
    <form method="post" action="scripturepower.php">
    
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
    </div>
</body>
</html>