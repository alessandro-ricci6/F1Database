<?php
require_once '../bootstrap.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['action'] == 'filter') {
        if($_POST['filter'] == 'No filter'){
            $data = $db->getAllTracks();

            echo json_encode($data);
        } else {
            $data = $db->getTrackByCountry($_POST['filter']);

            echo json_encode($data);
        }
    }
    elseif($_POST['action'] == 'add') {
        $trackName = $_POST['trackName'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $length = $_POST['length'];
        $db->addTrack($trackName, $country, $city, $length);
    }
    elseif($_POST['action'] == 'update') {
        $track = $_POST['trackId'];
        $name = $_POST['name'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $length = $_POST['length'];

        $db->updateTrack($track, $name, $country, $city, $length);
    }
}