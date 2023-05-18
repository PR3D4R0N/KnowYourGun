<?php require_once("config.inc.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
                

        <?php } else { header("location: smeagol.php"); }?>

        <?php 
            // Get users.
            $db_pass = '/pJNmtLq[e4g[qXp';

            $db_name = 'knowyourgun';
            $dbh = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
            $result = $dbh->query("SELECT * FROM users ORDER BY username");
            $users = $result->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <h2 class="mt-5">User List</h2>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>About me</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $users as $key => $user ) { ?>
                            <tr>
                                <td rowspan="2"><img src="avatars/<?= $user['avatar'] ?>" alt="<?= $user['avatar'] ?>" width="200px" heigt="200px" class="rounded-circle border border-1"></td>
                                <td class="fs-3"><?= $user['username'] ?></td>
                                <td><?= $user['aboutme'] ?></td>
                            </tr>
                            <tr>
                               
                                <td>Last game score: <?= $user['point'] ?></td>
                                <td>Maximum points achieved: <?= $user['max'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </div>
            </div>

        </div>
    </div>
</body>
</html>