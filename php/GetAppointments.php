<?php
include './DAO.php';

$day = intval($_GET['day']);
$month = intval($_GET['month']);
$year = intval($_GET['year']);

$dao = new DAO();

$array = $dao->getAppointments($day, $month, $year);   

$JSONarray = json_encode($array);
echo $JSONarray;