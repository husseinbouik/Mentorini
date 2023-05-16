-- Create the expert table
CREATE TABLE expert (
  expert_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50),
  expertise VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  location VARCHAR(100)
);

-- Create the credentials table
CREATE TABLE credentials (
  credential_id INT PRIMARY KEY AUTO_INCREMENT,
  expert_id INT,
  degree VARCHAR(100),
  institution VARCHAR(100),
  year INT,
  FOREIGN KEY (expert_id) REFERENCES expert(expert_id)
);

-- Insert data into the expert table
INSERT INTO expert (expert_id, name, expertise, email, phone, location)
VALUES
  (1, 'John Smith', 'Software Engineering', 'john@example.com', '1234567890', 'New York'),
  (2, 'Emily Johnson', 'Data Science', 'emily@example.com', '9876543210', 'San Francisco'),
  (3, 'Michael Davis', 'Artificial Intelligence', 'michael@example.com', '5555555555', 'London');

-- Insert data into the credentials table
INSERT INTO credentials (expert_id, degree, institution, year)
VALUES
  (1, 'Bachelor of Science', 'University of XYZ', 2015),
  (1, 'Master of Engineering', 'University of ABC', 2017),
  (2, 'Master of Science', 'University of DEF', 2016),
  (3, 'PhD in Computer Science', 'University of PQR', 2019),
  (3, 'Master of Business Administration', 'University of MNO', 2021);

ALTER TABLE credentials
DROP FOREIGN KEY credentials_ibfk_1;

ALTER TABLE credentials
ADD CONSTRAINT credentials_ibfk_1
FOREIGN KEY (expert_id)
REFERENCES expert(expert_id)
ON DELETE CASCADE;