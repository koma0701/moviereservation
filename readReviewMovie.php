<?php
require_once 'classes/Movie.php';
include('header.php');
  $pic = $_GET['picture'];
  $mname = $_GET['mname'];
  $id = $_GET['id'];
  $mov = new Movie();
  $row = $mov->getReviewData($id);
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
    <div class="container">
        <h1>Movie reviews</h1>
            <div class="text-center">
                  <img src="img/<?php echo $pic?>" alt="" class="w-50 m-5">
            </div>
            <div class="">
                  <div class="form-group">
                      <input type="text" name="moviename" id="mname" placeholder="" class="form-control font-weight-bold text-center" value="<?php echo $mname?>" readonly style="border:none;">
                  </div>
              </div> 
              <div class="card-header">
                  <h2 class="font-weight-bold">Reviews</h2>
              </div>
              <div class="card-body" style="font-size: 25px;">
                    <?php
                    foreach($row as $result) {
                      echo"
                      <div class='row mb-5 border-bottom'>
                        <div class='col-2'>
                          <p class=''>" . $result['name'] . " </p>
                        </div>
                        <div class='col-2'>
                          <p class=''>" . number_format($result['review_rating'],1) . "</p>
                        </div>
                        <div class='col-8'>
                        <p class=''>" . $result['review_comments'] . "</p>
                        </div>
                      </div>";
                    }
                      ?>
              </div>
    </div>
</body>
</html>
<?php include('footer.php'); ?>