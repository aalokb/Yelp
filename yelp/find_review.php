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
?>
