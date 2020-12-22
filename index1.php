<?php
  require_once 'classes/Movie.php';
  include('header.php');
  $mov = new Movie();
  $row = $mov->getMovieData();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Landing Page - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/landing-page.css">

</head>

<body>
  

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5"></h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <!-- <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your Username">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign In!</button>
              </div>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  

  <!-- Image Showcases -->
  <!-- <h1 class='text-center border'>Movie Ranking</h1>
  <section class='showcase p-3 border'>
    <div class='container-fluid p-0'>
      <div class='row no-gutters'>

        <div class='col-lg-6 order-lg-2 text-white showcase-img'>
        </div>
        <div class='col-lg-6 order-lg-1 my-auto showcase-text'>
          <h2>Demon Slayer: Infinity Train</h2>
          <p class='lead mb-0'>When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
        </div>
      </div>
      <div class='row no-gutters'>
        <div class='col-lg-6 text-white showcase-img' style='background-image: url('img/majyo.jpg');'></div>
        <div class='col-lg-6 my-auto showcase-text'>
          <h2>The Witches</h2>
          <p class='lead mb-0'>Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
        </div>
      </div>
      <div class='row no-gutters'>
        <div class='col-lg-6 order-lg-2 text-white showcase-img' style='background-image: url('img/standby.jpg');'></div>
        <div class='col-lg-6 order-lg-1 my-auto showcase-text'>
          <h2>Stand By Me Doraemon2</h2>
          <p class='lead mb-0'>Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
        </div>
      </div>
    </div>
  </section> -->
  <h1 class='text-center display-4'>Movie Ranking</h1>
  <div class="">
  <?php
      foreach($row as $result) {
        $pic = $result['movie_picture'];
        $mname = $result['movie_name'];
        $msum = $result['movie_summary'];
        $mcap = $result['movie_cap'];
        $mprice = $result['movie_price'];
        $mid = $result['movie_id'];
        $msta = $result['movie_status'];
        

        $row2 = $mov->getMovieInfo($mid);
        $row3 = $mov->getReviewData($mid);
        $ratesum = 0;
        $ratecount = 0;
          foreach($row3 as $result3) {
            $ratesum = $ratesum + $result3['review_rating'];
            $ratecount = $ratecount + 1;
          }

          if ($ratesum == 0){
            $rateaverage = 0;
          }else{
            $rateaverage = $ratesum / $ratecount;
          }
          
        if($mcap != 0 && $mcap > 0 && $msta == 'N'){
          echo "
          <h2 class='mt-3 mx-auto text-center border'>" . "Average Review " . number_format($rateaverage, 1) . "</h2>
          <div class='card w-100 mb-3 mx-auto'>
              <div class='card-header bg-dark text-white'>     
                  <div class='container row'>
                  <div class='d-flex flex-column col-6'>
                    <img src='img/$pic' class='m-auto' style='width: 100%; height: 300px;'>
                    
                  </div>
                    <div class='d-flex flex-column col-6'>
                    <a href='seeMovie.php'><h2 class='text-white display-4'>$mname</h2></a>
                        <p class='p-3 border mt-5' style='letter-spacing: 10px'>$msum</p>
                    </div>
                  </div>
              </div>
              <div class='card-body'>";
          echo "    
              </div>
          </div>
          ";
        }
        
      }
  ?>
    </div>
  <!-- <h1 class="text-center border">Movie Ranking</h1>
  <section class="showcase p-3 border">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/kimetsuno1.jpg');">
        </div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Demon Slayer: Infinity Train</h2>
          <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/majyo.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>The Witches</h2>
          <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/standby.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Stand By Me Doraemon2</h2>
          <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">List of items for sale at the movie theater</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/pop.jpg" alt="">
            <h2>POPCORN</h2>
            <p class="font-weight-light mb-0">This is fantastic!"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/drink.jpg" alt="">
            <h2>DRINK</h2>
            <p class="font-weight-light mb-0">"This is fantastic!"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/hotdog.png" alt="">
            <h2>HOTDOG</h2>
            <p class="font-weight-light mb-0">"This is fantastic!"</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="container">
      <div class="text-center">
        <!-- <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ready to get started? Sign up now!</h2>
        </div> -->
        <!-- <div class="col-md-10 col-lg-8 col-xl-7 mx-auto"> -->
          <!-- <form> -->
            <!-- <div class=""> -->
            <div class="">
              <a href="seeMovie.php"><h3 class="text-white">Movie List & Schedule</h3></a>
            </div>
              <!-- <div class="col-12 col-md-3"> -->
                <!-- <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button> -->
              <!-- </div> -->
            <!-- </div> -->
          <!-- </form> -->
        <!-- </div> -->
      </div>
    </div>
  </section>
<?php include('footer.php'); ?>
  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
