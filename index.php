<?php   
include 'components/connection.php';
session_start(); 

$session_username = isset($_SESSION['username']);
$selected = isset($_GET['selected']) ? $_GET['selected'] : NULL;
?>



<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title><?php echo $selected ?> - bonjour</title>

</head>
<!-- <div id="particle-canvas" > </div> -->
<!-- <h1 class=" presentation_title"> yolo</h1> -->

<body>

        <nav>
                <div class="nav-wrapper">

                        <ul class="left hide-on-med-and-down">
                                <li class='nav_items'>
                                        <a href="index.php?selected=home">Home</a>
                                </li>

                                <li class='nav_items'>
                                        <a href="index.php?selected=a_propos">A propos</a>
                                </li>
                                <li class='nav_items'>
                                        <a href="index.php?selected=evenements">Evenements</a>
                                </li>
                                <li class='nav_items'>
                                        <a href="index.php?selected=blog">Blog</a>
                                </li>
                                <li class='nav_items'>
                                        <a href="index.php?selected=contact">Contact</a>
                                </li>
                        </ul>

                        <ul class='right'>
                                <?php 
                                 if (!isset($_SESSION['username'])) :
                                        ?>
                                <li class='nav_items'>
                                        <a href="index.php?selected=login">Log In</a>
                                </li>
                                <?php
                                 endif 
                                 ?>

                                <?php  if (isset($_SESSION['username'])) :?>
                                <li class=''> Welcome
                                        <?php echo $_SESSION['username']?>
                                </li>


                                <li class='nav_items'>
                                        <a href="index.php?selected=logout" class=''> Log out?</a>
                                </li>
                                <?php endif ?>


                        </ul>
                </div>
        </nav>


        <main class="col s9 offset-s1">
                   <?php
                 switch($selected) 
                 {
                                         
                   case 'a_propos';
                   case 'article';
                   case'blog';
                   case'contact';
                   case'evenements';
                   case 'home';
                   case 'login';
                   case 'logout';
                   case 'register';
                                         
                  include($selected . '.php');
                 break;
                                         
                         default;
                         include('home.php');
                        break;
                }
                                 
        ?>
</main>


<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="app.js"></script>
<!-- <script src="canvas.js"></script> -->
</body>

</html>

<?php 
if (isset($_SESSION['successfully_created'])) :
?> 
    <script>
   Materialize.toast('Your account was succesfully created ! ', 4000, 'green') 
    </script>
<?php
 unset($_SESSION['successfully_created']);
endif;


if (isset($_SESSION['logged_in'])) :
        echo'oui';
?> 
    <script>
   Materialize.toast('Welcome !', 4000, 'green') 
    </script>
<?php
 unset($_SESSION['logged_in']);
endif;


?>
