-- This query creates the necessary tables for this website to function
-- and should be run once if you just downloaded the files onto a new pc.
-- It also seeds the database with a basic admin account to get you
-- logged in and started
-- 1. Start xampp and navigate to localhost/phpmyadmin/
-- 2. Click the SQL tab, copy paste the contents of this file and click "Go"

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

CREATE TABLE shifts(
shift_id INT AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(20),
start TIME,
end TIME,
location VARCHAR(20)
);

CREATE TABLE staff_shifts(
staff_id INT REFERENCES staff (staff_id),
shift_id INT REFERENCES shift (shift_id),
status ENUM('active', 'inactive')
);

-- email: admin
-- password: admin
INSERT INTO staff VALUES(NULL, 'admin', 'admin', 'John', 'Doe', 0, '+123456789', '123 Test Rd', 'manager');
