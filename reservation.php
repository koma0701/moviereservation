<?php
include('header.php');
  $pic = $_GET['picture'];
  $mname = $_GET['mname'];
  $mdate = $_GET['mdate'];
  $mtime = $_GET['mtime'];
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
    <h1>Reservation</h1>
        <div class="">
            <form action="action.php" method="post">
                  <div class="text-center bg-dark">
                    <img src="img/<?php echo $pic?>" alt="" class="w-75 m-5">
                  </div>
                  <div class="row my-3">
                     <div class="col-3">
                      <div class="form-group">
                        <input type="text" name="moviedate" id="mdate" placeholder="" class="form-control font-weight-bold" value="<?php echo $mdate?>" readonly style="border:none;">
                      </div>
                     </div> 
                     <div class="col-3">
                        <div class="form-group">
                          <input type="text" name="movietime" id="mtime" placeholder="" class="form-control font-weight-bold" value="<?php echo $mtime?>" readonly style="border:none;">
                        </div>
                     </div> 
                     <div class="col-6">
                        <div class="form-group">
                          <input type="text" name="moviename" id="mname" placeholder="" class="form-control font-weight-bold text-center" value="<?php echo $mname?>" readonly style="border:none;">
                        </div>
                     </div> 
                  </div>
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="name" placeholder="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="" class="form-control" value="">
                    </div>
                    <div class="form-group my-3">
                        <label>Number of Passengers</label>
                         <select name="passenger" id="" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                         </select>
                    </div>
                    <div class="form-group my-3">
                    <label>Seats</label>
                         <select name="seatver" id="" class="form-control">
                         <option value="" disabled selected hidden>Choose a vartical of seats.</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                         </select>
                         <select name="seathori" id="" class="form-control my-3">
                         <option value="" disabled selected hidden>Choose a horizonal of seats.</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                         </select>
                    </div>
                    <input type="submit" name="btnReserve" value="Reserve" class="btn btn-danger btn-block">
                </form>
            </div>
</div>
</body>
</html>
<?php include('footer.php'); ?>