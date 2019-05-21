
<?php

$host = 'classmysql.engr.oregonstate.edu';
$db = 'cs340_anandn';
$user = 'cs340_anandn';
$charset = 'utf8mb4';
$pass = 4016;
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

///////////////////GENERATE DYNAMIC HTML///////////////////////////////////////////////////////
  // generate the HTML based off of extraction query:
    echo <<<HTMLINPUT
    <p>Edit a Restaurant's Information</p>
          Select Restaurant:

        <form action="edit_rest_info.php" method="post">
            <select name="restaurant_id">
HTMLINPUT;

    //QUERY THEN ECHO RESULTS HERE
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("SELECT id, name FROM restaurant");
    $res->execute();
    foreach($res as $row){
          echo <<<HTMLINPUT
            <option value="{$row["id"]}">{$row["name"]} </option>
HTMLINPUT;
    }
    echo "</select><br>";

    echo <<<HTMLINPUT
        Edit Name: <input type="text" name="name"><br>
        Edit Description: <input type="text" name="description"><br>
        Edit Website: <input type="text" name="website"><br>
        Edit Category:
                <select name="category">
                    <option value="Fastfood">Fast Food</option>
                    <option value="Foodtruck">Food Truck</option>
                    <option value="Cafe">Cafe</option>
                    <option value="Diner">Diner</option>
                    <option value="Gastropub">Gastropub</option>
                </select><br>

            <input type="submit" name="edit_rest_info_submit" value="Submit">
        </form>
HTMLINPUT;


/////////////////////END HTML GENERATION///////////////////////////////////////////////////////
?>
