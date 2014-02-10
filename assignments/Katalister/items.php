<!DOCTYPE html>

<html>
<head>
    <title>Team Form</title>
    
</head>
    
<body>
    <?php $mysqli = new mysqli("localhost", "phpUser", "password", "KatalisterProject");
        if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }
    ?>


    
    <?php 

   $category = 1;

   switch ($_GET['type'])
    {
        case "vehicles":
            $category = 1;
            $picture = "<td id=\"picOne\"><img src=\"images/phVehicles_07.png\" class=\"tableImage\"/></td>";
            break;
        case "electronics":
            $category = 2;
            $picture = "<td id=\"picOne\"><img src=\"images/phTechnology_06.png\" class=\"tableImage\"/></td>";
            break;
        case "appliances":
            $category = 3;
            $picture = "<td id=\"picOne\"><img src=\"images/phAppliances_08.png\" class=\"tableImage\"/></td>";
        break;
        case "furniture":
            $category = 4;
            $picture = "<td id=\"picOne\"><img src=\"images/phFurniture_11.png\" class=\"tableImage\"/></td>";
            break;
        case "housing":
            $category = 5;
            $picture = "<td id=\"picOne\"><img src=\"images/phHousing_09.png\" class=\"tableImage\"/></td>";
            break;
        case "clothing":
            $category = 6;
            $picture = "<td id=\"picOne\"><img src=\"images/phClothes_04.png\" class=\"tableImage\"/></td>";
        break;
        case "general":
            $category = 7;
            $picture = "<td id=\"picOne\"><img src=\"images/phGeneral_07.png\" class=\"tableImage\"/></td>";
        break;
    }

    $result = $mysqli->query("select * from item inner join brand on item.brand_ID=brand.brand_ID where category_ID=" . $category);

    echo "<table border='0'>\n";
    echo    "<tr style=\"height: 30px;\">
                    <th>Picture</th>
                    <th>Description</th>
                    <th>Price</th>";
                    
    if ($_GET['type'] == 'vehicles')
    {
        echo    "<th>Year</th>
                <th>Make</th>
                </tr>";
    }
    else
    {
        echo "<th>Brand</th>\n
              <th>PostDate</th>\n
            </tr>\n";
    }


                  echo "<colgroup>\n
                    <col style=\"width: 51px; max-width: 51px;\"  id=\"col2\">\n
                    <col style=\"width: 300px;\" id=\"col2\">\n
                    <col style=\"width: 50px;\"  id=\"col3\">\n
                    <col style=\"width: 50px;\"  id=\"col4\">\n
                    <col style=\"width: 50px;\"  id=\"col5\">\n
                    <col style=\"width: 50px;\"  id=\"col6\">\n
                  </colgroup>\n";
    


        while ($row = $result->fetch_assoc()) {
        echo "<tr>";  

                
            echo $picture;
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            
            
            if ($category == 1)
            {
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
            }
            else
            {
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['postDate'] . "</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
    ?>
    
</body>
</html>
