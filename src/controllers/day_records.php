<?php
session_start();
requireValidSession();

$date = new DateTime();
$formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
$today = $formatter->format($date);

loadTemplateView('day_records', ['today' => $today,]);
