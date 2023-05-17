<?php
$errors = [];
$message = [];

if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
} elseif (isset($exception)) {
  $message = [
    'type' => 'error',
    'message' => $exception->getMessage()
  ];
}

if ($message) {
  $alertType = '';

  if ($message['type'] === 'error') {
    $alertType = 'danger';
  } else {
    $alertType = 'success';
  }
?>
  <div class="my-3 alert alert-<?= $alertType ?>" role="alert">
    <?php echo $message['message']; ?>
  </div>
<?php
}
?>