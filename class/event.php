<?php
/**
* Event Planner Class
*/

class Event{
  private $pdo;

  public function dbConnect($conString, $user, $pass){
      if(session_status() === PHP_SESSION_ACTIVE){
          try {
              $pdo = new PDO($conString, $user, $pass);
              $this->pdo = $pdo;
              return true;
          }catch(PDOException $e) {
              $this->msg = 'DB error, something went wrong please contact your administrator';
              return false;
          }
      }else{
          $this->msg = 'Session did not start.';
          return false;
      }
  }

  /**
  * Gets current week Events
  * @return Return all events in an array
  */
  public function GetEvent($day){
      if(is_null($this->pdo)){
          $this->msg = 'Connection did not work out!';
          return [];
      }else{
          $pdo = $this->pdo;
          $stmt = $pdo->prepare("SELECT * FROM event WHERE YEARWEEK(`timestamp`, 1) = YEARWEEK(CURDATE(), 1) AND DAYNAME( DATE( timestamp ) )='$day' ");
          $stmt->execute();
          $info = $stmt->fetchAll();
          return $info;
      }
  }


  /**
  *Creates a new event for the calendar Planner
  *
  */
  public function CreateEvent($id_instructor,$id_student,$id_plane, $tach_out,$time_out,$time_in,$timestamp,$title,$description,$color){
    if(is_null($this->pdo)){
        $this->msg = 'Connection did not work out!';
        return [];
    }else{
      $id = substr($id_instructor,0,(-(strlen($id_instructor)) +2) ) . "_". substr($id_student,0,(-(strlen($id_student)) +2) ) . "_" . date('d-m-Y');;

      $pdo = $this->pdo;
      $sql = "INSERT INTO `event` (`id_event`, `id_user_instructor`, `id_user_student`, `id_airplane`, `time_out`, `time_in`, `tach_out`, `timestamp`, `title`, `description`,`color`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
      $create_event =  $pdo->prepare($sql);
      $create_event->execute([$id,$id_instructor,$id_student,$id_plane,$time_out,$time_in,$tach_out,$timestamp,$title,$description,$color]);

    }

  }

  Public function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


  public function DeleteEvent($id_event){
    if(is_null($this->pdo)){
        $this->msg = 'Connection did not work out!';
        return [];
    }else{
      $id_event=$_GET ['id_event'];
      $sql= 'DELETE FROM event WHERE id_event = '$id_event''
      if(mysqli_query($sql)){
        echo "Records were deleted successfully.";
      } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
      }
  }



}
