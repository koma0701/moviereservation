<?php
    include('header.php');
    require_once 'classes/Movie.php';
    $mov = new Movie();
    $res_id = $_GET["id"];
    $row = $mov->getReservation($res_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/landing-page.css">
  <title>Reservation</title>
</head>

<body>
    <h2 class="display-4 text-center my-5">Owner's page</h2>
    <h2 class="w-100 text-center my-5">Movie report</h2>
    <table class="table table table-striped container mb-5">
    <thead class="border">
                <th>Date</th>
                <th>Time</th>
                <th>Number of people</th>
                <!-- <th>Name</th> -->
                <th>Total Amount</th>
            </thead>
        <?php
                $total = 0;
                foreach($row as $result) {
                  $id = $result['reserve_id'];
                  $amount = $result['r_amount'] * $result['r_people'];
                  $total = $total + $amount;
                  echo "<tr class=''>";
                  // echo "<td>" . $result['movie_id'] . "</td>";
                  echo "<td class='border'>" . $result['r_moviedate'] . "</td>";
                  echo "<td class='border'>" . $result['r_movietime'] . "</td>";
                  echo "<td class='border'>" . $result['r_people'] . "</td>";
                  // echo "<td class='border'>" . $result['r_moviename'] . "</td>";
                  echo "<td class='border'>" . number_format($amount, 2)  . "</td>";
                  // echo "<td class='border'>" . number_format($amount, 2)  . "</td>";
                  // echo "<td> <a href='nowplaying.php' class='btn btn-info'>Back</a> </td>";
                  echo "</tr>";
                }
                echo "<p class='text-right display-4 text-danger' style='font-size: 40px;margin-right: 150px;'>" .'Total Sales:  '.number_format($total, 2) ."</p>";
        ?>
    </table>
    </body>
</html>
<?php include('footer.php'); ?>