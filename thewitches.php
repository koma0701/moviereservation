<?php include('header.php'); ?>
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

  <title>The Witches</title>
</head>
<body>
  <div class="container bg-dark text-white">
      <div class="row">
          <div class="col-6">
              <img src="img/majyo.jpg" class="w-100 p-3" alt="">
          </div>
          <div class="col-6">
              <h2 class="mt-3">The Witches</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo ullam minima accusantium sed, recusandae nobis cupiditate repudiandae magnam, incidunt expedita cumque, rerum voluptas tempora dolores ea in repellendus aliquid consequuntur?</p>
          </div>
        </div>
      </div>

      <div class="mt-5 w-50 text-center">
        <div>
          <h2>Choose a Date</h2>
        </div>
      </div>

          <div class="container">
               <table class="table my-3">
               <?php
               echo "<thead>";
                    // echo "Yesterday Date : ";
                    // echo "<th>". date("F j, Y",strtotime("yesterday")) . "</th>";
                    echo "<th>". date("F j, Y",strtotime("today")) . "</th>";
                    // echo "Tomorrow date :";
                    echo "<th>". date("F j, Y",strtotime("tomorrow")) . "</th>";
                    echo "<th>". date("F j, Y",strtotime("2 day")) . "</th>";
                    echo "<th>". date("F j, Y",strtotime("3 day")) . "</th>";
                    echo "<th>". date("F j, Y",strtotime("4 day")) . "</th>";
                echo "</thead>";
              ?>
                <tbody>
                
                </tbody>
        </table>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>