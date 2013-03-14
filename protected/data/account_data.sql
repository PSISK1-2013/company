CREATE TABLE  `psisk`.`account_data` (
`account_data_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`account_id` INT NOT NULL ,
`name` VARCHAR( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`surname` VARCHAR( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`age` INT NOT NULL ,
`married` BOOL NOT NULL
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

