
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
    <p>Register a Restaurant</p>
    <p>(Remember to first register an address)</p>
      <form action="reg_rest.php" method="post">
      Name: <input type="text" name="name"><br>
      Description:<input type="text" name="description"><br>
      Website: <input type="text" name="website"><br>

      Category:
            <select name="categories">
            <option value="Fastfood">Fast Food</option>
            <option value="Foodtruck">Food Truck</option>
            <option value="Cafe">Cafe</option>
            <option value="Diner">Diner</option>
            <option value="Gastropub">Gastropub</option>
          </select><br>
      Address:
          <select name="address">
HTMLINPUT;

     //QUERY THEN ECHO RESULTS HERE
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("SELECT id,street, city,state,zipcode FROM address");
    $res->execute();
    foreach($res as $row){
          echo <<<HTMLINPUT
            <option value="{$row["id"]}"> {$row["street"]} {$row["city"]} {$row["state"]} {$row["zipcode"]} </option>
HTMLINPUT;
    }

    echo <<<HTMLINPUT
         </select><br>
         <input type="submit" name="reg_rest_submit" value="Submit">
          </form>
HTMLINPUT;


/////////////////////END HTML GENERATION///////////////////////////////////////////////////////
?>
