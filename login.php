<?php
require_once("config.inc.php");
//ellenőrizzük, hogy a felhasználó be van-e jelentkezve
//session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
  header("location: index.php");
  exit;
}
?>
<?php




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
  

  $sql = "SELECT password FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);



  //Ha a felhasználó adatai helyesek, be kell jelentkeztetni
  if(mysqli_num_rows($result) == 1)
  {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row["password"];
    
    if(password_verify($password,$hashed_password))
    {
      //ki kell gyűjteni az adatokat a felhasználóról
      //aboutMe
      $sql = "SELECT aboutme from users where username = '$username'";
      $result = $conn->query($sql);
      //Az eredményt kinyerjük és eltároljuk egy változóba
      $row = $result->fetch_assoc();
      $aboutMe = $row["aboutme"];

      //avatar
      $sql = "SELECT avatar from users where username = '$username'";
      $result = $conn->query($sql);
      
      //Az eredményt kinyerjük és eltároljuk egy változóba
      $row = $result->fetch_assoc();
      $avatar = $row["avatar"];

       //utolsó kvízen elért pont szám
       $sql = "SELECT point from users where username = '$username'";
       $result = $conn->query($sql);
       
       //Az eredményt kinyerjük és eltároljuk egy változóba
       $row = $result->fetch_assoc();
       $point = $row["point"];

        //max elért pontszám
        $sql = "SELECT max from users where username = '$username'";
        $result = $conn->query($sql);
        
        //Az eredményt kinyerjük és eltároljuk egy változóba
        $row = $result->fetch_assoc();
        $max = $row["max"];
      //session
      session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["username"] = $username;
      $_SESSION["aboutme"] = $aboutMe;
      $_SESSION["avatar"] = $avatar;
      $_SESSION["point"] = $point;
      $_SESSION["max"] = $max;
      header("location: index.php");
    } else
    {
      //Ha a felhasználó adatok helytelenek, ki kell írni hibaüzenetet
    $error = 'Invalid username or password';
    }
   

  } else {
    //Ha a felhasználó adatok helytelenek, ki kell írni hibaüzenetet
    $error = 'Invalid username or password';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"/>
  </head>
<body>
<?php include_once('navigation.php') ?>
  
  <div class="container-fluid h-custom ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="draw2.webp"/>

      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 transparent_white_background rounded">
      <h1>Login</h1>
            
          <?php
          //Ha volt hiba, ki kell írni a hibaüzenetet
          if (isset($error))
          { ?>
            <div class="alert alert-danger"><?php echo $error; ?> </div>
          <?php } ?>
        <form action="" method="POST">
          <!-- felhasználó -->
          <div>
            <label class="form-label mt-1 fs-3">Username</label>
            <input name="username" type="text" class="form-control" placeholder="Enter a valid user" pattern="[a-zA-Z0-9-]+">
            
          </div>

          <!-- jelszó -->
          <div>
            <label class="form-label mt-1 fs-3">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Enter password">
            
          </div>

          <!-- gomb -->
          <div class="mt-4">
            <input class="btn btn-primary btn-lg" type="submit" value="Login">
          </div>
        </form>
        <P class="fs-3">Don't have an account? <a href="register.php" class="link-danger">Register</a></p>
    </div>
    </div>
    
  </div>
</body>
</html>