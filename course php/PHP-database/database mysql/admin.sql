CREATE TABLE admin(
    username VARCHAR(100) NOT NULL ,
    password VARCHAR(100) NOT NULL ,
    PRIMARY KEY (username)
)ENGINE = InnoDB;
drop table admin;
SELECT * FROM admin;
INSERT INTO admin(username,password) VALUES ('daud','admin');