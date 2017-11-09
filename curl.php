<?php
include "functions.php";

$filename = "yh_om.html";
$ch = curl_init("https://www.yrkeshogskolan.se/om-yrkeshogskolan");
$fp = fopen("yh_om.html", "w");

$words = [
    'yrkeshögskolan' => 0,
    'fungerar' => 0,
    'och' => 0,
];


$findword = (count_words(curl_content("https://www.yrkeshogskolan.se/om-yrkeshogskolan", "yh_om.html"), $words));

foreach ($findword as $key => $value){
    if ($value <= 1){
        echo 'Ordet "' . $key . '" förekommer ' . $value . ' gång i texten <br>';
    }
    else if ($value > 1) {
        echo 'Ordet "' . $key . '" förekommer ' . $value . ' gånger i texten <br>';
    }

}



