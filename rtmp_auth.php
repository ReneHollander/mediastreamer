<?php

if (!isset($_GET["name"]) || !isset($_GET["key"])) {
    http_response_code(404);
    exit();
}

$streams = include('config.php');

if ($streams[$_GET["name"]] == $_GET["key"]) {
    http_response_code(201);
} else {
    http_response_code(404);
}
?>
