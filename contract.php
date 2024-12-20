<?php
require_once 'bootstrap.php';

if (isset($_GET['driverId'])) {
    $driverId = $_GET['driverId'];
    $templateParams['driverId'] = $driverId;
    $templateParams['name'] = 'contract/addDriverContract.php';
} elseif (isset($_GET['staffId'])) {
    $staffId = $_GET['staffId'];
    $templateParams['staffId'] = $staffId;
    $templateParams['name'] = 'contract/addStaffContract.php';
}


$templateParams['title'] = 'F1Data - Add Contract';

require 'template/base.php';