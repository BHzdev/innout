<?php
session_start();
requireValidSession();

loadModel('WorkingHours');

$date = new DateTime();
$formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
$today = $formatter->format($date);

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

loadTemplateView('day_records', [
  'today' => $today,
  'records' => $records
]);
