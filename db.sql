-- creating table user
create table user (
  iduser int auto_increment NOT NULL,
  name varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  occupation varchar(60) NOT NULL,
primary key	(iduser));

-- original users
insert into user(name, lastname, occupation) values('Nicolas', 'Del Rosario', 'Frontend Developer');
insert into user(name, lastname, occupation) values('Debora', 'Abarca', 'Backend Developer');
insert into user(name, lastname, occupation) values('Karla', 'Hermosilla', 'Designer UI/UX');
insert into user(name, lastname, occupation) values('Michael', 'Del Rosario', 'DevOps Engineer');
insert into user(name, lastname, occupation) values('Noelle', 'Pasion', 'Apple Developer');
insert into user(name, lastname, occupation) values('Geremy', 'Ocsa', 'FullStack Developer');
insert into user(name, lastname, occupation) values('Frank', 'Rivas', 'Database Developer');
insert into user(name, lastname, occupation) values('Andrés', 'Pereda', 'Designer UI');



