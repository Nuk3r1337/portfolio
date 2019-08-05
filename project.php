<?php
require_once "classes/projectViewer.php";

$pw = new ProjectViewer($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en-uk">
    <head>
        <!-- Meta stuff -->
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="Johnny K. Pedersen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <!--<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>-->

        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- My css -->
        <link rel="stylesheet" type="text/css" href="resources/stylesheet.css">

        <title>Projekt <?php echo $_GET["id"] ?></title>
    </head>

        <body>
        <?php

            require_once "templates/navbar.php";

        ?>

        <div class="container">
            <h2 class="projekt-title">Le epic title</h2>

            <div class="row">
                <div class="col-sm-6 bg-success">
                    &nbsp;
                </div>
                <div class="col-sm-1 bg-dark">
                    &nbsp;
                </div>
                <div class="col-sm-5 bg-danger">
                    <p></p>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript (Bootstrap) -->
        <!-- jQuery first, then popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
