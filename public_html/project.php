<?php
require_once "../classes/projectViewer.php";

$projectViewer = new ProjectViewer($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en-uk">
    <head>
        <!-- Meta stuff -->
        <meta name="description" content="Free Web tutorials">

        <!-- Require header -->
        <?php require_once "../templates/header.php"; ?>

        <title>Projekt <?php echo $_GET["id"] ?></title>
    </head>

    <body>

        <!-- Require navbar -->
        <?php require_once "../templates/navbar.php"; ?>

        <div class="container content-output">

            <!-- Generates Projects -->
            <?php echo $projectViewer->generateProject(); ?>

        </div>

        <!-- Require footer -->
        <?php require_once "../templates/footer.php"; ?>

    </body>
</html>
