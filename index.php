<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $parking = ($_GET["parking"]=='on') ? true : false;
    $rate = $_GET["rate"];

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <form action="index.php" method="GET">
                        <input type="checkbox" name="parking" id="parking">
                        <label for="parking">parking required</label><br>
                        <select name="rate" id="rate">
                            <option value="0">none</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="rate">stars required</label>
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col"><h2>Hotel</h2></div>
                <div class="col"><h2>Description</h2></div>
                <div class="col"><h2>parking</h2></div>
                <div class="col"><h2>vote</h2></div>
                <div class="col"><h2>distance to center (km)</h2></div>
            </div>
            <?php 
                if(!$parking && !$rate){
                    foreach($hotels as $hotel){
                        echo '<div class="row">';
                        ($hotel["parking"]) ? $hotel["parking"] = "yes" : $hotel    ["parking"] = "no";
                        
                        foreach($hotel as $hotel_info){
                            echo "<div class=col>{$hotel_info}</div>";
                        }
                        echo '</div>';
                    }
                } else if($parking && !$rate){
                    foreach($hotels as $hotel){
                        if($hotel["parking"]){
                            echo '<div class="row">';
                            $hotel["parking"] = "yes";
                            foreach($hotel as $hotel_info){
                                echo "<div class=col>{$hotel_info}</div>";
                            }
                            echo '</div>';
                        }
                    }
                } else if(!$parking && $rate){
                    foreach($hotels as $hotel){
                        if($hotel["vote"]>=$rate){
                            echo '<div class="row">';
                            ($hotel["parking"]) ? $hotel["parking"] = "yes" : $hotel    ["parking"] = "no";
                            
                            foreach($hotel as $hotel_info){
                                echo "<div class=col>{$hotel_info}</div>";
                            }
                            echo '</div>';
                        }
                    }
                } else {
                    foreach($hotels as $hotel){
                        if(($hotel["parking"])&&($hotel["vote"]>=$rate)){
                            echo '<div class="row">';
                            ($hotel["parking"]) ? $hotel["parking"] = "yes" : $hotel    ["parking"] = "no";
                            
                            foreach($hotel as $hotel_info){
                                echo "<div class=col>{$hotel_info}</div>";
                            }
                            echo '</div>';
                        }
                    }
                }
            ?>
        </div>
    </body>
</html>