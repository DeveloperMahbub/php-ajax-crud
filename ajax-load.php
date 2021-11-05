<?php

include './db_con.php';

$limit = 5;
if(isset($_POST['page_no'])){
  $page = $_POST['page_no'];
}else{
  $page = 0;
}


$sql = "SELECT * FROM students LIMIT {$page},$limit ";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
if(mysqli_num_rows($result) > 0 ){
  $output = "";
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <thead>
  
              <tr>
                <th width="60px">Id</th>
                <th>Name</th>
                <th width="90px">Edit</th>
                <th width="90px">Delete</th>
              </tr>
              </thead>';
            $output .="<tbody>";
              while($row = mysqli_fetch_assoc($result)){
                $last_id = $row["id"];
                $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr></tbody>";
              }

              
    
    $output .= "<tbody><tbody id='pagination'>
                    <tr>
                      <td colspan='4'>
                        <button id='ajaxbtn' data-id='{$last_id}'>Load More</button>
                      </td>
                    </tr>
                  </tbody>";
    $output .= "</table>";
    echo $output;
  }else{
    echo "";
  }
mysqli_close($conn);
?>
