<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>


<?php
error_reporting(0);
$name="";
$about="";
$del="";
$id2 = $_GET['id'];
    if($id2>0){
     $username = "root";
     $password = "";
     $database = "gallary";
     $mysqli = new mysqli("localhost", $username, $password, $database);
     error_reporting(0);
     $sql = "select * FROM user WHERE id=$id2";
    $result = $mysqli->query($sql);
     $del="DELETE FROM user WHERE id=$id2";
     $new=$mysqli->query($del);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     $name=$row["Name"];
      $about=$row["About"];
     }
  }
 
  
 }
?>


<body>
    <div class="container" style="padding-top:30px">
        <a class="btn btn-primary" href="home.php">Home</a>

      <form action="add.php" method="post" enctype="multipart/form-data">
        <p style="text-align:center ">Add a new person</p>

        <div id="123" class="form-group">

          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>"  placeholder="Enter Name"><br>

          <label for="exampleInputEmail1">About</label>
          <input type="text" class="form-control" id="about" value="<?php echo $about ?>" name="about"  placeholder="About Yourself"><br>

          <label for="exampleFormControlFile1">Please upload a profile picture</label>
          <input type="file" class="form-control-file" name="fileToUpload" id="exampleFormControlFile1"><br>

          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
</body>
</html>


<?php
error_reporting(0);
$method = $_SERVER['REQUEST_METHOD'];

if($method=='POST'){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallary";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$name=$_REQUEST["name"];
$about=$_REQUEST["about"];

$sql = "INSERT INTO user (name, about) VALUES ('$name', '$about')";


if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}
?> 