<?php

require_once 'bootstrap.php';
switch ($_GET['page']) {
    case 'add':
        if(isset($_GET['teamId'])){
            $teamId = $_GET['teamId'];
        }
        $templateParams['title'] = 'F1Data - Add Staff';
        $templateParams['name'] = 'staff/addStaff.php';
        $templateParams['idTeam'] = $teamId;
        break;
    
    default:
        # code...
        break;
}
require 'template/base.php';