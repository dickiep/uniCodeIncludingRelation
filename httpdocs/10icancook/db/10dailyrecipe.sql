
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE IF NOT EXISTS `10dailyrecipe` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `recipe` varchar(50) NOT NULL,
  `intro_text` longtext NOT NULL,
  `intro_image` varchar(50) NOT NULL,
  `ingred_text` longtext NOT NULL,
  `ingred_image` varchar(50) NOT NULL,
  `how` longtext NOT NULL,
  `front` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;



INSERT INTO `10dailyrecipe` (`id`, `recipe`, `intro_text`, `intro_image`, `ingred_text`, `ingred_image`, `how`, `front`) VALUES
(4, 'Chicken jalfrezi', 'this is a test to see if edit works.', 'chickennoodle2.jpg', '2 tablespoons vegetable oil\r\n1 onion, grated\r\n2 cloves garlic, chopped\r\n675g boneless, skinless chicken thighs, cut in half\r\n3 teaspoons ground turmeric\r\n1 teaspoon chilli powder\r\n1 1/2 teaspoons salt', 'ingredients2.jpg', 'Heat the oil in a large deep frying pan over medium-high heat. Add onions and garlic, and cook for about 2 minutes. Add the chicken, and season with turmeric, chilli powder and salt. Fry gently, scraping the bottom of the pan frequently and turning the chicken.\r\n\r\nPour in the tomatoes with their juice, cover the pan, and simmer over medium heat for 20 minutes. Uncover, and simmer for another 10 minutes to let the excess liquid evaporate.\r\n\r\nAdd the ghee, cumin, ground coriander, ginger and fresh coriander, and simmer for another 5 to 7 minutes. Serve the chicken pieces with sauce spooned over the top.', 0),
(23, 'Chicken Curry', 'This is a Pakistani recipe for a spicy curry. My mum made this dish, and I like it very much. You must try it. This dish is best served with basmati rice, chapattis or naan bread.', 'chickennoodle2.jpg', '2 tablespoons vegetable oil\r\n1 onion, grated\r\n2 cloves garlic, chopped\r\n675g boneless, skinless chicken thighs, cut in half\r\n3 teaspoons ground turmeric\r\n1 teaspoon chilli powder\r\n1 1/2 teaspoons salt', 'ingredients2.jpg', 'Heat the oil in a large deep frying pan over medium-high heat. Add onions and garlic, and cook for about 2 minutes. Add the chicken, and season with turmeric, chilli powder and salt. Fry gently, scraping the bottom of the pan frequently and turning the chicken.\r\n\r\nPour in the tomatoes with their juice, cover the pan, and simmer over medium heat for 20 minutes. Uncover, and simmer for another 10 minutes to let the excess liquid evaporate.\r\n\r\nAdd the ghee, cumin, ground coriander, ginger and fresh coriander, and simmer for another 5 to 7 minutes. Serve the chicken pieces with sauce spooned over the top.', 1);

