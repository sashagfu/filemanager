<?php

class Router
{
	protected $uri;

	protected $controller;

	protected $action;

	protected $params;

	protected $route;

	protected $method_prefix;

	protected $language;


	public function getUri()
	{
		return $this->uri;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getParams()
	{
		return $this->params;
	}

	public function getRoute()
	{
		return $this->route;
	}

	public function getLanguage()
	{
		return $this->language;
	}

	public function __construct($uri)
	{
		$this->uri = urldecode(trim($uri, '/'));

		$routes = Config::get('routes');
		$this->route = Config::get('default_route');
		$this->language = Config::get('default_language');
		$this->controller = Config::get('default_controller');
		$this->action = Config::get('default_action');

		$uriParts = explode('?', $this->uri);

		$path = $uriParts[0];

		$pathParts = explode('/', $path);

		// echo '<pre>'; print_r($pathParts);

		if (count($pathParts)) {

			// Get route or language as first element
			if (in_array(strtolower(current($pathParts)), array_keys($routes))) {
				$this->route = strtolower(current($pathParts));
				$this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
				array_shift($pathParts);
			} elseif (in_array(strtolower(current($pathParts)), Config::get('languages'))) {
				$this->language = strtolower(current($pathParts));
				array_shift($pathParts);
			}

			// Get controller
			if (current($pathParts)) {
				$this->controller = strtolower(current($pathParts));
				array_shift($pathParts);
			}

			// Get action
			if (current($pathParts)) {
				$this->action = strtolower(current($pathParts));
				array_shift($pathParts);
			}

			// Get params
			$this->params = $pathParts;
		}
	}
}
