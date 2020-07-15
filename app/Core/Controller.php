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
}
