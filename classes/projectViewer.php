<?php

require_once "classes/database.php";

class ProjectViewer
{
    private $id;
    private $title;
    private $content;
    private $thumbnail;


    public function __construct($id)
    {
       $this->id = $id;

       if(!is_numeric($id)){
           header("location: /");
       }

       $database = new Database();

       $data = $database->query("SELECT title, content FROM projects WHERE id = :id", ["id" => $id])->fetchAssoc()[0];

       if(!isset($data["title"])){
           header("location: /");
       }

       $this->title = $data["title"];
       $this->content = $data["content"];

       //var_dump($data);
    }
}