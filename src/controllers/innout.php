<?php
session_start();
requireValidSession();

loadModel('WorkingHours');

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
  $formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::NONE, IntlDateFormatter::SHORT, 'America/Sao_Paulo');
  $formatter->setPattern('HH:mm:ss');
  $currentTime = time();
  $formattedTime = $formatter->format($currentTime);

  if ($_POST['forcedTime']) {
    $formattedTime = $_POST['forcedTime'];
  }
  $records->innout($formattedTime);

  addSuccessMsg("Ponto inserido com sucesso");
} catch (AppException $e) {
  addErrorMsg($e->getMessage());
}

header('Location: day_records.php');
