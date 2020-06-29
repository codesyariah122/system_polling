<?php require_once 'functions.php';?>

  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

		<link rel="stylesheet" type="text/css" href="assets/style.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    	
    	<title>Polling css Framework</title>

    </head>
    <?php html('', 'header', '.php', 'Polling Framework css'); ?>

    <?php html('', 'polling', '.php', 'Polling Framework css');?>



    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 	 	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> 
 	 	<script type="text/javascript" src="assets/MyJs.js"></script>
</body>
  </html>