<?php

class App{

	protected $controller = "Home";
	protected $method = "index";
	protected $params = [];

	public function __construct(){
		// echo "ini App.php";
		// var_dump($_GET);

		$url = $this->parseURL();
		var_dump($url);

		//controller
		if (isset($url[0])){
			if(file_exists('../app/controllers/'.$url[0].'.php')){
				$this->controller = $url[0];
				// var_dump($url);
	
				unset($url[0]);
				// var_dump($url);
	
			}
		}
		
		require_once '../app/controllers/'.$this->controller . '.php';
		$this->controller = new $this->controller;
	
		//method
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//kelola parameter
		if(!empty($url)){
			// var_dump($url);
			$this->params = array_values($url);
		}

		// /jalankan controller dan method, serta kirimkan params jika ada

	call_user_func_array([$this->controller,$this->method],
								$this->params);
	}

	public function parseURL(){
		if(isset($_GET['url'])){
			var_dump($_GET['url']);
			$url = trim($_GET['url'],'/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/',$url);
			return $url;
		}
	}
}