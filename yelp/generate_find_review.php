
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
        <h1>Find Specific Reviews</h1>
        <h3>Give as much information as you desire and we'll find all the reviews that match any of the given inputs.</h3>
        <form action="find_review.php" method="post">
HTMLINPUT;

//  START RESTAURANT
    echo <<<HTMLINPUT
        Search by Username:
            <select name="username">
                <option value=""> N/A </option>

HTMLINPUT;

    //QUERY THEN ECHO RESULTS HERE
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("SELECT id, username FROM user");
    $res->execute();
    foreach($res as $row){
          echo <<<HTMLINPUT
            <option value="{$row["id"]}">{$row["username"]} </option>
HTMLINPUT;
    }
    echo "</select><br>";
//  END RESTAURANT

//  START RESTAURANT
    echo <<<HTMLINPUT
        Search by Restaurant:
            <select name="restaurant">
                <option value=""> N/A </option>

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
//  END RESTAURANT

//  START KEYWORD
    echo <<<HTMLINPUT
        Search by Keyword:
        <input type="textarea" name="keyword"><br>
HTMLINPUT;
//  END KEYWORD

    echo <<<HTMLINPUT
            <input type="submit" name="find_review_submit" value="Submit">
        </form>
HTMLINPUT;







/////////////////////END HTML GENERATION///////////////////////////////////////////////////////
?>
