<?php require_once('func_copy_images.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Campaign images</title>
</head>

<body>

<h1>Omniture Campaign Images</h1>

<ul>
	<li><a href="<?php echo "?show=all"; ?>">Show all images</a></li>
    <li>Laptop
    	<ul>
        	<li><a href="<?php echo "?show=laptop_main"; ?>">Main offerpods</a></li>
            <li><a href="<?php echo "?show=laptop_sub"; ?>">Sub offerpods</a></li>
        </ul>
    </li>
    <li>Mobile
        <ul>
            <li><a href="<?php echo "?show=mobile_main"; ?>">Main offerpods</a></li>
            <li><a href="<?php echo "?show=mobile_get_online"; ?>">"Get online now" buttons</a></li>
            <li><a href="<?php echo "?show=mobile_sub"; ?>">Sub offerpods</a></li>
    	</ul>
    </li>
    <li>ipad
    	<ul>
        	<li><a href="<?php echo "?show=ipad_main"; ?>">Main offerpods</a></li>
            <li><a href="<?php echo "?show=ipad_sub"; ?>">Sub offerpods</a></li>
        </ul>
    	</li>
</ul>

<hr />

<?php

$source_dir = 'C:\test-omniture-images';

if (isset($_GET['show']) && $_GET['show']=='all') {

		$campaign_images = Images_of_directory(
			$source_dir	/*source*/,
			true /*$bool_show_all_images*/,
			true /*$bool_imgs_by_actual_dim*/,
			200,
			156,
			false,
			0,
			200,
			0,
			700
			);
		$campaign_images = Img_array_sort_by_size($campaign_images);
		Output_as_table($campaign_images);
		
} else if (isset($_GET['show']) && $_GET['show']=='mobile_main') {

		$campaign_images = Images_of_directory(
			$source_dir	/*source*/,
			false /*$bool_show_all_images*/,
			true /*$bool_imgs_by_actual_dim*/,
			320,
			324,
			false,
			0,
			0,
			0,
			0
			);
		$campaign_images = Img_array_sort_by_size($campaign_images);
		Output_as_table($campaign_images);

} else if (isset($_GET['show']) && $_GET['show']=='mobile_get_online') {

		$campaign_images = Images_of_directory(
			$source_dir	/*source*/,
			false /*$bool_show_all_images*/,
			true /*$bool_imgs_by_actual_dim*/,
			253,
			93,
			false,
			0,
			0,
			0,
			0
			);
		$campaign_images = Img_array_sort_by_size($campaign_images);
		Output_as_table($campaign_images);

} else if (isset($_GET['show']) && $_GET['show']=='mobile_sub') {

		$campaign_images = Images_of_directory(
			$source_dir	/*source*/,
			false /*$bool_show_all_images*/,
			false /*$bool_imgs_by_actual_dim*/,
			0,
			0,
			true,
			319,
			321,
			0,
			100
			);
		$campaign_images = Img_array_sort_by_size($campaign_images);
		Output_as_table($campaign_images);

} else if (isset($_GET['show']) && $_GET['show']=='ipad_main') {

		$campaign_images = Images_of_directory(
			$source_dir	/*source*/,
			false /*$bool_show_all_images*/,
			true /*$bool_imgs_by_actual_dim*/,
			631,
			328,
			false,
			0,
			0,
			0,
			0
			);
		$campaign_images = Img_array_sort_by_size($campaign_images);
		Output_as_table($campaign_images);

} else if (isset($_GET['show']) && $_GET['show']=='ipad_sub') {

		$campaign_images = Images_of_directory(
			$source_dir	/*source*/,
			false /*$bool_show_all_images*/,
			false /*$bool_imgs_by_actual_dim*/,
			0,
			0,
			true,
			630,
			632,
			100,
			200
			);
		$campaign_images = Img_array_sort_by_size($campaign_images);
		Output_as_table($campaign_images);

} else if (isset($_GET['show']) && $_GET['show']=='laptop_main') {

		$campaign_images = Images_of_directory(
			$source_dir	/*source*/,
			false /*$bool_show_all_images*/,
			false /*$bool_imgs_by_actual_dim*/,
			0,
			0,
			true,
			727,
			729,
			200,
			400
			);
		$campaign_images = Img_array_sort_by_size($campaign_images);
		Output_as_table($campaign_images);

} else if (isset($_GET['show']) && $_GET['show']=='laptop_sub') {

		$campaign_images = Images_of_directory(
			$source_dir	/*source*/,
			false /*$bool_show_all_images*/,
			false /*$bool_imgs_by_actual_dim*/,
			0,
			0,
			true,
			727,
			729,
			100,
			200
			);
		$campaign_images = Img_array_sort_by_size($campaign_images);
		Output_as_table($campaign_images);

}

?>



</body>
</html>