CREATE DATABASE IF NOT EXISTS dioscas;
USE dioscas;

CREATE TABLE user(
	user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(256) NOT NULL,
	password VARCHAR(64) NOT NULL,
    first_name VARCHAR(200) NOT NULL,
    last_name VARCHAR(200) NOT NULL,
    phone VARCHAR(10) NOT NULL
    
);

CREATE TABLE disc(
  disc_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  user_id INTEGER REFERENCES user,
  disc_type VARCHAR(200) NOT NULL,
  disc_Fname VARCHAR(200),
  disc_Lname VARCHAR(200),
  disc_phone VARCHAR(10),
  disc_status VARCHAR(50) NOT NULL,
  found_date DATE NOT NULL,
  
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  INDEX (user_id)
);

