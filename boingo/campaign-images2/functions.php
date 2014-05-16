<?php

function connectToDB($con){
	
	// very crude, connects to DB
	// $con argument = mysql_connect('localhost', 'cms', 'w0nd3rful');
	
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("boingotools", $con);
	// echo 'Connected successfully';
	
} // end of function

function disconnectFromDB($con){

	mysql_close($con);
	
}

function isImage($dir, $image){
	
	// if file is an image then this function returns true, otherwise returns false
	// using built in GD function getimagesize
	
	$img_info_array = getimagesize($dir . '/' . $image);
	
	if(is_array($img_info_array)){
		return true;
	} else {
		return false;	
	}
	
} // end of function isImage

function listImagesInDirectory($directory){
	
	// prints a list of images in passed in directory name
	// uses another function 'isImage' to determine if entry in dir is an image or not before printing it

	if ($handle = opendir($directory)) {
	
		while (false !== ($entry = readdir($handle))) {
			if(isImage($directory,$entry)){
				echo "$entry <br />";
			}
		}
	
		closedir($handle);
	}

} // end of function listImagesInDirectory

function storeDirImagesInArray($directory){
	
	// stores image path (the passed directory, image name, width, height, type and attribute in an array and passed it back
	// uses 'isImage' function below
	
	$images_array = array();
	
	if ($handle = opendir($directory)) {
	
		while (false !== ($entry = readdir($handle))) {
			if(isImage($directory,$entry)){
				list($width, $height, $type, $attr) = getimagesize($directory . '/' . $entry);
				$images_array[] = array(
					'directory' => $directory,
					'image' => $entry,
					'width' => $width,
					'height' => $height,
					'type' => $type,
					'attribute' => $attr
				);
			}
		}
	
		closedir($handle);
	}
	
	return $images_array;
	
	
} // end of function storeDirImagesInArray

function storeDirImagesInDB($directory){
	
	// 'insert' images from passed in dir into 'all_images' table in 'boingotools' db
	// this function does not return anything.
	
	$myimages = storeDirImagesInArray($directory);
	
	echo '<hr /><p><b>' . $directory . '</b><br /><u># of images:</u></p>';

	for($i=0; $i<count($myimages); $i++){
		
		$field_directory	= mysql_real_escape_string($myimages[$i]['directory']);
		$field_image		= $myimages[$i]['image'];
		$field_width		= $myimages[$i]['width'];
		$field_height		= $myimages[$i]['height'];
		$field_type			= $myimages[$i]['type'];
		$field_attribute	= $myimages[$i]['attribute'];	
	
	mysql_query("INSERT INTO all_images (directory, image, width, height, type, attribute) VALUES ('$field_directory', '$field_image', '$field_width', '$field_height', '$field_type', '$field_attribute')");
	
	//echo $i+1 . ', ';
	outputProgress($i, $field_image);
	
	
	} // end of for
	
} // enf of function

// following two functions are borrowed from stackoverflow
// they help display progress to the screen
function outputProgress($i, $field_image) { 
   //echo $i+1 . ': ' . $field_image . '<br />'; 
    echo $i+1 . ', ';
	myFlush(); 
    //sleep(1); 
} 

function myFlush() { 
    echo(str_repeat(' ', 256)); 
    if (@ob_get_contents()) { 
        @ob_end_flush(); 
    } 
    flush(); 
} 

function replaceLocalPath_with_webPath($directory){

	// very crude, the switch statement below needs to be manually updated to match your paths
	// function returns a webpath
	
	switch($directory) {
	
		// .com repo paths
		
		case 'C:\smartsvn-www.boingo.com\trunk\boingo_website\html\shared\wgcontent\images':
		$webpath = 'http://ripclaw:8890/shared/wgcontent/images';
		break;
		
		case 'C:\smartsvn-www.boingo.com\trunk\boingo_website\html\shared\media\img':
		$webpath = 'http://ripclaw:8890/shared/media/img';
		break;
		
		// aero repo paths
		
		case 'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\images':
		$webpath = 'http://ripclaw:8082/images';
		break;
		
		case 'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\img':
		$webpath = 'http://ripclaw:8082/img';
		break;
		
		case 'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images':
		$webpath = 'http://ripclaw:8082/Campaigns/Offerpod/Images';
		break;
		
		case 'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images\Sponsored':
		$webpath = 'http://ripclaw:8082/Campaigns/Offerpod/Images/Sponsored';
		break;
		
		case 'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images\Sponsored\shopping_portal':
		$webpath = 'http://ripclaw:8082/Campaigns/Offerpod/Images/Sponsored/shopping_portal';
		break;
		
		case 'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Static\Image\Laptop':
		$webpath = 'http://ripclaw:8082/Static/Image/Laptop';
		break;
		
		case 'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Static\Image\Mobile':
		$webpath = 'http://ripclaw:8082/Static/Image/Mobile';
		break;
		
	} // end of switch
	
	return $webpath;
	
} // end of function

function replaceLocalWebPath_with_prodWebPath($path){
	
	if (preg_match('/ripclaw:8082/',$path)) {
		$newpath = preg_replace('/ripclaw:8082/','www.boingohotspot.net', $path);
	} else {
		$newpath = preg_replace('/ripclaw:8890/','www.boingo.com', $path);
	}
	
	return $newpath;
	
} // end of replaceLocalWebPath_with_prodWebPath

function aero_or_com($str){
	
	// based on passed in argument (I'll be passing in image directory
	// determine if repo is 'aero' or 'com' and pass back these strings
	
	$repo = '';
	
	if(preg_match('/boingo_aero/i',$str)){
		$repo = "aero";
	} else {
		$repo = ".com";	
	}
	
	return $repo;
	
} // end of aero_or_com








?>