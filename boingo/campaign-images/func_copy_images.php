<?php

/* ********************************************************************************************************* */
function copy_images_from_source_to_target($source, $target) {
			if ($handle = opendir($source)) {
		
				while (false !== ($file = readdir($handle))) {
					// does not equal . or .. (directory elements) and name includes a period 
					if ($file != "." && $file != ".." && preg_match('/\./',$file)!=0 ) {
						
						// copying files from my aero repository to a local directory for easier access
						copy($source . '\\' . $file, $target . "/" . $file);
					}
				}
			}
			
}

/* ********************************************************************************************************* */
function array_of_images_from_target(
					$target,							/* location of source director, eg: c:\test\ */
					$bool_show_all_images,				/* show all images? true or fase */
					$bool_show_imgs_by_actual_size,		/* show images by actual size? true or false */ 
					$width_actual,						/* actual width of image in pixels, eg: 541 */
					$height_actual,						/* actual height of image in pixels, eg: 125 */
					$bool_show_imgs_by_size_range,		/* show images by size range? true or false */
					$width_min,							/* minimum width in pixels */
					$width_max,							/* maximum width in pixels */
					$height_min,						/* minimum height in pixels */
					$height_max							/* maximum height in pixels */
					){
	
	$arr_images = array();
	
	if ($handle = opendir($target)) {
		while (false !== ($file = readdir($handle))) {
			
			if ($file != "." && $file != "..") {
				
					list($width, $height, $type, $attr) = getimagesize($target . '/' .$file);
				
					// --------------------------------------------------------------------------------
					// Show all images: if $bool_show_all_images is true
					// --------------------------------------------------------------------------------
					if ($bool_show_all_images) {

							$arr_images[] = array(
								'file'			=> $file,
								'width' 		=> $width,
								'height' 		=> $height,
								'type' 			=> $type,
								'attributes' 	=> $attr
							);


					// --------------------------------------------------------------------------------
					// Show images by actual dimentsions : if $bool_show_imgs_by_actual_size is true
					// (If you want to show images by actual dimensions, this parameter must be set to true)
					// --------------------------------------------------------------------------------
					} else if ($bool_show_all_images==false && $bool_show_imgs_by_actual_size) {
						
						if ($width_actual==$width && $height_actual==$height) {
							$arr_images[] = array(
								'file'			=> $file,
								'width' 		=> $width,
								'height' 		=> $height,
								'type' 			=> $type,
								'attributes' 	=> $attr
							);
						}
						
					// --------------------------------------------------------------------------------
					// Show images by range of dimensions : if $bool_show_imgs_by_size_range is true
					// (If you want to show images by a range of dimensions, this parameter must be set to true)
					// --------------------------------------------------------------------------------
						
					} else if ($bool_show_all_images==false && $bool_show_imgs_by_actual_size==false && $bool_show_imgs_by_size_range) {
					
						if (($width>$width_min && $width<$width_max) && ($height>$height_min && $height<$height_max)) {
							$arr_images[] = array(
								'file'			=> $file,
								'width' 		=> $width,
								'height' 		=> $height,
								'type' 			=> $type,
								'attributes' 	=> $attr
							);
						}							
					
					
					}



			}
		}
	
    closedir($handle);
	}
	
	return $arr_images;

	
} // eof

/* ********************************************************************************************************* */
function sort_image_array_by_size($arr){
	
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

/* ********************************************************************************************************* */
function output_image_info_from_target($arr, $source){
	
	$images = $arr;
	
	$output = "<h3>Images found: " . count($arr) . "</h3>"; 
	
	$output .= "<table border='1'>";
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
		$attr = $image['attributes'];
		
		$output .= "<tr>";
		$output .= "<td>" . $file 		. "</td>";
		$output .= "<td>" . $width		. "</td>";
		$output .= "<td>" . $height		. "</td>";
		$output .= "<td>" . $type		. "</td>";
		$output .= "<td>" . $attr		. "</td>";
		$output .= "<td><img src='" . $source . "/" . $file . "' /></td>";
		$output .= "</tr>";
	}
	
	$output .= "</table>";
	
	echo $output;

	
} // eof

/* ********************************************************************************************************* */
function total_images_in_directory($target){
	if ($handle = opendir($target)) {
	$count = 0;
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
           $count++;
        }
    }
    closedir($handle);
	return $count;
}

} //eof

?>