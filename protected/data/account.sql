CREATE TABLE  `psisk`.`account` (
`account_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`type` INT NOT NULL ,
`login` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`password` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO  `psisk`.`account` (
`account_id` ,
`type` ,
`login` ,
`password`
)
VALUES (
'1',  '1',  'admin', MD5(  'admin' )
'2',  '2',  'pracownik', MD5(  'pracownik' )
);
