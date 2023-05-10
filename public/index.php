<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
// require_once(VIEW_PATH . '/login.php');

// Teste checkLogin
require_once(MODEL_PATH . '/Login.php');

$login = new Login([
  'email' => 'admin@cod3r.com.br',
  'password' => 'a'
]);

try {
  $login->checkLogin();
  echo "Usuario logado com sucesso :0";
} catch (Exception $e) {
  echo "Problema no login :P";
};
