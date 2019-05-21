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

if (isset($_POST["sign_up_submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");

    $res->execute([$username, $email, $password]);

    echo "<h1> Thanks for signing up! </h1>";
}


if (isset($_POST["write_review_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $content = $_POST["content"];
    $rating = $_POST["rating"];
    $user_id = $_POST["user_id"];
    $restaurant_id = $_POST["restaurant_id"];
    $price = $_POST["price"];

    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("INSERT INTO review (content, rating, user_id, restaurant_id, price) VALUES (?, ?, ?, ?, ?)");

    $res->execute([$content, $rating, $user_id, $restaurant_id, $price]);

    echo "<h1> Thanks for reviewing! </h1>";
}


if (isset($_POST["find_review_submit"])){

  $username = $_POST["username"];
  $restaurant = $_POST["restaurant"];
  $keyword = $_POST["keyword"];

  $pdo = new PDO($dsn, $user, $pass, $opt);
  $res = $pdo->prepare("SELECT content, rating, price FROM review
INNER JOIN user ON review.user_id = user.id
INNER JOIN restaurant ON review.restaurant_id = restaurant.id
WHERE user.id = ?
OR restaurant.id = ?
OR  review.content  LIKE ?");

  $res->execute([$username,$restaurant,$keyword]);

  foreach($res as $row){
    echo "<h1>Content: " . $row["content"] . "</h1>";
    echo "<h1>Rating: " . $row["rating"] . "</h1>";
    echo "<h1>Price: " . $row["price"] . "</h1>";
    echo "<br><br>";
  }
}


if (isset($_POST["check_owners_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $restaurant_id = $_POST["restaurant_id"];

    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("SELECT username FROM user
INNER JOIN user_restaurant ON user.id = user_restaurant.user_id
INNER JOIN restaurant ON restaurant.id = user_restaurant.restaurant_id
WHERE restaurant.id = ?");

    $res->execute([$restaurant_id]);

    foreach($res as $row){
      echo "<h1>Owner: " . $row["username"] . "</h1>";
    }
}


if (isset($_POST["check_reviews_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $restaurant_id = $_POST["restaurant_id"];

    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("SELECT content, rating, price FROM review
INNER JOIN restaurant ON review.restaurant_id = restaurant.id
WHERE restaurant.id = ?");

    $res->execute([$restaurant_id]);

    foreach($res as $row){
      echo "<h1>Review: " . $row["content"] . "</h1>";
      echo "<h1>Rating: " . $row["rating"] . "</h1>";
      echo "<h1>Price: " . $row["price"] . "</h1>";
      echo "<br><br>";
    }
}


if (isset($_POST["locate_restaurant_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $restaurant_id = $_POST["restaurant_id"];

    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("SELECT street, city, state, zipcode FROM restaurant
INNER JOIN address ON address.id = restaurant.address_id
WHERE restaurant.id = ?");

    $res->execute([$restaurant_id]);
    foreach($res as $row){ //for some reason this only works if its in a for loop...
      //'loop' for the one row...
      echo "<h1>" . $row["street"] . ", " . $row["city"] . ", " . $row["state"] . ", " . $row["zipcode"] . "</h1>";
    }
}

if (isset($_POST["reg_addr_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $res_street = $_POST["street"];
    $res_zip = $_POST["zipcode"];
    $res_state = $_POST["state"];
    $res_city = $_POST["city"];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("INSERT INTO address (street, zipcode, state, city) VALUES (?, ?, ?, ?)");

    $res->execute([$res_street,$res_zip,$res_state,$res_city]);
    echo "<h1> Successfully added Address. </h1>";
}

if (isset($_POST["reg_ownership_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $restaurant_id = $_POST["restaurant_id"];
    $user_id = $_POST["user_id"];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("INSERT INTO user_restaurant (user_id, restaurant_id) VALUES (?, ?)");

    $res->execute([$user_id, $restaurant_id]);
    echo "<h1> Thanks for Registering an Owner. </h1>";
}


if (isset($_POST["rm_rest_ownership_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $restaurant_id = $_POST["restaurant_id"];
    $user_id = $_POST["user_id"];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("DELETE FROM user_restaurant WHERE user_id = ? AND restaurant_id = ?");

    $res->execute([$user_id, $restaurant_id]);
    echo "<h1> Owner Successfully Removed. </h1>";
}


if (isset($_POST["edit_rest_info_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $restaurant_id = $_POST["restaurant_id"];
    $new_name = $_POST["name"];
    $new_description = $_POST["description"];
    $new_website = $_POST["website"];
    $new_category = $_POST["category"];

    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("UPDATE restaurant SET name = ?, description = ?, website= ?, type = ? WHERE id= ?");

    $res->execute([$new_name, $new_description, $new_website, $new_category, $restaurant_id]);

    echo "<h1> Restaurant Successfully Updated! </h1>";
}

if (isset($_POST["reg_rest_submit"])){
    // now that we have the correctly generated HTML (extracted from the DB), lets insert the
    // users selected data
    $res_name = $_POST["name"];
    $res_desc = $_POST["description"];
    $res_web = $_POST["website"];
    $res_type = $_POST["categories"];
    $res_add = $_POST["address"];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare("INSERT INTO restaurant (name, description, address_id, website, type) VALUES (?, ?, ?, ?, ?)");

    $res->execute([$res_name,$res_desc,$res_add,$res_web,$res_type]);
    echo "<h1> Thanks for Registering a restaurant. </h1>";
}


?>
