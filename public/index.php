<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

// $user = new User(['name' => 'Bruno', 'email' => 'bruno@super.com.br']);
// echo $user->getSelect();

echo User::getSelect(['id' => 1], 'name, email');
echo '<br>';
echo User::getSelect(['name' => 'Chaves', 'email' => 'chaves@super.com.br']);
