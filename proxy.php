<?php
header("Access-Control-Allow-Origin: *");
$url = isset($_GET['url']) ? $_GET['url'] : null;
if (!$url) { http_response_code(400); echo "Missing url"; exit; }

$opts = ['http' => ['method' => 'GET', 'timeout' => 10]];
$context = stream_context_create($opts);
$content = @file_get_contents($url, false, $context);

if ($content === false) { http_response_code(500); echo "Fetch failed"; exit; }

header("Content-Type: text/plain");
echo $content;
?>
