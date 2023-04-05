<?php

spl_autoload_register(function ($class) {
    require 'Produk/' . $class . '.php';
});
