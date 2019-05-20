-- insert new account into the user TABLE
INSERT INTO user (username, email, password) VALUES (:username, :email, :password)

-- insert a new review to the review TABLE
INSERT INTO review (content, rating, user_id, restaurant_id, price) VALUES (:content, :rating, :user_id, :restaurant_id, :price)

-- Search for a review based off dynamic keyword
SELECT content, rating, price FROM review
INNER JOIN user ON review.user_id = user.id
INNER JOIN restaurant ON review.restaurant_id = restaurant.id
WHERE user.id = :search_by_user
OR restaurant.id = :search_by_rest_name
OR  review.content  LIKE '%:search_by_keyword%'

--Find a restaurant's owners
SELECT username FROM user
INNER JOIN user_restaurant ON user.id = user_restaurant.user_id
INNER JOIN restaurant ON restaurant.id = user_restaurant.restaurant_id
WHERE restaurant.id = :restaurant_id

--Find a restaurant's reviews
SELECT content, rating, price FROM review
INNER JOIN restaurant ON review.restaurant_id = restaurant.id
WHERE restaurant.id = restaurant_id

--Find a restaurant's address
SELECT street, zipcode, state, city FROM restaurant
INNER JOIN address ON address.id = restaurant.address_id
WHERE restaurant.id = :restaurant_id

--Register a restaurant's OWNER
INSERT INTO user_restaurant (user_id, restaurant_id) VALUES (:user_id, :restaurant_id)

--Register a restaurant
INSERT INTO restaurant (name, description, address_id, website, type) VALUES (:name, :description, :address_id, :website, :type)

-- Register an address
INSERT INTO address (street, zipcode, state, city) VALUES (:street, :zipcode, :state, :city)

-- Delete Restaurant owners
DELETE FROM user_restaurant WHERE user_id = :user_id AND restaurant_id = :restaurant_id

--Update a restaurant
UPDATE restaurant SET name = :rest_name, address_id= :address_id, description = :description, website= :website, type = :type WHERE id= :restaurant_id
