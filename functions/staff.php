<?php

require_once '../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'add') {
        $staffName = $_POST['name'];
        $staffSurname = $_POST['surname'];
        $nationality = $_POST['nationality'];
        $data = $db->addStaff($staffName, $staffSurname, $nationality);
        echo json_encode($data);
    }
}