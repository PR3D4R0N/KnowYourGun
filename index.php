<?php
//ellenőrizzük, hogy a felhasználó be van-e jelentkezve
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
  header("location: loggedin.php");
  exit;
}
?>
<?php

//database connection
$servername = 'localhost';
$username = 'knowyourgun';
$password = '/pJNmtLq[e4g[qXp';
$dbname = 'knowyourgun';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
  {
    die("Connection failer: ".mysqli_connect_error());
  }

  //Űrlap küldésekor ellenőrizni kell a felhasználónevet és jelszót

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $username = $_POST["username"];
    $password = $_POST["password"];
  }

  $sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);


  //Ha a felhasználó adatai helyesek, be kell jelentkeztetni
  if($count == 1)
  {
    //session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $username;
    header("location: loggedin.php");
  } else 
  {
    //Ha a felhasználó adatok helytelenek, ki kell írni hibaüzenetet
    $error = "Invalid username or password";
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KnowYourGun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
<body>
<?php include_once('navigation.php') ?>
  
    <div class="container">
      <h1>Login</h1>
        <form action="" method="POST">
          <!-- felhasználó -->
           <div>
            <label class="form-label">Username</label>
            <input name="username" type="text" class="form-control" placeholder="Enter a valid user">
            
          </div>

          <!-- jelszó -->
          <div>
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Enter password">
            
          </div>

          <!-- gomb -->
          <div class="mt-4">
            <input class="btn btn-primary btn-lg" type="submit" value="Login">
          </div>
        </form>

        <?php
          //Ha volt hiba, ki kell írni a hibaüzenetet
          if (isset($error))
          {
            echo $error;
          }
        ?>

      
    </div>
</body>
</html>