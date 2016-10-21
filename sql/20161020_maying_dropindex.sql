DROP INDEX email_UNIQUE ON zt_user;

ALTER TABLE `jiajiao`.`zt_user_profile` 
CHANGE COLUMN `birthday` `birthday` DATETIME NULL COMMENT '生日' ;