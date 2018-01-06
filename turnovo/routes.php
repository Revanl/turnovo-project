<?php
Route::set('index.php', function(){
	$controller = new IndexController();
	$controller->index();
});
Route::set('create.php', function(){
	$controller = new IndexController();
	$controller->create();
});
?>