

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `content` varchar(1000) NOT NULL,
  `creator_id` varchar(45) DEFAULT NULL,
  `publicado` tinyint(4) DEFAULT NULL,
  `validado` tinyint(4) DEFAULT NULL,
  `correcta` varchar(40) NOT NULL,
  `fecha` date DEFAULT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;


CREATE TABLE IF NOT EXISTS `tweet` (
  `user_id` double NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `answer` varchar(40) NOT NULL,
  `date` int(11) NOT NULL,
  `id_tweet` float NOT NULL,
  PRIMARY KEY (`id_tweet`,`user_id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `tweet`
  ADD CONSTRAINT `tweet_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE CASCADE;


  CREATE TABLE IF NOT EXISTS `quiz_hashtag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_quiz` int(11) DEFAULT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;
ALTER TABLE `quiz_hashtag`
  ADD CONSTRAINT `quiz_hashtag_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE CASCADE;
