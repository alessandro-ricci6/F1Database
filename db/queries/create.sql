CREATE TABLE Driver (
    idDriver INT NOT NULL AUTO_INCREMENT,
    driverName VARCHAR(255) NOT NULL,
    driverSurname VARCHAR(255) NOT NULL,
    raceNumber INT,
    driverBirth DATE,
    driverNationality VARCHAR(255),
    PRIMARY KEY (idDriver)
);

CREATE TABLE Team (
    idTeam INT NOT NULL AUTO_INCREMENT,
    teamName VARCHAR(255) NOT NULL,
    teamNationality VARCHAR(255),
    PRIMARY KEY (idTeam)
);

CREATE TABLE DriverContract (
    idDriverContract INT NOT NULL AUTO_INCREMENT,
    idDriver INT NOT NULL,
    idTeam INT NOT NULL,
    startDate DATE,
    endDate DATE,
    PRIMARY KEY (idDriverContract),
    FOREIGN KEY (idDriver) REFERENCES Driver(idDriver),
    FOREIGN KEY (idTeam) REFERENCES Team(idTeam)
);

CREATE TABLE Staff (
    idStaff INT NOT NULL AUTO_INCREMENT,
    staffName VARCHAR(255) NOT NULL,
    staffSurname VARCHAR(255) NOT NULL,
    staffNationality VARCHAR(255),
    PRIMARY KEY (idStaff)
);

CREATE TABLE StaffContract (
    idStaffContract INT NOT NULL AUTO_INCREMENT,
    idTeam INT NOT NULL,
    idStaff INT NOT NULL,
    staffRole VARCHAR(255),
    startDate DATE,
    endDate DATE,
    PRIMARY KEY (idStaffContract),
    FOREIGN KEY (idTeam) REFERENCES Team(idTeam),
    FOREIGN KEY (idStaff) REFERENCES Staff(idStaff)
);

CREATE TABLE Championship (
    championshipYear INT NOT NULL,
    roundNumber INT NOT NULL,
    PRIMARY KEY (championshipYear)
);

CREATE TABLE Track (
    idTrack INT NOT NULL AUTO_INCREMENT,
    trackName VARCHAR(255),
    country VARCHAR(255),
    city VARCHAR(255),
    PRIMARY KEY (idTrack)
);

CREATE TABLE TrackVersion (
    idTrackVersion INT NOT NULL AUTO_INCREMENT,
    idTrack INT NOT NULL,
    trackLength INT UNSIGNED NOT NULL,
    PRIMARY KEY (idTrackVersion),
    FOREIGN KEY (idTrack) REFERENCES Track(idTrack)
);

CREATE TABLE Race (
    idRace INT NOT NULL AUTO_INCREMENT,
    idTrackVersion INT NOT NULL,
    championshipYear INT NOT NULL,
    round INT NOT NULL,
    laps INT NOT NULL,
    raceType ENUM('Sprint', 'Normal') NOT NULL,
    raceDate DATE NOT NULL,
    raceName VARCHAR(255),
    PRIMARY KEY (idRace),
    FOREIGN KEY (idTrackVersion) REFERENCES TrackVersion(idTrackVersion),
    FOREIGN KEY (championshipYear) REFERENCES Championship(championshipYear)
);

CREATE TABLE Participation (
    idDriver INT NOT NULL,
    idTeam INT NOT NULL,
    idRace INT NOT NULL,
    startingPosition VARCHAR(10) NOT NULL,
    qualifyingTime VARCHAR(20) NOT NULL,
    finishingPosition INT NOT NULL,
    endingStatus VARCHAR(50),
    points FLOAT NOT NULL,
    bestLapTime VARCHAR(20) NOT NULL,
    PRIMARY KEY (idDriver, idTeam, idRace),
    FOREIGN KEY (idDriver) REFERENCES Driver(idDriver),
    FOREIGN key (idTeam) REFERENCES Team(idTeam),
    FOREIGN key (idRace) REFERENCES Race(idRace)
);

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