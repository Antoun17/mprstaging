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

  $data['message'] = 'hello world';
    $pusher->trigger('my-channel', 'my-event', $data);
  ?>
