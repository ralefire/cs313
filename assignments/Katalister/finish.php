<!DOCTYPE html>

<html>
<head>
    <title>Post an item</title>
     <link rel="stylesheet" type="text/css" href="project4.css" />
    <link rel="stylesheet" type="text/css" href="post.css" />
</head>
    
<body>
    
    <?php $mysqli = new mysqli("localhost", "phpUser", "password", "KatalisterProject");


        $itemName = $_POST["itemName"];
        $itemPrice = $_POST["itemPrice"];
        $itemCategory = $_POST["itemCategory"];
        $itemDescription = $_POST["itemDescription"];
        $itemBrand = $_POST["itemBrand"]; 

        if ($itemCategory == 1)
        {
            $itemYear = $_POST["itemYear"];
        }

        $itemCategoryResult = $mysqli->query("select name from category where category_ID=".$itemCategory);
        $results = $itemCategoryResult->fetch_assoc();
        $itemCategoryName = $results['name'];
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
                        <li id="descriptionNav" >Description</li>
                        <li>></li>
                        <li id="finishNav" class="selected">Finish</li>
                    </ul>
                    <div class="clear"></div>
                </div>

                <form name="postForm" action="Success.php" id="postForm" method="post">
                    
                    <div id="inputDiv">
                        <div class="resultsDisplay">
                            <?php 
                            
                            echo "<p>Name: " . $itemName . "</p><br />";
                            echo "<p>Price: " . $itemPrice . "</p><br />";
                            echo "<p>Category: " . $itemCategoryName . "</p><br />";
                            echo "<p>Brand: " . $itemBrand . "</p><br />";
                            if ($itemCategory == 1)
                            {
                                echo "<p>Year: " . $itemYear . "</p><br />";
                            }
                            echo "<p>Description: " . $itemDescription . "</p><br />";
                            ?>
                        </div> 
                        <input type="submit" value="Post!" name="Post" />
                        </div>

                        <?php
                            echo "<input type=\"hidden\" name=\"itemPrice\" value=\"" . $itemPrice . "\" />";
                            echo "<input type=\"hidden\" name=\"itemBrand\" value=\"" . $itemBrand . "\" />";
                            echo "<input type=\"hidden\" name=\"itemDescription\" value=\"" . $itemDescription . "\" />";
                            echo "<input type=\"hidden\" name=\"itemName\" value=\"" . $itemName . "\" />";
                            echo "<input type=\"hidden\" name=\"itemCategory\" value=\"" . $itemCategory . "\" />";
                           
                            if ($itemCategory == 1)
                            {
                                echo "<input type=\"hidden\" name=\"itemYear\" value=\"" . $itemYear . "\" />";
                            }
                        ?>

                </form>
        </div>
    <div id="bottomTitle"><h1>Katalister</h1></div>
    </div>
    
</body>
</html>
