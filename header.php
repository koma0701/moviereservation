<!-- Navigation -->
<?php
    require_once 'classes/Movie.php';
    // $mov = new Movie();
?>
<nav class="navbar navbar-light bg-dark static-top">
    <div class="container mb-2">
      <?php if ($_SESSION['isAdmin'] == 0 ) : ?>
        <a class="navbar-brand text-light" href="index1.php">AAA CINEMA</a>
        <a class="btn btn-dark" href="nowplaying.php">Owner's Page</a>
        <a class="btn btn-dark" href="signout.php">Sign out</a>
      <?php elseif ($_SESSION['isAdmin'] != 0) :  ?>
      <a class="navbar-brand text-light" href="index1.php">AAA CINEMA</a>
      <a class="btn btn-dark" href="register.php">Create New Acount</a>
      <a class="btn btn-dark" href="login.php">Sign In</a>
      <?php endif; ?>
    </div>
  </nav>

    <div class="container my-3">
      <div class="">
          <div class="text-center">
            <div class="">
              <a href="seeMovie.php"><h3 class="text-dark border p-2">Movie List & Schedule</h3></a>
            </div>
          </div>
          <!-- <div class="col-4">
            <div class="">
              <a href=""><h3 class="text-dark border p-2">Choose from Dates</h3></a>
            </div>
          </div>
            <div class="col-4">
              <a href=""><h3 class="text-dark border p-2">Theater List</h3></a> -->
            <!-- </div> -->
          </div>
        </div>
      </div>
    
  