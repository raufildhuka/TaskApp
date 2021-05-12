<?php 
  if(isset($_POST['submit'])){
    session_start();
    if(isset($_POST['username']))
    {
      $_SESSION['username'] = $_POST['username'];
    }
    header('Location: main.php');
  }
  if(isset($_POST['guest'])){
    session_start();
    if(isset($_POST['username']))
    {
      $_SESSION['username'] = 'Guest';
    }
    header('Location: main.php');
  }
  
 ?>



 <!DOCTYPE html>
 <html>
 <?php include('templates/header.php'); ?>
 <head>
   <title>Welcome</title>
 </head>
 <body>
 <h4 class="center brand-logo brand-text"> Welcome! Please enter in your name </h4>
 <br>
<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
 <input type="text" name="username" value=" ">
  <div class="center">
      <br>
      <input type="submit" name="submit" value="Enter" class="btn brand z-depth-0">
      <br>
      <br>
       <input type="submit" name="guest" value="Continue as guest" class="btn brand z-depth-0">
     </div>
</form>
 </body>
 </html>