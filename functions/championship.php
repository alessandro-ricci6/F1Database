<?php
require_once '../bootstrap.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['action'] == 'add'){
        $season = $_POST['season'];
        $round = $_POST['round'];
        $db->addChampionship($season, $round);
    }
}