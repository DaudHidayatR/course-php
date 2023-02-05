Create database belajar_php_todolist;

CREATE TABLE  todolist(
    id INT NOT NULL AUTO_INCREMENT,
    todo VARCHAR(250) NOT NULL ,
    PRIMARY KEY (id)
)ENGINE = InnoDB;

SHOW databases ;

DESC todolist;
