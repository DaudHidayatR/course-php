CREATE TABLE customers
(
    id VARCHAR(100) NOT NULL ,
    name VARCHAR(100) NOT NULL ,
    email VARCHAR(100) NOT NULL ,
    PRIMARY KEY (id)
)ENGINE = InnoDB;

SHOW TABLES ;
DELETE FROM customers WHERE name = 'Daud';
SELECT * FROM customers;
