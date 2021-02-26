<?php
 include("./db.php");

 if(isset($_POST['save_task'])){

   $title = $_POST['title'];
   $description = $_POST['description'];

   echo $title . "<br/>" . $description . "<br/>" . "Conexion: ";

  //  creando consulta que pasaremos a la conexion a la base de datos
   $query = "INSERT INTO task (title, description) VALUES ('$title', '$description')";
   $result_s = mysqli_query($link, $query);

   

   if(!$result_s){
     die("Query Failed");
   }else{

     $_SESSION['message'] = "Task Saved Succesfully";
     $_SESSION['message-type'] = "success";
  
     header("Location: ../index.php");
   }

 } 
?>