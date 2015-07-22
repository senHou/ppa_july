CREATE table team
(
   name VARCHAR(30) not null
);

CREATE TABLE people
(
   name VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL,
   status int(11) NOT NULL
);

CREATE TABLE game 
(
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   team_one VARCHAR(30),
   team_two VARCHAR(30),
   week_no int(11)
);

CREATE TABLE record
(
   game_id int(11),
   people_name varchar(30),
   team_name varchar(30),
   week_no int(11)
);
