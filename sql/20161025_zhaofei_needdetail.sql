CREATE TABLE `jiajiao`.`zt_needdetail`
( 	`id` INT NOT NULL AUTO_INCREMENT, 
	`user_id` INT NOT NULL DEFAULT 0 COMMENT '学生id', 
	`need_id` INT NOT NULL DEFAULT 0 COMMENT '需求id', 
	`auther_id` INT NOT NULL DEFAULT 0 COMMENT '家长id', 
	`status` TINYINT(2) NOT NULL DEFAULT 0 COMMENT '状态 0：未选中 1：选中 -1拒绝', 
	`create_time` INT NOT NULL DEFAULT 0, 
	`uodate_time` INT NOT NULL DEFAULT 0, 
	PRIMARY KEY (`id`) 
) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_general_ci; 
ALTER TABLE `jiajiao`.`zt_needdetail` 
CHANGE `user_id` `teacher_id` INT(11) DEFAULT 0 NOT NULL COMMENT '学生id'; 