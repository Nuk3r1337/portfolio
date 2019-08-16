<?php

require_once "classes/cardGenerator.php";

?>
<!DOCTYPE html>
<html lang="en-uk">
    <head>
        <!-- Meta stuff -->
        <meta name="description" content="Free Web tutorials">

        <!-- Require header -->
        <?php require_once "templates/header.php"; ?>

        <title>Portfolio - Johnny K. Pedersen</title>
    </head>
    <body>

        <!-- Require navbar -->
        <?php require_once "templates/navbar.php"; ?>

        <div class="container content-output">

            <!-- Generates cards -->
            <?php CardGenerator::generateCards(); ?>

        </div>

        <!-- Require footer -->
        <?php require_once "templates/footer.php"; ?>

    </body>
</html>
