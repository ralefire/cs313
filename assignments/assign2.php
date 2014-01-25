<?php 
    session_start();


        if (isset($_SESSION["canVote"]) && $_SESSION["canVote"] == false)
        {
            header( 'Location: http://ec2-54-209-227-242.compute-1.amazonaws.com/assignments/assign2results.php' );
        }
        else
        {
            $_SESSION["canVote"] = true;
        }

?>

<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../main.css"/>
    <link rel="stylesheet" type="text/css" href="assign2.css"/>
</head>

<body>

    <h1>Reunion Survey</h1>
    <div class="outerBody" id="thePadding">
        <div class="floatMeLeft">
       <form action="assign2results.php" method="post">
        <h3>Family Theme</h3>
        <h4>Vote for your favorite theme:</h4>
        <input type="radio" name="theme" value="1" required />Love Endures Through all Generations<br />
        <input type="radio" name="theme" value="2" required />United and Growing<br />
        <input type="radio" name="theme" value="3" required />United We Stand<br />
        <input type="radio" name="theme" value="4" required />Super Gen<br />
        </div>
        <h3>Activities</h3>
        <h4>Please rate your interest in the following activities:</h4>
        <div class="leftIndent">
        Crafts:
        <select name="Crafts" required>
            <option value="1">Please, no.</option>
            <option value="2">I'll watch</option>
            <option value="3">I'll enjoy it</option>
            <option value="4">Yes! Lets do it!</option>
        </select> <br />
        Games:
        <select name="Games" required>
            <option value="1">Please, no.</option>
            <option value="2">I'll watch</option>
            <option value="3">I'll enjoy it</option>
            <option value="4">Yes! Lets do it!</option>
        </select> <br />
        Physical Activities:
        <select name="Physical" required>
            <option value="1">Please, no.</option>
            <option value="2">I'll watch</option>
            <option value="3">I'll enjoy it</option>
            <option value="4">Yes! Lets do it!</option>
        </select> <br />
        Recipes:
        <select name="Recipes" required>
            <option value="1">Please, no.</option>
            <option value="2">I'll watch</option>
            <option value="3">I'll enjoy it</option>
            <option value="4">Yes! Lets do it!</option>
        </select> <br />
        Music:
        <select name="Music" required>
            <option value="1">Please, no.</option>
            <option value="2">I'll watch</option>
            <option value="3">I'll enjoy it</option>
            <option value="4">Yes! Lets do it!</option>
        </select> <br />
            </div>
        <div class="floatMeLeft" id="smaller">
        <h3>Length of Stay</h3>
        <h4 id="inline">How long would you be able to attend?</h4>
        <select name="Stay" required>
            <option value="1"> 1 Day</option>
            <option value="2"> 2 Days</option>
            <option value="3"> 3 Days</option>
            <option value="4"> 4 Days</option>
        </select>
            </div>
        <h3>Comments</h3>
        <h4>Any other comments or requests?</h4>
        <textarea name="Comments" rows="4" cols="30"></textarea> <br />
           
        <input type="submit" value="Submit!" class="submit" /><button class="submit"><a href="assign2results.php" id="viewResults">View Results</a></button>

           
           
        </form>
    </div>
</body>
</html>











