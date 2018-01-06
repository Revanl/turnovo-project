<?php
class Product extends Database{
	public function index()
	{
		$getProducts = self::selectAll("SELECT * FROM products ORDER BY id", array());
		return $getProducts;
	}	

	public function create()
	{
		if($_FILES['image']['name'] != ""){
		$insertProduct = self::execute("
			INSERT INTO products(name, description, image, price)
			VALUES(:name, :description, :image, :price)",
			array(
				':name' => self::test_input($_POST['name']),
				':description' => self::test_input($_POST['description']),
				':price' => self::test_input($_POST['price']),
				':image' => self::validate_file($_FILES["image"]["name"])
			));		
		}else{
			$insertProduct = self::execute("
			INSERT INTO products(name, description, image, price)
			VALUES(:name, :description, :image, :price)",
			array(
				':name' => self::test_input($_POST['name']),
				':description' => self::test_input($_POST['description']),
				':price' => self::test_input($_POST['price']),
				':image' => 'noimage.jpg'
			));		
		}
	}
	
	public function getProduct()
	{
		$row = self::selectOne("SELECT * FROM products WHERE id=:id",
			array(
				':id' => self::test_input($_GET['edit'])
			));	
		return $row;
	}
		
	public function edit()
	{
	if($_FILES['image']['name'] != ""){
		$row = self::execute("UPDATE products SET 
			name=:name,
			description=:description,
			price=:price,
			image=:image
			WHERE id=:id",
			array(
				':name' => self::test_input($_POST['name']),
				':description' => self::test_input($_POST['description']),
				':price' => self::test_input($_POST['price']),
				':image' => self::validate_file($_FILES["image"]["name"]),
				':id' => self::test_input($_GET['edit'])
			));
		}else{
			$row = self::execute("UPDATE products SET 
			name=:name,
			description=:description,
			price=:price
			WHERE id=:id",
			array(
				':name' => self::test_input($_POST['name']),
				':description' => self::test_input($_POST['description']),
				':price' => self::test_input($_POST['price']),
				':id' => self::test_input($_GET['edit'])
			));	
		}
	}
	public function destroy()
	{
		$row = self::selectOne("SELECT image FROM products WHERE id=:id",
		array(
			':id' => self::test_input($_GET['destroy'])
		));	
		$filename = './storage/uploads/'.$row['image'];
		if($row['image'] != "noimage.jpg"){
			if(file_exists($filename)){
				echo "file deleted";
				unlink($filename);
			}
		}
		$destroy = self::execute("DELETE FROM products WHERE id=:id",
		array(
			':id' => self::test_input($_GET['destroy'])
		));
	}
	
	
	
	
	
	public static function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
		
	public static function validate_file($data){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["image"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image"]["size"] > 10000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], realpath(__DIR__ . '/..') . '/storage/uploads/' . $_FILES["image"]["name"])) {
				return $data;
			}
		}
	}
}

?>