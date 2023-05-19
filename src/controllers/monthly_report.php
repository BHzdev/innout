<?php
session_start();
requireValidSession();

$currentDate = new DateTime();
$user = $_SESSION['user'];
$selectedUserId = $user->id;
$users = null;
if ($user->is_admin) {
  $users = User::get();
  $selectedUserId = isset($_POST['user']) ? $_POST['user'] : $user->id;
}

$selectedPeriod = isset($_POST['period']) ? $_POST['period'] : date("Y-m");
$periods = [];

$meses = array(
  1 => 'Janeiro',
  2 => 'Fevereiro',
  3 => 'Março',
  4 => 'Abril',
  5 => 'Maio',
  6 => 'Junho',
  7 => 'Julho',
  8 => 'Agosto',
  9 => 'Setembro',
  10 => 'Outubro',
  11 => 'Novembro',
  12 => 'Dezembro'
);

for ($yearDiff = 2; $yearDiff >= 0; $yearDiff--) {
  $year = date('Y') - $yearDiff;

  for ($month = 1; $month <= 12; $month++) {
    $date = new DateTime("{$year}-{$month}-1");
    $monthName = $meses[$month];
    $period = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);
    $periods[$period] = $monthName . ' de ' . $year;
  }
}

$registries = WorkingHours::getMonthlyReport($selectedUserId, $selectedPeriod);

$report = [];
$workDay = 0;
$sumOfWorkedTime = 0;
$lastDay = getLastDayOfMonth($selectedPeriod)->format("d");

for ($day = 1; $day <= $lastDay; $day++) {
  $date = DateTime::createFromFormat('Y-m', $selectedPeriod)->format('Y-m') . '-' . sprintf('%02d', $day);
  $registry = isset($registries[$date]) && $registries[$date] ? $registries[$date] : null;

  if (isPastWorkday($date)) $workDay++;

  if ($registry) {
    $sumOfWorkedTime += $registry->worked_time;
    array_push($report, $registry);
  } else {
    array_push($report, new WorkingHours([
      'work_date' => $date,
      'worked_time' => 0
    ]));
  }
}

$expectedTime = $workDay * DAILY_TIME;
$balance = getTimeStringFromSeconds(abs($sumOfWorkedTime - $expectedTime));
$sign = ($sumOfWorkedTime >= $expectedTime) ? '+' : '-';

loadTemplateView('monthly_report', [
  'report' => $report,
  'sumOfWorkedTime' => getTimeStringFromSeconds($sumOfWorkedTime),
  'balance' => "{$sign}{$balance}",
  'periods' => $periods,
  'selectedPeriod' => $selectedPeriod,
  'users' => $users,
  'selectedUserId' => $selectedUserId,
]);
