USE simplimmo;
CREATE TABLE regions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);
CREATE TABLE cities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    postal_code VARCHAR(20) NOT NULL,
    region_id INT,
    FOREIGN KEY (region_id) REFERENCES regions(id)
);
CREATE TABLE owners (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    phone_number INT NOT NULL,
    adress VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL
);
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    phone_number INT NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT 0
);
CREATE TABLE call_requests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE properties (
    id INT PRIMARY KEY AUTO_INCREMENT,
    surface_area DECIMAL(10, 2) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL,
    type_transaction VARCHAR(50) NOT NULL,
    type_property VARCHAR(50) NOT NULL,
    city_id INT,
    owner_id INT,
    FOREIGN KEY (city_id) REFERENCES cities(id),
    FOREIGN KEY (owner_id) REFERENCES owners(id)
);
CREATE TABLE photos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    url VARCHAR(255) NOT NULL,
    alt VARCHAR(100) NOT NULL,
    property_id INT,
    FOREIGN KEY (property_id) REFERENCES properties(id)
);
CREATE TABLE garages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(50) NOT NULL,
    underground BOOLEAN NOT NULL,
    property_id INT,
    FOREIGN KEY (property_id) REFERENCES properties(id)
);
CREATE TABLE houses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    room_number INT NOT NULL,
    bedroom_number INT NOT NULL,
    garden_size DECIMAL(10, 2) NOT NULL,
    property_id INT,
    FOREIGN KEY (property_id) REFERENCES properties(id)
);
CREATE TABLE appartments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    a_room_number INT NOT NULL,
    a_bedroom_number INT NOT NULL,
    garden BOOLEAN NOT NULL,
    property_id INT,
    FOREIGN KEY (property_id) REFERENCES properties(id)
);