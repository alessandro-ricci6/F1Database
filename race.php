<?php
require_once 'bootstrap.php';

switch ($_GET['page']) {
    case 'list':
        $templateParams['races'] = $db->getRacesAndTrack();
        $templateParams['name'] = 'race/raceListPage.php';
        $templateParams['title'] = 'F1Data - Races List';
        break;

    case 'detail':
        if (isset($_GET['raceId'])) {
            $raceId = $_GET['raceId'];
        }

        $templateParams['title'] = 'F1Data - Race Detail';
        $templateParams['race'] = $db->getRaceInfoById($raceId);
        $templateParams['name'] = 'race/racePage.php';
        break;

    case 'add':
        $templateParams['title'] = 'F1Data - Add Race';
        $templateParams['name'] = 'race/addRace.php';
        $templateParams['season'] = $db->getAllChampionship();
        $templateParams['tracks'] = $db->getAllTracks();
        break;

    case 'addQualification':

        $templateParams['title'] = 'F1Data - Add Qualification';
        $templateParams['name'] = 'race/addQuali.php';
        $templateParams['raceId'] = $_GET['raceId'];
        break;

    case 'addResult':

        $templateParams['title'] = 'F1Data - Add Result';
        $templateParams['name'] = 'race/addResult.php';
        $templateParams['raceId'] = $_GET['raceId'];
        break;

    default:
        # code...
        break;
}

require 'template/base.php';