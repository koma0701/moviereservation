<?php   
    require_once 'classes/Movie.php';

    $mov = new Movie();

    if(isset($_POST['create'])) {
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $mov->insertToTable($uname, $email, $pass);
    } else if(isset($_POST['login'])) {
        // login
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $mov->login($uname, $pass);
    }else if(isset($_POST['btnCreateMovie'])) {
        $mname = $_POST['mname'];
        $msum = $_POST['msummary'];
        $mpri = $_POST['mprice'];
        $pic = $_FILES['pic']['name'];
        $target_dir = "img/";
      
        $target_file = $target_dir .basename($pic);

        $ans = $mov->insertMovieTable($mname, $msum, $mpri, $pic);

        if($ans == 1) {
            move_uploaded_file($_FILES['pic']['tmp_name'], $target_file);
            header("Location: nowplaying.php");
        }else {
            echo "Error";
        }
    }elseif(isset($_POST['btnAddSche'])) {
        $mdate = $_POST['mdate'];
        $mtime = $_POST['mtime'];
        $id = $_POST['id'];

        // call method
        $mov->insertMovieSchedule($mdate, $mtime, $id);
    }elseif(isset($_POST['btnUpdateMovie'])){
        $mname = $_POST['mname'];
        $msum = $_POST['msummary'];
        $mpri = $_POST['mprice'];
        $pic = $_FILES['pic']['name'];
        $target_dir = "img/";
      
        $target_file = $target_dir .basename($pic);

        $ans = $mov->insertMovieTable($mname, $msum, $mpri, $pic);

        if($ans == 1) {
            move_uploaded_file($_FILES['pic']['tmp_name'], $target_file);
            header("Location: nowplaying.php");
        }else {
            echo "Error";
        }
    }elseif(isset($_POST['btnReserve'])) {
        $mdate = $_POST['moviedate'];
        $mtime = $_POST['movietime'];
        $mname = $_POST['moviename'];
        $uname = $_POST['username'];
        $email = $_POST['email'];
        $peopleNum = $_POST['passenger'];
        $vseat = $_POST['seatver'];
        $hseat = $_POST['seathori'];

        // call method
        $mov->insertMovieReserve($mdate, $mtime, $mname, $uname, $email, $peopleNum, $vseat, $hseat);
  }
  