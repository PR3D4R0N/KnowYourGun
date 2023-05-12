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
    $aboutMe = $_POST["aboutMe"];
    $avatar = $_POST["avatar"];

    //Ellenörizzük, hogy a jelszavak megegyeznek-e
    if($password != $confirm_password)
    {
        $not_match= "Passwords do not match!";
    } else
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        //Illeszük be a felhasználót és a jelszót az adatbázisba
        $sql = "INSERT INTO users (username, password, aboutme, avatar) VALUES ('$username','$password','$aboutMe','$avatar')";

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
                    <div>
                        <label class="form-label mt-1">About me</label>
                        <textarea name="aboutMe" class="form-control"></textarea>
                        
                    </div>
                    <div>
                        
                        <div>
                        <h2 class="mt-3">Avatar</h2>
                        <select name="avatar" id="avatarChoose" onclick="getSelectedValue()" class="mt-4">
                            <option value="none.jpg">None</option>  
                            <option value="ArthurMorgan.jpg">Arthur Morgan</option>
                            <option value="cat1.jpg">Cat 1</option>
                            <option value="cat2.jpg">Cat 2</option>
                            <option value="cat3.jpg">Cat 3</option>
                            <option value="dog1.jpg">Dog 1</option>
                            <option value="dog2.jpg">Dog 2</option>
                            <option value="dog3.jpg">Dog 3</option>
                            <option value="DutchVanDerLinde.jpg">Dutch Van Der Linde</option>
                            <option value="IronMan.jpg">Iron Man</option>
                            <option value="JohnMarston.jpg">John Marston</option>
                            <option value="LeonSKennedy.jpg">Leon S. Kennedy</option>
                            <option value="MrBean1.jpg">Mr. Bean 1</option>  
                            <option value="MrBean2.jpg">Mr. Bean 2</option> 
                            <option value="Onimai.jpg">Onimai</option>  
                            <option value="SadieAdler.jpg">Sadie Adler</option>
                            <option value="SebastianCastellanos.jpg">Sebastian Castellanos</option> 
                            <option value="SebastianCastellanos2.jpg">Sebastian Castellanos 2</option> 
                            <option value="Umiko.jpg">Umiko</option> 
                            
                        </select>
                        </div>
                        <div>
                            
                            <img height=150 width=150 id="myImage" class="rounded-circle mt-3" src=""/>
                        </div>
                    </div>
                    <div class="mt-4">
                        <input class="btn btn-primary btn-lg" type="submit" value="Register">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="avatar.js"></script>
</body>
</html>