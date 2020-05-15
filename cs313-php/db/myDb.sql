CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    user_name VARCHAR(256) NOT NULL,
    user_level VARCHAR(256) NOT NULL
);

CREATE TABLE gifts (
    id SERIAL PRIMARY KEY,
    gift_name VARCHAR(256) NOT NULL,
    price MONEY 
);

CREATE TABLE interests (
    id SERIAL PRIMARY KEY,
    interest VARCHAR(256) NOT NULL,
    gift_id INT NOT NULL REFERENCES gifts(id),
    user_id INT NOT NULL REFERENCES users(id)
);