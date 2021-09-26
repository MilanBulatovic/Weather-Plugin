<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://wppb.me/
 * @since      1.0.0
 *
 * @package    Weather
 * @subpackage Weather/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<!-- Public form -->

<div class="proba">
    <div class="form-holder">
        <form action="" method="GET">
            <input type="text" name="city" id="city" placeholder="Unesite grad" value="<?php echo $_GET['city']?>">
            <button type="submit" name="submit" class="button-front">Prognoza</button>
        </form> 
    </div>

    <div class="wrapic">
    <?php
    
    if(isset($_GET['submit']) ) {
    
        $cityFront =  $_GET['city'];
        $apiKey = '383d6f303c387c20881c7748c17335bc';
        $error = 'Molimo vas unesite grad!';
     
        if($cityFront) {
    
            $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $cityFront . '&appid=' . $apiKey;
            $weather = json_decode(file_get_contents($url), true);
        
            $temp = $weather['main']['temp'];
            $celsius = round($temp - 273.15);
            $tempMax = round($weather['main']['temp_max'] - 273.15);
            $tempMin = round($weather['main']['temp_min'] - 273.15);

            echo '<div class="front-side"">'; 
            echo '<h5>' . $cityFront . '</h5>';
            echo '<h1 class="temp">' . $celsius . '&deg;C' . '</h1>';
            echo '<p>' . 'Max temp:' . $tempMax . '&deg;C' . '</p>';
            echo '<p>' . 'Min temp:' . $tempMin . '&deg;C' . '</p>';
            echo '</div>';

        }  elseif(!$cityFront) {
            
            echo '<div class= "text-danger">' . $error . '</div>';
                            
        } 
    }
