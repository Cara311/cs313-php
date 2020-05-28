--Create Tables
CREATE TABLE interests (
  id SERIAL PRIMARY KEY,
  interest VARCHAR(255)
  );

CREATE TABLE gifts (
  id SERIAL PRIMARY KEY,
  gift_name VARCHAR(255) NOT NULL,
  price MONEY NOT NULL,
  description VARCHAR(255) NOT NULL,
  image_name VARCHAR(255) NOT NULL,
  gift_link VARCHAR(255),
  interests_id INT NOT NULL REFERENCES interests(id)
  );

  CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    clientFirstname VARCHAR(255) NOT NULL,
    clientLastname VARCHAR(255) NOT NULL,
    clientEmail VARCHAR(255) NOT NULL,
    clientPassword VARCHAR(255) NOT NULL,
    clientLevel INT NOT NULL
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

--Insert Admin User
INSERT INTO users (clientFirstname, clientLastname, clientEmail, clientPassword, clientLevel) VALUES ('Admin', 'User', 'admin@codeotter.com', 'AdminUser-1', 1);

--Insert Interests
INSERT INTO interests (interest) VALUES ('fashion'); --1
INSERT INTO interests (interest) VALUES ('outdoors');--2
INSERT INTO interests (interest) VALUES ('animals');--3
INSERT INTO interests (interest) VALUES ('gaming');--4
INSERT INTO interests (interest) VALUES ('reading');--5
INSERT INTO interests (interest) VALUES ('movies');--6

--Insert Gift Ideas

INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('projector', 400, 'A small projector with four hours of battery life', 'projector.jpg', 6);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('sound bar', 65, 'Improves the quality of your tv sound', 'sound.jpg', 6);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('Microwave popcorn bowl', 12, 'Pop movie theater-style popcorn in your microwave', 'popcorn.jpg', 6);

INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('makeup brush cleaner', 35, 'This cleaner works on all sizes of brushes', 'brush.jpg', 1);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('flower shoes', 90, 'These blue shoes are covered in flowers', 'shoes.jpg', 1);

INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('paw oven mitts', 20, 'Oven mitts that look like paws', 'paws.jpg', 3);
INSERT INTO gifts (gift_name, price, description,  image_name, interests_id) VALUES ('dog shaming calendar', 12, 'A daily calendar with dog shaming pictures', 'dog.jpg', 3);

INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('headphone stand', 30, 'A stand to keep your headphones on', 'headphones.jpg', 4);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('gaming glasses', 50, 'Protect your eyes from blue light', 'glasses.jpg', 4);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('gaming mouse bungee', 30, 'Keep your mouse cords out of the way to immprove accuracy', 'mouse.jpg', 4);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('gamer socks', 9, 'Gaming, do not disturb socks', 'socks.jpg', 4);

INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('reading light', 15, 'A rechargeable reading light', 'light.jpg', 5);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('book couch', 25, 'A soft stand to rest your books or tablet on', 'book.jpg', 5);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('book page holder', 13, 'Use this to keep your book open with one hand', 'holder.jpg', 5);

INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('hammock', 30, 'A comfy hammock to relax outside in', 'hammock.jpg', 2);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('Action Camera', 300, 'A camera with stablizer to catch great action shots', 'camera.jpg', 2);
INSERT INTO gifts (gift_name, price, description, image_name, interests_id) VALUES ('Inflatable Kayak', 250, 'Roll up this kayak to take it anywhere then inflate it', 'kayak.jpg', 2);







--Query by Interest
SELECT * FROM gifts AS g
JOIN interests AS i
ON g.interests_id = i.id
WHERE i.interest = 'fashion';

--Query to bring up product
