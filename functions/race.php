<?php
require_once '../bootstrap.php';
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'filter') {
        if ($_POST['filter'] == "No filter") {
            $data = $db->getRacesAndTrack();
            echo json_encode($data);
        } else {
            $data = $db->getRacesOfChampionship($_POST['filter']);
            echo json_encode($data);
        }
    } elseif ($_POST['action'] == 'addRace') {
        $championship = $_POST['season'];
        $round = $_POST['round'];
        $trackId = $_POST['track'];
        $raceType = $_POST['raceType'];
        $laps = $_POST['laps'];
        $raceName = $_POST['raceName'];
        $date = $_POST['date'];
        
        $db->addRace($championship, $round, $trackId, $raceType, $laps, $raceName, $date);
        
    } elseif ($_POST['action'] == 'addParticipation') {
        $list = json_decode($_POST['list'], true);
        $race = $db->getRaceInfoById($_POST['idRace'])[0];
        foreach ($list as $position) {
            $points = getPoints($position['finishingPosition'], $position['fastLap'], $race['raceType']);
            $db->addParticipation($_POST['idRace'], $position['idDriver'], $position['idTeam'],
                $position['finishingPosition'], $position['startingPosition'], $position['bestLapTime'],
                $position['qualifyingTime'], $points, $position['endingStatus']);
        }
    }
}