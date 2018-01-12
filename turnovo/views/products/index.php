<a href="create.php" ><div class="btn btn-block btn-success">Create new product</div></a>

	<?php foreach($this->getProducts as $getProduct){?>
	<div class=" col-xs-12 panel panel-info">
		<div class="col-xs-12">
			<div class="col-xs-6">
				<h1><?php echo $getProduct["name"]; ?></h1>
				<img src="./storage/uploads/<?php echo $getProduct['image']?>" height="200px" width="200px">
			</div>
			<div class="col-xs-6">
				<h2>Price: <?php echo $getProduct["price"]; ?>$</h2>
				<h3>Description</h3>
				<div><?php echo $getProduct["description"]; ?></div>
			</div>
		</div>

		<div class="col-xs-12">
			<div class="col-xs-6">
				<a class="btn btn-block btn-info" href='<?php echo "edit.php?id=" . $getProduct["id"];?>'>Edit</a>
			</div>
			<div class="col-xs-6">
				<a class="btn btn-block btn-danger" href='<?php echo "destroy.php?id=" . $getProduct["id"];?>'>Destroy</a>
			</div>
		</div>
	</div>
	<?php }?>
	
