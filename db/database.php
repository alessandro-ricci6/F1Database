<?php

class DatabaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function getNumberOfDriver()
    {
        $stmt = $this->db->prepare("SELECT count(idDriver) FROM Driver");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_row()[0];
    }

    public function getNumberOfTeam()
    {
        $stmt = $this->db->prepare("SELECT count(idTeam) FROM Team");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_row()[0];
    }

    public function getNumberOfRaces()
    {
        $stmt = $this->db->prepare("SELECT count(idRace) FROM Race");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_row()[0];
    }

    public function getNumberOfChampionship()
    {
        $stmt = $this->db->prepare("SELECT count(championshipYear) FROM Championship");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_row()[0];
    }

    public function getDriverNationalities()
    {
        $stmt = $this->db->prepare("SELECT driverNationality FROM Driver GROUP BY driverNationality");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllDriver()
    {
        $stmt = $this->db->prepare("SELECT * FROM Driver ORDER BY driverName");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllDriverWins()
    {
        $stmt = $this->db->prepare("SELECT Driver.*, COUNT(idRace) AS winsNumber
        FROM Driver
        INNER JOIN Participation ON Driver.idDriver = Participation.idDriver
        WHERE finishingPosition = 1
        GROUP BY idDriver
        ORDER BY winsNumber DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDriverRaceParticipation()
    {
        $stmt = $this->db->prepare("SELECT Driver.*, COUNT(Participation.startingPosition) AS raceParticipation
        FROM Driver
        INNER JOIN Participation ON Participation.idDriver = Driver.idDriver
        GROUP BY Driver.idDriver
        ORDER BY raceParticipation DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDriverWithMostPole()
    {
        $stmt = $this->db->prepare("SELECT Driver.*, COUNT(Participation.startingPosition) as poleNumber
        FROM Driver
        INNER JOIN Participation ON Participation.idDriver = Driver.idDriver
        WHERE Participation.startingPosition = 1
        GROUP BY Driver.idDriver
        ORDER BY poleNumber DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDriverDiffTeamWin()
    {
        $stmt = $this->db->prepare("SELECT Driver.*, COUNT(DISTINCT Participation.idTeam)
        AS teamCount
        FROM Driver
        INNER JOIN Participation ON Driver.idDriver =
        Participation.idDriver
        WHERE Participation.finishingPosition = 1
        GROUP BY Driver.idDriver
        ORDER BY teamCount DESC ");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDriverWithTotPoints($points)
    {
        $stmt = $this->db->prepare("SELECT Driver.*, SUM(Participation.points) AS pointsSum
        FROM Driver
        INNER JOIN Participation ON
        Driver.idDriver = Participation.idDriver
        GROUP BY Participation.idDriver
        HAVING SUM(points) >= ?
        ORDER BY pointsSum DESC");
        $stmt->bind_param('i', $points);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDriverWithOneWinInSeason()
    {
        $stmt = $this->db->prepare("SELECT Driver.*, COUNT(DISTINCT
        Championship.championshipYear) AS seasonCount
        FROM Driver
        INNER JOIN Participation ON Participation.idDriver =
        Driver.idDriver
        INNER JOIN Race ON Participation.idRace = Race.idRace
        INNER JOIN Championship ON Race.championshipYear =
        Championship.championshipYear
        WHERE Participation.finishingPosition = 1
        GROUP BY Driver.idDriver
        ORDER BY seasonCount DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSingleDriver($idDriver)
    {
        $stmt = $this->db->prepare("SELECT * FROM Driver WHERE Driver.idDriver = ?");
        $stmt->bind_param('i', $idDriver);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDriverResultById($idDriver)
    {
        $stmt = $this->db->prepare("SELECT * FROM Participation
        INNER JOIN Race ON Race.idRace = Participation.idRace
        INNER JOIN TrackVersion ON Race.idTrackVersion = TrackVersion.idTrackVersion
        INNER JOIN Track ON TrackVersion.idTrack = Track.idTrack
        INNER JOIN Championship ON Race.championshipYear = Championship.championshipYear
        INNER JOIN Team ON Participation.idTeam = Team.idTeam
        WHERE idDriver = ? ORDER BY Championship.championshipYear, Race.round");
        $stmt->bind_param('i', $idDriver);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDriverContract($idDriver) {
        $stmt = $this->db->prepare("SELECT DriverContract.*, Team.teamName, Team.idTeam FROM DriverContract
        INNER JOIN Team ON DriverContract.idTeam = Team.idTeam
        WHERE idDriver = ?");
        $stmt->bind_param('i', $idDriver);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSeasonOfDriver($driverId) {
        $stmt = $this->db->prepare("SELECT Championship.* FROM Race
        INNER JOIN Participation ON Race.idRace = Participation.idRace
        INNER JOIN Championship ON Race.championshipYear = Championship.championshipYear
        WHERE Participation.idDriver = ?
        GROUP BY Championship.championshipYear");
        $stmt->bind_param('i', $driverId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNormalRacesWonByDriverId($driverId){
        $stmt = $this->db->prepare("SELECT count(Race.idRace) FROM Participation
        INNER JOIN Race ON Race.idRace = Participation.idRace
        WHERE idDriver = ? AND finishingPosition = 1 AND raceType = 'Normal'");
        $stmt->bind_param('i', $driverId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_row()[0];
    }

    public function getSprintRacesWonByDriverId($driverId){
        $stmt = $this->db->prepare("SELECT count(Race.idRace) FROM Participation
        INNER JOIN Race ON Race.idRace = Participation.idRace
        WHERE idDriver = ? AND finishingPosition = 1 AND raceType = 'Sprint'");
        $stmt->bind_param('i', $driverId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_row()[0];
    }

    public function getAllTeam()
    {
        $stmt = $this->db->prepare("SELECT * FROM Team ORDER BY teamName");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}