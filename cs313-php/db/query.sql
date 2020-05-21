--Create Tables

CREATE TABLE interests (
  id SERIAL PRIMARY KEY,
  interest VARCHAR(255),
  gift_id INT NOT NULL REFERENCES gifts(id)
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

--Insert Gift Ideas

INSERT INTO gifts (gift_name, price) VALUES ('projector', 400);
INSERT INTO gifts (gift_name, price) VALUES ('makeup brush cleaner', 35);
INSERT INTO interests (interest, gift_id) VALUES ('fashion', 2);


--Query by Interest
SELECT * FROM gifts AS g
JOIN interests AS i
ON g.id = i.gift_id
WHERE i.interest = 'fashion';