<?php

/**
 * CSS
 */

$minCSS = new \MatthiasMullie\Minify\CSS();
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/bootstrap.min.css");
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/style.css");
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/message.css");
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/load.css");

$minCSS->minify(dirname(__DIR__,1)."/views/assets/style.min.css");

/**
 * JS
 */

$minJS = new \MatthiasMullie\Minify\JS();
$minJS->add(dirname(__DIR__,1)."/views/assets/js/jquery.js");
$minJS->add(dirname(__DIR__,1)."/views/assets/js/bootstrap.min.js");

$minJS->minify(dirname(__DIR__,1)."/views/assets/script.min.js");
