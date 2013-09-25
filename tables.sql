CREATE TABLE IF NOT EXISTS `plot` (
  `time` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `listeners` int(11) NOT NULL,
  `peak` int(11) NOT NULL,
  PRIMARY KEY (`time`,`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `addr` varchar(255) NOT NULL,
  `servername` varchar(255) NOT NULL,
  `color1` varchar(20) NOT NULL,
  `color2` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
