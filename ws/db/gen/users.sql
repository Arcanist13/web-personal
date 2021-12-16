DROP TABLE users;
CREATE TABLE users(
	id INTEGER PRIMARY KEY NOT NULL,
  username TEXT NOT NULL,
  hashed_password TEXT NOT NULL,
  admin INTEGER NOT NULL,
  created INTEGER NOT NULL,
  email TEXT NOT NULL,
  activity INTEGER
);
