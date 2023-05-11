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
        <?php
            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
            {?>
                <p>You are logged in as <?php echo $_SESSION['username'];?>.</p>
                

        <?php } ?>
        <h2 align="center">Guess Your Gun</h2>

        <?php 
            // Get firearms.
            $db_pass = '/pJNmtLq[e4g[qXp';

            $db_name = 'knowyourgun';
            $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);

            $result = $dbh->query("SELECT firearm.img, firearm.fa_name FROM firearm LIMIT 4"); 
            $firearms = $result->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <div class="row">
            <div class="options">
                <table class="table table-striped">
                
                    <?php foreach( $firearms as $key => $firearm ) { ?>
                            <tr>
                                <td colspan="2" align="center"><img src="imgs/<?= $firearm['img'] ?>" alt="" height="50%" width="50%" ></td>
                                <tr>
                                <td class="option" align="center"><button class="button"></button></td>
                                <td align="center"><button><?= $firearm['fa_name'] ?></button></td>
                                </tr>

                                <tr>
                                <td align="center"><button><?= $firearm['fa_name'] ?></button></td>
                                <td align="center"><button><?= $firearm['fa_name'] ?></button></td>
                                </tr>
                            </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="./button.js" type="module"></script>
    </body>
</html>