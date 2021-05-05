create database work;
use work;

CREATE TABLE staff(
staff_id INT AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(255) NOT NULL,
password VARCHAR(20) NOT NULL,
firstname VARCHAR(20),
lastname VARCHAR(20),
worklimit INT NOT NULL,
phone VARCHAR(25),
address VARCHAR(255),
role ENUM('none', 'manager') DEFAULT 'none'
);

