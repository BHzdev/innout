<?php
session_start();
requireValidSession();

loadModel('WorkingHours');

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

$formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::NONE, IntlDateFormatter::SHORT, 'America/Sao_Paulo');
$formatter->setPattern('HH:mm:ss');
$currentTime = time();
$formattedTime = $formatter->format($currentTime);
$records->innout($formattedTime);

header('Location: day_records.php');
