<?php

  include('config/db_connect.php');

  $name = $email = $priority = $description = $date = '';
  $errors =['name'=>'', 'email'=>'', 'priority'=>'', 'duedate'=>''];

  if(isset($_POST['submit'])){
    //echo htmlspecialchars($_POST['name']);
    //echo htmlspecialchars($_POST['email']);
    //echo htmlspecialchars($_POST['priority']);
    //echo htmlspecialchars($_POST['date']);

    //check title
    if(empty($_POST['name'])){
      $errors['name']= 'Task Name is required <br />';
    }
    else{
      $name = $_POST['name'];
    }
    //check email
    if(empty($_POST['email'])){
      $errors['email'] = 'Email is required <br />';
    }
    else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] ='Email must be a valid email address';
      }
    }
    //check priority
    if(empty($_POST['priority'])){
      $errors['priority'] = 'Priority is required <br />';
    }
    else{
      $priority = $_POST['priority'];
      if($priority == "high" or $priority == "medium" or $priority == "low" or $priority == "High" or $priority == "Medium" or $priority == "Low")
      {

      }
      else{
        $errors['priority'] = 'Invalid value for priority <br />';
      }
    }

    if(empty($_POST['description'])){
      $description =  $_POST['description'];
    }  
    else{
      $description =  $_POST['description'];
    }
    if(empty($_POST['date'])){
      $errors['duedate']= 'Due date is required <br />';
    }
    else{
      $date = $_POST['date'];
      $date_regex = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
      if(preg_match($date_regex, $date))
      {
        //$date = $_POST['date'];

      } 
      else{
        $errors['date']='Incorrect format <br />';
      }
      //$date = strlen($date);
      $date = str_replace("-", "", $date);
      $_POST['date'] = $date;
      

      
      
    }

    if(!array_filter($errors)){
      

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $priority = mysqli_real_escape_string($conn, $_POST['priority']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $description = mysqli_real_escape_string($conn, $_POST['description']);
      $date = mysqli_real_escape_string($conn,$_POST['date']);

      //create sql
      $sql = "INSERT INTO tasks(name,email,priority,description,duedate) VALUES('$name', '$email', '$priority', '$description', $date)";
      
      //save to db and check
      if(mysqli_query($conn, $sql)){
        //success
        header('Location: main.php');
      }
      else{
        //error
        echo 'query error: ' . mysqli_error($conn);
      }

  

    }
    

    
  }

 


?>  
 <!DOCTYPE html>
 <html>
 <?php include('templates/header.php'); ?>
 <section class="container grey-text">
   <h4 class="center">Add a task</h4>
   <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
     <label>Task Name</label>
     <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
     <div class="red-text"><?php echo $errors['name']; ?></div>
     <label>Email</label>
     <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
     <div class="red-text"><?php echo $errors['email']; ?></div>
     <label>Date (MM/DD/YYY)</label>
     <input type="date" name="date" value="<?php echo htmlspecialchars($date) ?>">
     <div class="red-text"><?php echo $errors['duedate']; ?></div>
      <label>Priority(High, Medium, Low)</label>
     <input type="text" name="priority" value="<?php echo htmlspecialchars($priority) ?>">
     <div class="red-text"><?php echo $errors['priority']; ?></div>
  

     <label>Description<br></label>
     
     <textarea name="description"> <?php echo htmlspecialchars($description) ?> </textarea>

     <div class="center">
      <br>
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
     </div>
   </form>
 </section>

 <?php include('templates/footer.php'); ?>

  

 </html>