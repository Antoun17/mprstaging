<?php
  require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'mt1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '625925458b678e882996',
    '7542783946b168ea8f60',
    '613118',
    $options
  );
// Check the receive message
if(isset($_POST['message']) && !empty($_POST['message'])) {
  $data = $_POST['message'];
// Return the received message
if($pusher->trigger('my-channel', 'my-event', $data)) {
echo 'success';
} else {
echo 'error';
}
}
