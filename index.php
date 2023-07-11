<?php

// incluindo o composer
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

echo "Recuperar o ambiente: " . getenv('APP_ENV')


?>