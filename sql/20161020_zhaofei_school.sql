CREATE TABLE `zt_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '学校名',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `provice_id` int(11) NOT NULL DEFAULT '0' COMMENT '所在省id',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '市id',
  `area_id` int(11) NOT NULL DEFAULT '0' COMMENT '区域id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `jiajiao`.`zt_school` ADD COLUMN `level` TINYINT DEFAULT 0 NOT NULL COMMENT '学校级别' AFTER `area_id`; 