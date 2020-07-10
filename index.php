<?php  session_start();
require_once 'functions.php'; $dir='contents'; ?>  

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="assets/style.css">
      <link rel="stylesheet" type="text/css" href="assets/package/dist/sweetalert2.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <title>Polling css framework</title>
    </head>
    <body>

    <div id="polling">
      <?php html($dir, 'polling', '.php', 'Polling Framework css'); ?>
    </div>
    
      <!--Import jQuery before materialize.js-->
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

      <!-- sweet alert 2 -->
      <script src="assets/package/dist/sweetalert2.min.js"></script>

      <script type="text/javascript" src="assets/MyJs.js"></script>

    </body>
  </html>