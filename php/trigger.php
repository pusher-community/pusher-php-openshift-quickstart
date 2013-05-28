<?php

require_once( '../vendor/autoload.php' );
require_once( 'config.php' );

$pusher = new Pusher( APP_KEY, APP_SECRET, APP_ID );
$pusher->trigger( 'test-channel', 'test-event', array( 'message' => 'Hello World using Pusher on OpenShift!' ) );