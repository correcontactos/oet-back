
CREATE TABLE vehicle
(id INT PRIMARY KEY AUTO_INCREMENT,
plate VARCHAR(10) UNIQUE NOT NULL,
color VARCHAR(30) NOT NULL,
mark VARCHAR(30) NOT NULL,
type ENUM('particular', 'public') NOT NULL);

CREATE TABLE person
(id INT PRIMARY KEY AUTO_INCREMENT,
document VARCHAR(10) UNIQUE NOT NULL,
first_name VARCHAR(30) NOT NULL,
second_name VARCHAR(30) NULL,
last_name VARCHAR(30) NOT NULL,
address VARCHAR(30) NOT NULL,
phone VARCHAR(30) NOT NULL,
city VARCHAR(30) NOT NULL);

CREATE TABLE vehicle_person
(id INT PRIMARY KEY AUTO_INCREMENT,
vehicle_id INT NOT NULL,
person_id INT NOT NULL,
type ENUM('owner', 'driver') NOT NULL,
FOREIGN KEY (vehicle_id) REFERENCES vehicle (id),
FOREIGN KEY (person_id) REFERENCES person (id)
);

SELECT 
v.plate, v.mark, 
CONCAT(d.first_name, ' ', COALESCE(d.second_name,''), ' ', d.last_name) driver, 
CONCAT(o.first_name, ' ', COALESCE(o.second_name,''), ' ', o.last_name) owner 
FROM vehicle v 
INNER JOIN vehicle_person vd ON v.id = vd.vehicle_id AND vd.type = 'driver' 
INNER JOIN person d ON vd.person_id = d.id 
INNER JOIN vehicle_person vo ON v.id = vo.vehicle_id AND vo.type = 'owner' 
INNER JOIN person o ON vo.person_id = o.id;
