<?php

class View
{
    protected $data;

    protected $path;

    protected static function getDefaultViewPath()
    {
        $router = App::getRouter();
        if (!$router) {
            return false;
        }
        $controllerDir = $router->getController();
        $templateName = $router->getAction() . '.php';

        return VIEWS_PATH.DS.$controllerDir.DS.$templateName;
    }

    public function __construct($data = [], $path = null)
    {
        if (!$path) {
            $path = self::getDefaultViewPath();
        }
        $this->path = $path;
        $this->data = $data;
    }

    public function render()
    {
        $data = $this->data;

        extract($data);

        ob_start();
        include($this->path);

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
