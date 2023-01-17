<?php
$id2 = $_GET['id'];
    if($id2>0){
     $username = "root";
     $password = "";
     $database = "gallary";
     $mysqli = new mysqli("localhost", $username, $password, $database);
     error_reporting(0);
     $sql = "select * FROM user WHERE id=$id2";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     $name=$row["Name"];
      $about=$row["About"];
     }
  }
 }
?>
