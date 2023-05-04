<?php
// Require libary
require_once "ectr/main.php";

/*
	Function for control storage
	@param string $name_form -> input name in form 
	@param string $path_storage -> path to create catalog and save file
*/
function storage_control($name_form, $path_storage){

	// Generate identy name of time
	date_default_timezone_set('UTC');

	// For catalog 
	$dir = date("Ym");
	
	// For file
	$gen1 = date("dHis"); 
	$gen2 = rand_n(3);
	$fname = "$gen1$gen2";

	// Check catalog and save file
	if (is_dir ($dir)) {
		get_file("$path_storage/$dir/", $name_form, $fname);
	} 
	else {
		mkdir("$path_storage/$dir", 0777, true);
		get_file("$path_storage/$dir/", $name_form, $fname);
	}

	// Array info for call-back
	$ex = format($_FILES["$name_form"]['name']);
	$call_back = array(
		"name" => "$fname.$ex",
		"path" => "$dir/"
	);
	return $call_back;
}
?>
