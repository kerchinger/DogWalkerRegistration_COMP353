
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
  `e-mail` varchar(30) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `address` varchar(72) NOT NULL,
  primary key (`bussiness_ID`)
);

create table dog_walker(
  `dogwalker_ID` int(9) NOT NULL,
  `bussiness_ID` int(9) NOT NULL,
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
  `name` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `e-mail` varchar(30) NOT NULL,
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
  `date` varchar(10) NOT NULL default CURRENT_TIMESTAMP, /*Note: this is not date of the dog walking but data invoice was created*/
  primary key (`invoice_ID`),
  foreign key (`client_ID`) references client (`client_ID`),
  foreign key (`reservation_ID`) references reservation (`reservation_ID`)
);

create table dogwalker_admin(
  `admin_ID` int(9) NOT NULL,
  `dogwalker_ID` int(9) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
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
