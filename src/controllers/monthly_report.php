<?php
session_start();
requireValidSession();

$user = $_SESSION['user'];

$currentDate = new DateTime();

$registries = WorkingHours::getMonthlyReport($user->id, $currentDate);

$report = [];
$workDay = 0;
$sumOfWorkedTime = 0;
$lastDay = getLastDayOfMonth($currentDate)->format("d");

for ($day = 1; $day <= $lastDay; $day++) {
  $date = $currentDate->format('Y-m') . '-' . sprintf('%02d', $day);
  $registry = isset($registries[$date]) && $registries[$date] ? $registries[$date] : null;

  print_r($registry);
  echo '<br>';
}


// loadTemplateView('monthly_report', [
//   'registries' => $registries
// ]);
