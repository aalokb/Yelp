<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="server.js"></script>
</head>
<body>
	<p>Find a Review</p>

	Search by Username: <input type="text" id="username"><br>
	Search by Restaurant: <input type="text" id="restaurant"><br>
	Search by Keyword: <input type="text" id="keyword"><br>

	<button  type="button" name="test" id="find_review">Submit</button>

	<!-- for the actual result of the user query -->
	<span id="find_review_result">

	</span>

</body>
</html>

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
function runQuery(){
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
}


?>