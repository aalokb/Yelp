<!DOCTYPE html>
<html>
<head>
	<!-- <script type="text/javascript" src="server.js"></script> -->
</head>
<body>
	<p>Find a Review</p>

	<form action="find_review.php" method="post">
	  Search by Username: <input type="text" name="username"><br>
		Search by Restaurant: <input type="text" name="restaurant"><br>
		Search by Keyword: <input type="text" name="keyword"><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<!-- for the actual result of the user query -->
	<span id="find_review_result">

	</span>

</body>
</html>

<?php
	include('server.php')
  // $host = 'classmysql.engr.oregonstate.edu';
  // $db = 'cs340_anandn';
  // $user = 'cs340_anandn';
  // $charset = 'utf8mb4';
  // $pass = 4016;
  // $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  // $opt = [
  //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  //     PDO::ATTR_EMULATE_PREPARES => false,
  // ];
// function runQuery(){
//   try{
//       $pdo = new PDO($dsn, $user, $pass, $opt);
//       $res = $pdo->query("SELECT * FROM user");
//       foreach($res as $row){
//         echo "Username: " . $row["username"];
//         // echo "<tr><td>". $row['Tables_in_cs340_anandn'] . "</td></tr>\n";
//       }
//
//   }
//   catch (\PDOException $e){
//
//   }
// }


?>
