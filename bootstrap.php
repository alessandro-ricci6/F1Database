<?php
session_start();
ini_set("display_errors", 1);
require "db/database.php";
require "utils/function.php";
$db = new DatabaseHelper("localhost", "root", "", "F1Database", 3306);