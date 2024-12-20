<?php

require_once '../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'add') {
        $staffName = $_POST['name'];
        $staffSurname = $_POST['surname'];
        $nationality = $_POST['nationality'];
        $data = $db->addStaff($staffName, $staffSurname, $nationality);
        echo json_encode($data);
    } elseif ($_POST['action'] == 'addContract') {
        $staffId = $_POST['staffId'];
        $teamId = $_POST['teamId'];
        $role = $_POST['role'];
        $eDate = date_create_from_format('Y-m-d', $_POST['eDate']);
        $sDate = date_create_from_format('Y-m-d', $_POST['sDate']);

        $db->addStaffContract($staffId, $teamId, $role, $sDate->format('Y-m-d'), $eDate->format('Y-m-d'));
    }
}