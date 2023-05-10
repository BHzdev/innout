<?php

loadModel('Login');
$exception = null;

if (count($_POST)) {
  $login = new Login($_POST);
  try {
    $user = $login->checkLogin();
    echo "Usuario {$user->name} logado";
  } catch (AppException $e) {
    $exception = $e;
  }
}
loadView("login", $_POST + ['exception' => $exception]);
