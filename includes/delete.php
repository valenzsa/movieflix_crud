<?php

  function deleteRecord() {
    // Connect to the database
    $servername = "localhost";
    $username = "movieflix";
    $password = "movieflix123";
    $databasename = "movieflix_db";

    $connection = mysqli_connect($servername, $username, $password, $databasename);

    // Check if connecting to database is successful
    if(!$connection) {
      die("Database connection failed: ".mysqli_connect_error($connection));
    } else {
      echo "Database connection successful!";
    }

    // Grab value from the deleteid input box
    $id = $_POST['delete-id'];

    $sql = "DELETE FROM movieflix_table WHERE id='$id'";

    if($result = mysqli_query($connection, $sql)){
      echo "Record deleted!";
    } else {
      echo "Error: ".sql.mysqli_error($connection);
    }

    mysqli_close($connection);

    header('location: ../index.php');
  }

  if(isset($_POST['delete-button'])){
    deleteRecord();
  }
?>