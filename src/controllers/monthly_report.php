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

  if (isPastWorkday($date)) $workDay++;

  if ($registry) {
    $sumOfWorkedTime = $registry->worked_time;
    array_push($report, $registry);
  } else {
    array_push($report, new WorkingHours([
      'work_date' => $date,
      'worked_time' => 0
    ]));
  }
}

$expectedTime = $workDay * DAILY_TIME;
$balance = $sumOfWorkedTime - $expectedTime;

echo $balance;
die();
// loadTemplateView('monthly_report', [
//   'report' => $report,
//   'sumOfWorkedTime' => $sumOfWorkedTime,
//   'balance' => $balance
// ]);
