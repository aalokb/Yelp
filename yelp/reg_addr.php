<!DOCTYPE html>
<html>
<body>
	<p>Register an Address</p>
	    <form action="reg_addr.php" method="post">
	  	Street: <input type="textarea" name="street"><br>
	  	Zipcode: <input type="textarea" name="zipcode"><br>
    	State: <input type="textarea" name="state"><br>
    	City: <input type="textarea" name="city"><br>
    <input type="submit" name="reg_addr_submit" value="Submit">
		</form>
</body>
</html>

<?php
  //Used for maintaining sessions and ensuring that login information persists between pages and if the user decides to logout
  include('server.php');
  //session_start();
?>
