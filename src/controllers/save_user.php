<?php
session_start();
requireValidSession(true);

$user = $_SESSION['user'];
$exception = null;
$userData = null;

if (count($_POST) === 0 && isset($_GET['update'])) {
  $user = User::getOne(['id' =>  $_GET['update']]);
  $userData = $user->getValues();
  $userData['password'] = null;
} elseif (count($_POST) > 0) {
  try {
    $dbUser = new User($_POST);
    if ($dbUser->id) {
      $dbUser->update();
      addSuccessMsg('Usuário alterado com sucesso!');
      header('Location: users.php');
      exit();
    } else {
      $dbUser->insert();
      addSuccessMsg('Usuário cadastrado com sucesso!');
    }
    $_POST = [];
  } catch (Exception $e) {
    $exception = $e;
  } finally {
    $userData = $_POST;
  }
}

loadTemplateView('save_user', [
  'exception' => $exception,
  $userData,
]);
