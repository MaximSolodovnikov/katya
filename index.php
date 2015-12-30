<?php

$mysqli = new mysqli('localhost', 'salomuG', 'salomuG')or die('Cannot connect to database');
$mysqli->select_db('katya') or die('Cannot select database');

$act = isset($_GET['act']) ? $_GET['act'] : 'list';

switch ($act) {
    case 'list':
        $records = array();
        $sel = $mysqli->query('SELECT * FROM `entry` ');
        while ($row = $sel->fetch_assoc()) {
            $records[] = $row;
        }
        require 'templates/list.php';
        break;
    case 'view-entry':
        require 'templates/entry.php';
        break;
}