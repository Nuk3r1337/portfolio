<?php

require "../classes/database.php";


class ProjectModel
{
    public function add($title, $description, $projectFile, $pictures){

        var_dump($projectFile);
        //var_dump($pictures);

        if(isset($projectFile )){

        }

        if($projectFile["type"] !== "application/zip"){
            return "Projekt filen er ikke en zip-fil";
        }



        //application/zip
        //image/png
        //image/jpg
        //image/gif
        return true;
    }

    public function delete($id){

    }


}