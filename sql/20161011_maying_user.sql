CREATE TABLE `zt_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `phone` varchar(12) NOT NULL DEFAULT '0' COMMENT '电话',
  `nickname` varchar(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型 1：学生 2：老师',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态 0：默认 1：审核通过 -1：删除',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

