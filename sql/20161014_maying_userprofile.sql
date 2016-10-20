CREATE TABLE `zt_user_profile` (
  `user_id` int(11) NOT NULL,
  `idcard_no` varchar(30) NOT NULL DEFAULT '' COMMENT '身份证号',
  `idcard_image` varchar(50) NOT NULL DEFAULT '' COMMENT '身份证正面照片',
  `idcard_iamge_back` varchar(50) NOT NULL DEFAULT '' COMMENT '身份证背面',
  `student_card_image` varchar(50) NOT NULL DEFAULT '' COMMENT '学生证',
  `address` varchar(50) NOT NULL DEFAULT '' COMMENT '地址',
  `home_address` varchar(50) NOT NULL DEFAULT '' COMMENT '家庭地址',
  `school` int(11) NOT NULL DEFAULT '0' COMMENT '学校',
  `dept` varchar(50) NOT NULL DEFAULT '' COMMENT '专业',
  `strength` varchar(50) NOT NULL DEFAULT '' COMMENT '专长',
  `birthday` datetime NOT NULL COMMENT '生日',
  `province` int(11) NOT NULL DEFAULT '0' COMMENT '省',
  `city` int(11) NOT NULL DEFAULT '0' COMMENT '市',
  `area` int(11) NOT NULL DEFAULT '0' COMMENT '区',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8