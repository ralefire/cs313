<!DOCTYPE html>

<html>
<head>
    <title>Post an item</title>
     <link rel="stylesheet" type="text/css" href="project4.css" />
    <link rel="stylesheet" type="text/css" href="post.css" />
</head>
    
<body>
    
    <?php $mysqli = new mysqli("localhost", "phpUser", "password", "KatalisterProject");
        if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }
    ?>

        <header>
            <div id="header">
            </div>
            
            <div id="outerNav">
                <nav id="navigation">
                    <ul>
                        <li class="floatRight" id="pSelected">
                            <a href="post.php" id=" deals">Post</a>
                        </li>
                        <li>
                            <a href="index.html" id="theMarket" >Market</a>
                        </li>
                        <li>
                            <a href="deals.html" id="deals">Deals</a>
                        </li>
                        <li>
                            <a href="jobs.html" id="jobs">Jobs</a>
                        </li>
                        <li>
                            <a href="events.html" id="events">Events</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    
    
<div id="biggerBox">
        <div class="outerBody" id="outerBody">

                <div id="postNav">
                    <ul>
                        <li id="startNav" class="selected">Start</li>
                        <li>></li>
                        <li id="descriptionNav">Description</li>
                        <li>></li>
                        <li id="finishNav">Finish</li>
                    </ul>
                    <div class="clear"></div>
                </div>

                <form name="postForm" action="description.php" id="postForm" method="post">
                    
                    <div id="inputDiv">
                        <div id="start">
                            <input id="itemName" class="sideText" type="text" placeholder="item name" name="itemName" required />
                            <br />
                            <input id="price" class="sideNumber" type="number" placeholder="price $" name="itemPrice"  required min="0" />
                            <select id="category" class="sideSelect" name="itemCategory" required>
                                <option disabled selected>category</option>

                                    <?php 
                                        $mysqli = new mysqli("localhost", "phpUser", "password", "KatalisterProject");

                                        if ($mysqli->connect_errno) {
                                            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                                        }

                                    $result = $mysqli->query("select * from category"); 

                                    while ($row = $result->fetch_assoc()) {
                                       echo "<option value=\"" . $row['category_ID'] . "\" >" . $row['name'] . "</option>";
                                    }

                                    ?>

                            </select>
                            
                            <div class="clear"></div>
                            <input type="submit" value="Next" onclick="" class="" />
                        </div>
                    </div>
                </form>
            
        </div>
            <div id="bottomTitle"><h1>Katalister</h1></div>
    </div>
    
</body>
</html>
