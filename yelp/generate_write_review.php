
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
    <p>Review a Restaurant</p><br>
    <form action="write_review.php" method="post">
        User ID: <input type="text" name="user_id"><br>
        Restaurant:
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
    Review: <input type="textarea" name="content"><br>

    Rating: <input type="number" name="rating"><br>

    Price (1-3):
    <input type="number" name="price"><br>
    <input type="submit" name="write_review_submit" value="Submit">
  </form>
HTMLINPUT;


/////////////////////END HTML GENERATION///////////////////////////////////////////////////////
?>
