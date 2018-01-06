<?php
class Controller extends Database{
	public function CreateModel($modelName) {
		require_once(ROOT ."/models/$modelName.php");	
	}
	public function CreateView($viewName) {
		require_once(ROOT ."/views/products/$viewName.php");	
	}
}
?>