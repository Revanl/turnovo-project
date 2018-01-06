<?php
class IndexController extends Controller{
	public $getProducts;
	public function index()
	{
		$params = !empty($_GET['params']) ? $_GET['params'] : false;
		if(!empty ($_GET['destroy'])){
			$this->destroy();
		}else if(!empty ($_GET['edit'])){
			$this->edit();			
		}else{
			$this->CreateModel("product");
			$index = new Product();
			$this->getProducts = $index->index();
			$this->CreateView("index");
		}

	}
	public function create()
	{
		$this->CreateView("create");
		$this->CreateModel("product");
		$create = new Product();
		if(!empty($_POST['name'])){
			$create->create();
			header("Location: http://localhost/turnovo/index.php");
			die();
		}
	}
	public function edit()
	{		
		$this->CreateModel("product");
		$edit = new Product();
		$this->getProducts = $edit->getProduct();
		$this->CreateView("edit");
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (!empty($_POST["name"])) {
				$edit->edit();
				header("Location: http://localhost/turnovo/index.php");
				die();
			}
		}
	}

		
	
	public function destroy()
	{
		$this->CreateModel("product");
		$destroy = new Product();
		$destroy->destroy();
	
		header("Location: http://localhost/turnovo/index.php");
		die();
	}
}
?>