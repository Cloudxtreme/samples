<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Campaign images</title>
</head>

<body>

<?php

$MY_images = '';

function printImagesOfADirectory($myDir){
	
		global $MY_images;

		// instantiating an array to hold image info
		$arr_images = array();
		
		
		if ($handle = opendir($myDir)) {
		
			// output table head column
			echo "<table border='1'>";
			echo "<thead><tr>";
			echo "<th>Filename</th>";
			echo "<th>Width</th>";
			echo "<th>Height</th>";
			echo "<th>Type</th>";
			echo "<th>Attributes</th>";
			echo "</tr></thead>";
		
			while (false !== ($file = readdir($handle))) {
				// does not equal . or .. (directory elements) and name includes a period
				if ($file != "." && $file != ".." && preg_match('/\./',$file)!=0 ) {
					
					// copying files from my aero repository to a local directory for easier access
					copy($myDir . '\\' . $file, "images/$file");
					
					// Read width, height, type and attr of each image and assign to local variables
					list($width, $height, $type, $attr) = getimagesize('images/'.$file);
					
					// output information inside table rows
					echo "<tr>";
					echo "<td>" . $file 	. "</td>";
					echo "<td>" . $width	. "</td>";
					echo "<td>" . $height	. "</td>";
					echo "<td>" . $type		. "</td>";
					echo "<td>" . $attr		. "</td>";
					echo "</tr>";
					
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
			
			echo "</table>";
		
			closedir($handle);
			
		} // eo if $handle
		
		// passing the images array to an external variable for storage
		$MY_images = $arr_images;

} // eof printImagesOfADirectory

function MY_array_sort(){
	global $MY_images;
	$images = $MY_images;
	
	foreach($images as $key => $row) {
		$file[$key] = $row['file'];
		$width[$key] = $row['width'];
		$height[$key] = $row['height'];
		$type[$key] = $row['type'];
		$attributes[$key] = $row['attributes'];
	}
	
	array_multisort($width, SORT_ASC, $images);
	
	?><pre><?php print_r($images);?></pre><?php
}


printImagesOfADirectory('C:\smartcvs-boingo.aero\boingo_aero\web\Campaigns\Offerpod\Images');

?>

<pre><?php print_r($MY_images)?></pre>

<hr />

<?php MY_array_sort(); ?>


</body>
</html>