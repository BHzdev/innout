<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

// Teste metodo getResultFromQuery
$sql = "SELECT * FROM users";
$result = Database::getResultFromQuery($sql);

while ($row = $result->fetch_assoc()) {
  print_r($row);
  echo '<br>';
}
