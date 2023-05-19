<?php
session_start();
requireValidSession();

$users = User::get();
// foreach ($users as $user) {
// }

loadTemplateView('users', ['users' => $users]);
