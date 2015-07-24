--
-- Database: `ignitedcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
`id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fullsize` varchar(300) NOT NULL,
  `inactive` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
`id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` varchar(50000) NOT NULL,
  `blog_date` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
`id` int(11) NOT NULL,
  `protocol` varchar(50) NOT NULL,
  `smtp_host` varchar(50) NOT NULL,
  `smtp_port` varchar(50) NOT NULL,
  `smtp_user` varchar(50) NOT NULL,
  `smtp_pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `html` varchar(50000) NOT NULL,
  `array` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `menu2`
--

CREATE TABLE `menu2` (
  `id` int(11) NOT NULL,
  `father` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `innerhtml` varchar(500) NOT NULL,
`s_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
`id` int(11) NOT NULL,
  `shortcodes` varchar(50000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `inactive` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `controller` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
`permissionID` int(11) NOT NULL,
  `permission` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissionID`, `permission`) VALUES
(1, 'pages'),
(2, 'blog'),
(3, 'email'),
(4, 'menu'),
(5, 'permissions'),
(6, 'profile'),
(7,'assets'),
(8,'site_settings');


-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
`groupID` int(11) NOT NULL,
  `groupName` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;



--
-- Table structure for table `permission_map`
--

CREATE TABLE `permission_map` (
  `groupID` int(11) NOT NULL DEFAULT '0',
  `permissionID` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `permission_map`(`groupID`, `permissionID`) VALUES 
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

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



--
-- Table structure for table `user`
--

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
  `credits` int(11) NOT NULL,
  `permissiongroup` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;



--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu2`
--
ALTER TABLE `menu2`
 ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
 ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `permission_map`
--
ALTER TABLE `permission_map`
 ADD PRIMARY KEY (`groupID`,`permissionID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu2`
--
ALTER TABLE `menu2`
MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `permissionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3
