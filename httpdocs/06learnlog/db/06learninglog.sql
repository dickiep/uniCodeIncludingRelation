

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Table structure for table 
--

CREATE TABLE IF NOT EXISTS `06learninglog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `details` mediumtext NOT NULL,
  `category` varchar(200) NOT NULL,
  `mydate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `learninglog06`
--

INSERT INTO `06learninglog` (`title`, `details`,  `category`, `mydate`) VALUES
( 'HTML Introduction', 'Learn how to combine basic HTML elements to create Web pages.\r\n\r\nUnderstand how to use HTML tags and tag attributes to control a Web page''s appearance.\r\n\r\nLearn how to add absolute URLs, relative URLs, and named anchors to your Web pages.\r\n\r\n','web5001', '2018-02-12'),
('HTML Intermediate', 'Find out how to use tables and frames as navigational aids on a Web site.\r\n\r\nGet the answers to all you questions about copyright law and the Web.\r\n\r\nFTP and client server architecture.','web5001', '2018-02-02'),
( 'CSS Introduction', 'Describe the function of Cascading Style Sheets (CSS) in Web communications and describe the relationship between CSS and HTML.\r\n\r\nDefine the terms ''presentational'' and ''semantic'' mean in the context of HTML/CSS coding.\r\n\r\nDescribe the role played by hosting services on the Web.\r\n\r\nDescribe how the widespread use of different web browsers can affect the decisions made by a web-master or the author of a site.\r\n\r\nIdentify software that can be used to create, maintain, or modify HTML and CSS.\r\n\r\nCreate empty HTML and CSS files. Identify the parts of HTML and CSS files. ', 'web9012', '2017-12-31'),
( 'CSS Intermediate', 'Use hex codes to specify colors for elements of a web document.\r\n\r\nUse entity references and/or ISO Latin-1 codes to put special characters in a web document.\r\nEmbed images or video from external websites in an HTML document.\r\n\r\nInclude images or video from a local server in an HTML-based webpage.\r\nFormat images and video using CSS.\r\n\r\nTroubleshoot common problems with images and video, including problems with original source material (e.g. too large, inappropriate resolution, wrong format) and problems with presentation.\r\n\r\nUse newer HTML5 tags with associated CSS instructions to organize information and content. ','web9012', '2017-01-22'),
( 'HTML 5', 'HTML 5 elements are now standard and different from the older standards. Some common new elements are video section and nav', 'web9012','2018-01-29');

