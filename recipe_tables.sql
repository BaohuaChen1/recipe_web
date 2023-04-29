
CREATE TABLE user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    favourite_recipe VARCHAR(255)
);

CREATE TABLE recipe(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    ingredient VARCHAR(255) NOT NULL,
    quanty VARCHAR(255) NOT NULL,
    step VARCHAR(255) NOT NULL,
    time_per_step VARCHAR(255) NOT NULL
);

CREATE TABLE rating(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    recipe_id INT NOT NULL UNIQUE,
    rating TINYINT UNSIGNED,
    CHECK (rating >=0 and rating <=5),
    FOREIGN KEY(user_id) REFERENCES user(id),
    FOREIGN KEY(recipe_id) REFERENCES recipe(id)
)