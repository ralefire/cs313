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
                        <li id="startNav">Start</li>
                        <li>></li>
                        <li id="descriptionNav" class="selected">Description</li>
                        <li>></li>
                        <li id="finishNav">Finish</li>
                    </ul>
                    <div class="clear"></div>
                </div>

                <form name="postForm" action="finish.php" id="postForm" method="post">
                    
                    <div id="inputDiv">
                        <div id="start">

                            <select id="brand" class="sideText" required name="itemBrand" >
                                <option disabled selected >brand</option>

                                    <?php 
                                        $mysqli = new mysqli("localhost", "phpUser", "password", "KatalisterProject");

                                        if ($mysqli->connect_errno) {
                                            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                                        }

                                    
                                        
                                    $itemCategory = $_POST["itemCategory"];
                                    $itemPrice = $_POST["itemPrice"];
                                    $itemName = $_POST["itemName"];

                                    $result = $mysqli->query("select distinct brand.name from brand join category on category.category_ID=brand.category_ID where category.category_ID=" . $itemCategory);

                                    while ($row = $result->fetch_assoc()) {
                                        
                                            echo "<option>" . $row['name'] . "</option>";
                                        
                                    }

                                    ?>

                            </select>
                            
                            <?php

                                if ($itemCategory == 1)
                                {
                                    echo "<input type=\"number\" placeholder=\"year\" name=\"itemYear\"  min=\"1900\" max=\"2014\" cols=\"4\" />";
                                }
                            
                            ?>
                            <br />
                            <textarea placeholder="item description..." name="itemDescription"></textarea>
                            
                            <div class="clear"></div>
                            <input type="submit" value="Next" onclick="loadSection('description', this)" class="" />
                        </div>
                    </div>
                    <?php


                        echo "<input type=\"hidden\" name=\"itemPrice\" value=\"" . $itemPrice . "\" />";
                        echo "<input type=\"hidden\" name=\"itemCategory\" value=\"" . $itemCategory . "\" />";
                        echo "<input type=\"hidden\" name=\"itemName\" value=\"" . $itemName . "\" />";
                    ?>
                </form>
            
        </div>
            <div id="bottomTitle"><h1>Katalister</h1></div>
    </div>
    
</body>
</html>
