<?php   
  require_once 'database.php';
  session_start();

class Movie extends Database {
    public function insertAccountTable($uname, $email, $pass){
        $sql = "INSERT INTO accounts (user_name, email, password, isAdmin) VALUES ('$uname', '$email', '$pass', '1')";

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
          
          $_SESSION['isAdmin'] = $row['isAdmin'];
          $_SESSION['user_id'] = $row['user_id'];
          if ($_SESSION['isAdmin'] == 0) {
            header("Location: nowplaying.php");
          }else {
            header("Location: seeMovie.php");
          }
      } else {
          echo "User does not exist! Please register";
      }
    }

    public function insertMovieTable($mname, $msum, $mpri, $pic, $mcap) {
      $sql = "INSERT INTO movie_title (movie_name, movie_summary, movie_price, movie_picture, movie_cap) VALUES ('$mname', '$msum', '$mpri', '$pic', '$mcap')";

      if($this->conn->query($sql)) {
            return 1;
      }else {
            // return 0;
            echo "Error" .$this->conn->error;
      }
    }
    public function updateMovie($mname, $msum, $mpri, $mcap, $id) {
      $sql = "UPDATE movie_title 
      SET movie_name = '$mname',
          movie_summary = '$msum',
          movie_price = '$mpri',
          movie_cap = '$mcap'
          WHERE movie_id = '$id'";
      
      if($this->conn->query($sql))
      header("Location: nowplaying.php");
      else
      echo "Error in updating. " .$this->conn->error;
    }
    public function updateStatus($id) {
      $sql = "UPDATE movie_title 
      SET movie_status = 'O'
          WHERE movie_id = '$id'";
      
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
    public function insertMovieReserve($mdate, $mtime, $mname, $uname, $email, $peopleNum, $amount, $mid) {
      $sql = "INSERT INTO reservation (r_moviedate, r_movietime, r_moviename, r_username, r_email, r_people, r_amount, movie_id) VALUES ('$mdate', '$mtime', '$mname', '$uname', '$email', '$peopleNum', '$amount', '$mid')";

      if($this->conn->query($sql)) {
        $res_id = mysqli_insert_id($this->conn);
        $sql = "UPDATE movie_title SET movie_cap = movie_cap - $peopleNum WHERE movie_id='$mid'";
        if($this->conn->query($sql)){
          header("Location: confirmation.php?id=$res_id");
        }else{
          echo "Error in updating to MOVIE TABLE. " .$this->conn->error;
        }
      }else {
        echo "Error in inserting to RESERVATION TABLE. " .$this->conn->error;
      }
    }
    public function getMovieTitle($id) {
      $sql = "SELECT * FROM movie_title WHERE movie_id = '$id'";

      $result = $this->conn->query($sql);
      $row = $result->fetch_assoc();

      return $row;
    }
    public function deleteMovieTitle($id){
      $sql = "DELETE FROM movie_title WHERE movie_id = $id ";

      if ($this->conn->query($sql)) {
        header("Location: nowplaying.php");
      }
    }
    public function getReservationTable($id){
      $sql = "SELECT * FROM reservation WHERE reserve_id = '$id'";

      $result = $this->conn->query($sql);
      $row = $result->fetch_assoc();

      return $row;
    }
    public function updateCapacity(){
      $sql = "UPDATE movie_title 
      SET movie_cap = '',
          WHERE movie_id = '$id'";

      $result = $this->conn->query($sql);
      $row = $result->fetch_assoc();

      return $row;
    }
     public function getReservation($id){
      $sql = "SELECT * FROM reservation WHERE movie_id = '$id'";

      $result = $this->conn->query($sql);
      $rows = array();
      while($row = $result->fetch_assoc()){
        $rows[] = $row;
      }

      return $rows;
    }
    public function getReservationID($movid) {
      $sql = "SELECT * FROM movie_title
              INNER JOIN reservation ON movie_title.movie_id = reservation.movie_id
              WHERE movie_title.movie_id = $movid";
              $result = $this->conn->query($sql);
              $rows = array();
      
              while($row = $result->fetch_assoc()) {
                  $rows[] = $row;
              }
              return $rows;
    }
    public function insertReviewtable($comments, $rate, $name, $id) {
      $sql = "INSERT INTO movie_review (review_comments, review_rating, name, movie_id) VALUES ('$comments', '$rate', '$name', '$id')";

      if($this->conn->query($sql)) {
        header("Location: seeMovie.php");
      }else {
        echo "Error in inserting to MOVIE_REVIEW TABLE. " .$this->conn->error;
      }
    }
    Public function getReviewData($id) {
      $sql = "SELECT * FROM movie_review WHERE movie_id = '$id'";

      $result = $this->conn->query($sql);
      $rows = array();
      while($row = $result->fetch_assoc()){
        $rows[] = $row;
      }

      return $rows;
    }
}
    ?>