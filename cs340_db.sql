CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(200) NOT NULL,
  email VARCHAR(200) NOT NULL,
  password VARCHAR(200) NOT NULL,
  UNIQUE KEY username (username)
) ENGINE=InnoDB;

LOCK TABLES user WRITE;

INSERT INTO user VALUES (1,'HarshBoi','HarshBoi@gmail.com','hunter2'),(2,'NickyV9000','NickBoi@gmail.com','password1'),(3,'AllOak9','AllOak@hotmail.com','cantcrackthis'),(4,'ManuMan', 'DrThap@gmail.com', 'perfectMCAT'),(5,"rugbydude","premedgunner@gmail.com", 'tunit104');

UNLOCK TABLES;



CREATE TABLE address (
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	street VARCHAR(100) NOT NULL,
    zipcode VARCHAR(5) NOT NULL,
    state VARCHAR(2) NOT NULL,
    city VARCHAR(100) NOT NULL
) ENGINE = InnoDB;

LOCK TABLES address WRITE;

INSERT INTO address VALUES (1,'1541 Pin Oak Drive','90670','CA', 'Santa Fe Springs'), ( 2,'2855 Elk City Road', '46229','IN','Indianapolis'), (3,'3383 Anthony Avenue','76890','TX','Zephyr'),(4,'553 Illinois Avenue','97230','OR','Portland');

UNLOCK TABLES;

CREATE TABLE restaurant (
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(200) NOT NULL,
  address_id int(11) NOT NULL,
  description VARCHAR(200) NOT NULL,
  website VARCHAR(200),
  type VARCHAR(200),
	CONSTRAINT `res_add`
		FOREIGN KEY (address_id) REFERENCES address (id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
) ENGINE = InnoDB;

LOCK TABLES restaurant WRITE;

INSERT INTO restaurant VALUES (1,'Pizza Hut',1,'Cheap and Warm Delicious Pizza!','www.pizzahut.com','fast food'),(2,'Noodles & Company', 3, 'The best noodles for the best prices!','www.noodles.com','gastropub'), (3,'McDonalds', 2, 'Come visit our dollar menue today!','www.mcd.com','fast food');

UNLOCK TABLES;

CREATE TABLE review (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  content VARCHAR(200) NOT NULL,
  rating int(11) NOT NULL,
  user_id int(11) NOT NULL,
  price int(11) NOT NULL,
  restaurant_id int(11) NOT NULL,
  CONSTRAINT `review_user_constraint`
    FOREIGN KEY (user_id) REFERENCES user (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `review_restaurant_constraint`
   FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)
   ON DELETE CASCADE
   ON UPDATE CASCADE
) ENGINE=InnoDB;

LOCK TABLES review WRITE;

INSERT INTO review VALUES (1,"This place sucks! Worst food I've ever had",1,2,2,1),(2,"This is delicious food, best noodles on the market!",4,1,1,2),(3,"I'd rather eat burgerking this place aint it!",2,4,1,3);

UNLOCK TABLES;

CREATE TABLE user_restaurant (
  user_id int(11) NOT NULL ,
  restaurant_id int(11) NOT NULL,
  CONSTRAINT `user_restaurant_user_constraint` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_restaurant_restaurant_constraint` FOREIGN KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

LOCK TABLES user_restaurant WRITE;

INSERT INTO user_restaurant VALUES (1,1),(1,2),(2,3),(3,3);

UNLOCK TABLES;
