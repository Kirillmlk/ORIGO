<?php
header('Access-Control-Allow-Origin: *');

$logFile = 'D:/OSPanel/userdata/logs/Apache_2.4-PHP_8.0-8.1+Nginx_1.23_queriesa.log';

if (file_exists($logFile)) {
    $lines = file($logFile);
    $linesToShow = array_slice($lines, -20);
    foreach ($linesToShow as $line) {
        echo htmlspecialchars($line) . "<br>";
    }
} else {
    echo "Файл логов не найден.";
}
?>

<!---->
<!--$logFile = 'D:/OSPanel/userdata/logs/Apache_2.4-PHP_8.0-8.1+Nginx_1.23_queriesa.log';-->
<!---->
<!--if (file_exists($logFile)) {-->
<!--    $lines = file($logFile);-->
<!--    $linesToShow = array_slice($lines, -20);

   echo "<h2>Последние строки из queries.log:</h2><pre>";-->
<!---->
<!--    foreach ($linesToShow as $line) {-->
<!--        echo $line;-->
<!--    }-->
<!--    echo "</pre>";-->
<!--} else {-->
<!--    echo "Файл логов не найден.";-->
<!--}-->
