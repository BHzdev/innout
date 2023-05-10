<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

$user = new User(['name' => 'Bruno', 'email' => 'bruno@super.com.br']);
print_r($user);
echo 'sucesso';
