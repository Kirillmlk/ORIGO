<?php

/**
 * Решение проблем с доменом и ошибками
 */

//error_reporting(0);
//ini_set('display_errors', 0);
//
//header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

$logFile = 'YOUR_PATH';

if (file_exists($logFile)) {
    $lines = file($logFile);
    $logs = [];
    $id = 1;

    foreach ($lines as $line) {
        if (preg_match('/"(GET|POST|PUT|DELETE|HEAD|OPTIONS)\s+([^"]+)\s+HTTP\/\d\.\d"/', $line, $matches)) {
            $method = $matches[1];

            $logs[] = array(
                'id' => $id++,
                'method' => $method,
                'raw' => htmlspecialchars($line)
            );
        }
    }

    echo json_encode($logs);
} else {
    echo json_encode(['error' => 'Файл логов не найден.']);
}
exit;
