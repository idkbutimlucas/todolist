<?php
function classLoader($className){
    require 'classes/'.$className.'.php';
}

spl_autoload_register('classLoader');
