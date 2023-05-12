<?php
    require_once('config.inc.php');
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
    $username = $_SESSION['username'];
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $current_password = $_POST["current-password"];
        $new_password = $_POST["new_password"];
        $confirm_password = $_POST["confirm-password"];
        $aboutMe = $_POST["aboutMe"];
        $avatar = $_POST["avatar"];

        //hashelt jelszó lekérdezése
        $sql = "SELECT password FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        
       
        if(mysqli_num_rows($result) == 1) //ha találat van
        {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row["password"];
            if(password_verify($current_password,$hashed_password)) //jelszó ellenörzése
            {
                //új jelszó mezőben van-e valami?
                if ($new_password !=null) //isset valamiért nem úgy működik itt ahogy kéne...
                {
                    //Ellenörzi, hogy a jelszavak megegyeznek-e
                    if($new_password != $confirm_password)
                    {   
                        $PasswordChangeError = 'Passwords do not match!';
                    } else
                    {
                        $new_password = password_hash($new_password, PASSWORD_DEFAULT); //új jelszó titkosítása
                        $sql="UPDATE users SET password = '$new_password' WHERE username = '$username'";
                        mysqli_query($conn,$sql);
                        $PasswordChangeSuccess ='Password changed successfully.';
                    }

                
                
                
                }
                //További adatok módosítása
                $sql="UPDATE users SET aboutme = '$aboutMe' WHERE username = '$username'";
                mysqli_query($conn,$sql);
                $sql="UPDATE users SET avatar = '$avatar' WHERE username = '$username'";
                mysqli_query($conn,$sql);
                $_SESSION['aboutme'] = $aboutMe;
                $_SESSION['avatar'] = $avatar;
                $dataChange = 'Data changed successfully';
            } else {
                
                $error = 'Invalid Password!';
            }
            

        } else {
            //valami történt....
           // $error = 'Something baaaad happened...';
          }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <?php include_once('navigation.php') ?>
    <?php 
    if($_SESSION['loggedin'] == false)
    {
        header("location: smeagol.php");
    }
    ?>
    <div class="container text-center">
        <div class="row align-items-start">
            <form method="post">
                
            
            <!--profile picture? -->
            <div class="col">
                <div>
                    <img height=300 width=300 class="rounded-circle border border-1" src="avatars/<?php echo $_SESSION['avatar']; ?>" id="myImage"/>
                </div>
                <div class="text-center mb-3 ">
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
                
            </div>
            <!-- data -->
            <div class="col">
                 <h1>Profile edit</h1>
                 <h2>Username: <?php echo $_SESSION['username']?></h2>
                 <?php //Ha hibás a jelszó
                 if(isset($error)) { ?>
                 <div class="alert alert-danger">
                    <?php echo $error; ?>
                 </div> <?php
                 } ?> 
                <?php if(isset($dataChange)) { //Adatok megentése?>
                        <div class="alert alert-success"> <?php echo $dataChange; ?> </div>
                <?php } ?>

                 <?php //Ha a jelszavak nem egyeznek
                 if(isset($PasswordChangeError)) { ?>
                    <div class="alert alert-danger"> <?php echo $PasswordChangeError; ?> </div>
                <?php } else if(isset($PasswordChangeSuccess)) { //Ha jelszók megegyeznek?>
                        <div class="alert alert-success"> <?php echo $PasswordChangeSuccess; ?> </div>
                <?php } ?>
                 <!-- Current Password -->
                 <div>
                    <label class="form-label mt-1">Current password</label>
                    <input name="current-password" type="password" class="form-control" placeholder="Enter your password">
                </div>
                
                 <!--About me -->
                <div>
                    <label class="form-label mt-1">About me</label>
                    <textarea name="aboutMe" class="form-control" placeholder="<?php echo $_SESSION['aboutme'] ?> "><?php echo $_SESSION['aboutme'] ?></textarea>
                 </div>
                 <!-- Change password-->
                 <div>
                    <h2 class="mt-3">Change password</h2>
                    <label class="form-label mt-1">New password</label>
                    <input name="new_password" type="password" class="form-control" placeholder="Enter your new password">
                </div>
                <div>
                    <label class="form-label mt-1">Confirm password</label>
                    <input name="confirm-password" type="password" class="form-control" placeholder="Confirm your password">
                </div>
                <!-- Apply changes -->
                <div>
                    <input class="btn btn-primary mt-3" name="Apply" type="submit" class="form-control" Value="Apply"/>
                </div>
                 
            </div>
            </form>
        </div>
        
    </div>
    <script src="avatar.js"></script>
</body>
</html>