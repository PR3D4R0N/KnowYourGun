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

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    //Ellenörizzük, hogy a jelszavak megegyeznek-e
    if($password != $confirm_password)
    {
        $not_match= "Passwords do not match!";
    } else
    {
        //Illeszük be a felhasználót és a jelszót az adatbázisba
        $sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";

        if(mysqli_query($conn,$sql))
        {
            $success = 'Successful registration.';
        } else 
        {
            echo "Error during registration: ". mysqli_error($conn);
        }
    }
  }

  //bezárjuk az adatbázis kapcsolatot
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <?php include_once('navigation.php') ?>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="draw2.webp"/>

            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <h1>Register</h1>
                <?php //Nem egyező jelszavak
                if(isset($not_match))
                { ?> 
                    <div class="alert alert-danger"> <?php echo $not_match ?> </div>
                <?php } ?>

                <?php //Sikeres regisztráció
                if(isset($success))
                { ?> 
                    <div class="alert alert-success"> <?php echo $success ?></div>
                <?php } ?>
                
                <form method="post">
                    <div>
                        <label class="form-label mt-1">Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Enter a valid user">
                    </div>
                    <div>
                        <label class="form-label mt-1">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                    </div>
                    <div>
                        <label class="form-label mt-1">Confirm password</label>
                        <input name="confirm_password" type="password" class="form-control" placeholder="Confirm password">
                    </div>
                    <div class="mt-4">
                        <input class="btn btn-primary btn-lg" type="submit" value="Register">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>