CREATE TABLE  `psisk`.`account_type` (
`account_type_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`Name` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO  `psisk`.`account_type` (
`account_type_id` ,
`Name`
)
VALUES (
'1',  'Administrator'
), (
'2',  'Pracownik'
);