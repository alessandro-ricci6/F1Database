<?php
require_once '../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'updateStaffContract') {
        $contractId = $_POST['contractId'];
        $staffId = $_POST['staffId'];
        $sDate = date_create_from_format('Y-m-d', $_POST['sDate']);
        $eDate = date_create_from_format('Y-m-d', $_POST['eDate']);

        $db->updateStaffCOntract($contractId, $staffId, $sDate->format('Y-m-d'), $eDate->format('Y-m-d'));
    }
    elseif($_POST['action'] == 'deleteStaffContract'){
        $contractId = $_POST['contractId'];
        $db->deleteStaffContract($contractId);
    }
    elseif($_POST['action'] == 'updateDriverContract'){
        $contractId = $_POST['contractId'];
        $driverId = $_POST['driverId'];
        $sDate = date_create_from_format('Y-m-d', $_POST['sDate']);
        $eDate = date_create_from_format('Y-m-d', $_POST['eDate']);

        $db->updateDriverCOntract($contractId, $driverId, $sDate->format('Y-m-d'), $eDate->format('Y-m-d'));
    }
    elseif($_POST['action'] == 'deleteDriverContract'){
        $contractId = $_POST['contractId'];
        $db->deleteDriverContract($contractId);
    }
    elseif ($_POST['action'] == 'addDriverContract') {
        $driverId = $_POST['driverId'];
        $teamId = $_POST['teamId'];
        $eDate = date_create_from_format('Y-m-d', $_POST['eDate']);
        $sDate = date_create_from_format('Y-m-d', $_POST['sDate']);
        $db->addDriverContract($driverId, $teamId, $sDate->format('Y-m-d'), $eDate->format('Y-m-d'));
    }
    elseif ($_POST['action'] == 'addStaffContract') {
        $staffId = $_POST['staffId'];
        $teamId = $_POST['teamId'];
        $role = $_POST['role'];
        $eDate = date_create_from_format('Y-m-d', $_POST['eDate']);
        $sDate = date_create_from_format('Y-m-d', $_POST['sDate']);

        $db->addStaffContract($staffId, $teamId, $role, $sDate->format('Y-m-d'), $eDate->format('Y-m-d'));
    }
}