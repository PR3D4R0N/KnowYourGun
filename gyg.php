<?php require_once("config.inc.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KnowYourGun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"/>
  </head>
  <body>
    <?php include_once('navigation.php') ?>

    <div class="container transparent_white_background rounded">
        <?php
            //session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
            {?>
                <p>You are logged in as <?php echo $_SESSION['username'];?>.</p>
                

        <?php } else { header("location: smeagol.php"); }?>
        <h2 text-align="center">Guess Your Gun</h2>

        <?php 
            // Get firearms.
            $db_pass = '/pJNmtLq[e4g[qXp';
            $db_name = 'knowyourgun';
            $dbh = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);

              
            $getlength = $dbh->query("SELECT firearm.img, firearm.firearm_id, firearm.fa_name FROM firearm"); 
            $firearms = $getlength->fetchAll(PDO::FETCH_ASSOC);
            
              $rand=random_int(1,count($firearms));
              

              $result = $dbh->query("SELECT firearm.img, firearm.firearm_id, firearm.fa_name FROM firearm where firearm.firearm_id=$rand limit 1"); 
              $firearms =$result->fetchAll(PDO::FETCH_ASSOC);
            ?>
                
           

              <div class="row">
               <div class="col-12">
                <table class="table">
                    
                <?php foreach( $firearms as $key => $firearm ) { ?>
                            <tr>
                                <td colspan="2"><img src="imgs/<?= $firearm['img'] ?>" alt="<?= $firearm['fa_name'] ?>" height="40%" width="60%"><?= $firearm['fa_name'] ?></td>
                                <tr>
                                <td><form name="verify" onsubmit="return verifyGuess(<?= $firearm['fa_name'] ?>)"><input id="guess" type="text" name="guess" ></td>
                                <td><input id="send" type="submit" value="Guess"></form></td>
                                </tr>
                            </tr>
                        <?php } ?>
                </table>
            </div>
        </div>

   <script>     function verifyGuess(a, b)
{
  $points=b;
var guessInput = document.getElementById("guess");
  if(guessInput===a)
   {
    $points++;
   }else{                                     
    
   }         
   console.log($points);
   return $points               
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="button.js" type="module"></script>
  </body>
</html>