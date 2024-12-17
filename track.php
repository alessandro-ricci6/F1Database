<?php
require_once 'bootstrap.php';

switch ($_GET['page']) {
    case 'detail':
        if(isset($_GET['trackId'])) {
            $trackId = $_GET['trackId'];
        }
        
        $track = $db->getTrackById($trackId)[0];
        
        $templateParams['track'] = $track;
        $templateParams['name'] = 'track/trackPage.php';
        $templateParams['title'] = 'F1Data - ' . $track['trackName'];
        break;
    
    case 'list':
        $templateParams['tracks'] = $db->getTracks();
        $templateParams['title'] = 'F1Data - Track List';
        $templateParams['name'] = 'track/trackList.php';
        break;

    case 'add':
        $templateParams['title'] = 'F1Data - Add Track';
        $templateParams['name'] = 'track/addTrack.php';
        break;

    default:
        # code...
        break;
}

require 'template/base.php';