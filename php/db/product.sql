-- Create Category Table
CREATE TABLE category (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
);

-- Create Product Table
CREATE TABLE product (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  image VARCHAR(255),
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES category(id)
);

-- Create Variation Table
CREATE TABLE variation (
  id INT PRIMARY KEY AUTO_INCREMENT,
  product_id INT,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2),
  FOREIGN KEY (product_id) REFERENCES product(id)
);
