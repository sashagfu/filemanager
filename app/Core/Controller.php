<?php

class Controller {

    protected $data;
    protected $model;
    protected $params;

    protected $settings;
    public $tz;

    public function getData()
    {
        return $this->data;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function __construct($data = [])
    {
        $this->data = $data;
        $this->params = App::getRouter()->getParams();

        $this->settings = new Settings();
        $this->tz = $this->settings->get('name', 'timezone');

        date_default_timezone_set(getTimezoneName($this->tz->value));
    }

    /**
     * Load view.
     *
     * @param string $path
     * @param array $data
     */
    public function view($path, $data)
    {
        $pathParts = explode('.', $path);
        $templatePath = implode(DS, $pathParts);
        $viewObject = new View($data, VIEWS_PATH.DS.$templatePath.'_view.php');
        $content = $viewObject->render();

        $layoutPath = VIEWS_PATH.DS.'default_view.php';
        $layoutViewObject = new View(compact('content'), $layoutPath);
        echo $layoutViewObject->render();
    }
}
