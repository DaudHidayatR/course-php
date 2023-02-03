CREATE TABLE comments(
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL ,
    comment TEXT,
    PRIMARY KEY (id)
)ENGINE = InnoDB;
SELECT * FROM comments;