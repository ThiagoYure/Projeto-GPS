<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>
  	<?php
      session_start();
      echo "<script>setTimeout(function() { location.href='index.php' }, 500);</script>";
      session_destroy();
  	?>
  </body>
</html>
