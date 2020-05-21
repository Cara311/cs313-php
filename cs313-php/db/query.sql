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
  --ALTER TABLE gifts
--ADD COLUMN description VARCHAR(255) NOT NULL;


--DELETE
DELETE FROM gifts
WHERE gifts.id = 2;

DELETE FROM interests
WHERE interests.id = 2;

--Insert Gift Ideas

INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('projector', 400, 'A small projector with four hours of battery life', 6);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('sound bar', 65, 'Improves the quality of your tv sound', 6);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('Microwave popcorn bowl', 12, 'Pop movie theater-style popcorn in your microwave', 6);

INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('makeup brush cleaner', 35, 'This cleaner works on all sizes of brushes', 1);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('butterfly shoes', 90, 'These purple shoes have butterfly wings on the back', 1);

INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('paw oven mitts', 20, 'Oven mitts that look like paws', 3);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('dog shaming calendar', 12, 'A daily calendar with dog shaming pictures', 3);

INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('headphone stand', 30, 'A stand to keep your headphones on', 4);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('gaming glasses', 50, 'Protect your eyes from blue light', 4);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('gaming mouse bungee', 30, 'Keep your mouse cords out of the way to immprove accuracy', 4);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('gamer socks', 9, 'Gaming, do not disturb socks', 4);

INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('reading light', 15, 'A rechargeable reading light', 5);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('book couch', 25, 'A soft stand to rest your books or tablet on', 5);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('book page holder', 13, 'Use this to keep your book open with one hand', 5);

INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('hammock', 30, 'A comfy hammock to relax outside in', 2);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('Action Camera', 300, 'A camera with stablizer to catch great action shots', 2);
INSERT INTO gifts (gift_name, price, description, interests_id) VALUES ('Inflatable Kayak', 250, 'Roll up this kayak to take it anywhere then inflate it', 2);




--Insert Interests
INSERT INTO interests (interest) VALUES ('fashion'); --1
INSERT INTO interests (interest) VALUES ('outdoors');--2
INSERT INTO interests (interest) VALUES ('animals');--3
INSERT INTO interests (interest) VALUES ('gaming');--4
INSERT INTO interests (interest) VALUES ('reading');--5
INSERT INTO interests (interest) VALUES ('movies');--6


--Query by Interest
SELECT * FROM gifts AS g
JOIN interests AS i
ON g.interests_id = i.id
WHERE i.interest = 'fashion';