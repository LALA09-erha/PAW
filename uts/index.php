<?php
session_start();
require('database/connect.php');
$data = mysqli_query($conn, "SELECT * FROM tbl_153");
$no = 1;

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Erha App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <h1>Data Users</h1>
    <?php
    if(!empty($_SESSION['message'])){
        echo '<div class="alert alert-primary" role="alert">'.$_SESSION['message'].'</div>';
        unset($_SESSION['message']);
    }
    ?>
    <a type="button" class="btn btn-primary" href="add.php">Add User</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        
        <?php
        if(mysqli_num_rows($data) > 0){
          while($row = mysqli_fetch_assoc($data)){
            echo '<tbody>';
            echo '<tr>';
            echo '<td>'.$no.'</td>';
            echo '<td>'.$row['nama_153'].'</td>';
            echo '<td>'.$row['email_153'].'</td>';
            echo '<td>';
            echo '<a type="button" class="btn btn-primary m-1" href="edit.php?id='.$row['id_153'].'">Edit</a>';
            echo '<a type="button" class="btn btn-danger" onclick="return confirm(\'Really delete?\')" href="delete.php?id='.$row['id_153'].'">Delete</a>';
            echo '</td>';
            echo '</tr>';
            echo '</tbody>';
            $no ++;
            }
          }else{
                echo '<tr>';
                echo '<td class="justify-content-center">No data</td>';
                echo '</tr>';
            }
        
        ?>
        
    
    </table>
</div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
<!--     
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>