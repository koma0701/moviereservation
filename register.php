<?php 
    include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/landing-page.css">
  <title>Create Acount</title>
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h1>Create New Acount </h1>
            </div>
            <div class="card-body">
                <form action="action.php"method="post">
                  <input type="text" name="uname" placeholder="Username" class="form-control"><br>
                    
                    <input type="email" name="email" placeholder="Email Address" class="form-control"><br>
                   
                    <input type="text" name="pass" placeholder="Password" class="form-control"><br>

                    <input type="reset" value="Reset" class="btn btn-danger btn-block mb-3" name="" id="">
                    <input type="submit" name="create" value="Create" class="btn btn-dark btn-block">

                </form>
            </div>
        </div>
    </div>
  </body>
  </html>
  <?php include('footer.php') ?>