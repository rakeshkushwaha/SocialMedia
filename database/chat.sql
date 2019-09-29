--Chat Table
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(64) DEFAULT NULL,
 `user_dob` VARCHAR(64) DEFAULT NULL,
  `user_gender` VARCHAR(64) DEFAULT NULL,
 `user_email` VARCHAR(64) DEFAULT NULL,
  `user_password` VARCHAR(64) DEFAULT NULL,
  `start_time` DATETIME DEFAULT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;
  
--Chat Table
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `chat_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL ,
  `chat_msg` VARCHAR(64) DEFAULT NULL,
  `start_time` DATETIME DEFAULT NULL,
  PRIMARY KEY  (`chat_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;
  
