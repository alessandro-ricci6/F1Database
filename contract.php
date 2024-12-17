<?php
require_once 'bootstrap.php';

if(isset($_GET['driverId'])) {
    $driverId = $_GET['driverId'];
}

$templateParams['driverId'] = $driverId;
$templateParams['name'] = 'contract/addContract.php';
$templateParams['title'] = 'F1Data - Add Contract';

require 'template/base.php';