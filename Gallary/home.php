<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <!-- Latest compiled and minified CSS -->
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Hee</title>
</head>

<body class="container">
     <div class="row">
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand rounded-3 text-primary" href="javascript:void(0)">GALLARY</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div  class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add.php">Add Person</a>
              </li>
              
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="text" placeholder="Search">
              <button class="btn btn-primary" type="button">Search</button>
            </form>
          </div>
        </div>
      </nav>
     </div>

     <div class="row mt-5">

        


        
          <?php
          $username = "root";
          $password = "";
          $database = "gallary";
          $mysqli = new mysqli("localhost", $username, $password, $database);
          error_reporting(0);
          $id2 = $_GET['id'];
          if($id2>0){
            $sql = "DELETE FROM user WHERE id=$id2";
            if ($mysqli->query($sql) === TRUE) {
              echo '<script>alert("Welcome to Galley Of Naimur")</script>';
            } else {
              echo "Error deleting record: " . $conn->error;
            }
          }
          $query = "SELECT * FROM user";

          
  
          $result = $mysqli->query($query);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $id=$row["id"];
              echo "<div class='col-lg-3 col-12 col-md-3 m-2' >";
              echo "<div class='card' style='width:100%;'>";
              echo "<img class='card-img-top' src='https://i.pravatar.cc/300' alt='Card image'>";
              echo " <div class='card-body'>";
              echo " <h4 class='card-title'>";
              echo "" . $row["name"]."<br>";
              echo "</h4> ";
              echo " <p class='card-text'>";
              echo "" . $row["about"]."<br>";
              echo "</p>";
              echo " <a href='./add.php?id=$id' class='btn btn-success'>Update</a>";
              echo " <a href='home.php?id=$id'  class='btn btn-danger'>Delete</a>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
            }
          } else {
            echo "0 results";
          }

          $mysqli->close();


          ?>
        
     </div>
  
    </div>
</body>
</html>

