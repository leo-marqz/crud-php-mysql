<?php include('necessary/header.php'); ?>
<?php include('./includes/db.php'); ?>
  
  <div class="container p-4">
   <div class="row">
    <div class="col-md-3">
      <?php if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-<?= $_SESSION['message-type']; ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message']; ?> <!-- mostramos mensaje -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
     <div class="card card-body">
      <form action="includes/save_task.php" method="POST">
       <div class="form-group m-2">
        <input type="text" name="title" rows="2" class="form-control " placeholder="Task Title" autofocus/>
       </div>
       <div class="form-group m-2">
        <textarea class="form-control" name="description" class="form-control m-2" placeholder="Task Description"></textarea>
       </div>
       <div class=" m-2 d-grid gap-2">
        <input type="submit" value="Save Task" class="btn btn-success" name="save_task">
       </div>
      </form>
     </div>
    </div>
    <div class="col-md-9">
      <table class="table table-bordered table-hover">
        <thead class="bg-dark text-white">
          <tr>
            <th>TITLE</th>
            <th>DESCRIPTION</th>
            <th>CREATED AT</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $query = "SELECT * FROM task";
            $result_tasks =  mysqli_query($link, $query);
            while($row = mysqli_fetch_array($result_tasks)){ ?>
              <tr>
                <td class="text-capitalize" style="font-weight: bold;"> <?php echo $row['title'] ?></td>
                <td class="text-secondary"> <?php echo $row['description'] ?></td>
                <td class="fst-italic text-secondary"><?php echo $row['created_at'] ?></td>
                <td>
                  <a class="btn btn-secondary" href="./includes/edit_task.php?id=<?php echo $row['id'] ?>"><img src="./img/iconmonstr-pencil-9.svg" alt=""> </a>
                  <a class="btn btn-danger" href="./includes/delete_task.php?id=<?php echo $row['id'] ?>"><img src="./img/iconmonstr-x-mark-12.svg" alt=""></a>
                </td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
   </div>
  </div>

<?php include('necessary/footer.php'); ?>

