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
    <h2 class="display-4 text-center my-5">Owner's page</h2>
    <h2 class="w-100 text-center my-5">Previous Movie</h2>
    <div class="row">
      <div class="col-6">
         <h2 class="text-center mb-5"><a href="addmovie.php" class="text-dark border p-2">Add Movie</a></h2>
      </div>
      <div class="col-6">
          <h2 class="text-center mb-5"><a href="nowplaying.php" class="text-dark border p-2">Now Playing</a></h2>
      </div>
    </div>
    <table class="table table table-striped container mb-5">
    <thead class="border">
                <th></th>
                <th>Name</th>
                <th>Summary</th>
                <th>Capacity</th>
                <th>Price</th>
                <!-- <th>Update</th>
                <th>Delete</th>
                <th>Schedule</th>
                <th>Archive</th> -->
            </thead>
        <?php
            $total = 0;
              foreach($row as $result) {
                $id = $result['movie_id'];
                $pic = $result['movie_picture'];
                $mname = $result['movie_name'];
                $row2 = $mov->getReviewData($id);
            
                $ratesum = 0;
                $ratecount = 0;
                foreach($row2 as $result2) {
                  $ratesum = $ratesum + $result2['review_rating'];
                  $ratecount = $ratecount + 1;
                }
                if ($ratesum == 0){
                  $rateaverage = 0;
                }else{
                  $rateaverage = $ratesum / $ratecount;
                }
                if($result['movie_status'] == 'O'){
                  echo "<form action='action.php' method='post'>";
                  echo "<tr class='border'>";
                  echo "<td> <img src='img/" . $result['movie_picture']. "' class='' style='width: 50%'> </td>";
                  echo "<td class='border'><a href='movieReport.php?id=$id' class='btn border'>" . $result['movie_name'] . "</a><a href='readReviewMovie.php?picture=$pic&mname=$mname&id=$id' class='btn border mt-2'><p class='text-center mt-2'>" . "Rating " .number_format($rateaverage, 1) . "</p></a></td>";
                  echo "<td class='border'>" . $result['movie_summary'] . "</td>";
                  echo "<td class='border'>" . $result['movie_cap'] . "</td>";
                  echo "<td class='border'>" . number_format($result['movie_price'], 2)  . "</td>";
                  // echo "<td> <a href='updateMovie.php?id=$id' class='btn btn-primary'>update</a> </td>";
                  // echo "<td> <a href='action.php?actiontype=delete&id=$id' class='btn btn-danger'>Delete</a> </td>";
                  
                  // echo "<td> <a href='addMovieSchedule.php?id=$id' class='btn btn-info'>Add Schedule</a> </td>";
                  // echo "<td class=''><a href='action.php?actiontype=status&id=$id' class='btn btn-dark'>Change Status</a></td>";
                  echo "</tr>";
                  echo "</form>";
                  $rows = $mov->getReservationID($id);
                  // use loop
                  // compute for total sales of the row
                  foreach($rows as $result2) {
                    $amount = $result2['r_amount'] * $result2['r_people'];
                    $total = $total + $amount;
                  }
                }
              }
              echo "<p class='text-right display-4 text-danger' style='font-size: 40px;margin-right: 150px;'>" .'Total Sales:  '.number_format($total, 2) ."</p>";
                               
        ?>
    </table>

    <?php include('footer.php'); ?>
    
    </body>
</html>