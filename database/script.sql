-- Create the Users table
CREATE TABLE Users
(
    id            INT PRIMARY KEY AUTO_INCREMENT,
    name          VARCHAR(255) NOT NULL,
    email         VARCHAR(255) NOT NULL,
    password      VARCHAR(255) NOT NULL,
    other_details TEXT
);

-- Create the Recipes table
CREATE TABLE Recipes
(
    id               INT PRIMARY KEY AUTO_INCREMENT,
    name             VARCHAR(255) NOT NULL,
    description      TEXT,
    preparation_time INT,
    difficulty_level VARCHAR(50),
    instructions     TEXT,
    other_details    TEXT,
    users_id         INT,
    FOREIGN KEY (users_id) REFERENCES Users (id)
);

-- Create the Ingredients table
CREATE TABLE Ingredients
(
    id                 INT PRIMARY KEY AUTO_INCREMENT,
    name               VARCHAR(255) NOT NULL,
    description        TEXT,
    quantity_available INT
);

-- Create the Recipe_Ingredients (many-to-many relationship table)
CREATE TABLE Ingredients_Recipes
(
    recipes_id        INT,
    ingredients_id    INT,
    required_quantity INT,
    PRIMARY KEY (recipes_id, ingredients_id),
    FOREIGN KEY (recipes_id) REFERENCES Recipes (id),
    FOREIGN KEY (ingredients_id) REFERENCES Ingredients (id)
);

-- Create the Categories table
CREATE TABLE Categories
(
    id   INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

-- Create the Recipe_Categories (many-to-many relationship table)
CREATE TABLE Categories_Recipes
(
    recipe_id   INT,
    category_id INT,
    PRIMARY KEY (recipe_id, category_id),
    FOREIGN KEY (recipe_id) REFERENCES Recipes (recipe_id),
    FOREIGN KEY (category_id) REFERENCES Categories (category_id)
);
