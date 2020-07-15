<?php

class App
{
	protected static $router;

	public static function getRouter()
	{
		return self::$router;
	}

	public static function run($uri)
	{
		self::$router = new Router($uri);

		$controllerClass = ucfirst(self::$router->getController()).'Controller';
		$controllerMethod = strtolower(self::$router->getAction());

		$controllerObject = new $controllerClass;

        $controllerObject->$controllerMethod();
	}
}
