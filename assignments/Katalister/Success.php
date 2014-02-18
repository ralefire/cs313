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


        $itemName = $_POST["itemName"];
        $itemPrice = $_POST["itemPrice"];
        $itemCategory = $_POST["itemCategory"];
        $itemDescription = $_POST["itemDescription"];
        $itemBrandName = $_POST["itemBrand"]; 

        $itemBrandResult = $mysqli->query("select brand_ID from brand where name=\"" . $itemBrandName . "\"");

        $results = $itemBrandResult->fetch_assoc();
        $itemBrand = $results['brand_ID'];

        if ($itemCategory == 1)
        {
            $itemYear = $_POST["itemYear"];
        }

        if ($_POST["Post"] != "")
        {
            if ($itemCategory == 1)
            {
               $result = $mysqli->query("INSERT INTO item (name, price, brand_ID, description, year, seller_ID) VALUES ('" . $itemName . "', " . $itemPrice .", ". $itemBrand .", '". $itemDescription . "', " . $itemYear .", 1)");
            }
            else
            {
              $result = $mysqli->query("INSERT INTO item (name, price, brand_ID, description, seller_ID) VALUES ('" . $itemName . "', " . $itemPrice .", ". $itemBrand . ", '" . $itemDescription . "', 1)");
            }
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
            <div id="inputDiv">
           <?php 
                if ($result == false)
                {
                    echo "<h2>Error posting to Katalister database.</h2>";
                }
                else
                {
                    echo "<h2>New item Posted!</h2>";
                }
                
            ?>
                </div>
            <div id="bottomTitle">
                <h1>Katalister</h1>
            </div>
        </div>
    </div>
</body>
</html>
