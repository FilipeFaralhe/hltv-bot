<?php

/*  incluindo o composer */
require 'vendor/autoload.php';

/* incluindo classe bot */
require_once 'config/config.php';
require_once 'src/Bot.php';

/* Inicia o bot */
$bot = new Bot();
$bot->init();

?>