<?php

spl_autoload_register(function ($class) {
    $class = explode("\\", $class);
    $class = end($class);
    require 'Produk/' . $class . '.php';
});

spl_autoload_register(function ($class) {
    $class = explode("\\", $class);
    $class = end($class);
    require 'Service/' . $class . '.php';
});
