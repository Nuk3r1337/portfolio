<?php

require_once "classes/database.php";

class ProjectViewer
{
    private $id;
    private $title;
    private $content;
    private $images = [];

    public function __construct($id)
    {
       $this->id = $id;

       if(!is_numeric($id)){
           header("location: /");
       }

       $database = new Database();

       $data = $database->query("SELECT id, title, content FROM projects WHERE id = :id", ["id" => $id])->fetchAssoc()[0];

       if(!isset($data["title"])){
           header("location: /");
       }

        $this->images = $database->query("SELECT id, path, type FROM projects_images WHERE projects_id = :projects_id ORDER BY type DESC LIMIT 12", ["projects_id" => $data["id"]])->fetchAssoc();

        $this->title = $data["title"];
        $this->content = $data["content"];

        //var_dump($data);
    }

    public function generateProject() {

        $html = '<div class="projects-output">';

            $html .= '<h2 class="project-title">'. $this->title .'</h2>';
            $html .= '<hr>';
            $html .= '<div class="row">';
                $html .= '<div class="col-sm-6 project-element">';
                    $html .='<h2>Billeder</h2>';
                    $html .= $this->generateCarousel();
                $html .= '</div>';
                $html .= '<div class="col-sm-1"></div>';
                $html .= '<div class="col-sm-5 project-element">';
                    $html .= '<h2>Projekt Beskrivelse</h2>';
                    $html .= '<br>';
                    $html .= '<p>' .$this->content. '</p>';
                $html .= '</div>';
            $html .= '</div>';

        $html .= '</div>';

        return $html;
    }

    private function generateCarousel()
    {

        $imageCount = 0;

        if (($count = sizeof($this->images)) > 0) {

            $imageCount = $count;
        }

        $html = '<div id="project-carousel" class="carousel slide gap-from-top" data-ride="carousel">';
        $html .= '<ol class="carousel-indicators">';

        if ($imageCount !== 0) {

            foreach ($this->images as $index => $image) {

                $html .= ($index === 0) ? '<li data-target="#project-carousel" data-slide-to="' . $index . '" class="active"></li>' : '<li data-target="#project-carousel" data-slide-to="' . $index . '"></li>';
            }
        }

        $html .= '</ol>';
        $html .= '<div class="carousel-inner" role="listbox">';

        if ($imageCount !== 0) {

            foreach ($this->images as $index => $image) {

                $html .= ($index === 0) ? '<div class="carousel-item active">' : '<div class="carousel-item">';
                $html .= '<img class="d-block w-100 fill-img" src="project_pictures/' . $image["path"] . '" alt="900x400" style="width: 900px; height: 400px;">';
                $html .= '</div>';
            }

        } else {

            $html .= '<div class="carousel-item active">';
            $html .= '<img class="d-block w-100 fill-img" src="assets/placeholderImage.png" alt="900x400" style="width: 900px; height: 400px;">';
            $html .= '</div>';
        }

        $html .= '</div>';
        $html .= '<a class="carousel-control-prev" href="#project-carousel" role="button" data-slide="prev">';
        $html .= '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        $html .= '<span class="sr-only">Previous</span>';
        $html .= '</a>';
        $html .= '<a class="carousel-control-next" href="#project-carousel" role="button" data-slide="next">';
        $html .= '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        $html .= '<span class="sr-only">Next</span>';
        $html .= '</a>';
        $html .= '</div>';

        return $html;

    }
}