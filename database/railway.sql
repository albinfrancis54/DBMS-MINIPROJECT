

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE `accomodation` (
  `acc_id` int(11) NOT NULL,
  `acc_type` varchar(35) NOT NULL,
  `acc_price` double NOT NULL,
  `acc_slot` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `accomodation` (`acc_id`, `acc_type`, `acc_price`, `acc_slot`) VALUES
(1, 'Second Sitting', 350, 30),
(2, 'Sleeper', 390, 30),
(3, 'AC Chair Car', 390, 30),
(4, 'First Class', 490, 30),
(5, 'AC 3-Tier', 600, 30),
(6, 'AC 2-Tier', 700, 30),
(7, 'AC First Class',800,30);                                                                     
 

CREATE TABLE `train` (
  `trn_id` int(11) NOT NULL,
  `trn_name` varchar(35) NOT NULL,
  `trn_num` double NOT NULL,
  `trn_stns` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `train` (`trn_id`, `trn_name`, `trn_num`, `trn_stns`) VALUES
(1, 'Bangalore Express', 12678, 30),
(2, 'Chennai Express', 12686, 40),
(3, 'Mumbai Express', 11022, 71),
(4, 'Bangalore Express', 06516, 20),
(5, 'Chandigarh Express', 60046, 54),
(6, 'Bubneswr Rajdhani', 70078, 10);



CREATE TABLE `booked` (
  `book_id` int(11) NOT NULL,
  `book_by` varchar(50) NOT NULL,
  `book_contact` varchar(15) NOT NULL,
  `book_address` varchar(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_age` int(11) NOT NULL,
  `book_gender` varchar(15) NOT NULL,
  `book_departure` date NOT NULL,
  `dest_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `book_tracker` varchar(35) NOT NULL,
  `trn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `destination` (
  `dest_id` int(11) NOT NULL,
  `dest_destination` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `destination` (`dest_id`, `dest_destination`) VALUES
(0,''),(1, 'MANGALURU CNTL - MAQ'),(2, 'CHENNAI CENTRAL - MAS'),(3,'MUMBAI CENTRAL - MMCT'),(4,'KANHANGAD - KZE');



CREATE TABLE `origin` (
  `origin_id` int(11) NOT NULL,
  `origin_desc` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `origin` (`origin_id`, `origin_desc`) VALUES
(0,''),(1, 'CHENNAI CENTRAL - MAS'),(2,'MUMBAI CENTRAL - MMCT'),(3,'KANHANGAD - KZE'),(4, 'MANGALURU CNTL - MAQ');



CREATE TABLE `status` (
  `stat_id` int(11) NOT NULL,
  `stat_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `status` (`stat_id`, `stat_desc`) VALUES
(1, 'Paid'),
(2, 'Refunded');



CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `trans_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trans_payment` double NOT NULL,
  `trans_passenger` varchar(100) NOT NULL,
  `trans_age` int(11) NOT NULL,
  `trans_gender` varchar(15) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL,
  `stat_id` int(11) DEFAULT '1',
  `trans_refunded` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `transaction` (`trans_id`, `trans_time`, `trans_payment`, `trans_passenger`, `trans_age`, `trans_gender`, `acc_id`, `origin_id`, `dest_id`, `stat_id`, `trans_refunded`) VALUES
(1, '2017-02-27 16:06:37', 351, 'ram', 23, 'Male', 2, 1, 1, 1, 1),
(2, '2017-03-28 15:08:34', 280, '323423', 25, 'Male', 2, 1, 1, 1, 1);



CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `user` (`user_id`, `user_account`, `user_password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909');

ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`acc_id`);


ALTER TABLE `booked`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `dest_id` (`dest_id`,`acc_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `origin_id` (`origin_id`),
  ADD KEY `trn_id`(`trn_id`);


ALTER TABLE `destination`
  ADD PRIMARY KEY (`dest_id`);


ALTER TABLE `origin`
  ADD PRIMARY KEY (`origin_id`);


ALTER TABLE `status`
  ADD PRIMARY KEY (`stat_id`);


ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `acc_id` (`acc_id`,`origin_id`,`dest_id`,`stat_id`),
  ADD KEY `origin_id` (`origin_id`),
  ADD KEY `dest_id` (`dest_id`),
  ADD KEY `stat_id` (`stat_id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);



ALTER TABLE `train`
  ADD PRIMARY KEY (`trn_id`);

ALTER TABLE `accomodation`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `booked`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `destination`
  MODIFY `dest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `origin`
  MODIFY `origin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `status`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`),
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`),
  ADD CONSTRAINT `booked_ibfk_3` FOREIGN KEY (`origin_id`) REFERENCES `origin` (`origin_id`),
  ADD CONSTRAINT `booked_ibfk_4` FOREIGN KEY (`trn_id`) REFERENCES `train` (`trn_id`);


ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`origin_id`) REFERENCES `origin` (`origin_id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`stat_id`) REFERENCES `status` (`stat_id`);


