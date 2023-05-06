/*-------------CREATE TABLE--------------*/
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

CREATE TABLE sensor_readings (
  id INT PRIMARY KEY AUTO_INCREMENT,
  device_id INT NOT NULL,
  timestamp DATETIME NOT NULL,
  value FLOAT NOT NULL,
  FOREIGN KEY (device_id) REFERENCES devices(id)
);

/*---------------ADD DATA-----------------*/

/*-----------User--------------*/
INSERT INTO users (username, password, firstname, lastname, email, gender, birthday, country, phone_number) VALUES 
('trong', '123456', 'Trong', 'Nguyen Van', 'trong@gmail.com', 'male', '2002-01-01', 'Vietnam', '0123456789'),
('tan', '123456', 'Tan', 'Tran Minh', 'tan@gmail.com', 'male', '2002-02-02', 'Vietnam', '0123456798'),
('thinh', '123456', 'Thinh', 'Nguyen Quoc', 'thinh@gmail.com', 'male', '2002-03-03', 'Vietnam', '0213456789'),
('cuong', '123456', 'Cuong', 'Mai Le', 'cuong@gmail.com', 'male', '2002-04-04', 'Vietnam', '0231456789');

/*---------------House-----------------*/
INSERT INTO houses (name, address)
VALUES ('KTX', 'Thu duc, HCM');

/*---------------User/House-----------------*/
INSERT INTO user_house (user_id, house_id)
VALUES (1, (SELECT id FROM houses WHERE name = 'KTX' AND address = 'Thu duc, HCM'));

/*---------------Room-----------------*/
INSERT INTO rooms (name, house_id)
VALUES ('Living room', (SELECT id FROM houses WHERE name = 'KTX'));

/*---------------Devices-----------------*/
INSERT INTO sensors (name, type)
VALUES ('camera', 'button'),
       ('temperature', 'number'),
       ('light', 'number');

INSERT INTO devices (name, room_id, sensor_id)
VALUES ('Camera 1', (SELECT id FROM rooms WHERE name = 'Living room' AND house_id = (SELECT id FROM houses WHERE name = 'KTX' AND address = 'Thu duc, HCM')), (SELECT id FROM sensors WHERE name = 'camera')),
       ('Thermometer 1', (SELECT id FROM rooms WHERE name = 'Living room' AND house_id = (SELECT id FROM houses WHERE name = 'KTX' AND address = 'Thu duc, HCM')), (SELECT id FROM sensors WHERE name = 'temperature')),
       ('Light sensor 1', (SELECT id FROM rooms WHERE name = 'Living room' AND house_id = (SELECT id FROM houses WHERE name = 'KTX' AND address = 'Thu duc, HCM')), (SELECT id FROM sensors WHERE name = 'light'));
