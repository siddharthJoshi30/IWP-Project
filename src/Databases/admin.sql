CREATE TABLE `admin` (
  `cid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `no` int(10),
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `admin` 
ADD CONSTRAINT `FK_ride_3` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON UPDATE CASCADE;