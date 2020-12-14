<?php   
  require_once 'database.php';
  session_start();

class Movie extends Database {
    public function insertAccountTable($uname, $email, $pass){
        $sql = "INSERT INTO accounts (user_name, email, password) VALUES ('$uname', '$email', '$pass')";

        if($this->conn->query($sql)) {
                header("Location: login.php");
        }else {
            echo "Error in inserting to LOGIN TABLE. " .$this->conn->error;
        }
    }

    public function login($uname, $pass) {
      $sql = "SELECT * FROM accounts WHERE user_name = '$uname' AND password = '$pass'";
      $result = $this->conn->query($sql);

      if ($result->num_rows == 1) {
          $row = $result->fetch_assoc();

          $_SESSION['user_id'] = $row['user_id'];
          header("Location: admin.php");
      } else {
          echo "Error";
      }
    }

    public function insertMovieTable($mname, $msum, $mpri, $pic) {
      $sql = "INSERT INTO movie_title (movie_name, movie_summary, movie_price, movie_picture) VALUES ('$mname', '$msum', '$mpri','$pic')";

      if($this->conn->query($sql)) {
            return 1;
      }else {
            return 0;
      }
    }
    public function updateMovie() {
      $sql = "UPDATE movie_title 
      SET movie_name = '$mname'
          movie_summary = '$msum'
          movie_price = '$mpri'
          movie_picture = '$pic'
      ";

      if($this->conn->query($sql))
      header("Location: nowplaying.php");
      else
      echo "Error in updating. " .$this->conn->error;
    }
    public function getMovieData() {
      $sql = "SELECT * FROM movie_title";

      $result = $this->conn->query($sql);
      $rows = array();

      while($row = $result->fetch_assoc()){
        $rows[]= $row;
      }

      return $rows;
    }
    public function insertMovieSchedule($mdate, $mtime, $id) {
      $sql = "INSERT INTO movie_sched (ms_date, ms_time, movie_id) VALUES ('$mdate', '$mtime', '$id')";

      if($this->conn->query($sql)) {
        header("Location: nowplaying.php");
      }else {
        echo "Error in inserting to MOVIE_SCHED TABLE. " .$this->conn->error;
      }
    }
    public function getMovieInfo($mid){
      $sql = "SELECT * FROM movie_sched WHERE movie_id = $mid ";
      $result = $this->conn->query($sql);
      $rows = array();

      while($row = $result->fetch_assoc()){
        $rows[]= $row;
      }

      return $rows;
    }
    public function insertMovieReserve($mdate, $mtime, $mname, $uname, $email, $peopleNum, $vseat, $hseat) {
      $sql = "INSERT INTO reservation (r_moviedate, r_movietime, r_moviename, r_username, r_email, r_people, r_vseat, r_hseat) VALUES ('$mdate', '$mtime', '$mname', '$uname', '$email', '$peopleNum', '$vseat', '$hseat')";

      if($this->conn->query($sql)) {
        header("Location: index1.php");
      }else {
        echo "Error in inserting to RESERVATION TABLE. " .$this->conn->error;
      }
    }
  }
    ?>