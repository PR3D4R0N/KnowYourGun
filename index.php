

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
  <!--Welcome text-->
  <div class="text-center mt-3">
    <?php
    //ellenőrizzük, hogy a felhasználó be van-e jelentkezve
    //session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    { ?>
      <img height=150 width=150 class="rounded-circle" src="avatars/<?php echo $_SESSION['avatar'];?>"/>
      <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
    <?php } else { ?>
      <h2>Welcome Guest</h2>

    <?php } ?>
  </div>
</div>
</body>
</html>