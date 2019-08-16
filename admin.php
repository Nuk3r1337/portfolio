<?php
session_start();

if (!isset($_SESSION["LOGIN_STATUS"])){
    header("Location: /index.php");
}

require_once "classes/projectModel.php";

?>
<!DOCTYPE html>
<html lang="en-uk">
    <head>
        <!-- Meta stuff -->
        <meta name="description" content="Free Web tutorials">

        <!-- Require header -->
        <?php require_once "templates/header.php"; ?>

        <title>loggedin hamachi</title>
    </head>
    <body>

    <?php

    require_once "templates/navbar.php";

    ?>

    <div class="container content-output">

        <form method="post" enctype="multipart/form-data">

            <?php

            if(isset($_POST["addProject"])){

                $projectModel = new ProjectModel();

                if(($output = $projectModel->add($_POST["title"], $_POST["description"], $_FILES["projectFiles"], $_FILES["pictures"])) === true){
                    //header("location: /admin.php");
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
                <label for="title">Title*</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" required="required">
            </div>
            <div class="form-group">
                <label for="description">Beskrivelse*</label>
                <textarea class="form-control" id="description" rows="5" placeholder="Beskrivelse" name="description" required="required"></textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Projekt zip fil</p>
                        <input type="file" class="form-control-file" name="projectFiles" id="file">
                    </div>
                    <div class="col-sm-6">
                        <p>Projekt billeder</p>
                        <input type="file" class="form-control-file" name="pictures[]" id="pictures" multiple="multiple">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success" name="addProject" value="Tilføj Projekt">
        </form>
    </div>

    <!-- Require footer -->
    <?php require_once "templates/footer.php"; ?>

    </body>
</html>
