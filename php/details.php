<?php 

include('config/db_connect.php');

if(isset($_POST['delete'])){
  $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']); 

  $sql = "DELETE FROM tasks WHERE id = $id_to_delete";

  if(mysqli_query($conn, $sql))
  {
    //success
    header('Location: main.php');
  }
  else{
    echo 'query error' . mysqli_error($conn);
  }
}

//check GET request
if(isset($_GET['id'])){

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  //make sql
  $sql = "SELECT * FROM tasks WHERE id = $id";

  //get the query results
  $results = mysqli_query($conn, $sql);

  //fetch
  $task = mysqli_fetch_assoc($results);

  mysqli_free_result($results);
  mysqli_close($conn);


}

 ?>
 <!DOCTYPE html>
 <html>

  <?php include('templates/header.php'); ?>
  <div class="container center">
    <?php $date = htmlspecialchars($task['duedate']); 
            $date = date("m-d-Y", strtotime($date));
            $task['duedate'] = $date; ?>
    <?php if($task): ?>
      <h4><b><?php echo htmlspecialchars($task['name']); ?></b></h4>
      <h6 style="color:red;"><b>Priority: <?php echo htmlspecialchars($task['priority']); ?></b></h6>
      <h6 style="color:red;"><b>Due Date: <?php echo htmlspecialchars($task['duedate']); ?></b></h6>
      <h6><b><u>Description</u></b></h6>
      <p><?php echo $task['description'] ?></p>
      <p style="color:gray;">Created by: <?php echo htmlspecialchars($task['email']); ?></p>
      <p style="color:gray;">Created on: <?php echo date($task['created_at']); ?></p>
      

      <!--Delete task -->
      <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $task['id']?>">
        <input type="submit" name="delete" value="Delete" class= "btn red z-depth-0">
      </form>


    <?php else: ?>
      <h5>No task found!</h5>

    <?php endif; ?>


  </div>

  <?php include('templates/footer.php'); ?>

 </html>