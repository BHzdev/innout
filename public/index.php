<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

// $user = new User(['name' => 'Bruno', 'email' => 'bruno@super.com.br']);
// echo $user->getSelect();

print_r(User::get(['id' => 1], 'name, email'));
echo '<br>';
foreach (User::get([], 'name') as $user) {
  echo $user->name;
  echo '<br>';
}
