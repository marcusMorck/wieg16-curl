<?php
$filename = "yh_om.html";
$ch = curl_init("https://www.yrkeshogskolan.se/om-yrkeshogskolan");
$fp = fopen("yh_om.html", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);

$words = [
    'yrkeshögskolan' => 0,
    'fungerar' => 0,
    'och' => 0,
];

$content = file_get_contents($filename);

//removes html tags
$stripedContent = strip_tags($content);
$explodedContent = explode(" ", $stripedContent);

foreach ($words as $word => $amount) {
    foreach ($explodedContent as $value => $item) {
        if (strpos($item, $word) !== false) {
            $words[$word] = $words[$word] + 1;
        }
    }
}
