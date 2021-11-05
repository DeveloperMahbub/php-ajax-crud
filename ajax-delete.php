<?php

$student_id = $_POST["id"];

include './db_con.php';

$sql = "DELETE FROM students WHERE id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
