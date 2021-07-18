<?php

  function deleteRecord() {
    echo "DELETE!!!";
  }
  if(isset($_POST['delete-button'])){
    deleteRecord();
  }
?>