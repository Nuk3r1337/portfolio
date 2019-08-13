<?php
session_start();
require "../classes/authentication.php";

$auth = new Authentication();

?>

<!DOCTYPE html>
<html lang="en-uk">
    <head>
        <!-- Meta stuff -->
        <meta name="description" content="Free Web tutorials">

        <title>logmein hamachi</title>

        <!-- Require header -->
        <?php require_once "../templates/header.php"; ?>

    </head>
    <body>

        <?php

        require_once "../templates/navbar.php";

        ?>

        <div class="container content-output">

            <form method="POST">
                <?php

                if(isset($_POST["login"])){
                    if(($output = $auth->login($_POST["username"], $_POST["password"])) === true){
                        header("location: /admin.php");
                    } else{

                        $html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                            $html .='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                                $html .='<span aria-hidden="true">&times;</span>';
                            $html .='</button>';
                            $html .='<strong>Fejl!</strong> '. $output;
                        $html .='</div>';

                        echo $html;
                    }
                }

                ?>
                <div class="form-group">
                    <label for="username">Brugernavn*</label>
                    <input type="text" class="form-control" id="username" placeholder="Brugernavn" name="username" required="required">
                </div>
                <div class="form-group">
                    <label for="password">Kodeord*</label>
                    <input type="password" class="form-control" id="password" placeholder="Kodeord" name="password" required="required">
                </div>
                <input type="submit" class="btn btn-primary" name="login" value="Log ind">
            </form>
        </div>

        <!-- Require footer -->
        <?php require_once "../templates/footer.php"; ?>

    </body>
</html>

