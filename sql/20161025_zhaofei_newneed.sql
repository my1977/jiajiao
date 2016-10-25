ALTER TABLE `jiajiao`.`zt_need` 
ADD COLUMN `user_id` INT DEFAULT 0 NOT NULL COMMENT '家长id' AFTER `remark`, 
ADD COLUMN `teacher_id` INT DEFAULT 0 NOT NULL COMMENT '教员id' AFTER `user_id`, 
ADD COLUMN `status` TINYINT(2) DEFAULT 0 NOT NULL COMMENT '0：刚创建 1：找到人 2：完成' AFTER `teacher_id`, 
ADD COLUMN `user_confirm` TINYINT(2) DEFAULT 0 NOT NULL COMMENT '-1：拒绝 0：默认 1：选中 2：确认完成' AFTER `status`, 
ADD COLUMN `teacher_confirm` TINYINT(2) DEFAULT 0 NOT NULL COMMENT '-1：拒绝 0：默认 1：同意 2;确认完成' AFTER `user_confirm`, 
ADD COLUMN `start_time` INT DEFAULT 0 NOT NULL COMMENT '开始时间' AFTER `teacher_confirm`, 
ADD COLUMN `finish_time` INT DEFAULT 0 NOT NULL COMMENT '结束时间' AFTER `start_time`, 
ADD COLUMN `create_time` INT DEFAULT 0 NOT NULL AFTER `finish_time`, 
ADD COLUMN `update_time` INT DEFAULT 0 NOT NULL AFTER `create_time`; 