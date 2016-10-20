CREATE TABLE `zt_need` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '需求标题',
  `description` varchar(300) NOT NULL DEFAULT '' COMMENT '简介',
  `area_id` int(11) NOT NULL DEFAULT '0' COMMENT '区域',
  `address` varchar(200) NOT NULL DEFAULT '0' COMMENT '家庭住址',
  `provice_id` int(11) NOT NULL DEFAULT '0' COMMENT '省',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '市',
  `grade_id` int(11) NOT NULL DEFAULT '0' COMMENT '孩子年级',
  `school_id` int(11) NOT NULL DEFAULT '0' COMMENT '孩子学校',
  `subject` varchar(50) NOT NULL DEFAULT '' COMMENT '科目',
  `phone` int(11) NOT NULL DEFAULT '0' COMMENT '联系方式',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '特殊要求（价格 性别 地域等）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `jiajiao`.`zt_need` CHANGE `subject` `subject_id` INT(11) DEFAULT 0 NOT NULL COMMENT '科目'; 
