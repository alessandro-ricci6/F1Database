<?php
require_once '../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'filter') {
        if ($_POST['filter'] == "No filter") {
            $data = $db->getAllDriver();
            echo json_encode($data);
        } else {
            $data = $db->getDriverByNationality($_POST['filter']);
            echo json_encode($data);
        }
    } elseif ($_POST['action'] == 'totPoints') {
        if ($_POST['points'] == '') {
            $data = $db->getDriverWithTotPoints(0);
            echo json_encode($data);
        } else {
            $data = $db->getDriverWithTotPoints($_POST['points']);
            echo json_encode($data);
        }
    } elseif ($_POST['action'] == 'add') {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $nationality = $_POST['nationality'];
        $number = $_POST['number'];
        $birth = date_create_from_format('Y-m-d', $_POST['birth']);
        $data = $db->addDriver($name, $surname, $nationality, $number, $birth->format('Y-m-d'));
        echo json_encode($data);
    } elseif ($_POST['action'] == 'result') {
        $driverId = $_POST['driver'];
        $season = $_POST['season'];
        $data = $db->getRaceOfDriverInSeason($driverId, $season);

        echo json_encode($data);
    } elseif ($_POST['action'] == 'search') {
        $query = $_POST['query'];
        $output = "<ul class='driverSearchList w-100 px-1'>";
        $result = $db->searchDriver($query);
        if ($result > 0) {
            foreach ($result as $driver) {
                $output .= '<li class="px-4 py-2"><a href="driver.php?page=detail&driverId=' . $driver['idDriver'] .
                    '">' . $driver['driverName'] . ' ' . $driver['driverSurname'] . '</a></li>';
            }
        } else {
            $output .= '<p>Utente non trovato</p>';
        }
        $output .= '</ul>';
        echo $output;
    }
}