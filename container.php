<?php
function getContent($ville){
    if(isset($ville)){
        $ville = ucfirst($ville);
        $url = "http://api.openweathermap.org/data/2.5/weather?q=".$ville."&appid=12902259cf8845523021ad9ee9a9c279";
        $content=@file_get_contents($url); // utilisation de gestionnaire d'erreur '@'
        if($content != false){
            $content = json_decode($content,false);
        }
        return $content;
    }
}

function exists($ville){
    if(empty($ville)){
        return false;
    }
    return true;
}

function getCelsius($temp){
    $kelvin = floatval($temp);
    $nombre = floatval("273.15");
    $celsius = $kelvin - $nombre;
    $celsius = round($celsius,1, PHP_ROUND_HALF_UP);
    return $celsius;
}

function DisplayHtml($ville){
    $html = "";
    if(exists($ville)){
        $ville = ucfirst($ville);
        $content = getContent($ville);
        if(is_object($content)){
            $weather= $content->weather;
            $nom_ville = !empty($content->name) ? $content->name : $ville;
            $nom_pays = !empty($content->sys->country) ? $content->sys->country : null;
            $clouds = $content->clouds;
            $temperature = $content->main->temp;

            $html.="<div class='meteo-block-previs'><div class='meteo-content'>";
            $html .="<h4> Prévisions météo <b>$nom_ville,$nom_pays </b></h4>";
            $html.="<b>".date("d/m/Y")."</b><br/>";
            foreach($weather as $unWeather){
                $html.="<img src='http://openweathermap.org/img/w/$unWeather->icon.png' >";
            } 
            $html.="<br/><b>Temperature : <span class='btn btn-warning'>".getCelsius($temperature)." °C</span>&nbsp;<span class='btn btn-primary'>".$temperature." °F</span></b><br/>";
            $html.="<b>Nuages : ".$clouds->all."%</b><br>";
            $html.= "<b>Humidité : ".$content->main->humidity."%</b><br>";
            $html.= "<b>Pression :".$content->main->pressure." hpa</b><br>";
            $html.= "<b>Lever  : ".date('h:i', $content->sys->sunrise)."</b><br>";
            $html.= "<b>Coucher  : ".date('h:i', $content->sys->sunset)."</b>";
            $html.="</div></div>";
        }else{
            $html.="<h2 class='alert alert-warning'>Ville pas touvé! <mark>404<mark> </h2>";
        }
    }else{
        $html.="<h2 class='alert alert-danger'>Veuillez saisir  une ville au hasard</h2>";
    }
    return $html;
}

function getMeteoHeure($time){
}
