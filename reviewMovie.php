<?php
require_once 'classes/Movie.php';
include('header.php');
  $pic = $_GET['picture'];
  $mname = $_GET['mname'];
  // $mdate = $_GET['mdate'];
  // $mtime = $_GET['mtime'];
  // $mprice = $_GET['mprice'];
  // $mcap = $_GET['mcap'];
  $mid = $_GET['mid'];
  $mov = new Movie();
  // $mov->insertReviewtable();
  $row = $mov->getReviewData($mid);
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
        <div class="">
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
                      <p class=''>" . $result['review_rating'] . "</p>
                    </div>
                    <div class='col-8'>
                    <p class=''>" . $result['review_comments'] . "</p>
                    </div>
                  </div>";
                }
                  ?>
                </div>
            <form action="action.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="movieid" id="mid" placeholder="" class="form-control font-weight-bold" value="<?php echo $mid?>"style="border:none;">
                      </div>
                     
                     <h2 class="my-3">Add Review</h2>
                     <div class="form-group">
                          <input type="text" name="name" id="name" placeholder="Your Name" class="form-control" value="">
                        </div>
                     <div class="form-group my-4">
                        <label for="">Movie Rating</label>
                        <input type="radio" name="rating" value="1"> 1
                        <input type="radio" name="rating"  value="2"> 2
                        <input type="radio" name="rating"  value="3"> 3
                        <input type="radio" name="rating"  value="4"> 4
                        <input type="radio" name="rating"  value="5"> 5 <br>
                     </div>
                     <div class="form-group">
                     <label for=""></label>
                        <textarea name="comment" rows="4" cols="40" class="form-control" placeholder="Write a review here."></textarea><br>
                     </div>
                     <?php
                     echo
                    "<a href='seemovie.php?picture=$pic&mname=$mname&mid=$mid'><input type='submit' name='btnAddReview' value='Add Review' class='btn btn-danger btn-block mb-3'></a>"
                    ?>
                    <a href="seeMovie.php" class="btn btn-info btn-block mb-5">Back</a>
                </form>
            </div>
</div>
</body>
</html>
<?php include('footer.php'); ?>