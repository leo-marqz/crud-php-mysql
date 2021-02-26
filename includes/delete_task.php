<?php

  include('./db.php');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $query = "DELETE FROM task WHERE id = $id";
    $result_d = mysqli_query($link, $query);
    

    if(!$result_d){
      die("Query Failed");
    }else{

      $_SESSION['message'] = "Task Removed Success";
      $_SESSION['message-type'] = "danger";
      header("Location: ../index.php");
    }

  }
?>