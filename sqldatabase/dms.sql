/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.7.23-log : Database - dms_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dms_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dms_db`;

/*Table structure for table `addtofolder_table` */

DROP TABLE IF EXISTS `addtofolder_table`;

CREATE TABLE `addtofolder_table` (
  `ContentID` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `folderID` int(11) NOT NULL,
  `mdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `addtofolder_table` */

insert  into `addtofolder_table`(`ContentID`,`fid`,`user_id`,`folderID`,`mdate`) values (1,78,6,5,'2018-04-13'),(1,85,5,4,'2018-12-06');

/*Table structure for table `command_table` */

DROP TABLE IF EXISTS `command_table`;

CREATE TABLE `command_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `cmd_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `command_table` */

insert  into `command_table`(`user_id`,`user_name`,`cmd_name`) values (7,'john','DELETE'),(18,'rollex','DOWNLOAD'),(18,'rollex','DELETE'),(18,'rollex','FOLDER'),(5,'admin','DOWNLOAD'),(5,'admin','DELETE'),(5,'admin','FOLDER'),(6,'james','DOWNLOAD'),(6,'james','DELETE'),(6,'james','FOLDER');

/*Table structure for table `file_table` */

DROP TABLE IF EXISTS `file_table`;

CREATE TABLE `file_table` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

/*Data for the table `file_table` */

insert  into `file_table`(`fid`,`user_id`,`fileName`,`path`,`date`) values (47,5,'CCTV&MMC.xlsx','../upload/demo/11-15-2017/','2017-11-15'),(48,5,'backtowork.docx','../upload/demo/11-15-2017/','2017-11-15'),(49,5,'changedayoffRequest.docx','../upload/demo/11-15-2017/','2017-11-15'),(50,5,'dominique.PDF','../upload/demo/11-15-2017/','2017-11-15'),(51,5,'ArjayReceipt.jpg','../upload/demo/11-15-2017/','2017-11-15'),(52,5,'authorizationLetter.docx','../upload/demo/11-15-2017/','2017-11-16'),(53,5,'Jayson.PDF','../upload/demo/11-15-2017/','2017-11-16'),(54,5,'passkey.txt','../upload/demo/11-15-2017/','2017-11-16'),(63,7,'pdf1.pdf','../upload/john/11-20-2017/','2017-11-21'),(69,6,'AccessForm.xlsx','../upload/james/01-08-2018/','2018-01-08'),(71,9,'22-25-15-SCRN-one-page-wordpress-theme.jpg','../upload/alexis28/03-05-2018/','2018-03-05'),(72,9,'22-17-37-divi-one-page.jpg','../upload/alexis28/03-05-2018/','2018-03-05'),(75,5,'MidtermBill.jpg','../upload/demo/04-12-2018/','2018-04-12'),(77,5,'pdf1.pdf','../upload/demo/04-12-2018/','2018-04-13'),(78,6,'Visitors_Web_App.PNG','../upload/james/04-13-2018/','2018-04-13'),(80,7,'globe.png','../upload/john/04-13-2018/','2018-04-13'),(83,18,'globe.png','../upload/rollex/04-13-2018/','2018-04-13'),(84,18,'luzern.jpg','../upload/rollex/04-13-2018/','2018-04-13'),(85,5,'PERFUME LABEL FOR DRAWER.pptx','../upload/admin/10-28-2018/','2018-10-27'),(87,5,'jhonpaultabucao.jpg','../upload/admin/11-26-2018/','2018-11-26'),(88,6,'To whom it may concern.docx','../upload/james/12-06-2018/','2018-12-06'),(89,5,'final_logo.png','../upload/admin/12-06-2018/','2018-12-07'),(90,5,'To whom it may concern.docx','../upload/admin/12-07-2018/','2018-12-07'),(91,5,'backblue.gif','../upload/admin/12-07-2018/','2018-12-07'),(92,5,'fade.gif','../upload/admin/12-07-2018/','2018-12-07'),(93,5,'PERFUME LABEL FOR DRAWER.pptx','../upload/admin/12-07-2018/','2018-12-07'),(94,5,'Doc1.docx','../upload/admin/12-07-2018/','2018-12-07'),(95,5,'Presentation1.pptx','../upload/admin/12-07-2018/','2018-12-07');

/*Table structure for table `folder_table` */

DROP TABLE IF EXISTS `folder_table`;

CREATE TABLE `folder_table` (
  `folderID` int(11) NOT NULL AUTO_INCREMENT,
  `folderName` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`folderID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `folder_table` */

insert  into `folder_table`(`folderID`,`folderName`,`user_id`) values (4,'Permit',5),(5,'personal',6),(6,'personals',5),(7,'my_personals',6),(9,'new',5);

/*Table structure for table `share_table` */

DROP TABLE IF EXISTS `share_table`;

CREATE TABLE `share_table` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `date` date NOT NULL,
  `shareBy` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `share_table` */

insert  into `share_table`(`sid`,`user_id`,`fid`,`date`,`shareBy`) values (9,6,63,'2017-11-21',7),(10,7,64,'2017-11-21',6),(11,7,65,'2017-11-21',6),(12,5,39,'2018-01-09',5),(13,0,0,'2018-01-09',5),(14,6,47,'2018-04-18',5),(15,7,47,'2018-04-18',5),(16,9,47,'2018-04-18',5),(17,6,50,'2018-12-06',5),(18,5,88,'2018-12-06',6),(19,9,89,'2018-12-07',5),(20,20,89,'2018-12-07',5),(21,20,95,'2018-12-07',5);

/*Table structure for table `urole_table` */

DROP TABLE IF EXISTS `urole_table`;

CREATE TABLE `urole_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `urole_table` */

insert  into `urole_table`(`user_id`,`user_name`,`user_level`) values (5,'admin1','Admin'),(7,'john','Admin'),(8,'Jayson','User'),(9,'alexis28','User'),(6,'james','User'),(16,'ramon','User'),(17,'mark','User'),(18,'rollex','Admin'),(19,'diego','User'),(20,'financedept','User');

/*Table structure for table `user_table` */

DROP TABLE IF EXISTS `user_table`;

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `user_table` */

insert  into `user_table`(`user_id`,`FirstName`,`LastName`,`user_email`,`user_name`,`user_password`) values (5,'Administrator','Administrator','administrator@yahoo.com','admin1','e00cf25ad42683b3df678c61f42c6bda'),(6,'James','Reid','james@yahoo.com','james','b4cc344d25a2efe540adbf2678e2304c'),(7,'John','Smith','john@yahoo.com','john','527bd5b5d689e2c32ae974c6229ff785'),(8,'Jayson','Dela paz','jaysondelapaz16@gmail.com','Jayson','c4746329b57f0e581f3ed48110c9ec52'),(9,'alexis','razon','alexisrazon11@gmail.com','alexis28','1bfcd1548ba075ee7eb68e0cb14087ba'),(16,'Ramon','Magsaysay','ramon@gmail.com','ramon','266575d3c2b8a34f83817458f96152b1'),(17,'Mark','Balalitan','mark@gmail.com','mark','ea82410c7a9991816b5eeeebe195e20a'),(18,'Rollex','Baldoza','rollex@yahoo.com','rollex','27379a3988da1d27679781c3a252f30d'),(19,'Diego','Salvador','diego@gmail.com','diego','078c007bd92ddec308ae2f5115c1775d'),(20,'alex','razz','alexisraz123@gmail.com','financedept','827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
