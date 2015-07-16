
CREATE TABLE `assets` (
`id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fullsize` varchar(300) NOT NULL,
  `inactive` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;



CREATE TABLE `blog` (
`id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `blog_date` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



CREATE TABLE `email` (
`id` int(11) NOT NULL,
  `protocol` varchar(50) NOT NULL,
  `smtp_host` varchar(50) NOT NULL,
  `smtp_port` varchar(50) NOT NULL,
  `smtp_user` varchar(50) NOT NULL,
  `smtp_pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `html` varchar(50000) NOT NULL,
  `array` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



CREATE TABLE `menu2` (
  `id` int(11) NOT NULL,
  `father` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `innerhtml` varchar(500) NOT NULL,
`s_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;



CREATE TABLE `pages` (
`id` int(11) NOT NULL,
  `shortcodes` varchar(50000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `inactive` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `controller` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;



CREATE TABLE `products` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `spec` varchar(200) NOT NULL,
  `demo` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL,
  `h` varchar(10) NOT NULL,
  `w` varchar(10) NOT NULL,
  `d` varchar(10) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `site` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `color` varchar(10) NOT NULL,
  `font` varchar(50) NOT NULL,
  `footercolor` varchar(50) NOT NULL,
  `footerfontcolor` varchar(50) NOT NULL,
  `footer1` varchar(5000) NOT NULL,
  `footer2` varchar(5000) NOT NULL,
  `footer3` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `user` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `joindate` date NOT NULL,
  `logins` int(11) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `isadmin` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(15) NOT NULL,
  `activ_status` int(11) NOT NULL,
  `activ_key` varchar(1000) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


ALTER TABLE `assets`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `blog`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `email`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `menu2`
 ADD PRIMARY KEY (`s_id`);


ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `assets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;

ALTER TABLE `blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

ALTER TABLE `email`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

ALTER TABLE `menu2`
MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;

ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;

ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2
