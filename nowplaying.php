  <?php
    include('header.php');
    require_once 'classes/Movie.php';
    $mov = new Movie();
    $row = $mov->getMovieData();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/landing-page.css">

  <title>Now playing</title>
</head>
<body>
<h2 class="w-100 text-center my-5">Now Playing</h2>
<table class="table">
<?php
                    foreach($row as $result) {
                      $id = $result['movie_id'];
                      echo "<tr class='bg-dark text-white'>";
                      // echo "<td>" . $result['movie_id'] . "</td>";
                      echo "<td> <img src='img/" . $result['movie_picture']. "' class='' style='width: 50%'> </td>";
                            echo "<td>" . $result['movie_name'] . "</td>";
                            echo "<td>" . $result['movie_summary'] . "</td>";
                            echo "<td>" . $result['movie_price'] . "</td>";
                            // echo "<td>" . $result['ms_time'] . "</td>";
                            echo "<td> <a href='updateMovie.php?id=$id' class='btn btn-danger'>Update</a> </td>";
                            echo "<td> <a href='addMovieSchedule.php?id=$id' class='btn btn-info'>Add Schedule</a> </td>";
                        echo "</tr>";
                    }
                ?>
</table>
  <!-- <div class="container">
      <div class="row">
          <div class="col-4 border">
              <a href="login.php"><img src="img/majyo.jpg" class="w-100  mt-2" alt=""></a>
          <h2 class="my-2">The Witches</h2>
          </div>
          <div class="col-4 border">
              <a href="login.php"><img src="img/standby.jpg" class="w-100 mt-2" alt=""></a>
          <h2 class="my-2">Stand By Me</h2>
          </div>
          <div class="col-4 border">
              <a href="login.php"><img src="img/kimetsuno1.jpg" class="w-100 mt-2" alt=""></a>
          <h2 class="my-2">Kimetsu no Yaiba</h2>
          </div>
      </div>
  </div>
  <div class="container mt-5">
      <div class="row">
          <div class="col-4 border">
              <span class=""><img src="img/fate.jpeg" class="w-100  mt-2" alt=""></span>
          <h2 class="my-2">Fate/Grand Order</h2>
          </div>
          <div class="col-4 border">
              <span class=""><img src="img/silent.jpg" class="w-100 h-75 mt-2" alt=""></span>
          <h2 class="my-2">Silent Tokyo</h2>
          </div>
          <div class="col-4 border">
              <span class=""><img src="img/Allmylife.jpg" class="w-100 h-75 mt-2" alt=""></span>
          <h2 class="my-2">All My Life</h2>
          </div>
      </div>
  </div>
  <div class="container mt-5">
      <div class="row">
          <div class="col-4 border">
              <span class=""><img src="img/nocry.jpg" class="w-100  mt-2" alt=""></span>
          <h2 class="my-2">No crying children</h2>
          </div>
          <div class="col-4 border">
              <span class=""><img src="img/sakura.jpg" class="w-100 mt-2" alt=""></span>
          <h2 class="my-2">Sakura</h2>
          </div>
          <div class="col-4 border">
              <span class=""><img src="img/total.jpg" class="w-100 mt-2" alt=""></span>
          <h2 class="my-2">Total Recall</h2>
          </div>
      </div>
  </div>
  <div class="container my-5">
      <div class="row">
          <div class="col-4 border">
              <span class=""><img src="img/asadake.jpg" class="w-100  mt-2" alt=""></span>
          <h2 class="my-2">Asadake</h2>
          </div>
          <div class="col-4 border">
              <span class=""><img src="img/legend.jpg" class="w-100 h-75 mt-3" alt=""></span>
          <h2 class="my-2">THE LEGEND OF HEI</h2>
          </div>
          <div class="col-4 border">
              <span class=""><img src="img/kimihakanata.jpg" class="w-100 mt-2" alt=""></span>
          <h2 class="my-2">Kimiha Kanata</h2>
          </div>
      </div>
  </div> -->

  <?php include('footer.php'); ?>
  
</body>
</html>