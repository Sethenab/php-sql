CREATE DATABASE IF NOT EXISTS videogames;
USE videogames;

CREATE TABLE IF NOT EXISTS game (
  id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  descriptions TEXT NOT NULL,
  release_date DATE NOT NULL,
  poster VARCHAR(255) NOT NULL,
  price DECIMAL(5,2) NOT NULL
);

INSERT INTO game (title, descriptions, release_date, poster, price)
VALUES
  ('Super Mario Bros.', 'Un jeu de plates-formes emblématique', '1985-09-13', 'super-mario-bros.jpg', 29.99),
  ('The Legend of Zelda: Ocarina of Time', "Un jeu d'aventure épique", '1998-11-23', 'zelda-ocarina-of-time.jpg', 49.99),
  ('Half-Life 2', 'Un jeu de tir à la première personne révolutionnaire', '2004-11-16', 'half-life-2.jpg', 19.99),
  ('Red Dead Redemption 2', "Un jeu d'action en monde ouvert", '2018-10-26', 'red-dead-redemption-2.jpg', 59.99),
  ('The Witcher 3: Wild Hunt', 'Un jeu de rôle fantastique', '2015-05-19', 'the-witcher-3-wild-hunt.jpg', 39.99);

CREATE TABLE admin (
  id TINYINT PRIMARY KEY,
  email VARCHAR(255) UNIQUE,
  password VARCHAR(255)
);

-- ajout de l'administrateur
INSERT INTO admin (id, email, password)
VALUES (1, 'admin@example.com', '$argon2id$v=19$m=65536,t=4,p=1$RkhVVHlmRzRMMWRwTlgyWg$S98cUaH+bUpKti6X1K6siQ');