
/*
Dog walking Database, with table and populating some values
*/

drop table if exists dogwalker_schedule;
drop table if exists dogwalker_admin;
drop table if exists invoice;
drop table if exists reservation;
drop table if exists dog;
drop table if exists client;
drop table if exists dog_walker;
drop table if exists dogwalking_bussiness;

create table dogwalking_bussiness(
  `bussiness_ID` int(9) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(72) NOT NULL,
  primary key (`bussiness_ID`)
);

create table dog_walker(
  `dogwalker_ID` int(9) NOT NULL,
  `bussiness_ID` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hourly_rate` decimal(10,2) NOT NULL,
  `years_worked` int(9) NOT NULL,
  `starRating` int(5) NOT NULL,
  `miles_traveled` int(9) NOT NULL,
  `zip_code` int(5) NOT NULL, /*assuming 5-dgiti zip codes*/
  primary key (`dogwalker_ID`),
  foreign key (`bussiness_ID`) references dogwalking_bussiness (`bussiness_ID`)
);

create table client(
  `client_ID` int(9) NOT NULL,
  `username` varchar(30) NOT NULL UNIQUE,
  `password` varchar(300) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `phone_number` int(10) NOT NULL,
  primary key(`client_ID`)
);

create table dog (
  `dog_ID` int(9) NOT NULL,
  `client_ID` int(9) NOT NULL,
  `dog_Name` varchar(30) NOT NULL,
  `friendly/not_friendly` char, /*the value wil be 0 for friendly, and 1 for not-friendly*/
  `breed` varchar(30),
  `hair_color` varchar(30),
  `notes` varchar(128),
  primary key (`dog_ID`),
  foreign key (`client_ID`) references client (`client_ID`)
);

create table reservation(
  `reservation_ID` int(9) NOT NULL,
  `dogwalker_ID` int(9) NOT NULL,
  `client_ID` int(9) NOT NULL,
  `walking_date` varchar(10) NOT NULL,
  `walking_timeslot` varchar(10) NOT NULL,
  primary key (`reservation_ID`),
  foreign key (`dogwalker_ID`) references dog_walker (`dogwalker_ID`),
  foreign key (`client_ID`) references client (`client_ID`)
);

create table invoice(
  `invoice_ID` int(9) NOT NULL,
  `client_ID` int(9) NOT NULL,
  `reservation_ID` int(9) NOT NULL,
  `status` char NOT NULL, /* 0 or 1: 1 for paid, 0 for not paid*/
  `amount` int(9) NOT NULL,
  `date` varchar(10) NOT NULL, /*default CURRENT_TIMESTAMP, Note: this is not date of the dog walking but data invoice was created*/
  primary key (`invoice_ID`),
  foreign key (`client_ID`) references client (`client_ID`),
  foreign key (`reservation_ID`) references reservation (`reservation_ID`)
);

create table dogwalker_admin(
  `admin_ID` int(9) NOT NULL,
  `dogwalker_ID` int(9) NOT NULL,
  `zip code` int(5) NOT NULL,
  `username` varchar(30) NOT NULL UNIQUE,
  `password` varchar(300) NOT NULL,
  primary key (`admin_ID`),
  foreign key (`dogwalker_ID`) references dog_walker (`dogwalker_ID`)
);

create table dogwalker_schedule(
    `scheduled_slot` varchar(30) NOT NULL,
    `date/time` varchar(30) NOT NULL,
    `dogwalker_ID` int(9) NOT NULL,
    `taken/free` char NOT NULL, /* 0 or 1, 0 taken, 1 free */
    primary key (`scheduled_slot`, `date/time`),
    foreign key (`dogwalker_ID`) references dog_walker (`dogwalker_ID`)
);

/*Populating the table:  */
insert into dogwalking_bussiness value (111111111, "dogwalk@gmail.com", "1-800-364-9255", "1000 DogWalking ln, Chicago, IL 60660");

insert into dog_walker value (000000001, 111111111, "Serina", 15, 2, 4, 100, 60660);

insert into dogwalker_admin value (123456789, 000000001, 60660, "kyle", "$2y$10$xb.jMglTA3L8JcbDooiL9eVdVviWP4mzpTCji2rUwhBNstp1lBhFC");

insert into client value (1000000000, "bob123", "$2y$10$xb.jMglTA3L8JcbDooiL9eVdVviWP4mzpTCji2rUwhBNstp1lBhFC", "Bob Smith", "6300 N Winthrop, CHicago, IL 60660", "bobsmith@gmail.com", "1-224-800-90000");

insert into reservation value (2000000001, 000000001, 1000000000, "5/31/18", "9:00AM");

insert into dog value (999000001, 1000000000, "Cheeto", "Y", "Poodle", "brown", "super cute adorable dog!");
