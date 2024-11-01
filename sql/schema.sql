CREATE TABLE artist (
    artist_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    gender VARCHAR (50),
    date_of_birth VARCHAR (50),
    specialization TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE projects (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR (50),
    genre TEXT,
    artist_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);