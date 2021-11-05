<?php

$student_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];

include './db_con.php';

$sql = "UPDATE students SET first_name = '{$firstName}',last_name = '{$lastName}' WHERE id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
