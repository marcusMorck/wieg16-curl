<?php
function curl_content($url, $filename){
    $ch = curl_init($url);
    $fp = fopen($filename, "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    $content = file_get_contents($filename);
    return $content;
}

function format_text($text){
    $stripedContent = strip_tags($text);
    $explodedContent = explode(" ", $stripedContent);
    return $explodedContent;
}

function count_words($text, array $words){
    foreach ($words as $word => $amount) {
        foreach (format_text($text) as $value => $item) {
            if (strpos($item, $word) !== false) {
                $words[$word] = $words[$word] + 1;
            }
        }
    }
    return $words;
}