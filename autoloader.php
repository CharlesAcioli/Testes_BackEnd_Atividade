<?php
// O que é o autolaoder?

spl_autoload_register(function ($className){
    include $className . '.php';
});