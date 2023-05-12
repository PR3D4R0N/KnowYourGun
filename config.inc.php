
<?php
//ellenőrizzük, hogy a felhasználó be van-e jelentkezve
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    $menu = array(
        array('text' => 'Home', 'link' => '/KnowYourGun/index.php'),
        array('text' => 'Logout', 'link' => '/KnowYourGun/logout.php'),
        array('text' => 'KnowYourGun', 'link' => '/KnowYourGun/kyg.php'),
        array('text' => 'GuessYourGun', 'link' => '/KnowYourGun/gyg.php'),
        array('text' => 'Profile', 'link' => '/KnowYourGun/profile.php'),
        array('text' => 'Users', 'link' => '/KnowYourGun/users.php')
    );
} else
{
    $menu = array(
        array('text' => 'Home', 'link' => '/KnowYourGun/index.php'),
        array('text' => 'Login', 'link' => '/KnowYourGun/login.php'),
        array('text' => 'KnowYourGun', 'link' => '/KnowYourGun/kyg.php')

    );
}
?>
