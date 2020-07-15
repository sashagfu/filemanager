<?php

require_once(ROOT.DS.'app'.DS.'config'.DS.'config.php');

require_once(ROOT.DS.'app'.DS.'Core'.DS.'helper.php');

function __autoload($className) {

    $corePath  = ROOT.DS.'app'.DS.'Core'.DS.ucfirst($className).'.php';

    $controllerPath  = ROOT.DS.'app'.DS.'Controllers'.DS.ucfirst($className).'.php';

    $modelPath  = ROOT.DS.'app'.DS.'Models'.DS.ucfirst($className).'.php';


    if (file_exists($corePath)) {
        require_once($corePath);
    } elseif (file_exists($controllerPath)) {
        require_once($controllerPath);
    } elseif (file_exists($modelPath)) {
        require_once($modelPath);
    } else {
        throw new Exeption('Failed to include class: ' . $className);
    }
}
