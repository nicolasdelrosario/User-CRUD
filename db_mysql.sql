-- TABLE STRUCTURE
CREATE TABLE user (
  iduser INT auto_increment NOT NULL,
  name VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  occupation VARCHAR(60) NOT NULL,
PRIMARY KEY	(iduser));

-- INITIAL DATA
INSERT INTO user(name, lastname, occupation) VALUES('Nicolas', 'Del Rosario', 'Frontend Developer');
INSERT INTO user(name, lastname, occupation) VALUES('Debora', 'Abarca', 'Backend Developer');
INSERT INTO user(name, lastname, occupation) VALUES('Karla', 'Hermosilla', 'Designer UI/UX');
INSERT INTO user(name, lastname, occupation) VALUES('Michael', 'Del Rosario', 'DevOps Engineer');
INSERT INTO user(name, lastname, occupation) VALUES('Noelle', 'Pasion', 'Apple Developer');
INSERT INTO user(name, lastname, occupation) VALUES('Geremy', 'Ocsa', 'FullStack Developer');
INSERT INTO user(name, lastname, occupation) VALUES('Frank', 'Rivas', 'Database Developer');
INSERT INTO user(name, lastname, occupation) VALUES('Andrés', 'Pereda', 'Designer UI');