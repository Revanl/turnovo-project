<h1>Edit product<h1>

<h2><?php echo $this->getProducts["name"];?></h2>

<form action="" method="post" enctype="multipart/form-data">
	<label for="name">Name</label>
	<input type="text" name="name" value="<?php echo $this->getProducts["name"];?>"/>
	
	<label for="description">Description</label>
	<textarea name="description"><?php echo $this->getProducts["description"];?></textarea>
	
	<label for="name">Price</label>		
	<input type="number" name="price" value="<?php echo $this->getProducts["price"];?>"/>
	
	<label for="name">Image</label>
	<input type="file" name="image"/>
	
	<input type="submit" value="Submit"/>
</form>