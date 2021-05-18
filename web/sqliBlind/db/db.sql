
CREATE TABLE `user_agents` (
  `id` int(3) NOT NULL,
  `user_agent` varchar(40) NOT NULL
);

INSERT INTO `user_agents` VALUES (1,'Mozilla/5.0'),(2,'flag{82c3c4c7c43a9c163e515a5796604c35}');

CREATE TABLE `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,	
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `users` VALUES (1,'admin','admin');