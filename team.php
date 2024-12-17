<?php
require_once 'bootstrap.php';

switch ($_GET['page']) {
    case 'list':
        $templateParams['name'] = 'team/teamListPage.php';
        $templateParams['title'] = 'F1Data - Team List';
        break;

    case 'detail':
        if(isset($_GET['teamId'])){
            $teamId = $_GET['teamId'];
        }
        
        $team = $db->getTeamById($teamId)[0];
        
        $templateParams['team'] = $team;
        $templateParams['name'] = 'team/teamPage.php';
        $templateParams['title'] = 'F1Data - ' . $team['teamName'];
        break;
    
    case 'add':
        $templateParams['title'] = 'F1Data - Add Team';
        $templateParams['name'] = 'team/addTeam.php';
        break;

    default:
        # code...
        break;
}

require 'template/base.php';