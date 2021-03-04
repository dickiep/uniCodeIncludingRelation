

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE IF NOT EXISTS `youstayowners11` (
  `id` int(11) NOT NULL,
  `author` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `profile` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



INSERT INTO `youstayowners11` (`id`, `author`, `email`, `profile`) VALUES
(1, 'Jo Low', 'jlow@local.com', 'Joanne Low is Reviews Editor at Engadget. She led a mostly unexciting life in Singapore, her home country, until she came to New York in 2012. Since then, she''s earned her Master''s in Journalism from Columbia University''s Graduate School of Journalism and covered smartphones and wearables for Laptop Mag and Tom''s Guide. Life is now like a Hollywood movie except with far fewer lights and much more Instagram. And also, more selfies.'),
(2, 'Chris Velazco', 'chrisvel@localnews.com', 'Chris is Engadget''s Senior Mobile Editor, and moonlights as a professional moment ruiner. He spent his formative years taking apart Sega consoles and writing awful fan fiction. To his utter shock, that passion for electronics and words would eventually lead him to covering startups of all stripes at TechCrunch. The first phone he ever swooned over was the Nokia 7610, and he also really hates writing about himself in the third person.');


ALTER TABLE `youstayowners11`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `youstayowners11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

