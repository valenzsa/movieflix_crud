<?php

  function updateRecord() {
    $servername = 'localhost';
    $username = 'movieflix';
    $password = 'movieflix123';
    $databasename = 'movieflix_db';

    $connection = mysqli_connect($servername, $username, $password, $databasename);

    if(!$connection) {
      die('Error: '.mysqli_connect_error($connection));
    } else {
      echo 'Connection succesful';
    }

    $id = $_POST['update-id'];
    $title = $_POST['update-title'];
    $genre = $_POST['update-genre'];
    $director = $_POST['update-director'];

    $sql = "UPDATE movieflix_table SET title = '$title', genre = '$genre', director = '$director' WHERE id = '$id'";

    $result = mysqli_query($connection, $sql);

    if(!result) {
      echo "Update unsuccessful!";
    } else {
      echo "Update is successful";
    }

    mysqli_close($connection);

    header('location: ../index.php');
  }

  if(isset($_POST['edit-button'])) {
    updateRecord();
  }
?>