<?php
Route::set('index.php', function(){
	$controller = new IndexController();
	$controller->index();
});
Route::set('create.php', function(){
	$controller = new IndexController();
	$controller->create();
});
Route::set('edit.php', function(){
	$controller = new IndexController();
	$controller->edit();
});
Route::set('destroy.php', function(){
	$controller = new IndexController();
	$controller->destroy();
});
?>
