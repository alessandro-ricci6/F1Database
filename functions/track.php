<?php
require_once '../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'filter') {
        if ($_POST['filter'] == 'No filter') {
            $data = $db->getAllTracks();

            echo json_encode($data);
        } else {
            $data = $db->getTrackByCountry($_POST['filter']);

            echo json_encode($data);
        }
    } elseif ($_POST['action'] == 'add') {
        $trackName = $_POST['trackName'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $data = $db->addTrack($trackName, $country, $city);
        echo json_encode($data);
    } elseif ($_POST['action'] == 'update') {
        $track = $_POST['trackId'];
        $newLength = $_POST['length'];

        $db->addTrackVersion($track, $newLength);
    }
}