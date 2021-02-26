<?php

  include('./db.php');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result_e = mysqli_query($link, $query);
    
    if(mysqli_num_rows($result_e) == 1){
      $row = mysqli_fetch_array($result_e);
      $id = $row['id'];
      $title = $row['title'];
      $description = $row['description'];
      $date = $row['created_at'];

      // echo $title . "<br/>" . $description . "<br/>";
    }
    }

    if(isset($_POST['update_task'])){
      $id = $_GET['id'];
      $title = $_POST['title'];
      $description = $_POST['description'];

      // echo "ID: " . $id . " TITLE: " . $title . " DESCRIPTION: " . $description;
      
      $query = "UPDATE task  set title = '$title', description = '$description' WHERE id = $id";
      $result_u = mysqli_query($link, $query);
      if($result_u){
        header("Location: ../index.php");
        $_SESSION['message'] = "Task Successfully Updated";
        $_SESSION['message-type'] = 'success';
      }
    }
  
?>

<?php include('../necessary/header.php'); ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <h1 class="bg-dark p-2 text-center text-white">UPDATE TASK</h1>
      <div class="card card-body">
        <form action="edit_task.php?id=<?php echo $id; ?>" method="POST">
          <div class="form-group m-2">
            <input type="text" name="id" class="form-control " value="<?php echo $id ?>" disabled/>
          </div>
          <div class="form-group m-2">
            <input type="text" name="title" class="form-control " value="<?php echo $title ?>" autofocus/>
          </div>
          <div class="form-group m-2">
            <textarea name="description"  rows="2" class="form-control " /><?php echo $description ?></textarea>
          </div>
          <div class="form-group m-2">
            <input type="text" name="created_at" class="form-control " value="<?php echo $date ?>" disabled/>
          </div>
          <div class="form-group m-2 mt-3 d-grid gap-2">
          <input type="submit" value="Update Task" class="btn btn-success" name="update_task">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('../necessary/footer.php'); ?>