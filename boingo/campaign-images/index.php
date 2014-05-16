<?php

require_once('func_copy_images.php');

$source_directories = array(
	/*
	'C:\smartcvs-boingo.aero\boingo_aero\web\Campaigns\Offerpod\Images',
	'C:\smartcvs-boingo.aero\boingo_aero\web\Static\Image\Laptop',
	'C:\smartcvs-boingo.aero\boingo_aero\web\Static\Image\Mobile',
	'C:\smartcvs-boingo.com2\boingo_website_new\html\shared\wgcontent\images',
	'C:\smartcvs-boingo.com2\boingo_website_new\html\shared\media\img'
	*/
	
	'C:\smartsvn-www.boingo.com\trunk\boingo_website\html\shared\wgcontent\images',
	'C:\smartsvn-www.boingo.com\trunk\boingo_website\html\shared\media\img',
	/*********************************** AERO ****************************************/
	'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\images',
	'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\img',
	'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images',
	'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images\Sponsored',
	'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images\Sponsored\shopping_portal',
	'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Static\Image\Laptop',
	'C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Static\Image\Mobile'
	
);

$target_directory = 'images';


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Campaign images</title>
</head>

<body>

<h1>Omniture Campaign Images</h1>

<p>There are currently <strong><?php echo total_images_in_directory($target_directory); ?></strong> images in the test collection directory.<br />If you need to update, <a href="?command=copy_images">click here</a>. (Do not overuse this, I've already updated the test directory)</p>

<h3>Source Directories</h3>
<ul>
	<?php foreach ($source_directories as $source_directory) { ?>
	<li><?php echo $source_directory; ?></li>
    <?php } ?>
</ul>

<hr />
<ul>
	<li><a href="<?php echo "?command=all"; ?>">Show all images</a></li>
    <li>Laptop
    	<ul>
        	<li><a href="<?php echo "?command=laptop_main"; ?>">Main offerpods</a></li>
            <li><a href="<?php echo "?command=laptop_sub"; ?>">Sub offerpods (1 horizontal pod)</a></li>
            <li><a href="<?php echo "?command=laptop_sub_2x"; ?>">Sub offerpods (2 pods, side-by-side)</a></li>
        </ul>
    </li>
    <li>Mobile
        <ul>
            <li><a href="<?php echo "?command=mobile_main"; ?>">Main offerpods</a></li>
            <li><a href="<?php echo "?command=mobile_get_online"; ?>">"Get online now" buttons</a></li>
            <li><a href="<?php echo "?command=mobile_sub"; ?>">Sub offerpods</a></li>
    	</ul>
    </li>
    <li>ipad
    	<ul>
        	<li><a href="<?php echo "?command=ipad_main"; ?>">Main offerpods</a></li>
            <li><a href="<?php echo "?command=ipad_sub"; ?>">Sub offerpods</a></li>
        </ul>
    	</li>
    <!-- <li><a href="<?php // echo "?command=testing"; ?>">testing</a></li> -->
</ul>

<hr />

<?php

if (isset($_GET['command'])) {
	
	$command = $_GET['command'];
	
	switch ($command) {
		
			// show all images ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'all':
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							true, /* show all images? */
							false, /* show images by actual size? */
							0, /* actual width */
							0, /* actual height */
							false, /* show images by dimensions ranges? */
							0, /* min width */
							0, /* max width */
							0, /* min height */
							0  /* max height */
					);
			
			break;
			
			
			// copy images +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'copy_images':
			
					# copying images from source directories (array above)
					foreach($source_directories as $source_directory){
						copy_images_from_source_to_target($source_directory, $target_directory);
					}
			
			break;
			
			
			// mobile_main +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'mobile_main':
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							true, /* show images by actual size? */
							320, /* actual width */
							324, /* actual height */
							false, /* show images by dimensions ranges? */
							0, /* min width */
							0, /* max width */
							0, /* min height */
							0  /* max height */
					);
					
			break;
			
			
			// mobile_get_online +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'mobile_get_online':
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							true, /* show images by actual size? */
							253, /* actual width */
							93, /* actual height */
							false, /* show images by dimensions ranges? */
							0, /* min width */
							0, /* max width */
							0, /* min height */
							0  /* max height */
					);
			
			break;
			
			
			// mobile_sub +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'mobile_sub':
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							false, /* show images by actual size? */
							0, /* actual width */
							0, /* actual height */
							true, /* show images by dimensions ranges? */
							319, /* min width */
							321, /* max width */
							0, /* min height */
							100  /* max height */
					);
			
			break;
			
			
			// ipad_main +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'ipad_main':
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							true, /* show images by actual size? */
							631, /* actual width */
							328, /* actual height */
							false, /* show images by dimensions ranges? */
							0, /* min width */
							0, /* max width */
							0, /* min height */
							0  /* max height */
					);
			
			break;
			
			
			// ipad_sub +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'ipad_sub': 
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							false, /* show images by actual size? */
							0, /* actual width */
							0, /* actual height */
							true, /* show images by dimensions ranges? */
							630, /* min width */
							632, /* max width */
							100, /* min height */
							200  /* max height */
					);			
			
			break;
			
			
			// ipad_sub +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'laptop_main': 
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							false, /* show images by actual size? */
							0, /* actual width */
							0, /* actual height */
							true, /* show images by dimensions ranges? */
							727, /* min width */
							729, /* max width */
							200, /* min height */
							400  /* max height */
					);			
			
			break;
			
			
			// ipad_sub +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'laptop_sub': 
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							false, /* show images by actual size? */
							0, /* actual width */
							0, /* actual height */
							true, /* show images by dimensions ranges? */
							727, /* min width */
							729, /* max width */
							100, /* min height */
							200  /* max height */
					);
			
			break;
			
			
			// ipad_sub +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'laptop_sub_2x': 
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							true, /* show images by actual size? */
							307, /* actual width */
							156, /* actual height */
							false, /* show images by dimensions ranges? */
							0, /* min width */
							0, /* max width */
							0, /* min height */
							0  /* max height */
					);
			
			break;
			
			// command=laptop_sub_2x
			
			
			// testing +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			case 'testing': 
			
					$image_collection = array_of_images_from_target(
							$target_directory, /* target directoy */
							false, /* show all images? */
							false, /* show images by actual size? */
							0, /* actual width */
							0, /* actual height */
							true, /* show images by dimensions ranges? */
							727, /* min width */
							729, /* max width */
							100, /* min height */
							200  /* max height */
					);			
			
			break;
						
			
			// you can add more cases here+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				
	} // eo switch

if ($_GET['command']!='copy_images') {	

$sorted_image_collection = sort_image_array_by_size($image_collection);
output_image_info_from_target($sorted_image_collection, $target_directory);

}
	
} // eo if wrapping the switch statement


?>



</body>
</html>