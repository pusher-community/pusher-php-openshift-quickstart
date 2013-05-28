<?php
require_once( 'config.php' );
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Hello World using Pusher on OpenShift</title>
</head>
<body>
  <h1>
    Hello World using Pusher on OpenShift
  </h1>

  <button id="trigger">Trigger Hello World</button>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="//d3dy5gmtp8yhk7.cloudfront.net/2.0/pusher.min.js"></script>
  <script>
    // Log debug information to the JavaScript console, if possible
    Pusher.log = function( msg ) {
      if( window.console && window.console.log ) {
        window.console.log( msg );
      }
    };

    // Create new Pusher instance and connect
    var pusher = new Pusher( "<?php echo( APP_KEY ); ?>" );

    // Subscribe to the channel that the event will be published on
    var channel = pusher.subscribe( 'test-channel' );

    // Bind to the event on the channel and handle the event when triggered
    channel.bind( 'test-event', function( data ) {
      // For now, alert the message.
      alert( data.message );
    } );

    // Listen for click events on the button element
    $('#trigger').click( function() {
      // Make AJAX call to invoke trigger.php.
      // This will broadcast the Hello World message to anybody with the page open.
      $.get( 'trigger.php' );
    } );
  </script>
</body>
</html>
