<!DOCTYPE html>
<html>

<body>
	<p>User Actions</p>

	<!-- INSERT: user 		CREATE-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/sign_up.php">
    <input type="submit" value="Sign Up" />
	</form>

	<!-- INSERT: review 		CREATE-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/write_review.php">
    <input type="submit" value="Write a Review" />
	</form>

	<!-- SELECT: dynamic filter search a table (review) 	READ-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/find_review.php">
    <input type="submit" value="Find a Review" />
    </form>

    <!-- SELECT: user_restaurant, restaurant 		READ-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/check_owners.php">
    <input type="submit" value="Check a Restaurant's Owners" />
	</form>

	<!-- SELECT: restaurant, review, user 		READ-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/check_reviews.php">
    <input type="submit" value="Check a Restaurant's Reviews" />
	</form>

	<!-- SELECT: address 		READ-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/locate_restaurant.php">
    <input type="submit" value="Locate a Restaurant" />
	</form>


	<p>Restaurant Owner Actions</p>

	<!-- INSERT: user_restaurant 		CREATE-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/reg_ownership.php">
    <input type="submit" value="Register Ownership of Restaurant" />
	</form>

	<!-- INSERT: restaurant 		CREATE-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/reg_restaurant.php">
    <input type="submit" value="Register a Resaurant" />
	</form>

	<!-- INSERT: address 		CREATE-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/reg_addr.php">
    <input type="submit" value="Register an Address" />
	</form>

	<!-- DELETE: many-to-many[user_restaurant] => (remove owner from restaurant) 		
		REMOVE-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/rm_rest_ownership.php">
    <input type="submit" value="Remove Ownership of Restaurant" />
    </form>

	<!-- UPDATE: edit restaurant information 		UPDATE-->
	<form action="http://web.engr.oregonstate.edu/~borkaraa/DB/yelp/edit_rest_info.php">
    <input type="submit" value="Edit Restaurant Information" />
	</form>

</body>
</html>