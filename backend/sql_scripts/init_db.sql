CREATE TABLE events (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        event_name VARCHAR(255),
                        start_date DATE,
                        end_date DATE,
                        description TEXT,
                        image_url VARCHAR(255),
                        category_id INT
);

CREATE TABLE categories (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            category_name VARCHAR(255),
                            category_color VARCHAR(20)
);

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(50),
                       password VARCHAR(255)
);
