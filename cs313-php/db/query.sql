--Create Tables
CREATE TABLE gifts (
  id SERIAL PRIMARY KEY,
  gift_name VARCHAR(255) NOT NULL,
  price MONEY NOT NULL,
  description VARCHAR(255) NOT NULL,
  interests_id INT NOT NULL REFERENCES interests(id)
  );

CREATE TABLE interests (
  id SERIAL PRIMARY KEY,
  interest VARCHAR(255)
  );

  CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    interest_id INT REFERENCES interests(id)
  );

  CREATE TABLE ideas (
    id SERIAL PRIMARY KEY,
    gift_id INT NOT NULL REFERENCES gifts(id), 
    user_id INT NOT NULL REFERENCES users(id)
  );

  --ALTER
  ALTER TABLE gifts
ADD COLUMN description VARCHAR(255) NOT NULL;

DELETE FROM gifts
WHERE gifts.id = 2;

DELETE FROM interests
WHERE interests.id = 2;

--Insert Gift Ideas

INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('projector', 400, 'A small projector with four hours of battery life', );
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('makeup brush cleaner', 35, 'This cleaner works on all sizes of brushes', 1);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('butterfly shoes', 90, 'These purple shoes have butterfly wings on the back', 1);

INSERT INTO interests (interest) VALUES ('fashion');


--Query by Interest
SELECT * FROM gifts AS g
JOIN interests AS i
ON g.interests_id = i.id
WHERE i.interest = 'fashion';