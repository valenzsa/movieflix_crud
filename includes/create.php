<?php
  // Connect to database
  $servername = 'localhost';
  $username = 'movieflix';
  $password = 'movieflix123';
  $databasename = 'movieflix_db';

  $connection = mysqli_connect($servername, $username, $password, $databasename);

  if(!$connection) {
    die("Connection Failed: ".mysqli_connect_error());
  } else {
    echo "Connection Successful";
  }

  // Grab the values from the input
  $title = $_POST['create-title'];
  $genre = $_POST['create-genre'];
  $director = $_POST['create-director'];

  // Perform query
  $sql = "INSERT INTO movieflix_table (title, genre, director) VALUES ('$title', '$genre', '$director')";

  // Execute the query
  if(mysqli_query($connection, $sql)){
    echo "Movie is added to the database!";
  } else {
    echo "Error: ".$sql.mysqli_error($connection);
  }

  mysqli_close($connection);
?>