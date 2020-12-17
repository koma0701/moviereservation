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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/landing-page.css">
  <title>SeeMovie</title>
</head>
<body>
<div class="container">
  <?php
      foreach($row as $result) {
        $pic = $result['movie_picture'];
        $mname = $result['movie_name'];
        $msum = $result['movie_summary'];
        $mcap = $result['movie_cap'];
        $mprice = $result['movie_price'];
        $mid = $result['movie_id'];
        
        $row2 = $mov->getMovieInfo($mid);

        if($mcap != 0){
          echo "
          <div class='card w-75 mb-3 mx-auto'>
              <div class='card-header bg-dark text-white'>     
                  <div class='container row'>
                    <img src='img/$pic' class='col-6' style='width: 300px; height: 300px;'>
                    <div class='d-flex flex-column col-6'>
                        <h2>$mname</h2>
                        <p class='p-3 border'>$msum</p>
                        <p class='p-3 border'>Number of available seats is $mcap</p>
                        <p class='p-3 border'>The ticket price is " .number_format($mprice,2). "</p>
                    </div>
                  </div>
              </div>
              <div class='card-body'>";
                foreach($row2 as $result2){
                  $mdate = $result2['ms_date'];
                  $mtime = $result2['ms_time'];
  
                
  
                  echo "
                  <div class='row'>
                    <div class='col-5'>
                      <table class='table table-striped table-bordered'>
                          <tr>
                            <td class=''>$mdate</td>
                          </tr>
                      </table>    
                    </div>     
                    <div class='col-5'>
                      <table class='table table-striped table-bordered'>
                            <tr>
                              <td class=''>$mtime</td>
                            </tr>
                      </table>
                    </div>
                    <div class='col-2'>
                      <a href='reservation.php?picture=$pic&mname=$mname&mdate=$mdate&mtime=$mtime&mprice=$mprice&mcap=$mcap&mid=$mid' class='btn btn-dark'>Reserve</a>
                    </div>
                  </div> 
                  ";
                }
          echo "    
              </div>
          </div>
          ";
        }
        }
        
  ?>
    </div>
</body>
</html>
<?php include('footer.php'); ?>