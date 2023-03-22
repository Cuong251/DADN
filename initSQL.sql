CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  email VARCHAR(255) NOT NULL,
  gender VARCHAR(10),
  birthday DATE,
  country VARCHAR(50),
  phone_number VARCHAR(10)
);

CREATE TABLE houses (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  address VARCHAR(255) NOT NULL
);

CREATE TABLE rooms (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  house_id INT NOT NULL,
  FOREIGN KEY (house_id) REFERENCES houses(id)
);

CREATE TABLE sensors (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  type VARCHAR(20) NOT NULL
);

CREATE TABLE devices (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  room_id INT NOT NULL,
  sensor_id INT NOT NULL,
  FOREIGN KEY (room_id) REFERENCES rooms(id),
  FOREIGN KEY (sensor_id) REFERENCES sensors(id)
);

CREATE TABLE user_house (
  user_id INT NOT NULL,
  house_id INT NOT NULL,
  PRIMARY KEY (user_id, house_id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (house_id) REFERENCES houses(id)
);