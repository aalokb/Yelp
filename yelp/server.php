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

try{
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->query("SELECT * FROM user");
    foreach($res as $row){
      echo "Username: " . $row["username"];
      // echo "<tr><td>". $row['Tables_in_cs340_anandn'] . "</td></tr>\n";
    }

}
catch (\PDOException $e){

}

?>
