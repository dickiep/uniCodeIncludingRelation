SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `youstay11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `descript` varchar(1000) NOT NULL,
  `address` varchar(250) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


INSERT INTO `youstay11` (`id`, `name`, `descript`, `address`, `pic`, `owner_id`) VALUES
(1, 'Charming A-frame house', 'Discover A-frame living at its best when you stay at this one-bedroom (plus a loft) Carnelian Bay retreat, a charming and cozy home with two private decks, mountain and lake views, and an outdoor hot tub at the foot of the trees.\r\n\r\nThis two-level cabin is just one block from the banks of Lake Tahoe itself, half a mile from Patton Beach, one mile from Carnelian Beach West, and three miles from Kings Beach. Come wintertime, it''s also only 10 miles from Northstar California Resort, 14 miles from Alpine Meadows, and 15 miles from Squaw Valley.', 'Northstar California Resort\r\nLake Tahoe\r\nCalifornia ', 'e7a47a56.jpg', '1'),
(2, 'Carnelian Woods, North Lake Tahoe', 'Carnelian Woods Condo is a beautifully maintained and well equipped vacation rental condo walking distance to the North Shore of Lake Tahoe and with the great amenities of the pool, hot tub, tennis courts and club room of the Carnelian Woods Complex. It is also dog friendly.\r\n\r\nIn the heart of Carnelian Bay this North Lake Tahoe vacation rental is in a great location and has a great layout for socializing with friends and family. The open plan living area with high ceilings, stone fireplace with gas stove, comfy couches and a dining room table that seats 6. There is a flat screen TV, cable and WiFi.', 'North Shore of Lake Tahoe\r\nCalifornia ', 'b63ed607f92.jpg','2');

