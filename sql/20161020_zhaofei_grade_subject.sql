CREATE TABLE `zt_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('一年级'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('二年级'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('三年级'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('四年级'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('五年级'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('六年级'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('初一'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('初二'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('初三'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('高一'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('高二'); 
INSERT INTO `jiajiao`.`zt_grade` (`grade`) VALUES ('高三'); 



CREATE TABLE `zt_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL DEFAULT '' COMMENT '学科',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('语文'); 
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('数学');
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('英语'); 
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('政治'); 
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('历史'); 
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('地理'); 
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('生物'); 
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('化学'); 
INSERT INTO `jiajiao`.`zt_subject` (`subject`) VALUES ('物理');
