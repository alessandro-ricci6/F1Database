-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Thu Jan 23 10:53:54 2025 
-- * LUN file: C:\users\ale\Desktop\DatabaseF1\F1Database.lun 
-- * Schema: off/1-1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database F1Database;
use F1Database;


-- Tables Section
-- _____________ 

create table Championship (
     championshipYear int not null,
     roundNumber int not null,
     primary key (championshipYear));

create table Driver (
     idDriver int not null auto_increment,
     driverName varchar(25) not null,
     driverSurname varchar(25) not null,
     driverNationality varchar(25) not null,
     driverBirth date not null,
     raceNumber int,
     primary key (idDriver));

create table DriverContract (
     idDriver int not null,
     idTeam int not null,
     idDriverContract int not null auto_increment,
     startDate date not null,
     endDate date,
     primary key (idDriverContract),
     unique (idTeam, idDriver, idDriverContract));

create table Participation (
     championshipYear int not null,
     idRace int not null,
     idDriver int not null,
     idTeam int not null,
     startingPosition int not null,
     qualifyingTime varchar(20) not null,
     finishingPosition int not null,
     points float not null,
     bestLapTime varchar(20) not null,
     endingStatus varchar(20) not null,
     primary key (championshipYear, idRace, idDriver));

create table Race (
     championshipYear int not null,
     idRace int not null auto_increment,
     idTrack int not null,
     idTrackVersion int not null,
     round int not null,
     laps int not null,
     raceType enum('Sprint', 'Normal') not null,
     raceDate date not null,
     raceName varchar(50) not null,
     primary key (idRace),
     unique (championshipYear, idRace),
     unique (idTrack, idTrackVersion, idRace));

create table Staff (
     idStaff int not null auto_increment,
     staffName varchar(25) not null,
     staffSurname varchar(25) not null,
     staffNationality varchar(25) not null,
     primary key (idStaff));

create table StaffContract (
     idStaff int not null,
     idTeam int not null,
     idStaffContract int not null auto_increment,
     startDate date not null,
     endDate date,
     staffRole varchar(25) not null,
     primary key (idStaffContract),
     unique (idTeam, idStaff, idStaffContract));

create table Team (
     idTeam int not null auto_increment,
     teamName varchar(25) not null,
     teamNationality varchar(25) not null,
     primary key (idTeam));

create table Track (
     idTrack int not null auto_increment,
     trackName varchar(50) not null,
     country varchar(50) not null,
     city varchar(50) not null,
     primary key (idTrack));

create table TrackVersion (
     idTrack int not null,
     idTrackVersion int not null auto_increment,
     trackLength int not null,
     primary key (idTrackVersion),
     unique(idTrack, idTrackVersion));
     
CREATE VIEW DriverStandingChampionship AS
	SELECT p.idDriver,
		   CONCAT(d.driverName, ' ', d.driverSurname) AS driverName,
	       r.championshipYear AS championshipYear,
	       SUM(p.points) AS totalPoints
	FROM Participation p
	JOIN Driver d ON p.idDriver = d.idDriver
	JOIN Race r ON p.idRace = r.idRace
	GROUP BY p.idDriver, r.championshipYear;

CREATE VIEW TeamStandingChampionship AS
	SELECT p.idTeam,
		   t.teamName,
	       r.championshipYear AS championshipYear,
	       SUM(p.points) AS totalPoints
	FROM Participation p
	JOIN Team t ON p.idTeam = t.idTeam
	JOIN Race r ON p.idRace = r.idRace
	GROUP BY p.idTeam, r.championshipYear;


-- Constraints Section
-- ___________________ 

alter table DriverContract add constraint FKofferContract
     foreign key (idTeam)
     references Team (idTeam);

alter table DriverContract add constraint FKhasContract_FK
     foreign key (idDriver)
     references Driver (idDriver);

alter table Participation add constraint FKrepresentsTeam
     foreign key (idTeam)
     references Team (idTeam);

alter table Participation add constraint FKparticipatesIn_FK
     foreign key (idDriver)
     references Driver (idDriver);

alter table Participation add constraint FKhasParticipation_FK
     foreign key (championshipYear, idRace)
     references Race (championshipYear, idRace);

alter table Race add constraint FKincludeRace
     foreign key (championshipYear)
     references Championship (championshipYear);

alter table Race add constraint FKraceIn
     foreign key (idTrack, idTrackVersion)
     references TrackVersion (idTrack, idTrackVersion);

alter table StaffContract add constraint FKofferContract_
     foreign key (idTeam)
     references Team (idTeam);

alter table StaffContract add constraint FKhasContract__FK
     foreign key (idStaff)
     references Staff (idStaff);

alter table TrackVersion add constraint FKhasVersion
     foreign key (idTrack)
     references Track (idTrack);


-- Index Section
-- _____________ 

create unique index ID_Championship_IND
     on Championship (championshipYear);

create unique index ID_Driver_IND
     on Driver (idDriver);

create unique index ID_DriverContract_IND
     on DriverContract (idTeam, idDriver, idDriverContract);

create index FKhasContract_IND
     on DriverContract (idDriver);

create unique index ID_Participation_IND
     on Participation (championshipYear, idRace, idDriver);

create index FKparticipatesIn_IND
     on Participation (idDriver);

create index FKhasParticipation_IND
     on Participation (championshipYear, idRace);

create unique index ID_Race_IND
     on Race (championshipYear, idRace);

create unique index SID_Race_IND
     on Race (idTrack, idTrackVersion, idRace);

create unique index ID_Staff_IND
     on Staff (idStaff);

create unique index ID_StaffContract_IND
     on StaffContract (idTeam, idStaff, idStaffContract);

create index FKhasContract__IND
     on StaffContract (idStaff);

create unique index ID_Team_IND
     on Team (idTeam);

create unique index ID_Track_IND
     on Track (idTrack);

create unique index ID_TrackVersion_IND
     on TrackVersion (idTrack, idTrackVersion);

