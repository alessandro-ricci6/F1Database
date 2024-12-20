<?php

require_once 'bootstrap.php';
switch ($_GET['page']) {
    case 'add':
        $templateParams['title'] = 'F1Data - Add Staff';
        $templateParams['name'] = 'staff/addStaff.php';
        break;

    case 'list':
        $templateParams['title'] = 'F1Data - Staff List';
        $templateParams['name'] = 'staff/staffListPage.php';
        break;

    case 'detail':
        if (isset($_GET['staffId'])) {
            $staffId = $_GET['staffId'];
        }
        $staff = $db->getStaff($staffId)[0];
        $templateParams['staff'] = $staff;
        $templateParams['title'] = 'F1Data - ' . $staff['staffName'] . ' ' . $staff['staffSurname'];
        $templateParams['name'] = 'staff/staffPage.php';
        break;

    default:
        # code...
        break;
}
require 'template/base.php';