<?php
require_once 'connection.php';

$query = mysqli_query($conn, "SELECT * FROM polling");

if(isset($_POST['submit'])):
  $id = $_POST['id'];
  mysqli_query($conn, "UPDATE polling SET value=value+1 WHERE id = $id");
  header("Location:index.php");
endif;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

<div class="container">
  <div class="row">
    <div class="col">
  <h2 class="text-center">Polling Framework CSS Terbaik</h2>
  <hr>

  <div class="row">
    <div class="col-6">
      <p class="lead">Which one is Best CSS Framework</p>
      <hr>

      <form action="" method="post">
        <div>
          
          <?php  foreach($query as $row):?>
          <div class="form-group">
            <input name="id" type="radio" aria-valuenow="" class="pollradio" value="<?=$row['id']?>"><?=$row['framework']?>
          </div>
        <?php endforeach; ?>
          
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary" id="btn">Polling</button>
          </div>
        </div>
      </form>
    </div>

<!-- hasil polling -->
    <div class="col-6">
      <p class="lead">Persentase Polling CSS Framework Terbaik</p>
      <hr>

      <div class="row">
        <div class="col-2">
        <?php foreach($query as $row):?>
          <div class="mb-3">
            <?=$row['framework'];?>
          </div>
        <?php endforeach;?>
        </div>

        <div class="col-10">
        <?php foreach($query as $row): ?>
       <div class="progress mt-1 mb-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated 
                <?php if($row['value'] < 25):?> bg-info <?php elseif($row['value'] > 25):?> bg-warning <?php elseif($row['value'] > 50):?> bg-danger <?php endif;?>" role="progressbar" style="width: <?=$row['value']?>%;" aria-valuenow="<?=$row['value']?>%" aria-valuemin="0" aria-valuemax="100"><?=$row['value']?> %</div>
        </div>
         <?php endforeach; ?>
      </div>

    </div>
  </div>

    </div>

  </div>

</div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>