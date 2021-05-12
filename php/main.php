<?php

include('config/db_connect.php');

//write query for tasks
$sql = 'SELECT name, email, priority, description, id, duedate FROM tasks ORDER BY created_at';

//make query and get results
$result = mysqli_query($conn, $sql);

//fetch resulting rows as array
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);



?>	
 <!DOCTYPE html>
 <html>
 <?php include('templates/header.php'); ?>
 <h6 class="center" style="color:darkblue;"><b>Today's Tasks</b></h6>
 <div class="container">
   <div class="row">

     
     <?php foreach($tasks as $task){ ?>
      <?php $date = htmlspecialchars($task['duedate']); 
            $date = date("m-d-Y", strtotime($date));
            $task['duedate'] = $date; ?>
            

      <div class="col s6 md3">
        <div class="card z-depth-0">
          <img src="images/image.png" class="icon">
          <div class="card-content center">
            <h6><b><?php echo htmlspecialchars($task['name']); ?></b></h6>
            <div><b>Priority</b></div>
            <div style="color:red;"><?php echo htmlspecialchars($task['priority']); ?></div>
            <div><b>Due date</b></div>
            <div><?php echo htmlspecialchars($task['duedate']); ?></div>
          </div>
          <div class="card-action right-align">
            <a class="brand-text" href="details.php?id=<?php echo $task['id'] ?>">more info</a>
          </div>
        </div>
      </div>




     <?php } ?>



   </div>

 </div>


 <?php include('templates/footer.php'); ?>

  

 </html>