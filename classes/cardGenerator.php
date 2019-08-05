<?php

require "classes/database.php";

class CardGenerator {

    public static function generateCards($limit = false) {

        $database = new Database();

        $sql = "SELECT id, title, content FROM projects ORDER BY id DESC ";

        $bindable = [];

        if($limit !== false){
            $sql .= "LIMIT ?";
            $bindable[] = $limit;
        }

        $data = $database->query($sql, $bindable)->fetchAssoc();

        if(sizeof($data) % 3 === 2){

            $data[sizeof($data)] = ["id" => 0, "title" => "Placeholder", "content" => "This is a placeholder"];

        } elseif(sizeof($data) % 3 === 1){

            $data[sizeof($data)] = ["id" => 0, "title" => "Placeholder", "content" => "This is a placeholder"];
            $data[sizeof($data)] = ["id" => 0, "title" => "Placeholder", "content" => "This is a placeholder"];

        }

        for($i = 0; $i < sizeof($data); $i++){

            if($i % 3 === 0){
                echo "<div class='card-deck' id='topmargin'>";
            }

            echo self::cardHTML($data[$i]);

            if($i % 3 === 2){
                echo "</div>";
            }

        }

    }

    private static function cardHTML($data){

        $html = "<div class='card' style='background-color: #e08283;'>";
            $html .= "<img class='card-img-top' src='resources/assets/placeholderImage.png' alt='Card image cap'>";
            $html .= "<div class='card-body bg-danger'>";
                $html .= "<h4 class='card-title'>{$data["title"]}</h4>";
                $html .= "<p class='card-text'>{$data["content"]}</p>";
            $html .= "</div>";
        $html .= "</div>";

        return $html;

    }

}