<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Campaign images</title>
</head>

<body>

<?php

function Images_of_directory($myDir){

		// instantiating an array to hold image info
		$arr_images = array();
		
		if ($handle = opendir($myDir)) {
		
			while (false !== ($file = readdir($handle))) {
				// does not equal . or .. (directory elements) and name includes a period
				if ($file != "." && $file != ".." && preg_match('/\./',$file)!=0 ) {
					
					// copying files from my aero repository to a local directory for easier access
					copy($myDir . '\\' . $file, "images/$file");
					
					// Read width, height, type and attr of each image and assign to local variables
					list($width, $height, $type, $attr) = getimagesize('images/'.$file);
					
					// adding images to array for later use
					$arr_images[] = array(
						'file'			=> $file,
						'width' 		=> $width,
						'height' 		=> $height,
						'type' 			=> $type,
						'attributes' 	=> $attr
					);
				}
			}
		
			closedir($handle);
			
		} // eo if $handle
		
		// returning the results array
		return $arr_images;

} // eof Images_of_directory

function Img_array_sort_by_size($arr){
	
	// assigning passed in argument to a local variable
	$images = $arr;
	
	foreach($images as $key => $row) {
		$file[$key] = $row['file'];
		$width[$key] = $row['width'];
		$height[$key] = $row['height'];
		$type[$key] = $row['type'];
		$attributes[$key] = $row['attributes'];
	}
	
	// Sorting by width (sorts the array, no need to return an array
	array_multisort($width, SORT_ASC, $images);
	
	return $images;
	
} // eof Img_array_sort_by_size

function Output_as_table($arr){
	
	$images = $arr;
	
	$output = "<table border='1'>";
	$output .= "<thead><tr>";
	$output .= "<th>Filename</th>";
	$output .= "<th>Width</th>";
	$output .= "<th>Height</th>";
	$output .= "<th>Type</th>";
	$output .= "<th>Attributes</th>";
	$output .= "<th>Image preview</th>";
	$output .= "</tr></thead>";
	
	foreach($images as $image){
		
		$file = $image['file'];
		$width = $image['width'];
		$height = $image['height'];
		$type = $image['type'];
		$attr = $image['atrr'];
		
		$output .= "<tr>";
		$output .= "<td>" . $file 		. "</td>";
		$output .= "<td>" . $width		. "</td>";
		$output .= "<td>" . $height		. "</td>";
		$output .= "<td>" . $type		. "</td>";
		$output .= "<td>" . $attr		. "</td>";
		$output .= "<td><img src='images/" . $file . "' /></td>";
		$output .= "</tr>";
	}
	
	$output .= "</table>";
	
	echo $output;
	
} // eof Output_as_table

$source_dir = 'C:\smartcvs-boingo.aero\boingo_aero\web\Campaigns\Offerpod\Images';
$campaign_images = Images_of_directory($source_dir);
$campaign_images = Img_array_sort_by_size($campaign_images);
Output_as_table($campaign_images);

?>




</body>
</html>