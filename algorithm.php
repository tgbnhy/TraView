<?php 
//this file is used to call wand_search which can input the query, it will return all the number of trajectoies.
$input = isset($_POST['arr'])?$_POST['arr']:'';
if(empty($input)){
	exit("please input the activity and location");
}else{
	$command= "./wand_search".escapeshellarg($input);
	$return = passthru($command);
	var_dump($return);
}
?>>