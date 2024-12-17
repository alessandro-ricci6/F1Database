<?php
require_once 'bootstrap.php';

switch ($_GET['page']) {
    case 'list':
        $templateParams['title'] = 'F1Data - Championship list';
        $templateParams['name'] = 'championship/championshipListPage.php';
        $templateParams['season'] = $db->getAllChampionship();
        break;
    
    case 'detail':
        if(isset($_GET['championshipYear'])){
            $championshipYear = $_GET['championshipYear'];
        }
        $championship = $db->getChampionship($championshipYear)[0];
        $templateParams['title'] = 'F1Data - ' . $championship['championshipYear'];
        $templateParams['name'] = 'championship/championshipPage.php';
        $templateParams['championship'] = $championship;
        $templateParams['driverStanding'] = $db->getDriverChampStanding($championship['championshipYear']);
        $templateParams['teamStanding'] = $db->getTeamChampStanding($championship['championshipYear']);
        break;

    case 'add':
        $templateParams['title'] = 'F1Data - Add Championship';
        $templateParams['name'] = 'championship/addChampionship.php';
        break;

    default:
        # code...
        break;
}
require 'template/base.php';