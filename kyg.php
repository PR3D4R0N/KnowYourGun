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

    <div class="container transparent_white_background">
        <?php
            //session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
            {?>
                <p>You are logged in as <?php echo $_SESSION['username'];?>.</p>
                

        <?php } ?>
        
        <h2>Know Your Gun</h2>

        <?php 
            // Get firearms.
            $db_pass = '/pJNmtLq[e4g[qXp';

            $db_name = 'knowyourgun';
            $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);
            $result = $dbh->query("SELECT firearm.img, firearm.fa_name, caliber.ca_name, country.co_name, firearm.design_year FROM firearm INNER JOIN caliber ON firearm.caliber_id=caliber.caliber_id INNER JOIN country ON country.country_id=firearm.dev_country_id"); 
            $firearms = $result->fetchAll(PDO::FETCH_ASSOC);
        ?>
    
        <h2 class="mt-5">Firearm database beta</h2>

        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Img</th>
                            <th>Name/Caliber</th>
                            <th>Developing country/Design year</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $firearms as $key => $firearm ) { ?>
                            <tr>
                                <td rowspan="2"><img src="imgs/<?= $firearm['img'] ?>" alt="<?= $firearm['img'] ?>" width="300px" heigt="100px"></td>
                                <td><?= $firearm['fa_name'] ?></td>
                                <td><?= $firearm['ca_name'] ?></td>
                            </tr>
                            <tr>
                               
                                <td><?= $firearm['co_name'] ?></td>
                                <td><?= $firearm['design_year'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>