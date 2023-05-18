<?php
// Controller Temporário

$wh = WorkingHours::loadFromUserAndDate(1, date('Y-m-d'));

$workedInterval = $wh->getWorkedInterval()->format('%H:%I:%S');
print_r($workedInterval);
echo "<br>";

$lunchInterval = $wh->getLunchInterval()->format('%H:%I:%S');
print_r($lunchInterval);
echo "<br>";

print_r($wh->getExitTime());
