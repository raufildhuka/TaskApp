 <?php 
  session_start();
  
  if($_SERVER['QUERY_STRING'] == 'noname'){
    unset($_SESSION['username']);

  }
  $username = $_SESSION['username'];
  
  ?>


 <head>
  <title>Daily tasks</title>
  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
      .brand{
        background: #cbb09c !important;
      }
      .brand-text{
        color: #5f9ea0 !important;
      }
      form{
        max-width: 460px;
        margin: 20px auto;
        padding: 20px;
      }
      textarea {
      resize: none;
      width: 418px;
      height: 140px;
      }
      .icon{
        width: 100px;
        margin: 40px auto -30px;
        display: block;
        position: relative;
        top: -30px;
      }
      .welcome{
        color: #5f9ea0 !important;
        font-size: 15px !important;
      }
      
    </style>
 </head>
  <body class="green lighten-4">
    <nav class="green lighten-4 z-depth-0">
      <div class="container">
         <?php if($_SERVER['PHP_SELF'] == '/tuts/index.php'){?>
            <a class="brand-logo welcome">Hello Guest!</a>
         <?php } else{ ?>
            <a href = "index.php" class="brand-logo welcome">Hello <?php echo $username; ?>!</a>
         <?php } ?>
        <a href='main.php' class="center brand-logo brand-text">Task Sheet</a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
          <li><a href="add.php" class="btn brand z-depth-0">Add Task</a>
          </li>
        </ul>
      </div>
    </nav>