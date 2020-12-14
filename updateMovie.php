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

  <title>Update Movie</title>
</head>
<body>
<h2 class="w-100 text-center my-5">Update Movie</h2>
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
                            echo "<td><input type='submit' name='btnUpdateMovie' value='Update' class='btn btn-danger btn-block'></td>";
                            echo "<td> <a href='nowplaying.php' class='btn btn-info'>Back</a> </td>";
                        echo "</tr>";
                    }
                ?>
</table>
  

  <?php include('footer.php'); ?>
  
</body>
</html>